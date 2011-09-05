<?php

namespace Ratasxy\RecargasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Ratasxy\RecargasBundle\Entity\Registro;
use Ratasxy\RecargasBundle\Form\RegistroType;

/**
 * Registro controller.
 *
 * @Secure(roles="ROLE_USER")
 * @Route("user/ventas")
 */
class RegistroController extends Controller
{
    /**
     * Lists all Registro entities.
     *
     * @Route("/listar/{fecha}" ,defaults={"fecha" = "hoy"}, name="ventas")
     * 
     * @Template()
     */
    public function indexAction($fecha)
    {
        //TODO: Remplazar esta manera
        if($fecha == "hoy"){
            $fecha = new \DateTime('now');
            $fecha = $fecha->format("Y-m-d");
        }
        
        $vendedor = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('RatasxyRecargasBundle:Registro')->findby(array('vendedor' => $vendedor->getId(), 'fecha' => $fecha));
        $pendiente = $em->getRepository('RatasxyRecargasBundle:Registro')->sumaPendientes($vendedor->getId(), $fecha);
        $cancelado = $em->getRepository('RatasxyRecargasBundle:Registro')->sumaCancelados($vendedor->getId(), $fecha);
        $calculos = array('Pendiente' => $pendiente, 'Cancelado' => $cancelado);
        return array('entities' => $entities, 'calculos' => $calculos );
    }

    /**
     * Finds and displays a Registro entity.
     *
     * @Route("/{id}/show", name="ventas_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('RatasxyRecargasBundle:Registro')->find($id);

        $vendedor = $this->get('security.context')->getToken()->getUser();

        if($entity !== null && $entity->getVendedor()->getId() != $vendedor->getId())
            throw $this->createNotFoundException("no te pertenece la venta");

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Registro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Registro entity.
     *
     * @Route("/new", name="ventas_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Registro();
        $form   = $this->createForm(new RegistroType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Registro entity.
     *
     * @Route("/create", name="ventas_create")
     * @Method("post")
     * @Template("RatasxyRecargasBundle:Registro:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Registro();
        $request = $this->getRequest();
        $form    = $this->createForm(new RegistroType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $vendedor = $this->get('security.context')->getToken()->getUser();
            $em = $this->getDoctrine()->getEntityManager();
            
            $paquete = $entity->getPaquete();
            $entity->setCompra($paquete - ($paquete * 0.095));
            $entity->setPorcentaje($entity->getUsuario()->getPorcentaje());
            $entity->setVenta($paquete - ($paquete * $entity->getPorcentaje()));
            $entity->setGanacia($entity->getVenta() - $entity->getCompra());
            $entity->setFecha(new \DateTime('now'));
            $entity->setVendedor($vendedor);
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ventas_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Edits an existing Registro entity.
     *
     * @Route("/{id}/update", name="ventas_update")
     * @Method("post")
     * @Template("RatasxyRecargasBundle:Registro:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('RatasxyRecargasBundle:Registro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Registro entity.');
        }

        $editForm   = $this->createForm(new RegistroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ventas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Registro entity.
     *
     * @Route("/{id}/delete", name="ventas_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('RatasxyRecargasBundle:Registro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Registro entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ventas'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

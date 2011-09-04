<?php

namespace Ratasxy\RecargasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ratasxy\RecargasBundle\Entity\Cliente;
use Ratasxy\RecargasBundle\Form\ClienteType;

/**
 * Cliente controller.
 *
 * @Route("user/clientes")
 */
class ClienteController extends Controller
{
    /**
     * Lists all Cliente entities.
     *
     * @Route("/", name="cliente")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('RatasxyRecargasBundle:Cliente')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Cliente entity.
     *
     * @Route("/{id}/show", name="cliente_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('RatasxyRecargasBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Cliente entity.
     *
     * @Route("/new", name="cliente_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cliente();
        $form   = $this->createForm(new ClienteType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Cliente entity.
     *
     * @Route("/create", name="cliente_create")
     * @Method("post")
     * @Template("RatasxyRecargasBundle:Cliente:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Cliente();
        $request = $this->getRequest();
        $form    = $this->createForm(new ClienteType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cliente_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Cliente entity.
     *
     * @Route("/{id}/edit", name="cliente_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('RatasxyRecargasBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        $editForm = $this->createForm(new ClienteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Cliente entity.
     *
     * @Route("/{id}/update", name="cliente_update")
     * @Method("post")
     * @Template("RatasxyRecargasBundle:Cliente:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('RatasxyRecargasBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        $editForm   = $this->createForm(new ClienteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cliente_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Cliente entity.
     *
     * @Route("/{id}/delete", name="cliente_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('RatasxyRecargasBundle:Cliente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cliente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cliente'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

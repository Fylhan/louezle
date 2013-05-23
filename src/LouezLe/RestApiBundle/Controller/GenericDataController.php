<?php

namespace LouezLe\RestApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LouezLe\RestApiBundle\Entity\GenericData;
use LouezLe\RestApiBundle\Form\GenericDataType;

/**
 * GenericData controller.
 *
 */
class GenericDataController extends Controller
{
    /**
     * Lists all GenericData entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('LouezLeRestApiBundle:GenericData')->findAll();

        return $this->render('LouezLeRestApiBundle:GenericData:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a GenericData entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LouezLeRestApiBundle:GenericData')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GenericData entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LouezLeRestApiBundle:GenericData:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new GenericData entity.
     *
     */
    public function newAction()
    {
        $entity = new GenericData();
        $form   = $this->createForm(new GenericDataType(), $entity);

        return $this->render('LouezLeRestApiBundle:GenericData:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new GenericData entity.
     *
     */
    public function createAction()
    {
        $entity  = new GenericData();
        $request = $this->getRequest();
        $form    = $this->createForm(new GenericDataType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('genericdata_show', array('id' => $entity->getId())));
            
        }

        return $this->render('LouezLeRestApiBundle:GenericData:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing GenericData entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LouezLeRestApiBundle:GenericData')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GenericData entity.');
        }

        $editForm = $this->createForm(new GenericDataType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LouezLeRestApiBundle:GenericData:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing GenericData entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LouezLeRestApiBundle:GenericData')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GenericData entity.');
        }

        $editForm   = $this->createForm(new GenericDataType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('genericdata_edit', array('id' => $id)));
        }

        return $this->render('LouezLeRestApiBundle:GenericData:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a GenericData entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('LouezLeRestApiBundle:GenericData')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GenericData entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('genericdata'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

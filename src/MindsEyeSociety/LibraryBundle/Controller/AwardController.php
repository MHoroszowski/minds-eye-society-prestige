<?php

namespace MindsEyeSociety\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MindsEyeSociety\LibraryBundle\Entity\Award;
use MindsEyeSociety\LibraryBundle\Form\AwardType;

/**
 * Award controller.
 *
 * @Route("/award")
 */
class AwardController extends Controller
{
    /**
     * Lists all Award entities.
     *
     * @Route("/", name="award")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('MindsEyeSocietyLibraryBundle:Award')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Award entity.
     *
     * @Route("/{id}/show", name="award_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('MindsEyeSocietyLibraryBundle:Award')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Award entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Award entity.
     *
     * @Route("/new", name="award_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Award();
        $form   = $this->createForm(new AwardType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Award entity.
     *
     * @Route("/create", name="award_create")
     * @Method("post")
     * @Template("MindsEyeSocietyLibraryBundle:Award:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Award();
        $request = $this->getRequest();
        $form    = $this->createForm(new AwardType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('award_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Award entity.
     *
     * @Route("/{id}/edit", name="award_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('MindsEyeSocietyLibraryBundle:Award')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Award entity.');
        }

        $editForm = $this->createForm(new AwardType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Award entity.
     *
     * @Route("/{id}/update", name="award_update")
     * @Method("post")
     * @Template("MindsEyeSocietyLibraryBundle:Award:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('MindsEyeSocietyLibraryBundle:Award')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Award entity.');
        }

        $editForm   = $this->createForm(new AwardType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('award_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Award entity.
     *
     * @Route("/{id}/delete", name="award_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('MindsEyeSocietyLibraryBundle:Award')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Award entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('award'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

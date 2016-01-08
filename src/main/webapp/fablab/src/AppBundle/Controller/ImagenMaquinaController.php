<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ImagenMaquina;
use AppBundle\Form\ImagenMaquinaType;

/**
 * ImagenMaquina controller.
 *
 * @Route("/imagenmaquina")
 */
class ImagenMaquinaController extends Controller
{
    /**
     * Lists all ImagenMaquina entities.
     *
     * @Route("/", name="imagenmaquina_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imagenMaquinas = $em->getRepository('AppBundle:ImagenMaquina')->findAll();

        return $this->render('imagenmaquina/index.html.twig', array(
            'imagenMaquinas' => $imagenMaquinas,
        ));
    }

    /**
     * Creates a new ImagenMaquina entity.
     *
     * @Route("/new", name="imagenmaquina_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $imagenMaquina = new ImagenMaquina();
        $form = $this->createForm('AppBundle\Form\ImagenMaquinaType', $imagenMaquina);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imagenMaquina);
            $em->flush();

            return $this->redirectToRoute('imagenmaquina_show', array('id' => $imagenmaquina->getId()));
        }

        return $this->render('imagenmaquina/new.html.twig', array(
            'imagenMaquina' => $imagenMaquina,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ImagenMaquina entity.
     *
     * @Route("/{id}", name="imagenmaquina_show")
     * @Method("GET")
     */
    public function showAction(ImagenMaquina $imagenMaquina)
    {
        $deleteForm = $this->createDeleteForm($imagenMaquina);

        return $this->render('imagenmaquina/show.html.twig', array(
            'imagenMaquina' => $imagenMaquina,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ImagenMaquina entity.
     *
     * @Route("/{id}/edit", name="imagenmaquina_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ImagenMaquina $imagenMaquina)
    {
        $deleteForm = $this->createDeleteForm($imagenMaquina);
        $editForm = $this->createForm('AppBundle\Form\ImagenMaquinaType', $imagenMaquina);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imagenMaquina);
            $em->flush();

            return $this->redirectToRoute('imagenmaquina_edit', array('id' => $imagenMaquina->getId()));
        }

        return $this->render('imagenmaquina/edit.html.twig', array(
            'imagenMaquina' => $imagenMaquina,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ImagenMaquina entity.
     *
     * @Route("/{id}", name="imagenmaquina_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ImagenMaquina $imagenMaquina)
    {
        $form = $this->createDeleteForm($imagenMaquina);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imagenMaquina);
            $em->flush();
        }

        return $this->redirectToRoute('imagenmaquina_index');
    }

    /**
     * Creates a form to delete a ImagenMaquina entity.
     *
     * @param ImagenMaquina $imagenMaquina The ImagenMaquina entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ImagenMaquina $imagenMaquina)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imagenmaquina_delete', array('id' => $imagenMaquina->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

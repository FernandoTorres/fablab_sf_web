<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ImagenProyecto;
use AppBundle\Form\ImagenProyectoType;

/**
 * ImagenProyecto controller.
 *
 * @Route("/imagenproyecto")
 */
class ImagenProyectoController extends Controller
{
    /**
     * Lists all ImagenProyecto entities.
     *
     * @Route("/", name="imagenproyecto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imagenProyectos = $em->getRepository('AppBundle:ImagenProyecto')->findAll();

        return $this->render('imagenproyecto/index.html.twig', array(
            'imagenProyectos' => $imagenProyectos,
        ));
    }

    /**
     * Creates a new ImagenProyecto entity.
     *
     * @Route("/new", name="imagenproyecto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $imagenProyecto = new ImagenProyecto();
        $form = $this->createForm('AppBundle\Form\ImagenProyectoType', $imagenProyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imagenProyecto);
            $em->flush();

            return $this->redirectToRoute('imagenproyecto_show', array('id' => $imagenproyecto->getId()));
        }

        return $this->render('imagenproyecto/new.html.twig', array(
            'imagenProyecto' => $imagenProyecto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ImagenProyecto entity.
     *
     * @Route("/{id}", name="imagenproyecto_show")
     * @Method("GET")
     */
    public function showAction(ImagenProyecto $imagenProyecto)
    {
        $deleteForm = $this->createDeleteForm($imagenProyecto);

        return $this->render('imagenproyecto/show.html.twig', array(
            'imagenProyecto' => $imagenProyecto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ImagenProyecto entity.
     *
     * @Route("/{id}/edit", name="imagenproyecto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ImagenProyecto $imagenProyecto)
    {
        $deleteForm = $this->createDeleteForm($imagenProyecto);
        $editForm = $this->createForm('AppBundle\Form\ImagenProyectoType', $imagenProyecto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imagenProyecto);
            $em->flush();

            return $this->redirectToRoute('imagenproyecto_edit', array('id' => $imagenProyecto->getId()));
        }

        return $this->render('imagenproyecto/edit.html.twig', array(
            'imagenProyecto' => $imagenProyecto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ImagenProyecto entity.
     *
     * @Route("/{id}", name="imagenproyecto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ImagenProyecto $imagenProyecto)
    {
        $form = $this->createDeleteForm($imagenProyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imagenProyecto);
            $em->flush();
        }

        return $this->redirectToRoute('imagenproyecto_index');
    }

    /**
     * Creates a form to delete a ImagenProyecto entity.
     *
     * @param ImagenProyecto $imagenProyecto The ImagenProyecto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ImagenProyecto $imagenProyecto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imagenproyecto_delete', array('id' => $imagenProyecto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

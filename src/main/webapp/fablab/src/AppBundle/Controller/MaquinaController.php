<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Maquina;
use AppBundle\Form\MaquinaType;

/**
 * Maquina controller.
 *
 * @Route("/maquina")
 */
class MaquinaController extends Controller
{
    /**
     * Lists all Maquina entities.
     *
     * @Route("/", name="maquina_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $maquinas = $em->getRepository('AppBundle:Maquina')->findAll();

        return $this->render('maquina/index.html.twig', array(
            'maquinas' => $maquinas,
        ));
    }

    /**
     * Creates a new Maquina entity.
     *
     * @Route("/new", name="maquina_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $maquina = new Maquina();
        $form = $this->createForm('AppBundle\Form\MaquinaType', $maquina);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($maquina);
            $em->flush();

            return $this->redirectToRoute('maquina_show', array('id' => $maquina->getId()));
        }

        return $this->render('maquina/new.html.twig', array(
            'maquina' => $maquina,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Maquina entity.
     *
     * @Route("/{id}", name="maquina_show")
     * @Method("GET")
     */
    public function showAction(Maquina $maquina)
    {
        $deleteForm = $this->createDeleteForm($maquina);

        return $this->render('maquina/show.html.twig', array(
            'maquina' => $maquina,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Maquina entity.
     *
     * @Route("/{id}/edit", name="maquina_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Maquina $maquina)
    {
        $deleteForm = $this->createDeleteForm($maquina);
        $editForm = $this->createForm('AppBundle\Form\MaquinaType', $maquina);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($maquina);
            $em->flush();

            return $this->redirectToRoute('maquina_edit', array('id' => $maquina->getId()));
        }

        return $this->render('maquina/edit.html.twig', array(
            'maquina' => $maquina,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Maquina entity.
     *
     * @Route("/{id}", name="maquina_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Maquina $maquina)
    {
        $form = $this->createDeleteForm($maquina);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($maquina);
            $em->flush();
        }

        return $this->redirectToRoute('maquina_index');
    }

    /**
     * Creates a form to delete a Maquina entity.
     *
     * @param Maquina $maquina The Maquina entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Maquina $maquina)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('maquina_delete', array('id' => $maquina->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

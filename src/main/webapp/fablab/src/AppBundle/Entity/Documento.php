<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documento
 *
 * @ORM\Table(name="documento")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DocumentoRepository")
 */
class Documento
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="blob")
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="etiqueta", type="string", length=255, unique=true)
     */
    private $etiqueta;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

     /**
     * @ORM\ManyToMany(targetEntity="Proyecto", mappedBy="documentos")
     */
    private $proyectos;

    public function __construct()
    {
        $this->proyectos = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set documento
     *
     * @param string $documento
     *
     * @return Documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set etiqueta
     *
     * @param string $etiqueta
     *
     * @return Documento
     */
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;

        return $this;
    }

    /**
     * Get etiqueta
     *
     * @return string
     */
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Documento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Add proyecto
     *
     * @param \AppBundle\Entity\Proyecto $proyecto
     *
     * @return Documento
     */
    public function addProyecto(\AppBundle\Entity\Proyecto $proyecto)
    {
        $this->proyectos[] = $proyecto;

        return $this;
    }

    /**
     * Remove proyecto
     *
     * @param \AppBundle\Entity\Proyecto $proyecto
     */
    public function removeProyecto(\AppBundle\Entity\Proyecto $proyecto)
    {
        $this->proyectos->removeElement($proyecto);
    }

    /**
     * Get proyectos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProyectos()
    {
        return $this->proyectos;
    }
}

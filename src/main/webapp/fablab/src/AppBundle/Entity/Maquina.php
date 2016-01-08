<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Maquina
 *
 * @ORM\Table(name="maquina")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MaquinaRepository")
 */
class Maquina
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
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
    * @ORM\ManyToMany(targetEntity="Documento", inversedBy="maquinas")
    * @ORM\JoinTable(name="documento_maquina")
    */
    private $documentos;


    /**
     * @ORM\OneToMany(targetEntity="ImagenMaquina", mappedBy="maquina")
     */
    protected $imagenes;

    public function __construct()
    {
        $this->documentos = new ArrayCollection();
        $this->imagenes = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Maquina
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Maquina
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
     * Add documento
     *
     * @param \AppBundle\Entity\Documento $documento
     *
     * @return Maquina
     */
    public function addDocumento(\AppBundle\Entity\Documento $documento)
    {
        $this->documentos[] = $documento;

        return $this;
    }

    /**
     * Remove documento
     *
     * @param \AppBundle\Entity\Documento $documento
     */
    public function removeDocumento(\AppBundle\Entity\Documento $documento)
    {
        $this->documentos->removeElement($documento);
    }

    /**
     * Get documentos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocumentos()
    {
        return $this->documentos;
    }

    /**
     * Add imagene
     *
     * @param \AppBundle\Entity\ImagenMaquina $imagene
     *
     * @return Maquina
     */
    public function addImagene(\AppBundle\Entity\ImagenMaquina $imagene)
    {
        $this->imagenes[] = $imagene;

        return $this;
    }

    /**
     * Remove imagene
     *
     * @param \AppBundle\Entity\ImagenMaquina $imagene
     */
    public function removeImagene(\AppBundle\Entity\ImagenMaquina $imagene)
    {
        $this->imagenes->removeElement($imagene);
    }

    /**
     * Get imagenes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyecto
 *
 * @ORM\Table(name="proyecto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProyectoRepository")
 */
class Proyecto
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
     * @ORM\Column(name="autor", type="string", length=255)
     */
    private $autor;

    /**
     * @var int
     *
     * @ORM\Column(name="visitas", type="bigint")
     */
    private $visitas;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="ImagenProyecto", mappedBy="proyecto")
     */
    protected $imagenes;

   /**
     * @ORM\OneToMany(targetEntity="LinksProyecto", mappedBy="proyecto")
     */
    protected $links;

    /**
     * @ORM\ManyToMany(targetEntity="Documento", inversedBy="proyectos")
     * @ORM\JoinTable(name="documento_proyecto")
     */
    private $documentos;

    /**
     * @ORM\OneToMany(targetEntity="LikesProyecto", mappedBy="proyecto")
     */
    protected $likes;

    public function __construct()
    {
        $this->imagenes = new ArrayCollection();
        $this->links = new ArrayCollection();
        $this->documentos = new ArrayCollection();
        $this->likes = new ArrayCollection();
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
     * @return Proyecto
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
     * Set autor
     *
     * @param string $autor
     *
     * @return Proyecto
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set visitas
     *
     * @param integer $visitas
     *
     * @return Proyecto
     */
    public function setVisitas($visitas)
    {
        $this->visitas = $visitas;

        return $this;
    }

    /**
     * Get visitas
     *
     * @return int
     */
    public function getVisitas()
    {
        return $this->visitas;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Proyecto
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
     * Add imagene
     *
     * @param \AppBundle\Entity\ImagenProyecto $imagene
     *
     * @return Proyecto
     */
    public function addImagene(\AppBundle\Entity\ImagenProyecto $imagene)
    {
        $this->imagenes[] = $imagene;

        return $this;
    }

    /**
     * Remove imagene
     *
     * @param \AppBundle\Entity\ImagenProyecto $imagene
     */
    public function removeImagene(\AppBundle\Entity\ImagenProyecto $imagene)
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

    /**
     * Add link
     *
     * @param \AppBundle\Entity\LinksProyecto $link
     *
     * @return Proyecto
     */
    public function addLink(\AppBundle\Entity\LinksProyecto $link)
    {
        $this->links[] = $link;

        return $this;
    }

    /**
     * Remove link
     *
     * @param \AppBundle\Entity\LinksProyecto $link
     */
    public function removeLink(\AppBundle\Entity\LinksProyecto $link)
    {
        $this->links->removeElement($link);
    }

    /**
     * Get links
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Add documento
     *
     * @param \AppBundle\Entity\Documento $documento
     *
     * @return Proyecto
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
     * Add like
     *
     * @param \AppBundle\Entity\LikesProyecto $like
     *
     * @return Proyecto
     */
    public function addLike(\AppBundle\Entity\LikesProyecto $like)
    {
        $this->likes[] = $like;

        return $this;
    }

    /**
     * Remove like
     *
     * @param \AppBundle\Entity\LikesProyecto $like
     */
    public function removeLike(\AppBundle\Entity\LikesProyecto $like)
    {
        $this->likes->removeElement($like);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLikes()
    {
        return $this->likes;
    }
}

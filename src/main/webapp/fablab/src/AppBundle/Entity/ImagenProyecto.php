<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImagenProyecto
 *
 * @ORM\Table(name="imagen_proyecto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImagenProyectoRepository")
 */
class ImagenProyecto
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
     * @ORM\Column(name="imagen", type="blob")
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="etiqueta", type="string", length=255)
     */
    private $etiqueta;

    /**
     * @ORM\ManyToOne(targetEntity="Proyecto", inversedBy="imagenes")
     * @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     */
    protected $proyecto;
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
     * Set imagen
     *
     * @param string $imagen
     *
     * @return ImagenProyecto
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set etiqueta
     *
     * @param string $etiqueta
     *
     * @return ImagenProyecto
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
     * Set proyecto
     *
     * @param \AppBundle\Entity\Proyecto $proyecto
     *
     * @return ImagenProyecto
     */
    public function setProyecto(\AppBundle\Entity\Proyecto $proyecto = null)
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \AppBundle\Entity\Proyecto
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }
}

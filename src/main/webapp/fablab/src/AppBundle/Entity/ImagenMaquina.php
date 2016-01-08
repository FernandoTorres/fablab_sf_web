<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImagenMaquina
 *
 * @ORM\Table(name="imagen_maquina")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImagenMaquinaRepository")
 */
class ImagenMaquina
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
     * @ORM\ManyToOne(targetEntity="Maquina", inversedBy="imagenes")
     * @ORM\JoinColumn(name="maquina_id", referencedColumnName="id")
     */
    protected $maquina;

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
     * @return ImagenMaquina
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
     * Set maquina
     *
     * @param \AppBundle\Entity\Maquina $maquina
     *
     * @return ImagenMaquina
     */
    public function setMaquina(\AppBundle\Entity\Maquina $maquina = null)
    {
        $this->maquina = $maquina;

        return $this;
    }

    /**
     * Get maquina
     *
     * @return \AppBundle\Entity\Maquina
     */
    public function getMaquina()
    {
        return $this->maquina;
    }
}

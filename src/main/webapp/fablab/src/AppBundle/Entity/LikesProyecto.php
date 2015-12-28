<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LikesProyecto
 *
 * @ORM\Table(name="likes_proyecto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LikesProyectoRepository")
 */
class LikesProyecto
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
     * @var bool
     *
     * @ORM\Column(name="tipo", type="boolean")
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity="Proyecto", inversedBy="likes")
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
     * Set tipo
     *
     * @param boolean $tipo
     *
     * @return LikesProyecto
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return bool
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set proyecto
     *
     * @param \AppBundle\Entity\Proyecto $proyecto
     *
     * @return LikesProyecto
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

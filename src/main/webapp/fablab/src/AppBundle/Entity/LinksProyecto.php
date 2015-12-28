<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LinksProyecto
 *
 * @ORM\Table(name="links_proyecto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LinksProyectoRepository")
 */
class LinksProyecto
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
     * @ORM\Column(name="link", type="string", length=255, unique=true)
     */
    private $link;

   /**
     * @ORM\ManyToOne(targetEntity="Proyecto", inversedBy="links")
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
     * Set link
     *
     * @param string $link
     *
     * @return LinksProyecto
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set proyecto
     *
     * @param \AppBundle\Entity\Proyecto $proyecto
     *
     * @return LinksProyecto
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

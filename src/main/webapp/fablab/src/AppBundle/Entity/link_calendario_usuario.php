<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * link_calendario_usuario
 *
 * @ORM\Table(name="link_calendario_usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\link_calendario_usuarioRepository")
 */
class link_calendario_usuario
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
     * @var int
     *
     * @ORM\Column(name="id_user", type="bigint")
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="id_link_calendario", type="bigint")
     */
    private $idLinkCalendario;


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
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return link_calendario_usuario
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idLinkCalendario
     *
     * @param integer $idLinkCalendario
     *
     * @return link_calendario_usuario
     */
    public function setIdLinkCalendario($idLinkCalendario)
    {
        $this->idLinkCalendario = $idLinkCalendario;

        return $this;
    }

    /**
     * Get idLinkCalendario
     *
     * @return int
     */
    public function getIdLinkCalendario()
    {
        return $this->idLinkCalendario;
    }
}

<?php

namespace Proyecto\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Medicamento
 *
 * @ORM\Table(name="medicamento")
 * @ORM\Entity(repositoryClass="Proyecto\MainBundle\Repository\MedicamentoRepository")
 */
class Medicamento {

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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\ManyToMany(targetEntity="Indicaciones", mappedBy="medicamento")
     */
    protected $indicaciones;

    public function __construct() {
        $this->indicaciones = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Medicamento
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Medicamento
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion() {
        return $this->descripcion;
    }


    /**
     * Add indicacione
     *
     * @param \Proyecto\MainBundle\Entity\Indicaciones $indicacione
     *
     * @return Medicamento
     */
    public function addIndicacione(\Proyecto\MainBundle\Entity\Indicaciones $indicacione)
    {
        $this->indicaciones[] = $indicacione;

        return $this;
    }

    /**
     * Remove indicacione
     *
     * @param \Proyecto\MainBundle\Entity\Indicaciones $indicacione
     */
    public function removeIndicacione(\Proyecto\MainBundle\Entity\Indicaciones $indicacione)
    {
        $this->indicaciones->removeElement($indicacione);
    }

    /**
     * Get indicaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIndicaciones()
    {
        return $this->indicaciones;
    }
}

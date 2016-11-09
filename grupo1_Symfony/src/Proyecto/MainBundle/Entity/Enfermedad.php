<?php

namespace Proyecto\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enfermedad
 *
 * @ORM\Table(name="enfermedad")
 * @ORM\Entity(repositoryClass="Proyecto\MainBundle\Repository\EnfermedadRepository")
 */
class Enfermedad {

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
     * 
     * @ORM\OneToMany(targetEntity="Indicaciones", mappedBy="enfermedad")
     */
    protected $indicaciones;

    /**
     * @ORM\ManyToMany(targetEntity="Estudiante", inversedBy="enfermedad")
     * @ORM\JoinTable(name="padecer",
     *      joinColumns={ @ORM\JoinColumn(name="estudiante_id", referencedColumnName="id")},
     *      inverseJoinColumns={ @ORM\JoinColumn(name="enfermedad_id", referencedColumnName="id")}
     *      )
     */
    protected $estudiante;

    public function __construct() {
        $this->estudiante = new ArrayCollection();
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
     * @return Enfermedad
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
     * @return Enfermedad
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
     * @return Enfermedad
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

    /**
     * Add estudiante
     *
     * @param \Proyecto\MainBundle\Entity\Estudiante $estudiante
     *
     * @return Enfermedad
     */
    public function addEstudiante(\Proyecto\MainBundle\Entity\Estudiante $estudiante)
    {
        $this->estudiante[] = $estudiante;

        return $this;
    }

    /**
     * Remove estudiante
     *
     * @param \Proyecto\MainBundle\Entity\Estudiante $estudiante
     */
    public function removeEstudiante(\Proyecto\MainBundle\Entity\Estudiante $estudiante)
    {
        $this->estudiante->removeElement($estudiante);
    }

    /**
     * Get estudiante
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstudiante()
    {
        return $this->estudiante;
    }
}

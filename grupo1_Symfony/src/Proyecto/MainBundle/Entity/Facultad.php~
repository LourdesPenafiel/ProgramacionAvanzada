<?php

namespace Proyecto\MainBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Facultad
 *
 * @ORM\Table(name="facultad")
 * @ORM\Entity(repositoryClass="Proyecto\MainBundle\Repository\FacultadRepository")
 */
class Facultad
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="carrera", type="string", length=255)
     */
    private $carrera;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * 
     * @ORM\OneToMany(targetEntity="Estudiante", mappedBy="Facultad")
     */
    protected $estudiante;

    public function __construct(){
        $this-> estudiante=new ArrayCollection();
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
     * @return Facultad
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
     * Set carrera
     *
     * @param string $carrera
     *
     * @return Facultad
     */
    public function setCarrera($carrera)
    {
        $this->carrera = $carrera;

        return $this;
    }

    /**
     * Get carrera
     *
     * @return string
     */
    public function getCarrera()
    {
        return $this->carrera;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Facultad
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
     * Add estudiante
     *
     * @param \Proyecto\MainBundle\Entity\Estudiante $estudiante
     *
     * @return Facultad
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
    
    public function getCompleto() {
        return $this->nombre." ".  $this->carrera;
    }
}

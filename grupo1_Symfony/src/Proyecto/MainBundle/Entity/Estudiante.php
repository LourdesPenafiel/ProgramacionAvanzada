<?php

namespace Proyecto\MainBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Estudiante
 *
 * @ORM\Table(name="estudiante")
 * @ORM\Entity(repositoryClass="Proyecto\MainBundle\Repository\EstudianteRepository")
 */
class Estudiante
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
     * @ORM\Column(name="nombres", type="string", length=255)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadenacimiento", type="datetime")
     */
    private $fechadenacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=255)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=10)
     */
    private $telefono;

    /**
     * @ORM\ManyToOne(targetEntity="Facultad", inversedBy="estudiante")
     * @ORM\JoinColumn(name="Facultad_id", referencedColumnName="id")
     */
    protected $Facultad;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Enfermedad", inversedBy="estudiante")
     */
    protected $enfermedad;

    public function __construct() {
        $this-> enfermedad=new ArrayCollection();
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
     * Set nombres
     *
     * @param string $nombres
     *
     * @return Estudiante
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Estudiante
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set fechadenacimiento
     *
     * @param \DateTime $fechadenacimiento
     *
     * @return Estudiante
     */
    public function setFechadenacimiento($fechadenacimiento)
    {
        $this->fechadenacimiento = $fechadenacimiento;

        return $this;
    }

    /**
     * Get fechadenacimiento
     *
     * @return \DateTime
     */
    public function getFechadenacimiento()
    {
        return $this->fechadenacimiento;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Estudiante
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Estudiante
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Estudiante
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set facultad
     *
     * @param \Proyecto\MainBundle\Entity\Facultad $facultad
     *
     * @return Estudiante
     */
    public function setFacultad(\Proyecto\MainBundle\Entity\Facultad $facultad = null)
    {
        $this->Facultad = $facultad;

        return $this;
    }

    /**
     * Get facultad
     *
     * @return \Proyecto\MainBundle\Entity\Facultad
     */
    public function getFacultad()
    {
        return $this->Facultad;
    }
    
    public function getNombreCompleto() {
        return $this->nombres." ".  $this->apellidos;
    }

    /**
     * Add enfermedad
     *
     * @param \Proyecto\MainBundle\Entity\Enfermedad $enfermedad
     *
     * @return Estudiante
     */
    public function addEnfermedad(\Proyecto\MainBundle\Entity\Enfermedad $enfermedad)
    {
        $this->enfermedad[] = $enfermedad;

        return $this;
    }

    /**
     * Remove enfermedad
     *
     * @param \Proyecto\MainBundle\Entity\Enfermedad $enfermedad
     */
    public function removeEnfermedad(\Proyecto\MainBundle\Entity\Enfermedad $enfermedad)
    {
        $this->enfermedad->removeElement($enfermedad);
    }

    /**
     * Get enfermedad
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnfermedad()
    {
        return $this->enfermedad;
    }
}

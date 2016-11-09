<?php

namespace Proyecto\MainBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;


use Doctrine\ORM\Mapping as ORM;

/**
 * Indicaciones
 *
 * @ORM\Table(name="indicaciones")
 * @ORM\Entity(repositoryClass="Proyecto\MainBundle\Repository\IndicacionesRepository")
 */
class Indicaciones
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;
    
    /**
     * @ORM\ManyToMany(targetEntity="Medicamento", inversedBy="indicaciones")
     * @ORM\JoinTable(name="medicamentoporindicaciones",
     *      joinColumns={ @ORM\JoinColumn(name="medicamento_id", referencedColumnName="id")},
     *      inverseJoinColumns={ @ORM\JoinColumn(name="indicacion_id", referencedColumnName="id")}
     *      )
     */
    protected $medicamento;

        public function __construct() {
        $this-> medicamento = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Enfermedad", inversedBy="indicaciones")
     * @ORM\JoinColumn(name="Enfermedad_id", referencedColumnName="id")
     */
    protected $enfermedad;

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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Indicaciones
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
     * Add medicamento
     *
     * @param \Proyecto\MainBundle\Entity\Medicamento $medicamento
     *
     * @return Indicaciones
     */
    public function addMedicamento(\Proyecto\MainBundle\Entity\Medicamento $medicamento)
    {
        $this->medicamento[] = $medicamento;

        return $this;
    }

    /**
     * Remove medicamento
     *
     * @param \Proyecto\MainBundle\Entity\Medicamento $medicamento
     */
    public function removeMedicamento(\Proyecto\MainBundle\Entity\Medicamento $medicamento)
    {
        $this->medicamento->removeElement($medicamento);
    }

    /**
     * Get medicamento
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedicamento()
    {
        return $this->medicamento;
    }

    /**
     * Set enfermedad
     *
     * @param \Proyecto\MainBundle\Entity\Enfermedad $enfermedad
     *
     * @return Indicaciones
     */
    public function setEnfermedad(\Proyecto\MainBundle\Entity\Enfermedad $enfermedad = null)
    {
        $this->enfermedad = $enfermedad;

        return $this;
    }

    /**
     * Get enfermedad
     *
     * @return \Proyecto\MainBundle\Entity\Enfermedad
     */
    public function getEnfermedad()
    {
        return $this->enfermedad;
    }
}

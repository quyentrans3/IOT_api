<?php

namespace AppBundle\Entity;

/**
 * VirtualSensor
 */
class VirtualSensor
{
    /**
     * @var integer
     */
    private $virtualID;

    /**
     * @var string
     */
    private $virtualEUI;

    /**
     * @var string
     */
    private $virtualName;

    /**
     * @var string
     */
    private $virtualPosition;

    /**
     * @var string
     */
    private $virtualHumidity;

    /**
     * @var string
     */
    private $virtualHumidity2;

    /**
     * @var string
     */
    private $virtualTemperature;

    /**
     * @var string
     */
    private $virtualTemperature2;

    /**
     * @var integer
     */
    private $virtualDeep;

    /**
     * @var integer
     */
    private $virtualDeep2;

    /**
     * @var string
     */
    private $virtualPeriod;

    /**
     * @var string
     */
    private $virtualLastMeasure;

    /**
     * @var \DateTime
     */
    private $virtualInstallation;

    /**
     * @var \AppBundle\Entity\Farm
     */
    private $farm;

    /**
     * @var \AppBundle\Entity\Rules
     */
    private $rules;


    /**
     * Get virtualID
     *
     * @return integer
     */
    public function getVirtualID()
    {
        return $this->virtualID;
    }

    /**
     * Set virtualEUI
     *
     * @param string $virtualEUI
     *
     * @return VirtualSensor
     */
    public function setVirtualEUI($virtualEUI)
    {
        $this->virtualEUI = $virtualEUI;

        return $this;
    }

    /**
     * Get virtualEUI
     *
     * @return string
     */
    public function getVirtualEUI()
    {
        return $this->virtualEUI;
    }

    /**
     * Set virtualName
     *
     * @param string $virtualName
     *
     * @return VirtualSensor
     */
    public function setVirtualName($virtualName)
    {
        $this->virtualName = $virtualName;

        return $this;
    }

    /**
     * Get virtualName
     *
     * @return string
     */
    public function getVirtualName()
    {
        return $this->virtualName;
    }

    /**
     * Set virtualPosition
     *
     * @param string $virtualPosition
     *
     * @return VirtualSensor
     */
    public function setVirtualPosition($virtualPosition)
    {
        $this->virtualPosition = $virtualPosition;

        return $this;
    }

    /**
     * Get virtualPosition
     *
     * @return string
     */
    public function getVirtualPosition()
    {
        return $this->virtualPosition;
    }

    /**
     * Set virtualHumidity
     *
     * @param string $virtualHumidity
     *
     * @return VirtualSensor
     */
    public function setVirtualHumidity($virtualHumidity)
    {
        $this->virtualHumidity = $virtualHumidity;

        return $this;
    }

    /**
     * Get virtualHumidity
     *
     * @return string
     */
    public function getVirtualHumidity()
    {
        return $this->virtualHumidity;
    }

    /**
     * Set virtualHumidity2
     *
     * @param string $virtualHumidity2
     *
     * @return VirtualSensor
     */
    public function setVirtualHumidity2($virtualHumidity2)
    {
        $this->virtualHumidity2 = $virtualHumidity2;

        return $this;
    }

    /**
     * Get virtualHumidity2
     *
     * @return string
     */
    public function getVirtualHumidity2()
    {
        return $this->virtualHumidity2;
    }

    /**
     * Set virtualTemperature
     *
     * @param string $virtualTemperature
     *
     * @return VirtualSensor
     */
    public function setVirtualTemperature($virtualTemperature)
    {
        $this->virtualTemperature = $virtualTemperature;

        return $this;
    }

    /**
     * Get virtualTemperature
     *
     * @return string
     */
    public function getVirtualTemperature()
    {
        return $this->virtualTemperature;
    }

    /**
     * Set virtualTemperature2
     *
     * @param string $virtualTemperature2
     *
     * @return VirtualSensor
     */
    public function setVirtualTemperature2($virtualTemperature2)
    {
        $this->virtualTemperature2 = $virtualTemperature2;

        return $this;
    }

    /**
     * Get virtualTemperature2
     *
     * @return string
     */
    public function getVirtualTemperature2()
    {
        return $this->virtualTemperature2;
    }

    /**
     * Set virtualDeep
     *
     * @param integer $virtualDeep
     *
     * @return VirtualSensor
     */
    public function setVirtualDeep($virtualDeep)
    {
        $this->virtualDeep = $virtualDeep;

        return $this;
    }

    /**
     * Get virtualDeep
     *
     * @return integer
     */
    public function getVirtualDeep()
    {
        return $this->virtualDeep;
    }

    /**
     * Set virtualDeep2
     *
     * @param integer $virtualDeep2
     *
     * @return VirtualSensor
     */
    public function setVirtualDeep2($virtualDeep2)
    {
        $this->virtualDeep2 = $virtualDeep2;

        return $this;
    }

    /**
     * Get virtualDeep2
     *
     * @return integer
     */
    public function getVirtualDeep2()
    {
        return $this->virtualDeep2;
    }

    /**
     * Set virtualPeriod
     *
     * @param string $virtualPeriod
     *
     * @return VirtualSensor
     */
    public function setVirtualPeriod($virtualPeriod)
    {
        $this->virtualPeriod = $virtualPeriod;

        return $this;
    }

    /**
     * Get virtualPeriod
     *
     * @return string
     */
    public function getVirtualPeriod()
    {
        return $this->virtualPeriod;
    }

    /**
     * Set virtualLastMeasure
     *
     * @param string $virtualLastMeasure
     *
     * @return VirtualSensor
     */
    public function setVirtualLastMeasure($virtualLastMeasure)
    {
        $this->virtualLastMeasure = $virtualLastMeasure;

        return $this;
    }

    /**
     * Get virtualLastMeasure
     *
     * @return string
     */
    public function getVirtualLastMeasure()
    {
        return $this->virtualLastMeasure;
    }

    /**
     * Set virtualInstallation
     *
     * @param \DateTime $virtualInstallation
     *
     * @return VirtualSensor
     */
    public function setVirtualInstallation($virtualInstallation)
    {
        $this->virtualInstallation = $virtualInstallation;

        return $this;
    }

    /**
     * Get virtualInstallation
     *
     * @return \DateTime
     */
    public function getVirtualInstallation()
    {
        return $this->virtualInstallation->format('Y-m-d');
    }

    /**
     * Set farm
     *
     * @param \AppBundle\Entity\Farm $farm
     *
     * @return VirtualSensor
     */
    public function setFarm(\AppBundle\Entity\Farm $farm = null)
    {
        $this->farm = $farm;

        return $this;
    }

    /**
     * Get farm
     *
     * @return \AppBundle\Entity\Farm
     */
    public function getFarm()
    {
        return $this->farm;
    }

    /**
     * Set rules
     *
     * @param \AppBundle\Entity\Rules $rules
     *
     * @return VirtualSensor
     */
    public function setRules(\AppBundle\Entity\Rules $rules = null)
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * Get rules
     *
     * @return \AppBundle\Entity\Rules
     */
    public function getRules()
    {
        return $this->rules;
    }
}

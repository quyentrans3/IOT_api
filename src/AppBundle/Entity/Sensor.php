<?php

namespace AppBundle\Entity;

/**
 * Sensor
 */
class Sensor
{
    /**
     * @var integer
     */
    private $sensorID;

    /**
     * @var string
     */
    private $EUI;

    /**
     * @var string
     */
    private $sensorName;

    /**
     * @var string
     */
    private $sensorPosition;

    /**
     * @var integer
     */
    private $sensorDeep;

    /**
     * @var integer
     */
    private $sensorDeepZone2;

    /**
     * @var string
     */
    private $sensorHumidity;

    /**
     * @var string
     */
    private $sensorTemperature;

    /**
     * @var string
     */
    private $sensorHumidityZone2;

    /**
     * @var string
     */
    private $sensorTemperatureZone2;

    /**
     * @var integer
     */
    private $sensorPeriod;

    /**
     * @var string
     */
    private $sensorBattery;

    /**
     * @var string
     */
    private $sensorLastMeasureDate;

    /**
     * @var \DateTime
     */
    private $sensorInstallationDate;

    /**
     * @var \AppBundle\Entity\Farm
     */
    private $farm;

    /**
     * @var \AppBundle\Entity\Rules
     */
    private $rules;


    /**
     * Get sensorID
     *
     * @return integer
     */
    public function getSensorID()
    {
        return $this->sensorID;
    }

    /**
     * Set eUI
     *
     * @param string $eUI
     *
     * @return Sensor
     */
    public function setEUI($eUI)
    {
        $this->EUI = $eUI;

        return $this;
    }

    /**
     * Get eUI
     *
     * @return string
     */
    public function getEUI()
    {
        return $this->EUI;
    }

    /**
     * Set sensorName
     *
     * @param string $sensorName
     *
     * @return Sensor
     */
    public function setSensorName($sensorName)
    {
        $this->sensorName = $sensorName;

        return $this;
    }

    /**
     * Get sensorName
     *
     * @return string
     */
    public function getSensorName()
    {
        return $this->sensorName;
    }

    /**
     * Set sensorPosition
     *
     * @param string $sensorPosition
     *
     * @return Sensor
     */
    public function setSensorPosition($sensorPosition)
    {
        $this->sensorPosition = $sensorPosition;

        return $this;
    }

    /**
     * Get sensorPosition
     *
     * @return string
     */
    public function getSensorPosition()
    {
        return $this->sensorPosition;
    }

    /**
     * Set sensorDeep
     *
     * @param integer $sensorDeep
     *
     * @return Sensor
     */
    public function setSensorDeep($sensorDeep)
    {
        $this->sensorDeep = $sensorDeep;

        return $this;
    }

    /**
     * Get sensorDeep
     *
     * @return integer
     */
    public function getSensorDeep()
    {
        return $this->sensorDeep;
    }

    /**
     * Set sensorDeepZone2
     *
     * @param integer $sensorDeepZone2
     *
     * @return Sensor
     */
    public function setSensorDeepZone2($sensorDeepZone2)
    {
        $this->sensorDeepZone2 = $sensorDeepZone2;

        return $this;
    }

    /**
     * Get sensorDeepZone2
     *
     * @return integer
     */
    public function getSensorDeepZone2()
    {
        return $this->sensorDeepZone2;
    }

    /**
     * Set sensorHumidity
     *
     * @param string $sensorHumidity
     *
     * @return Sensor
     */
    public function setSensorHumidity($sensorHumidity)
    {
        $this->sensorHumidity = $sensorHumidity;

        return $this;
    }

    /**
     * Get sensorHumidity
     *
     * @return string
     */
    public function getSensorHumidity()
    {
        return $this->sensorHumidity;
    }

    /**
     * Set sensorTemperature
     *
     * @param string $sensorTemperature
     *
     * @return Sensor
     */
    public function setSensorTemperature($sensorTemperature)
    {
        $this->sensorTemperature = $sensorTemperature;

        return $this;
    }

    /**
     * Get sensorTemperature
     *
     * @return string
     */
    public function getSensorTemperature()
    {
        return $this->sensorTemperature;
    }

    /**
     * Set sensorHumidityZone2
     *
     * @param string $sensorHumidityZone2
     *
     * @return Sensor
     */
    public function setSensorHumidityZone2($sensorHumidityZone2)
    {
        $this->sensorHumidityZone2 = $sensorHumidityZone2;

        return $this;
    }

    /**
     * Get sensorHumidityZone2
     *
     * @return string
     */
    public function getSensorHumidityZone2()
    {
        return $this->sensorHumidityZone2;
    }

    /**
     * Set sensorTemperatureZone2
     *
     * @param string $sensorTemperatureZone2
     *
     * @return Sensor
     */
    public function setSensorTemperatureZone2($sensorTemperatureZone2)
    {
        $this->sensorTemperatureZone2 = $sensorTemperatureZone2;

        return $this;
    }

    /**
     * Get sensorTemperatureZone2
     *
     * @return string
     */
    public function getSensorTemperatureZone2()
    {
        return $this->sensorTemperatureZone2;
    }

    /**
     * Set sensorPeriod
     *
     * @param integer $sensorPeriod
     *
     * @return Sensor
     */
    public function setSensorPeriod($sensorPeriod)
    {
        $this->sensorPeriod = $sensorPeriod;

        return $this;
    }

    /**
     * Get sensorPeriod
     *
     * @return integer
     */
    public function getSensorPeriod()
    {
        return $this->sensorPeriod;
    }

    /**
     * Set sensorBattery
     *
     * @param string $sensorBattery
     *
     * @return Sensor
     */
    public function setSensorBattery($sensorBattery)
    {
        $this->sensorBattery = $sensorBattery;

        return $this;
    }

    /**
     * Get sensorBattery
     *
     * @return string
     */
    public function getSensorBattery()
    {
        return $this->sensorBattery;
    }

    /**
     * Set sensorLastMeasureDate
     *
     * @param string $sensorLastMeasureDate
     *
     * @return Sensor
     */
    public function setSensorLastMeasureDate($sensorLastMeasureDate)
    {
        $this->sensorLastMeasureDate = $sensorLastMeasureDate;

        return $this;
    }

    /**
     * Get sensorLastMeasureDate
     *
     * @return string
     */
    public function getSensorLastMeasureDate()
    {
        return $this->sensorLastMeasureDate;
    }

    /**
     * Set sensorInstallationDate
     *
     * @param \DateTime $sensorInstallationDate
     *
     * @return Sensor
     */
    public function setSensorInstallationDate($sensorInstallationDate)
    {
        $this->sensorInstallationDate = $sensorInstallationDate;

        return $this;
    }

    /**
     * Get sensorInstallationDate
     *
     * @return \DateTime
     */
    public function getSensorInstallationDate()
    {
        return $this->sensorInstallationDate;
    }

    /**
     * Set farm
     *
     * @param \AppBundle\Entity\Farm $farm
     *
     * @return Sensor
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
     * @return Sensor
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

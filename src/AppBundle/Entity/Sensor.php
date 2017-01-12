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
        return $this->sensorInstallationDate->format('Y-m-d');
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

    /**
     * @var bool
     */
    private $alertHumidity;


    /**
     * Get alertHumidity
     *
     * @return bool
     */
    public function getAlertHumidity()
    {
        return $this->alertHumidity;
    }

    /**
     * Set alertHumidity
     *
     * @param string $alertHumidity
     *
     * @return bool
     */
    public function setAlertHumidity($alertHumidity)
    {
        $this->alertHumidity = $alertHumidity;

        return $this;
    }

    /**
     * @var bool
     */
    private $alertTemperature;


    /**
     * Get alertTemperature
     *
     * @return bool
     */
    public function getAlertTemperature()
    {
        return $this->alertTemperature;
    }

    /**
     * Set alertTemperature
     *
     * @param string $alertTemperature
     *
     * @return bool
     */
    public function setAlertTemperature($alertTemperature)
    {
        $this->alertTemperature = $alertTemperature;

        return $this;
    }

    /**
     * @var bool
     */
    private $alertBattery;


    /**
     * Get alertBattery
     *
     * @return bool
     */
    public function getAlertBattery()
    {
        return $this->alertBattery;
    }

    /**
     * Set alertBattery
     *
     * @param string $alertBattery
     *
     * @return bool
     */
    public function setAlertBattery($alertBattery)
    {
        $this->alertBattery = $alertBattery;

        return $this;
    }

    /**
     * @var bool
     */
    private $alertHumidityZone2;


    /**
     * Get alertHumidityZone2
     *
     * @return bool
     */
    public function getAlertHumidityZone2()
    {
        return $this->alertHumidityZone2;
    }

    /**
     * Set alertHumidityZone2
     *
     * @param string $alertHumidityZone2
     *
     * @return bool
     */
    public function setAlertHumidityZone2($alertHumidityZone2)
    {
        $this->alertHumidityZone2 = $alertHumidityZone2;

        return $this;
    }

    /**
     * @var bool
     */
    private $alertTemperatureZone2;


    /**
     * Get alertTemperatureZone2
     *
     * @return bool
     */
    public function getAlertTemperatureZone2()
    {
        return $this->alertTemperatureZone2;
    }

    /**
     * Set alertTemperatureZone2
     *
     * @param string $alertTemperatureZone2
     *
     * @return bool
     */
    public function setAlertTemperatureZone2($alertTemperatureZone2)
    {
        $this->alertTemperatureZone2 = $alertTemperatureZone2;

        return $this;
    }
}

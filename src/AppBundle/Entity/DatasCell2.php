<?php

namespace AppBundle\Entity;

/**
 * DatasCell2
 */
class DatasCell2
{
    /**
     * @var integer
     */
    private $dataID;

    /**
     * @var string
     */
    private $EUI;

    /**
     * @var \DateTime
     */
    private $timeStamp;

    /**
     * @var string
     */
    private $temperature2;

    /**
     * @var string
     */
    private $humidity2;


    /**
     * Get dataID
     *
     * @return integer
     */
    public function getDataID()
    {
        return $this->dataID;
    }

    /**
     * Set eUI
     *
     * @param string $eUI
     *
     * @return DatasCell2
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
     * Set timeStamp
     *
     * @param \DateTime $timeStamp
     *
     * @return DatasCell2
     */
    public function setTimeStamp($timeStamp)
    {
        $this->timeStamp = $timeStamp;

        return $this;
    }

    /**
     * Get timeStamp
     *
     * @return \DateTime
     */
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    /**
     * Set temperature2
     *
     * @param string $temperature2
     *
     * @return DatasCell2
     */
    public function setTemperature2($temperature2)
    {
        $this->temperature2 = $temperature2;

        return $this;
    }

    /**
     * Get temperature2
     *
     * @return string
     */
    public function getTemperature2()
    {
        return $this->temperature2;
    }

    /**
     * Set humidity2
     *
     * @param string $humidity2
     *
     * @return DatasCell2
     */
    public function setHumidity2($humidity2)
    {
        $this->humidity2 = $humidity2;

        return $this;
    }

    /**
     * Get humidity2
     *
     * @return string
     */
    public function getHumidity2()
    {
        return $this->humidity2;
    }
}

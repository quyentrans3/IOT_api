<?php

namespace AppBundle\Entity;

/**
 * DatasCell2
 */
class DatasCell2
{

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
     * Set EUI
     *
     * @param string $EUI
     *
     * @return DatasCell2
     */
    public function setEUI($EUI)
    {
        $this->EUI = $EUI;

        return $this;
    }

    /**
     * Get EUI
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
    /**
     * @var \DateTime
     */
    private $dateLastUpdate;


    /**
     * Set dateLastUpdate
     *
     * @param \DateTime $dateLastUpdate
     *
     * @return DatasCell2
     */
    public function setDateLastUpdate($dateLastUpdate)
    {
        $this->dateLastUpdate = $dateLastUpdate;

        return $this;
    }

    /**
     * Get dateLastUpdate
     *
     * @return \DateTime
     */
    public function getDateLastUpdate()
    {
        return $this->dateLastUpdate;
    }
}

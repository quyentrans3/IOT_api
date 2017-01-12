<?php

namespace AppBundle\Entity;

/**
 * Datas
 */
class Datas
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
    private $temperature1;

    /**
     * @var string
     */
    private $humidity1;


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
     * @return Datas
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
     * @return Datas
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
        return $this->timeStamp->format('Y-m-d');
    }

    /**
     * Set temperature1
     *
     * @param string $temperature1
     *
     * @return Datas
     */
    public function setTemperature1($temperature1)
    {
        $this->temperature1 = $temperature1;

        return $this;
    }

    /**
     * Get temperature1
     *
     * @return string
     */
    public function getTemperature1()
    {
        return $this->temperature1;
    }

    /**
     * Set humidity1
     *
     * @param string $humidity1
     *
     * @return Datas
     */
    public function setHumidity1($humidity1)
    {
        $this->humidity1 = $humidity1;

        return $this;
    }

    /**
     * Get humidity1
     *
     * @return string
     */
    public function getHumidity1()
    {
        return $this->humidity1;
    }
}

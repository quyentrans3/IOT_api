<?php

namespace AppBundle\Entity;

/**
 * Farm
 */
class Farm
{
    /**
     * @var integer
     */
    private $farmID;

    /**
     * @var string
     */
    private $webSocket;

    /**
     * @var string
     */
    private $farmName;

    /**
     * @var string
     */
    private $farmPhone;

    /**
     * @var string
     */
    private $farmEmail;

    /**
     * @var string
     */
    private $farmAdress;

    /**
     * @var string
     */
    private $farmAdress2;

    /**
     * @var string
     */
    private $farmZip;

    /**
     * @var string
     */
    private $farmCity;

    /**
     * @var string
     */
    private $farmState;

    /**
     * @var string
     */
    private $farmCountry;

    /**
     * @var \AppBundle\Entity\Admin
     */
    private $admin;


    /**
     * Get farmID
     *
     * @return integer
     */
    public function getFarmID()
    {
        return $this->farmID;
    }

    /**
     * Set webSocket
     *
     * @param string $webSocket
     *
     * @return Farm
     */
    public function setWebSocket($webSocket)
    {
        $this->webSocket = $webSocket;

        return $this;
    }

    /**
     * Get webSocket
     *
     * @return string
     */
    public function getWebSocket()
    {
        return $this->webSocket;
    }

    /**
     * Set farmName
     *
     * @param string $farmName
     *
     * @return Farm
     */
    public function setFarmName($farmName)
    {
        $this->farmName = $farmName;

        return $this;
    }

    /**
     * Get farmName
     *
     * @return string
     */
    public function getFarmName()
    {
        return $this->farmName;
    }

    /**
     * Set farmPhone
     *
     * @param string $farmPhone
     *
     * @return Farm
     */
    public function setFarmPhone($farmPhone)
    {
        $this->farmPhone = $farmPhone;

        return $this;
    }

    /**
     * Get farmPhone
     *
     * @return string
     */
    public function getFarmPhone()
    {
        return $this->farmPhone;
    }

    /**
     * Set farmEmail
     *
     * @param string $farmEmail
     *
     * @return Farm
     */
    public function setFarmEmail($farmEmail)
    {
        $this->farmEmail = $farmEmail;

        return $this;
    }

    /**
     * Get farmEmail
     *
     * @return string
     */
    public function getFarmEmail()
    {
        return $this->farmEmail;
    }

    /**
     * Set farmAdress
     *
     * @param string $farmAdress
     *
     * @return Farm
     */
    public function setFarmAdress($farmAdress)
    {
        $this->farmAdress = $farmAdress;

        return $this;
    }

    /**
     * Get farmAdress
     *
     * @return string
     */
    public function getFarmAdress()
    {
        return $this->farmAdress;
    }

    /**
     * Set farmAdress2
     *
     * @param string $farmAdress2
     *
     * @return Farm
     */
    public function setFarmAdress2($farmAdress2)
    {
        $this->farmAdress2 = $farmAdress2;

        return $this;
    }

    /**
     * Get farmAdress2
     *
     * @return string
     */
    public function getFarmAdress2()
    {
        return $this->farmAdress2;
    }

    /**
     * Set farmZip
     *
     * @param string $farmZip
     *
     * @return Farm
     */
    public function setFarmZip($farmZip)
    {
        $this->farmZip = $farmZip;

        return $this;
    }

    /**
     * Get farmZip
     *
     * @return string
     */
    public function getFarmZip()
    {
        return $this->farmZip;
    }

    /**
     * Set farmCity
     *
     * @param string $farmCity
     *
     * @return Farm
     */
    public function setFarmCity($farmCity)
    {
        $this->farmCity = $farmCity;

        return $this;
    }

    /**
     * Get farmCity
     *
     * @return string
     */
    public function getFarmCity()
    {
        return $this->farmCity;
    }

    /**
     * Set farmState
     *
     * @param string $farmState
     *
     * @return Farm
     */
    public function setFarmState($farmState)
    {
        $this->farmState = $farmState;

        return $this;
    }

    /**
     * Get farmState
     *
     * @return string
     */
    public function getFarmState()
    {
        return $this->farmState;
    }

    /**
     * Set farmCountry
     *
     * @param string $farmCountry
     *
     * @return Farm
     */
    public function setFarmCountry($farmCountry)
    {
        $this->farmCountry = $farmCountry;

        return $this;
    }

    /**
     * Get farmCountry
     *
     * @return string
     */
    public function getFarmCountry()
    {
        return $this->farmCountry;
    }

    /**
     * Set admin
     *
     * @param \AppBundle\Entity\Admin $admin
     *
     * @return Farm
     */
    public function setAdmin(\AppBundle\Entity\Admin $admin = null)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return \AppBundle\Entity\Admin
     */
    public function getAdmin()
    {
        return $this->admin;
    }
}

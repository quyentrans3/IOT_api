<?php

namespace AppBundle\Entity;

/**
 * Rules
 */
class Rules
{
    /**
     * @var integer
     */
    private $ruleID;

    /**
     * @var string
     */
    private $ruleName;

    /**
     * @var string
     */
    private $minHumidity;

    /**
     * @var integer
     */
    private $battery;

    /**
     * @var string
     */
    private $maxHumidity;

    /**
     * @var string
     */
    private $minTemperature;

    /**
     * @var string
     */
    private $maxTemperature;

    /**
     * @var integer
     */
    private $SMS;

    /**
     * @var integer
     */
    private $email;

    /**
     * @var integer
     */
    private $push;


    /**
     * Get ruleID
     *
     * @return integer
     */
    public function getRuleID()
    {
        return $this->ruleID;
    }

    /**
     * Set ruleName
     *
     * @param string $ruleName
     *
     * @return Rules
     */
    public function setRuleName($ruleName)
    {
        $this->ruleName = $ruleName;

        return $this;
    }

    /**
     * Get ruleName
     *
     * @return string
     */
    public function getRuleName()
    {
        return $this->ruleName;
    }

    /**
     * Set minHumidity
     *
     * @param string $minHumidity
     *
     * @return Rules
     */
    public function setMinHumidity($minHumidity)
    {
        $this->minHumidity = $minHumidity;

        return $this;
    }

    /**
     * Get minHumidity
     *
     * @return string
     */
    public function getMinHumidity()
    {
        return $this->minHumidity;
    }

    /**
     * Set battery
     *
     * @param integer $battery
     *
     * @return Rules
     */
    public function setBattery($battery)
    {
        $this->battery = $battery;

        return $this;
    }

    /**
     * Get battery
     *
     * @return integer
     */
    public function getBattery()
    {
        return $this->battery;
    }

    /**
     * Set maxHumidity
     *
     * @param string $maxHumidity
     *
     * @return Rules
     */
    public function setMaxHumidity($maxHumidity)
    {
        $this->maxHumidity = $maxHumidity;

        return $this;
    }

    /**
     * Get maxHumidity
     *
     * @return string
     */
    public function getMaxHumidity()
    {
        return $this->maxHumidity;
    }

    /**
     * Set minTemperature
     *
     * @param string $minTemperature
     *
     * @return Rules
     */
    public function setMinTemperature($minTemperature)
    {
        $this->minTemperature = $minTemperature;

        return $this;
    }

    /**
     * Get minTemperature
     *
     * @return string
     */
    public function getMinTemperature()
    {
        return $this->minTemperature;
    }

    /**
     * Set maxTemperature
     *
     * @param string $maxTemperature
     *
     * @return Rules
     */
    public function setMaxTemperature($maxTemperature)
    {
        $this->maxTemperature = $maxTemperature;

        return $this;
    }

    /**
     * Get maxTemperature
     *
     * @return string
     */
    public function getMaxTemperature()
    {
        return $this->maxTemperature;
    }

    /**
     * Set sMS
     *
     * @param integer $sMS
     *
     * @return Rules
     */
    public function setSMS($sMS)
    {
        $this->SMS = $sMS;

        return $this;
    }

    /**
     * Get sMS
     *
     * @return integer
     */
    public function getSMS()
    {
        return $this->SMS;
    }

    /**
     * Set email
     *
     * @param integer $email
     *
     * @return Rules
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return integer
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set push
     *
     * @param integer $push
     *
     * @return Rules
     */
    public function setPush($push)
    {
        $this->push = $push;

        return $this;
    }

    /**
     * Get push
     *
     * @return integer
     */
    public function getPush()
    {
        return $this->push;
    }
}

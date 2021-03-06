<?php

namespace AppBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $userID;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $userEmail;

    /**
     * @var string
     */
    private $userFirstName;

    /**
     * @var string
     */
    private $function;

    /**
     * @var string
     */
    private $userPassword;

    /**
     * @var string
     */
    private $userPhone;

    /**
     * @var \AppBundle\Entity\Farm
     */
    private $farm;

    /**
     * @var \AppBundle\Entity\SuperUser
     */
    private $superuser;


    /**
     * Get userID
     *
     * @return integer
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     *
     * @return User
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set userFirstName
     *
     * @param string $userFirstName
     *
     * @return User
     */
    public function setUserFirstName($userFirstName)
    {
        $this->userFirstName = $userFirstName;

        return $this;
    }

    /**
     * Get userFirstName
     *
     * @return string
     */
    public function getUserFirstName()
    {
        return $this->userFirstName;
    }

    /**
     * Set function
     *
     * @param string $function
     *
     * @return User
     */
    public function setFunction($function)
    {
        $this->function = $function;

        return $this;
    }

    /**
     * Get function
     *
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set userPassword
     *
     * @param string $userPassword
     *
     * @return User
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    /**
     * Get userPassword
     *
     * @return string
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * Set userPhone
     *
     * @param string $userPhone
     *
     * @return User
     */
    public function setUserPhone($userPhone)
    {
        $this->userPhone = $userPhone;

        return $this;
    }

    /**
     * Get userPhone
     *
     * @return string
     */
    public function getUserPhone()
    {
        return $this->userPhone;
    }

    /**
     * Set farm
     *
     * @param \AppBundle\Entity\Farm $farm
     *
     * @return User
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
     * Set superuser
     *
     * @param \AppBundle\Entity\SuperUser $superuser
     *
     * @return User
     */
    public function setSuperuser(\AppBundle\Entity\SuperUser $superuser = null)
    {
        $this->superuser = $superuser;

        return $this;
    }

    /**
     * Get superuser
     *
     * @return \AppBundle\Entity\SuperUser
     */
    public function getSuperuser()
    {
        return $this->superuser;
    }
    /**
     * @var string
     */
    private $apiKey;


    /**
     * Set apiKey
     *
     * @param string $apiKey
     *
     * @return User
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
    /**
     * @var string
     */
    private $validCode;


    /**
     * Set validCode
     *
     * @param string $validCode
     *
     * @return User
     */
    public function setValidCode($validCode)
    {
        $this->validCode = $validCode;

        return $this;
    }

    /**
     * Get validCode
     *
     * @return string
     */
    public function getValidCode()
    {
        return $this->validCode;
    }
    /**
     * @var string
     */
    private $deviceID;

    /**
     * @var string
     */
    private $deviceOS;


    /**
     * Set deviceID
     *
     * @param string $deviceID
     *
     * @return User
     */
    public function setDeviceID($deviceID)
    {
        $this->deviceID = $deviceID;

        return $this;
    }

    /**
     * Get deviceID
     *
     * @return string
     */
    public function getDeviceID()
    {
        return $this->deviceID;
    }

    /**
     * Set deviceOS
     *
     * @param string $deviceOS
     *
     * @return User
     */
    public function setDeviceOS($deviceOS)
    {
        $this->deviceOS = $deviceOS;

        return $this;
    }

    /**
     * Get deviceOS
     *
     * @return string
     */
    public function getDeviceOS()
    {
        return $this->deviceOS;
    }
}

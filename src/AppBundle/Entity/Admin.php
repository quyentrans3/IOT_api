<?php

namespace AppBundle\Entity;

/**
 * Admin
 */
class Admin
{
    /**
     * @var integer
     */
    private $adminID;

    /**
     * @var string
     */
    private $adminName;

    /**
     * @var string
     */
    private $adminFirstName;

    /**
     * @var string
     */
    private $adminEmail;

    /**
     * @var string
     */
    private $adminPassword;

    /**
     * @var string
     */
    private $function;


    /**
     * Get adminID
     *
     * @return integer
     */
    public function getAdminID()
    {
        return $this->adminID;
    }

    /**
     * Set adminName
     *
     * @param string $adminName
     *
     * @return Admin
     */
    public function setAdminName($adminName)
    {
        $this->adminName = $adminName;

        return $this;
    }

    /**
     * Get adminName
     *
     * @return string
     */
    public function getAdminName()
    {
        return $this->adminName;
    }

    /**
     * Set adminFirstName
     *
     * @param string $adminFirstName
     *
     * @return Admin
     */
    public function setAdminFirstName($adminFirstName)
    {
        $this->adminFirstName = $adminFirstName;

        return $this;
    }

    /**
     * Get adminFirstName
     *
     * @return string
     */
    public function getAdminFirstName()
    {
        return $this->adminFirstName;
    }

    /**
     * Set adminEmail
     *
     * @param string $adminEmail
     *
     * @return Admin
     */
    public function setAdminEmail($adminEmail)
    {
        $this->adminEmail = $adminEmail;

        return $this;
    }

    /**
     * Get adminEmail
     *
     * @return string
     */
    public function getAdminEmail()
    {
        return $this->adminEmail;
    }

    /**
     * Set adminPassword
     *
     * @param string $adminPassword
     *
     * @return Admin
     */
    public function setAdminPassword($adminPassword)
    {
        $this->adminPassword = $adminPassword;

        return $this;
    }

    /**
     * Get adminPassword
     *
     * @return string
     */
    public function getAdminPassword()
    {
        return $this->adminPassword;
    }

    /**
     * Set function
     *
     * @param string $function
     *
     * @return Admin
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
}

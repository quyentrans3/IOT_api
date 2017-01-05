<?php

namespace AppBundle\Entity;

/**
 * SuperUser
 */
class SuperUser
{
    /**
     * @var integer
     */
    private $superUserID;

    /**
     * @var string
     */
    private $superUserName;

    /**
     * @var string
     */
    private $superUserFirstName;

    /**
     * @var string
     */
    private $superUserEmail;

    /**
     * @var string
     */
    private $superUserPassword;

    /**
     * @var \AppBundle\Entity\Farm
     */
    private $farm;


    /**
     * Get superUserID
     *
     * @return integer
     */
    public function getSuperUserID()
    {
        return $this->superUserID;
    }

    /**
     * Set superUserName
     *
     * @param string $superUserName
     *
     * @return SuperUser
     */
    public function setSuperUserName($superUserName)
    {
        $this->superUserName = $superUserName;

        return $this;
    }

    /**
     * Get superUserName
     *
     * @return string
     */
    public function getSuperUserName()
    {
        return $this->superUserName;
    }

    /**
     * Set superUserFirstName
     *
     * @param string $superUserFirstName
     *
     * @return SuperUser
     */
    public function setSuperUserFirstName($superUserFirstName)
    {
        $this->superUserFirstName = $superUserFirstName;

        return $this;
    }

    /**
     * Get superUserFirstName
     *
     * @return string
     */
    public function getSuperUserFirstName()
    {
        return $this->superUserFirstName;
    }

    /**
     * Set superUserEmail
     *
     * @param string $superUserEmail
     *
     * @return SuperUser
     */
    public function setSuperUserEmail($superUserEmail)
    {
        $this->superUserEmail = $superUserEmail;

        return $this;
    }

    /**
     * Get superUserEmail
     *
     * @return string
     */
    public function getSuperUserEmail()
    {
        return $this->superUserEmail;
    }

    /**
     * Set superUserPassword
     *
     * @param string $superUserPassword
     *
     * @return SuperUser
     */
    public function setSuperUserPassword($superUserPassword)
    {
        $this->superUserPassword = $superUserPassword;

        return $this;
    }

    /**
     * Get superUserPassword
     *
     * @return string
     */
    public function getSuperUserPassword()
    {
        return $this->superUserPassword;
    }

    /**
     * Set farm
     *
     * @param \AppBundle\Entity\Farm $farm
     *
     * @return SuperUser
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
}

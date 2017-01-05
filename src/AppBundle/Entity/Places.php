<?php

namespace AppBundle\Entity;

/**
 * Places
 */
class Places
{
    /**
     * @var string
     */
    private $latlng_lieu;


    /**
     * Set latlngLieu
     *
     * @param string $latlngLieu
     *
     * @return Places
     */
    public function setLatlngLieu($latlngLieu)
    {
        $this->latlng_lieu = $latlngLieu;

        return $this;
    }

    /**
     * Get latlngLieu
     *
     * @return string
     */
    public function getLatlngLieu()
    {
        return $this->latlng_lieu;
    }
}

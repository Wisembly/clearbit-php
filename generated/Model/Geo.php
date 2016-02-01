<?php

namespace Clearbit\Generated\Model;

class Geo
{
    /**
     * @var string
     */
    protected $streetNumber;
    /**
     * @var string
     */
    protected $streetName;
    /**
     * @var string
     */
    protected $subPremise;
    /**
     * @var string
     */
    protected $city;
    /**
     * @var string
     */
    protected $state;
    /**
     * @var string
     */
    protected $stateCode;
    /**
     * @var string
     */
    protected $postalCode;
    /**
     * @var string
     */
    protected $country;
    /**
     * @var string
     */
    protected $countryCode;
    /**
     * @var mixed
     */
    protected $lat;
    /**
     * @var mixed
     */
    protected $lng;
    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }
    /**
     * @param string $streetNumber
     *
     * @return self
     */
    public function setStreetNumber($streetNumber = null)
    {
        $this->streetNumber = $streetNumber;
        return $this;
    }
    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }
    /**
     * @param string $streetName
     *
     * @return self
     */
    public function setStreetName($streetName = null)
    {
        $this->streetName = $streetName;
        return $this;
    }
    /**
     * @return string
     */
    public function getSubPremise()
    {
        return $this->subPremise;
    }
    /**
     * @param string $subPremise
     *
     * @return self
     */
    public function setSubPremise($subPremise = null)
    {
        $this->subPremise = $subPremise;
        return $this;
    }
    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * @param string $city
     *
     * @return self
     */
    public function setCity($city = null)
    {
        $this->city = $city;
        return $this;
    }
    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
    /**
     * @param string $state
     *
     * @return self
     */
    public function setState($state = null)
    {
        $this->state = $state;
        return $this;
    }
    /**
     * @return string
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }
    /**
     * @param string $stateCode
     *
     * @return self
     */
    public function setStateCode($stateCode = null)
    {
        $this->stateCode = $stateCode;
        return $this;
    }
    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }
    /**
     * @param string $postalCode
     *
     * @return self
     */
    public function setPostalCode($postalCode = null)
    {
        $this->postalCode = $postalCode;
        return $this;
    }
    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
    /**
     * @param string $country
     *
     * @return self
     */
    public function setCountry($country = null)
    {
        $this->country = $country;
        return $this;
    }
    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }
    /**
     * @param string $countryCode
     *
     * @return self
     */
    public function setCountryCode($countryCode = null)
    {
        $this->countryCode = $countryCode;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }
    /**
     * @param mixed $lat
     *
     * @return self
     */
    public function setLat($lat = null)
    {
        $this->lat = $lat;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }
    /**
     * @param mixed $lng
     *
     * @return self
     */
    public function setLng($lng = null)
    {
        $this->lng = $lng;
        return $this;
    }
}
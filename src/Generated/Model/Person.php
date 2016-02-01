<?php

namespace Clearbit\Generated\Model;

class Person
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var bool
     */
    protected $fuzzy;
    /**
     * @var string[]
     */
    protected $name;
    /**
     * @var string
     */
    protected $gender;
    /**
     * @var string
     */
    protected $location;
    /**
     * @var string
     */
    protected $timeZone;
    /**
     * @var int
     */
    protected $utcOffset;
    /**
     * @var Geo
     */
    protected $geo;
    /**
     * @var string
     */
    protected $bio;
    /**
     * @var string
     */
    protected $site;
    /**
     * @var string
     */
    protected $avatar;
    /**
     * @var string[]
     */
    protected $employment;
    /**
     * @var string[]
     */
    protected $facebook;
    /**
     * @var string[]
     */
    protected $github;
    /**
     * @var string[]
     */
    protected $twitter;
    /**
     * @var string[]
     */
    protected $linkedin;
    /**
     * @var string[]
     */
    protected $googleplus;
    /**
     * @var string[]
     */
    protected $angellist;
    /**
     * @var string[]
     */
    protected $aboutme;
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $id
     *
     * @return self
     */
    public function setId($id = null)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return bool
     */
    public function getFuzzy()
    {
        return $this->fuzzy;
    }
    /**
     * @param bool $fuzzy
     *
     * @return self
     */
    public function setFuzzy($fuzzy = null)
    {
        $this->fuzzy = $fuzzy;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string[] $name
     *
     * @return self
     */
    public function setName(\ArrayObject $name = null)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }
    /**
     * @param string $gender
     *
     * @return self
     */
    public function setGender($gender = null)
    {
        $this->gender = $gender;
        return $this;
    }
    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }
    /**
     * @param string $location
     *
     * @return self
     */
    public function setLocation($location = null)
    {
        $this->location = $location;
        return $this;
    }
    /**
     * @return string
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }
    /**
     * @param string $timeZone
     *
     * @return self
     */
    public function setTimeZone($timeZone = null)
    {
        $this->timeZone = $timeZone;
        return $this;
    }
    /**
     * @return int
     */
    public function getUtcOffset()
    {
        return $this->utcOffset;
    }
    /**
     * @param int $utcOffset
     *
     * @return self
     */
    public function setUtcOffset($utcOffset = null)
    {
        $this->utcOffset = $utcOffset;
        return $this;
    }
    /**
     * @return Geo
     */
    public function getGeo()
    {
        return $this->geo;
    }
    /**
     * @param Geo $geo
     *
     * @return self
     */
    public function setGeo(Geo $geo = null)
    {
        $this->geo = $geo;
        return $this;
    }
    /**
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }
    /**
     * @param string $bio
     *
     * @return self
     */
    public function setBio($bio = null)
    {
        $this->bio = $bio;
        return $this;
    }
    /**
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }
    /**
     * @param string $site
     *
     * @return self
     */
    public function setSite($site = null)
    {
        $this->site = $site;
        return $this;
    }
    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
    /**
     * @param string $avatar
     *
     * @return self
     */
    public function setAvatar($avatar = null)
    {
        $this->avatar = $avatar;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getEmployment()
    {
        return $this->employment;
    }
    /**
     * @param string[] $employment
     *
     * @return self
     */
    public function setEmployment(\ArrayObject $employment = null)
    {
        $this->employment = $employment;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getFacebook()
    {
        return $this->facebook;
    }
    /**
     * @param string[] $facebook
     *
     * @return self
     */
    public function setFacebook(\ArrayObject $facebook = null)
    {
        $this->facebook = $facebook;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getGithub()
    {
        return $this->github;
    }
    /**
     * @param string[] $github
     *
     * @return self
     */
    public function setGithub(\ArrayObject $github = null)
    {
        $this->github = $github;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getTwitter()
    {
        return $this->twitter;
    }
    /**
     * @param string[] $twitter
     *
     * @return self
     */
    public function setTwitter(\ArrayObject $twitter = null)
    {
        $this->twitter = $twitter;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }
    /**
     * @param string[] $linkedin
     *
     * @return self
     */
    public function setLinkedin(\ArrayObject $linkedin = null)
    {
        $this->linkedin = $linkedin;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getGoogleplus()
    {
        return $this->googleplus;
    }
    /**
     * @param string[] $googleplus
     *
     * @return self
     */
    public function setGoogleplus(\ArrayObject $googleplus = null)
    {
        $this->googleplus = $googleplus;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getAngellist()
    {
        return $this->angellist;
    }
    /**
     * @param string[] $angellist
     *
     * @return self
     */
    public function setAngellist(\ArrayObject $angellist = null)
    {
        $this->angellist = $angellist;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getAboutme()
    {
        return $this->aboutme;
    }
    /**
     * @param string[] $aboutme
     *
     * @return self
     */
    public function setAboutme(\ArrayObject $aboutme = null)
    {
        $this->aboutme = $aboutme;
        return $this;
    }
}
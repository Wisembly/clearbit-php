<?php

namespace Clearbit\Generated\Model;

class Company
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $legalName;
    /**
     * @var string
     */
    protected $domain;
    /**
     * @var string[]
     */
    protected $domainAliases;
    /**
     * @var string[]
     */
    protected $sites;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string[]
     */
    protected $tags;
    /**
     * @var mixed
     */
    protected $foundedDate;
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
     * @var int[]
     */
    protected $metrics;
    /**
     * @var string
     */
    protected $logo;
    /**
     * @var string
     */
    protected $phone;
    /**
     * @var bool
     */
    protected $emailProvider;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string[]
     */
    protected $tech;
    /**
     * @var string[]
     */
    protected $crunchbase;
    /**
     * @var string[]
     */
    protected $angellist;
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
    protected $facebook;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getLegalName()
    {
        return $this->legalName;
    }
    /**
     * @param string $legalName
     *
     * @return self
     */
    public function setLegalName($legalName = null)
    {
        $this->legalName = $legalName;
        return $this;
    }
    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }
    /**
     * @param string $domain
     *
     * @return self
     */
    public function setDomain($domain = null)
    {
        $this->domain = $domain;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getDomainAliases()
    {
        return $this->domainAliases;
    }
    /**
     * @param string[] $domainAliases
     *
     * @return self
     */
    public function setDomainAliases(array $domainAliases = null)
    {
        $this->domainAliases = $domainAliases;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getSites()
    {
        return $this->sites;
    }
    /**
     * @param string[] $sites
     *
     * @return self
     */
    public function setSites(\ArrayObject $sites = null)
    {
        $this->sites = $sites;
        return $this;
    }
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getTags()
    {
        return $this->tags;
    }
    /**
     * @param string[] $tags
     *
     * @return self
     */
    public function setTags(array $tags = null)
    {
        $this->tags = $tags;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getFoundedDate()
    {
        return $this->foundedDate;
    }
    /**
     * @param mixed $foundedDate
     *
     * @return self
     */
    public function setFoundedDate($foundedDate = null)
    {
        $this->foundedDate = $foundedDate;
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
     * @return int[]
     */
    public function getMetrics()
    {
        return $this->metrics;
    }
    /**
     * @param int[] $metrics
     *
     * @return self
     */
    public function setMetrics(array $metrics = null)
    {
        $this->metrics = $metrics;
        return $this;
    }
    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }
    /**
     * @param string $logo
     *
     * @return self
     */
    public function setLogo($logo = null)
    {
        $this->logo = $logo;
        return $this;
    }
    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * @param string $phone
     *
     * @return self
     */
    public function setPhone($phone = null)
    {
        $this->phone = $phone;
        return $this;
    }
    /**
     * @return bool
     */
    public function getEmailProvider()
    {
        return $this->emailProvider;
    }
    /**
     * @param bool $emailProvider
     *
     * @return self
     */
    public function setEmailProvider($emailProvider = null)
    {
        $this->emailProvider = $emailProvider;
        return $this;
    }
    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param string $type
     *
     * @return self
     */
    public function setType($type = null)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getTech()
    {
        return $this->tech;
    }
    /**
     * @param string[] $tech
     *
     * @return self
     */
    public function setTech(array $tech = null)
    {
        $this->tech = $tech;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getCrunchbase()
    {
        return $this->crunchbase;
    }
    /**
     * @param string[] $crunchbase
     *
     * @return self
     */
    public function setCrunchbase(array $crunchbase = null)
    {
        $this->crunchbase = $crunchbase;
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
    public function setAngellist(array $angellist = null)
    {
        $this->angellist = $angellist;
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
    public function setTwitter(array $twitter = null)
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
    public function setLinkedin(array $linkedin = null)
    {
        $this->linkedin = $linkedin;
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
    public function setFacebook(array $facebook = null)
    {
        $this->facebook = $facebook;
        return $this;
    }
}
<?php

namespace Clearbit\Generated\Model;

class Combined
{
    /**
     * @var Person
     */
    protected $person;
    /**
     * @var Company
     */
    protected $company;
    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }
    /**
     * @param Person $person
     *
     * @return self
     */
    public function setPerson(Person $person = null)
    {
        $this->person = $person;
        return $this;
    }
    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }
    /**
     * @param Company $company
     *
     * @return self
     */
    public function setCompany(Company $company = null)
    {
        $this->company = $company;
        return $this;
    }
}
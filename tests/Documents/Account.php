<?php

declare(strict_types=1);

namespace Documents;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class Account
{
    /** @ODM\Id */
    private $id;

    /** @ODM\Field */
    private $name;

    /** @ODM\ReferenceOne(storeAs="dbRefWithDb") */
    protected $user;

    /** @ODM\ReferenceOne(storeAs="dbRef") */
    protected $userDbRef;

    public function getId()
    {
        return $this->id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUserDbRef($userDbRef): void
    {
        $this->userDbRef = $userDbRef;
    }

    public function getUserDbRef()
    {
        return $this->userDbRef;
    }
}

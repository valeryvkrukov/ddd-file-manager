<?php

namespace App\FileManager\Filesystem\Domain\Traits;

use App\FileManager\Filesystem\Domain\Model\Attribute\Date;
use App\FileManager\Filesystem\Domain\Model\Attribute\Owner;
use App\FileManager\Filesystem\Domain\Model\Attribute\Permissions;
use App\FileManager\Filesystem\Domain\Model\Directory\Directory;

trait FilesystemItem
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var Owner
     */
    private Owner $owner;

    /**
     * @var Permissions
     */
    private Permissions $permissions;

    /**
     * @var Date
     */
    private Date $createdAt;

    /**
     * @var Date
     */
    private Date $updatedAt;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Owner
     */
    public function getOwner(): Owner
    {
        return $this->owner;
    }

    /**
     * @return Permissions
     */
    public function getPermissions(): Permissions
    {
        return $this->permissions;
    }

    /**
     * @return Date
     */
    public function getCreatedAt(): Date
    {
        return $this->createdAt;
    }

    /**
     * @return Date
     */
    public function getUpdatedAt(): Date
    {
        return $this->updatedAt;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return 4096;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return implode(' ', [
            (string) $this->getPermissions(),
            (string) $this->getOwner(),
            $this->getSize(),
            $this->getCreatedAt(),
            $this->getName()
        ]);
    }
}
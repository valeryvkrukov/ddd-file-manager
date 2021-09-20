<?php

namespace App\FileManager\Filesystem\Domain\Model\Directory;

use App\FileManager\Filesystem\Domain\Model\Attribute\Date;
use App\FileManager\Filesystem\Domain\Model\Attribute\Owner;
use App\FileManager\Filesystem\Domain\Model\Attribute\Permissions;
use App\FileManager\Filesystem\Domain\Traits\FilesystemItem;

class Directory
{
    use FilesystemItem;

    /**
     * @param string $name
     * @param Owner $owner
     * @param Permissions $permissions
     */
    public function __construct(
        string $name,
        Owner $owner,
        Permissions $permissions
    ) {
        $this->name = $name;
        $this->owner = $owner;
        $this->permissions = $permissions;
        $this->createdAt = new Date();
        $this->updatedAt = new Date();
    }
}
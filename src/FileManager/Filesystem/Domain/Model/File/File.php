<?php

namespace App\FileManager\Filesystem\Domain\Model\File;


use App\FileManager\Filesystem\Domain\Model\Attribute\Date;
use App\FileManager\Filesystem\Domain\Model\Attribute\FileType;
use App\FileManager\Filesystem\Domain\Model\Attribute\Owner;
use App\FileManager\Filesystem\Domain\Model\Attribute\Permissions;
use App\FileManager\Filesystem\Domain\Traits\FilesystemItem;

class File
{
    use FilesystemItem;

    /**
     * @var int
     */
    private int $size;

    /**
     * @var FileType
     */
    private FileType $type;

    /**
     * @param string $name
     * @param int $size
     * @param FileType $type
     * @param Owner $owner
     * @param Permissions $permissions
     */
    public function __construct(
        string $name,
        int $size,
        FileType $type,
        Owner $owner,
        Permissions $permissions
    ) {
        $this->name = $name;
        $this->size = $size;
        $this->type = $type;
        $this->owner = $owner;
        $this->permissions = $permissions;
        $this->createdAt = new Date();
        $this->updatedAt = new Date();
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return FileType
     */
    public function getType(): FileType
    {
        return $this->type;
    }
}
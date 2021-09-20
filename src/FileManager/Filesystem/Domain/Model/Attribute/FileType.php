<?php

namespace App\FileManager\Filesystem\Domain\Model\Attribute;

class FileType
{
    /**
     * @var string
     */
    private string $type;

    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
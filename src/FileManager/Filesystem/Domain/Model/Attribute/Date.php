<?php

namespace App\FileManager\Filesystem\Domain\Model\Attribute;

class Date extends \DateTimeImmutable
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->format('M d H:i');
    }
}
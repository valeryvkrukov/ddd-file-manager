<?php

namespace App\FileManager\Filesystem\Domain\Model\Attribute;

class Owner
{
    /**
     * @var string
     */
    private string $user;

    /**
     * @var string
     */
    private string $group;

    /**
     * @param string $user
     * @param string $group
     */
    public function __construct(string $user, string $group)
    {
        $this->user = $user;
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s:%s', $this->user, $this->group);
    }
}
<?php

namespace App\FileManager\Filesystem\Domain\Model\Attribute;

class Permissions
{
    /**
     * @var array|string[]
     */
    private array $octalRef = [
        0 => '---',
        1 => '--x',
        2 => '-w-',
        3 => '-wx',
        4 => 'r--',
        5 => 'r-x',
        6 => 'rw-',
        7 => 'rwx'
    ];

    /**
     * @var int
     */
    private int $owner;

    /**
     * @var int
     */
    private int $group;

    /**
     * @var int
     */
    private int $other;

    /**
     * @param int $owner
     * @param int $group
     * @param int $other
     */
    public function __construct(int $owner, int $group, int $other)
    {
        $this->setOwner($owner);
        $this->setGroup($group);
        $this->setOther($other);
    }

    /**
     * @param int $owner
     */
    private function setOwner(int $owner): void
    {
        if ($owner < 0 || $owner > 7) {
            throw new \InvalidArgumentException(sprintf('Owner value can not be less than 0 or greater than 7. Given %d', $owner));
        }

        $this->owner = $owner;
    }

    /**
     * @param string $group
     */
    private function setGroup(string $group): void
    {
        if ($group < 0 || $group > 7) {
            throw new \InvalidArgumentException(sprintf('Group value can not be less than 0 or greater than 7. Given %d', $group));
        }

        $this->group = $group;
    }

    /**
     * @param string $other
     */
    private function setOther(string $other): void
    {
        if ($other < 0 || $other > 7) {
            throw new \InvalidArgumentException(sprintf('Other value can not be less than 0 or greater than 7. Given %d', $other));
        }

        $this->other = $other;
    }

    /**
     * @return string
     */
    public function toNumericRepresentation(): string
    {
        return implode('', [
            '0',
            $this->owner,
            $this->group,
            $this->other
        ]);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return implode('', [
            '-',
            $this->octalRef[$this->owner],
            $this->octalRef[$this->group],
            $this->octalRef[$this->other]
        ]);
    }
}
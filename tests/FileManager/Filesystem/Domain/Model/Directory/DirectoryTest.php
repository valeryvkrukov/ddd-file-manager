<?php

namespace App\Tests\FileManager\Filesystem\Domain\Model\Directory;

use App\FileManager\Filesystem\Domain\Model\Attribute\Owner;
use App\FileManager\Filesystem\Domain\Model\Attribute\Permissions;
use App\FileManager\Filesystem\Domain\Model\Directory\Directory;
use PHPUnit\Framework\TestCase;

class DirectoryTest extends TestCase
{
    public function testDirectoryObjectCreate(): void
    {
        $owner = new Owner('fake-user', 'fake-group');
        $permissions = new Permissions(6, 4, 4);
        $directory = new Directory('/tmp/some/new/dir', $owner, $permissions);

        $this->assertEquals(
            sprintf(
                '-rw-r--r-- fake-user:fake-group 4096 %s /tmp/some/new/dir',
                $directory->getCreatedAt()
            ),
            (string) $directory
        );
    }
}

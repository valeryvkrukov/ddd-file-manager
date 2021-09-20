<?php

namespace App\Tests\FileManager\Filesystem\Domain\Model\File;

use App\FileManager\Filesystem\Domain\Model\Attribute\FileType;
use App\FileManager\Filesystem\Domain\Model\Attribute\Owner;
use App\FileManager\Filesystem\Domain\Model\Attribute\Permissions;
use App\FileManager\Filesystem\Domain\Model\File\File;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testFileObjectCreate(): void
    {
        $fileType = new FileType('text/xml');
        $owner = new Owner('fake-user', 'fake-group');
        $permissions = new Permissions(6, 4, 4);
        $file = new File(
            '/tmp/some/new-file.xml',
            126000,
            $fileType,
            $owner,
            $permissions
        );

        $this->assertEquals(
            sprintf(
                '-rw-r--r-- fake-user:fake-group 126000 %s /tmp/some/new-file.xml',
                $file->getCreatedAt()
            ),
            (string) $file
        );
    }
}

<?php

namespace App\Tests\FileManager\Filesystem\Domain\Model\Attribute;

use App\FileManager\Filesystem\Domain\Model\Attribute\Permissions;
use PHPUnit\Framework\TestCase;

class PermissionsTest extends TestCase
{
    public function testCreateFromNumericRepresentation(): void
    {
        $_rwxrwxrwx = new Permissions(7, 7, 7);
        $_rw_r__r__ = new Permissions(6, 4, 4);

        $this->assertEquals('-rwxrwxrwx', (string) $_rwxrwxrwx);
        $this->assertEquals('-rw-r--r--', (string) $_rw_r__r__);
    }

    public function testGetInNumericRepresentation(): void
    {
        $_rwxrwxrwx = new Permissions(7, 7, 7);
        $_rw_r__r__ = new Permissions(6, 4, 4);

        $this->assertEquals('0777', $_rwxrwxrwx->toNumericRepresentation());
        $this->assertEquals('0644', $_rw_r__r__->toNumericRepresentation());
    }

    public function testCreatePermissionWithNegativeArgument(): void
    {
        $this->expectExceptionMessageMatches('/^(Owner|Group|Other) value can not be less than 0 or greater than 7\. Given -?(\d+)$/');

        new Permissions(-1, 0, 0);
    }
}

<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use VolkmannDesignCode\KirbyUtils\DateTimeHelpers;

final class DateTimeHelpersTest extends TestCase
{
    public function testToIso(): void
    {
        $dateTime = new DateTime('2021-01-01');
        $iso = DateTimeHelpers::toIso($dateTime);

        $this->assertEquals('2021-01-01T00:00:00Z', $iso);
    }

}

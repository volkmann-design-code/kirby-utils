<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use VolkmannDesignCode\KirbyUtils\RandomHelpers;

final class RandomHelpersTest extends TestCase
{
    public function testGetRandomFloatBetween(): void
    {
        $min = 1.0;
        $max = 2.0;
        $res = RandomHelpers::getRandomFloatBetween($min, $max);
        $this->assertTrue($res >= $min && $res <= $max);
    }

    public function testGetRandomFloatsBetween(): void
    {
        $min = 1.0;
        $max = 2.0;
        $count = 5;
        $res = RandomHelpers::getRandomFloatsInRange($min, $max, $count);
        $this->assertTrue(count($res) === $count);
        foreach ($res as $r) {
            $this->assertTrue($r >= $min && $r <= $max);
        }
    }

}
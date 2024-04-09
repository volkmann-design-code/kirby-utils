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

    public function testGetRandomFloatsBetweenMinDiff(): void
    {
        $min = 10.0;
        $max = 20.0;
        $count = 100;
        $minDiff = 2.0;
        $res = RandomHelpers::getRandomFloatsInRange($min, $max, $count, $minDiff);

        $prev = 0;
        foreach ($res as $i => $r) {
            if ($i > 0) {
                $diff = abs($prev - $r);
                $this->assertTrue($r >= $min && $r <= $max, $r . ' is not in range' . $min . ' - ' . $max);
                // Make a good enough comparison of the floats.
                $this->assertTrue($minDiff - $diff * 1.0001 < 0, 'diff ' . $diff . ' is not >= ' . $minDiff);
            }
            $prev = $r;
        }

    }

}
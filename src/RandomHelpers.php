<?php

namespace VolkmannDesignCode\KirbyUtils;

class RandomHelpers {
    static function getRandomFloatBetween(float $min, float $max): float
    {
        return rand($min * 10, $max * 10) / 10;
    }

    static function getRandomFloatsInRange(float $min, float $max, int $count, float $minDiff): array
    {
        $range = $max - $min;
        if (($range - $minDiff) < $minDiff) {
            throw new \Exception('$minDiff should fit at least twice into the range between $min and $max. Otherwise a timeout is very likely.');
        }

        $results = [];
        for ($i = 0; $i < $count; $i++) {
            $candidate = self::getRandomFloatBetween($min, $max);

            // Ensure the minimum difference to the previous number
            while ($i > 0 && abs($results[$i - 1] - $candidate) < $minDiff) {
                $candidate = self::getRandomFloatBetween($min, $max);
            }

            $results[] = $candidate;
        }

        return $results;
    }
}

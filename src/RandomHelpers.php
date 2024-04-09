<?php

namespace VolkmannDesignCode\KirbyUtils;

use Exception;

class RandomHelpers {
    static function getRandomFloatBetween(float $min, float $max): float
    {
        return rand($min * 10, $max * 10) / 10;
    }

    /**
     * @throws Exception if the minimum difference does not fit at least twice into the range between `$min` and `$max`
     */
    static function getRandomFloatsInRange(float $min, float $max, int $count, float $minDiff = 0): array
    {
        $range = $max - $min;
        if (($range - $minDiff) < $minDiff) {
            throw new Exception('$minDiff should fit at least twice into the range between $min and $max');
        }

        $results = [];
        for ($i = 0; $i < $count; $i++) {
            $candidate = self::getRandomFloatBetween($min, $max);

            // Ensure the minimum difference to the previous number
            if ($i > 0 && $minDiff > 0) {
                $diff = $results[$i - 1] - $candidate;
                $sign = $diff < 0 ? -1 : 1;

                if (abs($diff < $minDiff)) {
                    $missing = abs($diff) - $minDiff;
                    $candidate += $sign * $missing;
                }

                // Perform corrections if the candidate is out of bounds
                if ($candidate < $min) {
                    $candidate = self::getRandomFloatBetween($max - $minDiff, $max);
                } else if ($candidate > $max) {
                    $candidate = self::getRandomFloatBetween($min, $min + $minDiff);
                }

            }

            $results[] = $candidate;
        }

        return $results;
    }
}

<?php

namespace VolkmannDesignCode\KirbyUtils;

class DebugHelpers {

    static function getNthMatchingFileInStackTrace(string $pattern, int $nth = 0): string|null
    {
        $stackTrace = debug_backtrace();
        $matches = [];

        foreach ($stackTrace as $trace) {
            if (isset($trace['file'])) {
                if (preg_match($pattern, $trace['file'])) {
                    $matches[] = $trace['file'];

                    if (count($matches) - 1 === $nth) {
                        return $trace['file'];
                    }
                }
            }
        }

        return null;
    }

}

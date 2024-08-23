<?php

namespace VolkmannDesignCode\KirbyUtils;

use Kirby\Cms\File;
use Kirby\Toolkit\A;
use Kirby\Toolkit\Html;
use Kirby\Toolkit\Str;

class HtmlHelpers {

    static function svgWithClass(string|File $file, string|array $classes): string|null {
        $classNames = is_string($classes) ? [$classes] : $classes;
        $class = Html::attr('class', A::join($classNames, ' '));
        return Str::replace(svg($file), '<svg', '<svg ' . $class);
    }

}

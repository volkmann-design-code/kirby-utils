<?php

namespace VolkmannDesignCode\KirbyUtils;

use Kirby\Cms\File;
use Kirby\Toolkit\A;
use Kirby\Toolkit\Html;
use Kirby\Toolkit\Str;

class HtmlHelpers {

    static function svgWithClass(string|File $file, string|array $classes): string|null {
        $classNames = is_string($classes) ? [$classes] : $classes;

        return self::svg($file, [
            'class' => A::join($classNames, ' ')
        ]);
    }

    static function svg(string|File $file, array $attributes): string|null {
        return Str::replace(svg($file), '<svg', '<svg ' . Html::attr($attributes));
    }

}

<?php

namespace VolkmannDesignCode\KirbyUtils;

use Kirby\Cms\File;
use Kirby\Toolkit\A;
use Kirby\Toolkit\Html;
use Kirby\Toolkit\Str;

class HtmlHelpers {

    private const SVG_TAG_OPEN = '<svg';
    private const SVG_TAG_CLOSE = '</svg>';
    private const SYMBOL_TAG_OPEN = '<symbol';
    private const SYMBOL_TAG_CLOSE = '</symbol>';

    static function svgWithClass(string|File $file, string|array $classes): string|null {
        $classNames = is_string($classes) ? [$classes] : $classes;

        return self::svg($file, [
            'class' => A::join($classNames, ' ')
        ]);
    }

    static function svg(string|File $file, array $attributes): string|null {
        return Str::replace(svg($file), self::SVG_TAG_OPEN, self::SVG_TAG_OPEN . ' ' . Html::attr($attributes));
    }

    static function svgToSymbol(string $svg): string {
        return Str::replace($svg, [
            self::SVG_TAG_OPEN,
            self::SVG_TAG_CLOSE,
          ], [
            self::SYMBOL_TAG_OPEN,
            self::SYMBOL_TAG_CLOSE,
          ]);
    }

}

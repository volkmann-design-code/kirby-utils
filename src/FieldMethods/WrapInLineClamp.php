<?php

namespace VolkmannDesignCode\KirbyUtils\FieldMethods;

use Kirby\Content\Field;
use Kirby\Toolkit\A;
use Kirby\Toolkit\Dom;

function wrapInLineClamp(Field $field, int $lines = 1, bool $setValueAsTitle = true): Field {
    $dom = new Dom('<span></span>');

    $span = $dom->body()->firstElementChild;
    $span->nodeValue = $field->inline()->value();

    $styles = [
        'display: -webkit-box',
        'overflow: hidden',
        '-webkit-line-clamp: ' . $lines,
        '-webkit-box-orient: vertical'
    ];

    $span->setAttribute('style', A::join($styles, ';'));

    if ($setValueAsTitle) {
        $span->setAttribute('title', $span->nodeValue);
    }

    $field->value = $dom->toString();
    return $field;
}

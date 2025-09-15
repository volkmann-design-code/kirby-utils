<?php

require_once __DIR__ . '/src/FieldMethods/HeadingIds.php';
require_once __DIR__ . '/src/FieldMethods/WrapInLineClamp.php';

use Kirby\Content\Field;
use function VolkmannDesignCode\KirbyUtils\FieldMethods\headingIds;
use function VolkmannDesignCode\KirbyUtils\FieldMethods\wrapInLineClamp;

Kirby::plugin('volkmann-design-code/kirby-utils', [
    'fieldMethods' => [
        'wrapInLineClamp' => function (...$args): Field {
            return wrapInLineClamp(...$args);
        },
        'headingIds' => function (...$args): Field {
            return headingIds(...$args);
        },
    ],
]);

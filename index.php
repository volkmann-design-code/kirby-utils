<?php

require_once __DIR__ . '/src/FieldMethods/HeadingIds.php';

use Kirby\Content\Field;
use function VolkmannDesignCode\KirbyUtils\FieldMethods\headingIds;

Kirby::plugin('volkmann-design-code/kirby-utils', [
    'fieldMethods' => [
        /**
         * Add IDs to headings in a field
         */
        'headingIds' => function (Field $field): Field {
            return headingIds($field);
        },
    ],
]);

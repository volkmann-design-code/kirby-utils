<?php

use Kirby\Content\Field;
use Kirby\Toolkit\Dom;
use Kirby\Toolkit\Str;

Kirby::plugin('volkmann-design-code/kirby-utils', [
    'fieldMethods' => [
        /**
         * Add IDs to headings in a field
         */
        'headingIds' => function (Field $field): Field {
            if ($field->isNotEmpty() === true) {
                $dom        = new Dom($field->value);
                $levels = [
                    'h1',
                    'h2',
                    'h3',
                    'h4',
                    'h5',
                    'h6',
                ];
                $query = '//*[self::' . implode(' or self::', $levels) . ']';
                $elements   = $dom->query($query);

                foreach ($elements as $element) {
                    $element->setAttribute('id', Str::slug($element->nodeValue));
                }

                $field->value = $dom->toString();
            }

            return $field;
        },
    ],
]);

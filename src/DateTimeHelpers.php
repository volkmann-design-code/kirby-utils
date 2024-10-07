<?php

namespace VolkmannDesignCode\KirbyUtils;

use DateTime;
use Kirby\Cms\Page;
use Kirby\Content\Field;

class DateTimeHelpers {

    static function toIso(DateTime $dateTime): string {
        return $dateTime->format('Y-m-d\TH:i:s\Z');
    }

    static function getPageModifiedIso(Page $page): string {
        $dateTime = DateTime::createFromFormat('U', $page->modified());
        return self::toIso($dateTime);
    }

    static function dateFieldToIso(Field $field): string|null {
        if ($field->isEmpty()) {
            return null;
        }
        $dateTime = DateTime::createFromFormat('U', $field->toDate());
        return self::toIso($dateTime);
    }

}

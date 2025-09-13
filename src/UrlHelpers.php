<?php

namespace VolkmannDesignCode\KirbyUtils;

use Kirby\Content\Field;
use Kirby\Toolkit\Str;

class UrlHelpers {

    static function telLink(string $phoneNumber): string
    {
        return 'tel:' . preg_replace('/[^\d+]/', '', $phoneNumber);
    }

    static function mailtoLink(string $email): string
    {
        return 'mailto:' . $email;
    }

    static function linkTarget(Field $linkField): string
    {
        return self::isExternalLink($linkField) ? '_blank' : '_self';
    }

    static function linkRel(Field $linkField, string $externalRel = 'nofollow noopener noreferrer'): string
    {
        return self::isExternalLink($linkField) ? $externalRel : '';
    }

    static function isExternalLink(Field $linkField): bool
    {
        $langCode = $kirby->language()?->code() ?? '';
        $siteRoot = $site->url()->beforeEnd("/$langCode");
        return Str::startsWith($linkField, 'http://') && !Str::startsWith($linkField, $siteRoot);
    }

}

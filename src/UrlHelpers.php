<?php

namespace VolkmannDesignCode\KirbyUtils;

class UrlHelpers {

    static function telLink(string $phoneNumber): string
    {
        return 'tel:' . str_replace(' ', '', $phoneNumber);
    }

    static function mailtoLink(string $email): string
    {
        return 'mailto:' . $email;
    }

}
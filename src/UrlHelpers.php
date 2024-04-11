<?php

namespace VolkmannDesignCode\KirbyUtils;

class UrlHelpers {

    static function telLink(string $phoneNumber): string
    {
        return 'tel:' . preg_replace('/[^\d+]/', '', $phoneNumber);
    }

    static function mailtoLink(string $email): string
    {
        return 'mailto:' . $email;
    }

}
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use VolkmannDesignCode\KirbyUtils\UrlHelpers;

final class UrlHelpersTest extends TestCase
{
    public function testTelLink(): void
    {
        $phone = '12345';
        $res = UrlHelpers::telLink($phone);
        $this->assertSame($res, 'tel:12345');
    }

    public function testMailtoLink(): void
    {
        $mail = 'hi@example.com';
        $res = UrlHelpers::mailtoLink($mail);
        $this->assertSame($res, 'mailto:hi@example.com');
    }

}
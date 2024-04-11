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

    public function testTelLinkWhitespace(): void
    {
        $phone = '0123 4567 8910';
        $res = UrlHelpers::telLink($phone);
        $this->assertSame($res, 'tel:012345678910');
    }

    public function testTelLinkCharacters(): void
    {
        $phone = '0123 / 4567 8910';
        $res = UrlHelpers::telLink($phone);
        $this->assertSame($res, 'tel:012345678910');
    }

    public function testTelLinkCountryPrefix(): void
    {
        $phone = '+49 123 / 4567 8910';
        $res = UrlHelpers::telLink($phone);
        $this->assertSame($res, 'tel:+4912345678910');
    }

    public function testMailtoLink(): void
    {
        $mail = 'hi@example.com';
        $res = UrlHelpers::mailtoLink($mail);
        $this->assertSame($res, 'mailto:hi@example.com');
    }

}
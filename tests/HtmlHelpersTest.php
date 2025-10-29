<?php declare(strict_types=1);

use Kirby\Cms\App;
use PHPUnit\Framework\TestCase;
use VolkmannDesignCode\KirbyUtils\HtmlHelpers;

final class HtmlHelpersTest extends TestCase
{
    public function testSvgWithClasses(): void
    {
        $svgPath = App::instance()->root() . '/tests/fixtures/kirby.svg';
        $regular = svg($svgPath);
        $this->assertStringStartsNotWith($regular, '<svg class="');

        $withClass = HtmlHelpers::svgWithClass($svgPath, 'kirby');
        $this->assertStringStartsWith('<svg class="kirby"', $withClass);

        $withMultipleClasses = HtmlHelpers::svgWithClass($svgPath, ['kirby', 'icon']);
        $this->assertStringStartsWith('<svg class="kirby icon"', $withMultipleClasses);
    }

    public function testSlug(): void {
        $this->assertSame('hello-world', HtmlHelpers::slug('Hello World!'));
        $this->assertSame('php-is-great', HtmlHelpers::slug('PHP is great.'));
        $this->assertSame('kirby-utils-123', HtmlHelpers::slug('Kirby Utils 123'));
        $this->assertSame('html-with-line-break', HtmlHelpers::slug('<p>HTML with<br>line break</p>'));
    }

}

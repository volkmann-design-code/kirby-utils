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

}

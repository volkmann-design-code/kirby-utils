<?php declare(strict_types=1);

use Kirby\Cms\Layout;
use PHPUnit\Framework\TestCase;
use VolkmannDesignCode\KirbyUtils\LayoutHelpers;

final class LayoutHelpersTest extends TestCase
{
    public function testHasBlockType(): void
    {
        $layout = new Layout([
            'columns' => [
                [
                    'blocks' => [
                        ['type' => 'heading'],
                        ['type' => 'text'],
                    ]
                ],
                [
                    'blocks' => [
                        ['type' => 'heading'],
                        ['type' => 'text'],
                    ]
                ]
            ]
        ]);

        $this->assertTrue(LayoutHelpers::hasBlockType($layout, ['heading']));
        $this->assertFalse(LayoutHelpers::hasBlockType($layout, ['image']));
    }

}

<?php declare(strict_types=1);

use Kirby\Cms\Collection;
use PHPUnit\Framework\TestCase;
use VolkmannDesignCode\KirbyUtils\CollectionHelpers;

final class CollectionHelpersTest extends TestCase
{
    public function testGetItemsPerChunk(): void
    {
        $collection9Items = new Collection([
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'
        ]);
        $collection10Items = new Collection([
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'
        ]);
        $chunkSize = 3;

        $this->assertSame(CollectionHelpers::getItemsPerChunk($collection9Items, $chunkSize), 3);
        $this->assertSame(CollectionHelpers::getItemsPerChunk($collection10Items, $chunkSize), 4);
    }

}
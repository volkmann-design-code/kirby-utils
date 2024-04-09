<?php

namespace VolkmannDesignCode\KirbyUtils;

use Kirby\Cms\Collection;

class CollectionHelpers {

    static function getItemsPerChunk(Collection $items, int $chunkSize): int {
        return ceil($items->count() / $chunkSize);
    }

    static function getCollectionsMaxCount(Collection $coll): int {
        $maxCount = 0;
        foreach ($coll as $set) {
            $maxCount = max($maxCount, $set->count());
        }
        return $maxCount;
    }

    static function fillChunksToEqualSize(Collection $chunks, Collection $items, int $desiredSize): void {
        foreach ($chunks as $set) {
            $missing = $desiredSize - $set->count();
            if ($missing > 0) {
                $elements = $items->slice(0, $missing);
                foreach ($elements as $element) {
                    $set->append($element);
                }
            }
        }
    }

    static function doubleItemsInEachSet(Collection $sets): void {
        foreach ($sets as $set) {
            foreach ($set as $item) {
                $set->append($item->id() . '-clone', $item);
            }
        }
    }

}
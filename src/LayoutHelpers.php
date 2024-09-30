<?php

namespace VolkmannDesignCode\KirbyUtils;

use Kirby\Cms\Layout;

class LayoutHelpers {

    static function hasBlockType(Layout $layout, array|string $blockTypes): bool
    {
        $blockTypesArray = is_array($blockTypes) ? $blockTypes : [$blockTypes];
        foreach ($layout->columns() as $column) {
            foreach ($column->blocks() as $block) {
                if (in_array($block->type(), $blockTypesArray)) {
                    return true;
                }
            }
        }

        return false;
    }

}

<?php

namespace VolkmannDesignCode\KirbyUtils;

use Kirby\Cms\Layout;

class LayoutHelpers {

    static function hasBlockType(Layout $layout, array $blockTypes): bool
    {
        foreach ($layout->columns() as $column) {
            foreach ($column->blocks() as $block) {
                if (in_array($block->type(), $blockTypes)) {
                    return true;
                }
            }
        }

        return false;
    }

}

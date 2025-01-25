<?php

namespace VolkmannDesignCode\KirbyUtils\Traits;

use Kirby\Cms\Collection;

trait PageSiblings
{
    public function siblingsIncludingDrafts(): Collection
    {
        return $this->parentModel()->childrenAndDrafts()->not($this);
    }
}

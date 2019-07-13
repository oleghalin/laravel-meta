<?php

namespace Khalin\Meta;

use Illuminate\Support\Collection;

interface SourceInterface
{
    public function getTag($name): ?MetaTag;

    public function getTags(): Collection;

    public function add($instance, $value): self;

    public function addMany($collection): self;
}

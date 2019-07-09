<?php

namespace Khalin\Meta;

use Illuminate\Support\Collection;

interface SourceInterface
{
    public function getTag($name): ?MetaTag;

    public function getTags(): Collection;

    public function setTag($instance, $value): self;

    public function setManyTags($collection): self;
}

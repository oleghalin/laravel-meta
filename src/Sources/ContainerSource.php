<?php

namespace Khalin\Meta\Sources;

use Illuminate\Support\Collection;
use Khalin\Meta\SourceInterface;
use Khalin\Meta\MetaTag;

class ContainerSource implements SourceInterface
{
    /** @var Collection $tags */
    protected $tags;

    public function __construct()
    {
        $this->tags = new Collection;
    }

    public function getTag($name): ?MetaTag
    {
        return $this->tags->get($name);
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function setTag($tags, $value = null): SourceInterface
    {
        if ($tags instanceof MetaTag) {
            $this->tags->put($tags->getName(), $tags);
        } else {
            if (is_string($tags) && ! is_null($value)) {
                $this->tags->put($tags, new MetaTag($tags, $value));
            } elseif (is_array($tags)) {
                $this->setTag($tags['name'], $tags['content']);
            } else {
                $this->setTag($tags);
            }
        }

        return $this;
    }

    /**
     * @param \Illuminate\Support\Collection|array $collection
     * @return \Khalin\Meta\SourceInterface
     */
    public function setManyTags($collection): SourceInterface
    {
        if (! $collection instanceof Collection) {
            $collection = collect($collection);
        }

        $collection->each(function ($item) {
            $this->setTag($item);
        });

        return $this;
    }
}

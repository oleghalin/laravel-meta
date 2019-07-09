<?php

namespace Khalin\Meta;

class MetaTags
{
    /**
     * @var \Khalin\Meta\SourceInterface
     */
    private $source;

    public function __construct(SourceInterface $source)
    {
        $this->source = $source;
    }

    public function renderMetaTags()
    {
        $this->source->resolveTags();
    }
}

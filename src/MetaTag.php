<?php

namespace Khalin\Meta;

class MetaTag
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @var array
     */
    private $options;

    public function __construct(string $name, string $content, $options = [])
    {
        $this->name = $name;
        $this->content = $content;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    public function render()
    {
        return view('metatags::tag', ['tag' => $this]);
    }
}

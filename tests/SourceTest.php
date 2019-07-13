<?php

namespace Khalin\Meta\Test;

use Khalin\Meta\MetaTag;
use Khalin\Meta\SourceInterface;
use Khalin\Meta\Sources\ContainerSource;

class SourceTest extends TestCase
{
    /** @var ContainerSource $source */
    private $source;

    public function setUp(): void
    {
        parent::setUp();

        $this->source = $this->app->make(SourceInterface::class);
    }

    /** @test */
    public function it_can_set_meta_tag_as_instance()
    {
        $content = 'Laravel Meta Tags';
        $this->source->add(new MetaTag('title', $content));

        $tag = $this->source->getTag('title');

        $this->assertNotNull($tag);

        $this->assertSame($tag->getName(), 'title');

        $this->assertSame($tag->getContent(), $content);
    }

    /** @test */
    public function it_can_set_meta_tag_as_string()
    {
        $content = 'Laravel Meta Tags';
        $this->source->add('title', $content);

        $tag = $this->source->getTag('title');

        $this->assertNotNull($tag);

        $this->assertSame($tag->getName(), 'title');

        $this->assertInstanceOf(MetaTag::class, $tag);

        $this->assertSame($tag->getContent(), $content);
    }

    /** @test */
    public function it_can_set_many_tags()
    {
        $name = 'title';
        $content = 'Laravel Meta Tags';

        $this->source->addMany([
            compact('name', 'content'),
            new MetaTag('x-csrf-token', 'Khalin'),
        ]);

        $name = $this->source->getTag('title');
        $token = $this->source->getTag('x-csrf-token');

        $this->assertNotNull($name);

        $this->assertNotNull($token);
    }
}

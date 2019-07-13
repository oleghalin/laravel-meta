<?php

namespace Khalin\Meta\Facades;

use Khalin\Meta\SourceInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Khalin\Meta\SourceInterface getTag($name)
 * @method static \Khalin\Meta\SourceInterface getTags()
 * @method static \Khalin\Meta\SourceInterface add($instance, $value)
 * @method static \Khalin\Meta\SourceInterface addMany($collection)
 *
 * @see \Khalin\Meta\SourceInterface
 */
class MetaTags extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return SourceInterface::class;
    }
}

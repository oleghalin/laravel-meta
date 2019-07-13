@inject('tags','Khalin\Meta\SourceInterface')


@foreach($tags->getTags() as $tag)
    @include('metatags::tag', compact('tag'))
@endforeach

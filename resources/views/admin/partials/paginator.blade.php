{{--@start paginator--}}
@if ($resource)

    <div class="pagination-wrapper">

        {!! $resource->render() !!}

    </div>

@endif
{{--@end paginator--}}

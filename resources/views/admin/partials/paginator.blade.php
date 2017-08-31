{{--@start paginator--}}
@if ($resource)

    <center>

        <div class="pagination-wrapper">

            {!! $resource->render() !!}

        </div>

    </center>

@endif
{{--@end paginator--}}

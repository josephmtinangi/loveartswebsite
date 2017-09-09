@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            {{--@start actionbar--}}
            <div class="ibox">

                <div class="ibox-content">

                    <div class="row m-t-md">

                        <div class="col-sm-8 m-b-xs">

                            <div class="btn-group">

                                <a class="btn btn-primary"
                                   href="{{ route('admin.artists.pillars.create') }}"
                                   title="{{ trans('admin_artists_pillars.actions.create.title') }}">

                                    @lang('admin_artists_pillars.actions.create.name')

                                </a>

                            </div>

                        </div>

                        <div class="col-sm-4">

                            {!! Form::open(['method' => 'GET', 'route' => 'admin.artists.pillars.index']) !!}

                            {!!
                                Form::text('q', $query, [
                                    'class' => 'form-control',
                                    'placeholder' => trans('admin_artists_pillars.actions.search.placeholder')
                                ])
                            !!}

                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>

            </div>
            {{--@end actionbar--}}

            {{--@start tableview--}}
            <div class="table-responsive m-t-lg">

                <table class="table table-borderless table-striped">

                    <thead>

                        <tr>
                            <th>Name</th>
                            <th>Thumbnail</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($pillars as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img class="img-responsive img-thumbnail"
                                         src="{{ $item->thumb_url }}"
                                         width="120">
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                       href="{{ route('admin.artists.pillars.edit', $item->id) }}"
                                       title="{{ trans('admin_artists_pillars.actions.update.title') }}">

                                        <i class="fa fa-folder-open"></i>

                                    </a>

                                    <a class="btn btn-danger btn-sm"
                                       data-method="delete"
                                       data-token="{{ csrf_token() }}"
                                       data-confirm="{{ trans('admin_artists_pillars.actions.delete.confirm_message') }}"
                                       href="{{ route('admin.artists.pillars.destroy', $item->id) }}"
                                       title="{{ trans('admin_artists_pillars.actions.delete.title') }}">

                                        <i class="fa fa-trash"></i>

                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

                @include('admin.partials.paginator', ['resource' => $pillars])

            </div>

        </div>

    </div>

@endsection

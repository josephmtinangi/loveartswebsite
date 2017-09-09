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
                                    href="{{ route('admin.events.create') }}"
                                    title="{{ trans('admin_events.actions.create.title') }}">

                                    @lang('admin_events.actions.create.name')

                                </a>

                            </div>

                        </div>

                        <div class="col-sm-4">

                            {!! Form::open(['method' => 'GET', 'route' => 'admin.events.index']) !!}

                            {!! Form::text('q', $query, ['class' => 'form-control', 'placeholder' => trans('admin_events.actions.search.placeholder')]) !!}

                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>

            </div>
            {{--@end actionbar--}}

            {{--@start listview--}}
            <div class="table-responsive m-t-lg">

                <table class="table table-borderless table-striped">

                    <thead>

                        <tr>
                            <th>Title</th>
                            <th>Poster</th>
                            <th>Location</th>
                            <th>Start Date</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($events as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <img class="img-thumbnail img-responsive"
                                         src="{{ $item->thumb_url }}"
                                         width="120" />
                                </td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->start_date_for_humans }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                       href="{{ route('admin.events.edit', $item->id) }}"
                                       title="{{ trans('admin_events.actions.update.title') }}">

                                        <i class="fa fa-folder-open"></i>

                                    </a>

                                    <a class="btn btn-danger btn-sm"
                                       data-method="delete"
                                       data-token="{{ csrf_token() }}"
                                       data-confirm="{{ trans('admin_events.actions.delete.confirm_message') }}"
                                       href="{{ route('admin.events.destroy', $item->id) }}"
                                       title="{{ trans('admin_events.actions.delete.title') }}">

                                        <i class="fa fa-trash"></i>

                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                {{--@end listview--}}

                @include('admin.partials.paginator', ['resource' => $events])

            </div>

        </div>

    </div>

@endsection

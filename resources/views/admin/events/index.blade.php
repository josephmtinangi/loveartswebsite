@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            <div class="table-responsive m-t-lg">

                <table class="table table-borderless">

                    <thead>

                        <tr>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Start Date</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->start_date }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        title="{{ trans('admin_events.actions.show.title') }}"
                                        href="#">

                                        <i class="fa fa-folder-open"></i>

                                    </a>

                                    <a class="btn btn-danger btn-sm"
                                        title="{{ trans('admin_events.actions.delete.title') }}"
                                        href="#">

                                        <i class="fa fa-trash"></i>

                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

                @include('admin.partials.paginator', ['resource' => $events])

            </div>

        </div>

    </div>

@endsection

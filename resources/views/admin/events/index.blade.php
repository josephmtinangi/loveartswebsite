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
                            <th>Starts At</th>
                            <th>Ends At</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->date }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="#">Show</a>

                                    <a class="btn btn-danger btn-sm" href="#">Delete</a>
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

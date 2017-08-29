@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            <div class="table-responsive m-t-lg">

                <table class="table table-borderless">

                    <thead>

                        <tr>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Role(s)</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($system_users as $item)
                            <tr>
                                <td><img class="img-circle" src="{{ $item->avatar }}" width="36" height="34"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->role ?: 'Unknown' }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone ?: 'Unknown' }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="#">Show</a>

                                    <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection

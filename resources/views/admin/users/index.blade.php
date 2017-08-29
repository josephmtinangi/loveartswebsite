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
                            <th>Role</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($users as $item)
                            <tr>
                                <td><img class="img-circle" src="{{ $item->avatar }}" width="36" height="36"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ \App\Admin\Role::NORMAL }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->mobile ?: 'Not Available' }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="#">Show</a>

                                    <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

                @include('admin.partials.paginator', ['resource' => $users])

            </div>

        </div>

    </div>

@endsection

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
                                <td>{{ if_available($item->role) }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ if_available($item->mobile) }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        title="{{ trans('admin_users.actions.show.title', ['user' => $item->name]) }}"
                                        href="#">

                                        <i class="fa fa-folder-open"></i>

                                    </a>

                                    <a class="btn btn-danger btn-sm"
                                        title="{{ trans('admin_users.actions.delete.title', ['user' => $item->name]) }}"
                                        href="#">

                                        <i class="fa fa-trash"></i>

                                    </a>
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

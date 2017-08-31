@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            <div class="table-responsive m-t-lg">

                <table class="table table-borderless">

                    <thead>

                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($roles as $item)
                            <tr>
                                <td>{{ $item }}</td>
                                <td>Not Available</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        title="{{ trans('admin_roles.actions.show.title', ['role' => $item]) }}"
                                        href="#">

                                        <i class="fa fa-folder-open"></i>

                                    </a>

                                    <a class="btn btn-danger btn-sm"
                                        title="{{ trans('admin_roles.actions.delete.title', ['role' => $item]) }}"
                                        href="#">

                                        <i class="fa fa-trash"></i>

                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection

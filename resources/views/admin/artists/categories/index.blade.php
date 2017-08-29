@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            <div class="table-responsive m-t-lg">

                <table class="table table-borderless">

                    <thead>

                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="#">Show</a>

                                    <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

                @include('admin.partials.paginator', ['resource' => $categories])

            </div>

        </div>

    </div>

@endsection

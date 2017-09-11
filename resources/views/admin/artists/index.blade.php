@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            <div class="table-responsive m-t-lg">

                <table class="table table-borderless table-responsive">

                    <thead>

                        <tr>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Social Media</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($artists as $artist)
                            <tr>
                                <td><img class="img-circle" src="{{ asset('images/avatar.jpg') }}" width="36" height="36"></td>
                                <td>{{ $artist->name }}</td>
                                <td>{{ $artist->email }}</td>
                                <td>{{ show_if_available($artist->gender) }}</td>
                                <td>{{ show_if_available($artist->category) }}</td>
                                <td>{{ show_if_available($artist->status, 'Pending') }}</td>
                                <td>
                                    @if ($artist->facebook_link)
                                        <a class="btn btn-link" href="{{ $artist->facebook_link }}" target="_blank">

                                            <i class="fa fa-facebook"></i>

                                        </a>
                                    @endif

                                    @if ($artist->instagram_link)
                                        <a class="btn btn-link" href="{{ $artist->instagram_link }}" target="_blank">

                                            <i class="fa fa-instagram"></i>

                                        </a>
                                    @endif

                                    @if ($artist->youtube_link)
                                        <a class="btn btn-link" href="{{ $artist->youtube_link }}" target="_blank">

                                            <i class="fa fa-youtube-play"></i>

                                        </a>
                                    @endif

                                    @if ($artist->twitter_link)
                                        <a class="btn btn-link" href="{{ $artist->twitter_link }}" target="_blank">

                                            <i class="fa fa-twitter"></i>

                                        </a>
                                    @endif
                                </td>

                                <td>
                                    <a class="btn btn-info btn-sm" href="#">Show</a>

                                    <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

                @include('admin.partials.paginator', ['resource' => $artists])

            </div>

        </div>

    </div>

@endsection

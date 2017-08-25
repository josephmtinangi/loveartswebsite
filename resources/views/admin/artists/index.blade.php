@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            <div class="table-responsive m-t-lg">

                <table class="table table-borderless">

                    <thead>

                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Social</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($artists as $artist)
                            <tr>
                                <td><a href="#">{{ $artist->name }}</a></td>
                                <td>{{ $artist->email }}</td>
                                <td>{{ $artist->gender ?: 'NIL' }}</td>
                                <td>{{ $artist->category ?: 'Singer' }}</td>
                                <td>{{ $artist->status ?: 'Pending' }}</td>
                                <td>
                                    @if ($artist->facebook_link)
                                        <a href="{{ $artist->facebook_link }}">

                                            <i class="fa fa-facebook"></i>

                                        </a>
                                    @endif

                                    @if ($artist->instagram_link)
                                        <a href="{{ $artist->facebook_link }}">

                                            <i class="fa fa-instagram"></i>

                                        </a>
                                    @endif

                                    @if ($artist->youtube_link)
                                        <a href="{{ $artist->youtube_link }}">

                                            <i class="fa fa-youtube"></i>

                                        </a>
                                    @endif

                                    @if ($artist->twitter_link)
                                        <a href="{{ $artist->twitter_link }}">

                                            <i class="fa fa-twitter"></i>

                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection

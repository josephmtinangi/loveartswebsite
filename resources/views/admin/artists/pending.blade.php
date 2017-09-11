@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            {{--@start actionbar--}}
            <div class="ibox">

                <div class="ibox-content">

                    <div class="row m-t-md">

                        <div class="col-sm-offset-8 col-sm-4">

                            {!! Form::open(['method' => 'GET', 'route' => 'admin.artists.pending']) !!}

                            {!!
                                Form::text('q', $query, [
                                    'class' => 'form-control',
                                    'placeholder' => trans('admin_artists.actions.search.placeholder'),
                                ])
                            !!}

                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>

            </div>
            {{--@end actionbar--}}

            <div class="table-responsive m-t-lg">

                <table class="table table-borderless table-responsive">

                    <thead>

                        <tr>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Category</th>
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
                                <td>{{ if_available($artist->gender) }}</td>
                                <td>{{ if_available($artist->category) }}</td>
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
                                    <a class="btn btn-info btn-sm"
                                        title="{{ trans('admin_artists.actions.show.title', ['name' => $artist->name]) }}"
                                        href="#">

                                        <i class="fa fa-folder-open"></i>

                                    </a>

                                    <a class="btn btn-danger btn-sm"
                                        title="{{ trans('admin_artists.actions.delete.title', ['name' => $artist->name]) }}"
                                        href="#">

                                        <i class="fa fa-trash"></i>

                                    </a>
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

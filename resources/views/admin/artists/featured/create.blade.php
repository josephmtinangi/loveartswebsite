@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            {!!
                Form::model($instance, [
                    'class' => 'form-horizontal',
                    'route' => ['admin.artists.featured.store', $instance],
                    'method' => 'POST',
                    'files' => true,
                ])
            !!}

            <div class="ibox">

                <div class="ibox-content">

                    <div class="page-header">

                        <div class="btn-toolbar pull-right" role="toolbar">

                            <a class="btn btn-white" href="{{ route('admin.artists.index') }}">

                                Cancel

                            </a>

                            {!!
                                Form::button('Submit', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-primary',
                                ])
                            !!}
                        </div>

                        <h2>
                            <small>

                                Feature an artist

                            </small>
                        </h2>

                    </div>

                    @include('admin.artists.pillars.form')

                </div>

            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection

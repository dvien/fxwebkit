@extends('admin.layouts.login', array('class' => 'page-signin'))
@section('title', trans('user.PageTitleSignIn'))
@section('content')
    <div class="signin-container">

        <div class="signin-form">
            <a href="" class="logo">

                {!! HTML::image('assets/img/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}
                &nbsp;
            </a>

                <div class="panel-heading-controls ">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i>
                            {{ trans('user.language') }}</a>
                        <ul class="dropdown-menu">
                            @foreach(config('app.language')  as $locale=>$name)
                                <li><a href="?locale={{$locale}}">{{ $name }}</a></li>

                            @endforeach
                        </ul>
                    </div>
                </div>


                {!! Form::open(['id'=>'signin-form_id']) !!}
            <div class="signin-text">
                <div style="clear:both; height: 20px;"></div>
                <span>{{ trans('user.resetPasswordText') }}</span>
            </div>
            @include('admin.partials.messages')
            <div class="form-group w-icon">
                {!! Form::text('email', '', ['class'=>'form-control input-lg','placeholder'=>trans('user.email')]) !!}
                <span class="fa fa-user signin-form-icon"></span>
            </div>
            <div class="form-actions">
                {!! Form::submit(trans('user.sendRestEmeail'), ['class'=>'signin-btn bg-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
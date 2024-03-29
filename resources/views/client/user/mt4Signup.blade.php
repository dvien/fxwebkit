@extends('client.layouts.login', array('class' => 'page-signin'))
@section('title', Lang::get('user.PageTitleSignIn'))

@section('content')
    <div class="login-box">
        <div class="white-box">
            {!! HTML::image('assets/'.config('fxweb.layoutAssetsFolder').'/images/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}

            {!! Form::open(['id'=>'loginform' , 'class'=>'form-horizontal form-material']) !!}
            <div class="dropdown" style="float:right;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> Language</a>
                <ul class="dropdown-menu">
                    @foreach(config('app.language')  as $locale=>$name)
                        <li><a href="?locale={{$locale}}">{{ trans('general.'.$name) }}</a></li>

                    @endforeach
                </ul>
            </div>

            <h3 class="box-title m-b-20">{{ Lang::get('user.mt4SignupText') }}</h3>

            @include('client.partials.messages')

            <div class="form-group ">
                <div class="col-xs-12">
                    {!! Form::text('login', null, ['class'=>'form-control','placeholder'=>Lang::get('user.mt4AccountLogin')]) !!}

                </div>
            </div>


            <div class="form-group ">
                <div class="col-xs-12">
            {!! Form::password('password', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.password')]) !!}


                </div>
            </div>


            <div class="form-group ">
                        <div class="col-xs-12">
           {!! Form::password('memberAreaPassword', ['class'=>'form-control input-lg','id'=>'field_memberAreaPassword',"pattern"=>".{5,30}","required"=>"","title"=>trans("user.passwordLengthError"),'placeholder'=>Lang::get('user.memberAreaPassword')]) !!}

                        </div>
            </div>



            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{Lang::get('user.SignUp')}}</button>

                </div>
            </div>


            </form>

        </div>
    </div>
@stop
@section('hidden')
    <div class="signin-container">


        <div class="signin-form">

            <a href="" class="logo">

                {!! HTML::image('assets/'.config('fxweb.layoutAssetsFolder').'/img/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}
                &nbsp;
            </a>

            <div class="panel-heading-controls ">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="fa fa-language"></i> {{ trans('user.language') }}</a>
                    <ul class="dropdown-menu">
                        @foreach(config('app.language')  as $locale=>$name)
                            <li><a href="?locale={{$locale}}">{{ trans('general.'.$name) }}</a></li>

                        @endforeach
                    </ul>
                </div>
            </div>


            {!! Form::open(['id'=>'signin-form_id']) !!}
            <div class="signin-text">
                <span>{{ Lang::get('user.mt4SignupText') }}</span>
            </div>
            @include('client.partials.messages')
            <div class="form-group w-icon">
                {!! Form::text('login', null, ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.mt4AccountLogin')]) !!}
                <span class="fa fa-user signin-form-icon"></span>
            </div>
            <div class="form-group w-icon">
                {!! Form::password('password', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.password')]) !!}
                <span class="fa fa-lock signin-form-icon"></span>
            </div>
            <div class="form-group w-icon">
                {!! Form::select('server_id',$serverList,null,['class'=>'form-control input-lg','placeholder'=>Lang::get('server')]) !!}

            </div>


            <div class="form-actions">

                {!! Form::submit(Lang::get('user.SignUp'), ['class'=>'signin-btn bg-primary']) !!}


            </div>
            {!! Form::close() !!}

            <div class="signin-with">
{{--*/ $socialNumber=config('fxweb.EnableFacebookRegister')+ config('fxweb.EnableGoogleRegister')+config('fxweb.EnableLinkedinRegister');
$width=($socialNumber>0)? 94/$socialNumber:0;
/*--}}
                @if(config('fxweb.EnableFacebookRegister'))
                    <a href="{{ route('client.facebook.login') }}" class="signin-with-btn"
                       style="background:#4f6faa;background:rgba(79, 111, 170, .8); width:{{$width}}% !important;">
                        {{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.Facebook') }}</span>
                    </a>
                @endif
                @if(config('fxweb.EnableGoogleRegister'))
                    <a href="{{ route('client.google.login') }}" class="signin-with-btn"
                       style="background:#4285F4;background:rgba(66, 133, 244, .8); width:{{$width}}% !important;">
                        {{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.google') }}</span>
                    </a>
                @endif
                @if(config('fxweb.EnableLinkedinRegister'))
                    <a href="{{ route('client.linkedin.login') }}" class="signin-with-btn"
                       style="background:#0077B5;background:rgba(0, 119, 181, .8); width:{{$width}}% !important;">
                        {{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.linkedin') }}</span>
                    </a>
                @endif


                <div class="text-center">
                    <div class="clearfix"></div>
                    {{ Lang::get('user.not_a_member') }}
                    <a href="{{ route('client.auth.register') }}">{{ Lang::get('user.sign_up_now') }}</a>

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>

    </div>



@stop
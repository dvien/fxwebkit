@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

<ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
    <li class="active">
        <a href="#uidemo-tabs-default-demo-home" data-toggle="tab">{{ trans('accounts::accounts.details') }}<span class="label label-success"></span></a>
    </li>

    <li  class="">

        <a href="{{ route('accounts.editAccount').'?edit_id='.$user_details['id']}}"  >{{ trans('accounts::accounts.edit_info') }}<span class="badge badge-primary"></span></a>

    </li>
</ul>


<div class="panel-body">
    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.first_name :') }}  </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['first_name'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.last_name :') }}  </label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['last_name'] }}</label>
            </div>
        </div>
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.email') }}  </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['email'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.nickname') }}  </label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['nickname'] }}</label>
            </div>
        </div>
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.address :') }}  </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['address'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.birthday') }}  </label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['birthday'] }}</label>
            </div>
        </div>
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.phone') }}  </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['phone'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.country') }}  </label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['country'] }}</label>
            </div>
        </div>
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.city') }}  </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['city'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.zip_code') }} </label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['zip_code'] }}</label>
            </div>
        </div>
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('accounts::accounts.gender') }} : </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                @if($user_details['gender']==0)
                <label class="control-label">{{ trans('accounts::accounts.male') }}</label>
                @else
                <label class="control-label">{{ trans('accounts::accounts.female') }}</label>
                @endif
            </div>
        </div><!--ol-sm-6 -->
    </div><!-- row -->

</div>

<div class="panel-footer text-right"></div>


@stop
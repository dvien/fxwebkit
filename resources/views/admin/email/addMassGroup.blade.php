@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.accounts'))
@section('content')
    <div id="content-wrapper">

        <div class="  theme-default page-mail">
            <div class="mail-nav">
                <div class="navigation">
                    {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                    <ul class="sections">
                        <li class="active"><a href="#"> <i
                                        class="fa fa-search"></i>{{ trans('accounts::accounts.search') }}  </a></li>
                        <li>
                            <div class="   nav-input-div">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                        <span class="lbl">{{ trans('accounts::accounts.ExactLogin') }}</span>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li id="from_login_li">
                            <div class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('accounts::accounts.FromLogin'),'class'=>'form-control input-sm']) !!}</div>
                        </li>
                        <li id="to_login_li">
                            <div class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('accounts::accounts.ToLogin'),'class'=>'form-control input-sm']) !!}</div>
                        </li>
                        <li id="login_li">
                            <div class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('accounts::accounts.Login'),'class'=>'form-control input-sm']) !!}</div>
                        </li>

                        <li>
                            <div class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('accounts::accounts.name'),'class'=>'form-control input-sm']) !!}</div>
                        </li>
                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::radio('signed',0,$aFilterParams['signed'],['id'=>'signed_0','checked'=>'true']) !!}
                                <label for="signed_0">{{ trans('accounts::accounts.all') }}</label>
                                {!! Form::radio('signed',1,($aFilterParams['signed']==1),['id'=>'signed_1']) !!}<label
                                        for="signed_1">{{ trans('accounts::accounts.signed') }}</label>

                            </div>
                        </li>
                        <li>

                            <div class=" nav-input-div form-group ">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
                                        <span class="lbl">{{ trans('accounts::accounts.AllGroups') }}</span>
                                    </label>
                                </div>
                                {!! Form::select('group[]', $aGroups, $aFilterParams['group'], ['multiple'=>true,'class'=>'form-control input-sm','id'=>'all-groups-slc']) !!}
                            </div>

                        </li>


                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                            </div>
                        </li>
                        <li class="divider"></li>
                    </ul>


                    {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
                    {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                    {!! Form::hidden('order', $aFilterParams['order']) !!}
                    {!! Form::close() !!}


                </div>
            </div>

            <div class="mail-container">
                <div class="mail-container-header">
                    {{ trans('accounts::accounts.accounts') }}
                </div>
                <div class="center_page_all_div">
                    @include('admin.partials.messages')

                    <div class="table-info">








                        <div class="table-header">


                            <div class="table-caption">
                                {{ trans('accounts::accounts.accounts') }}


                            </div>
                        </div>
                        @if (count($oResults))
                            {!! Form::open() !!}
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).Form::label('check_all','Select All') !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('accounts::accounts.Login'), 'LOGIN', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('accounts::accounts.name'), 'NAME', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('accounts::accounts.Group'), 'GROUP', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('accounts::accounts.Equity'), 'EQUITY', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('accounts::accounts.Balance'), 'BALANCE', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('accounts::accounts.AgentAccount'), 'AGENT_ACCOUNT', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('accounts::accounts.Margin'), 'MARGIN', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('accounts::accounts.MarginFree'), 'MARGIN_FREE', $oResults) !!}</th>
                                    <th class="no-warp">{!! th_sort(trans('accounts::accounts.Leverage'), 'LEVERAGE', $oResults) !!}</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($oResults as $oResult)
                                    <tr>
                                        <td>{!! Form::checkbox('users_checkbox[]',$oResult->LOGIN,false,['class'=>'users_checkbox']) !!}

                                            @if(isset($oResult->users_id ) )
                                                <font style="color:#060">signed</font>
                                            @else
                                                <font style="color:#600">not signed </font>
                                            @endif

                                        </td>

                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ $oResult->NAME }}</td>
                                        <td>{{ $oResult->GROUP }}</td>
                                        <td>{{ $oResult->EQUITY }}</td>
                                        <td>{{ $oResult->BALANCE }}</td>


                                        <td>{{ $oResult->AGENT_ACCOUNT }}</td>
                                        <td>{{ $oResult->MARGIN }}</td>
                                        <td>{{ $oResult->MARGIN_FREE }}</td>
                                        <td>{{ $oResult->LEVERAGE }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">


                                        {!! Form::hidden('account_id', $aFilterParams['account_id']) !!}
                                        {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                                        {!! Form::hidden('order', $aFilterParams['order']) !!}

                                        {!! Form::button('sign',['name'=>'asign_mt4_users_submit','value'=>'1' ,'type'=>'submit' ]) !!}
                                        {!! Form::button('un sign',['name'=>'un_sign_mt4_users_submit','value'=>'1' ,'type'=>'submit' ]) !!}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        @endif
                        <div class="table-footer">
                            @if (count($oResults))
                                {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                @if($oResults->total()>25)

                                    <div class="DT-lf-right change_page_all_div">

                                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}

                                        {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                                    </div>
                                @endif

                                <div class="col-sm-3">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
                                </div>
                            @endif
                        </div>
                        {{ Form::close() }}
                        <div class="table-footer text-center">
                            @if (count($oResults))
                                {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/js/jquery.2.0.3.min.js') }}"></script>
    <script>
        init.push(function () {


            $('#all-groups-chx').change(function () {

                if ($('#all-groups-chx').prop('checked')) {
                    $('#all-groups-slc').attr('disabled', 'disabled');
                } else {
                    $('#all-groups-slc').removeAttr('disabled');
                }
            });
            if ($('#all-groups-chx').prop('checked')) {
                $('#all-groups-slc').attr('disabled', 'disabled');
            } else {
                $('#all-groups-slc').removeAttr('disabled');
            }


            $('#exactLogin').change(function () {
                if ($('#exactLogin').prop('checked')) {
                    $("#from_login_li,#to_login_li").hide();
                    $("#login_li").show();
                } else {
                    $("#from_login_li,#to_login_li").show();
                    $("#login_li").hide();
                }
            });

            if ($('#exactLogin').prop('checked')) {
                $("#from_login_li,#to_login_li").hide();
                $("#login_li").show();
            } else {
                $("#from_login_li,#to_login_li").show();
                $("#login_li").hide();
            }

        });


        $('input[name="check_all"]').click(function () {
            if ($(this).prop("checked")) {
                $("input[name='users_checkbox[]']").prop("checked", true);
            } else {

                $("input[name='users_checkbox[]']").prop("checked", false);
            }
        });

    </script>
@stop
@extends('client.layouts.main')
@section('title', trans('reports::reports.accounts'))
@section('content')

    <div class="  theme-default page-mail" >
        <div class="mail-nav" >
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                <ul class="sections">
                    <li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('reports::reports.search') }} </a></li>
                    <li>
                        <div class="   nav-input-div">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                    <span class="lbl">{{ trans('reports::reports.ExactLogin') }}</span>
                                </label>
                            </div>
                        </div>
                    </li>
                    <li id="from_login_li" ><div  class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('reports::reports.FromLogin'),'class'=>'form-control input-sm']) !!}</div> </li>
                    <li  id="to_login_li"><div  class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('reports::reports.ToLogin'),'class'=>'form-control input-sm']) !!}</div></li>
                    <li id="login_li" ><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}</div></li>

                    <li><div  class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('reports::reports.Name'),'class'=>'form-control input-sm']) !!}</div></li>
                    <li><div  class=" nav-input-div  ">{!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}</div></li>


                    <li><div  class=" nav-input-div  ">
                            {!! Form::submit(trans('reports::reports.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div></li>
                    <li class="divider"></li>
                </ul>


                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}



            </div>
        </div>

        <div class="mail-container " >
            <div class="mail-container-header">
                {{ trans('reports::reports.accounts') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')



                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('reports::reports.accounts') }}


                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Name'), 'NAME', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Equity'), 'EQUITY', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Balance'), 'BALANCE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Margin'), 'MARGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.MarginFree'), 'MARGIN_FREE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.Leverage'), 'LEVERAGE', $oResults) !!}</th>
                            <th class="no-warp"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($oResults))
                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($oResults as $oResult)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                <tr class='{{ $class }}'>
                                    <td>{{ $oResult->LOGIN }}</td>
                                    <td>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</td>
                                    <td>{{ $oResult->NAME }}</td>
                                    <td>{{ $oResult->EQUITY }}</td>
                                    <td>{{ $oResult->BALANCE }}</td>
                                    <td>{{ $oResult->MARGIN }}</td>
                                    <td>{{ $oResult->MARGIN_FREE }}</td>
                                    <td>{{ $oResult->LEVERAGE }}</td>
                                    <td><a href="{{ route('clients.reports.accountStatement').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login" class="fa fa-file-text tooltip_number" data-original-title="{{trans('reports::reports.accountStatement')}}"></a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="table-footer">
                        @if (count($oResults))
                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}

                            @if($oResults->total()>25)
                                <div class="DT-lf-right change_page_all_div" >



                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}



                                    {!! Form::submit(trans('reports::reports.go'), ['class'=>'btn', 'name' => 'search']) !!}



                                </div>

                            @endif
                            <div class="col-sm-3">
                                <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults->total() }} {{trans('reports::reports.entries')}}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {!! Form::close() !!}
    <script>
        init.push(function () {

            $('.tooltip_number').tooltip();

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

    </script>
@stop
@extends('client.layouts.main')
@section('title', trans('accounts::accounts.mt4UsersList'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('accounts::accounts.mt4UsersList') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('accounts::accounts.accounts') }}</a></li>
                        <li class="active">{{ trans('accounts::accounts.mt4Users') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('user.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Kitchen Sink</h3>
                        <p class="text-muted m-b-20">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>


                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('accounts::accounts.Login'), 'LOGIN', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! trans('accounts::accounts.currency') !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('accounts::accounts.equity'), 'EQUITY', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('accounts::accounts.balance'), 'BALANCE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('accounts::accounts.last_date'), 'LASTDATE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('accounts::accounts.leverage'), 'LEVERAGE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">  </th>

                            </tr>
                            </thead>
                            <tbody>



                            @if (count($oResults))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}


                                    <tr>

                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ $oResult->NAME }}</td>
                                        <td> @if($oResult->currency){{ $oResult->currency->currency}} @endif </td>
                                        <td>{{ $oResult->EQUITY }}</td>
                                        <td>{{ $oResult->BALANCE }}</td>
                                        <td>{{ $oResult->LASTDATE }}</td>
                                        <td>1:{{ $oResult->LEVERAGE }}</td>
                                        <td>
                                            <a href="{{ route('clients.accounts.mt4UserDetails').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                               class="fa fa-file-text tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.mt4UserDetails')}}"></a>

                                            <a href="{{ route('clients.accounts.mt4Leverage').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                               class="fa fa-level-up tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.leverage')}}"></a>

                                            <a href="{{ route('clients.accounts.mt4ChangePassword').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                               class="fa fa-lock tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.changePassword')}}"></a>

                                            <a href="{{ route('clients.accounts.mt4InternalTransfer').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id}}"
                                               class="fa fa-retweet tooltip_number"
                                               data-original-title="{{ trans('accounts::accounts.internalTransfer') }}"
                                                    ></a>

                                            <a href="{{ route('client.accounts.withdrawal').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id}}"
                                               class="fa fa-external-link tooltip_number"
                                               data-original-title="{{ trans('accounts::accounts.withdrawal') }}"
                                                    ></a>

                                            <a href="{{ route('client.aaccounts.unssignUserFromMt4User').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}"
                                               onclick='if(!confirm("{{trans('accounts::accounts.are_you_sure')}}")) return false;'
                                               class="fa fa-unlink tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.un_assign')}}"></a>
                                        </td>


                                    </tr>



                                @endforeach
                              @endif

                            </tbody>
                        </table>


                        @if (count($oResults))
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Kitchen Sink</h3>
                        <p class="text-muted m-b-20">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>


                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('accounts::accounts.Login'), 'LOGIN', $oResults2) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults2) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! trans('accounts::accounts.currency') !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('accounts::accounts.equity'), 'EQUITY', $oResults2) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('accounts::accounts.balance'), 'BALANCE', $oResults2) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('accounts::accounts.last_date'), 'LASTDATE', $oResults2) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('accounts::accounts.leverage'), 'LEVERAGE', $oResults2) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">  </th>

                            </tr>
                            </thead>
                            <tbody>



                            @if (count($oResults2))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults2 as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}


                                    <tr>

                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ $oResult->NAME }}</td>
                                        <td> @if($oResult->currency){{ $oResult->currency->currency}} @endif </td>
                                        <td>{{ $oResult->EQUITY }}</td>
                                        <td>{{ $oResult->BALANCE }}</td>
                                        <td>{{ $oResult->LASTDATE }}</td>
                                        <td>1:{{ $oResult->LEVERAGE }}</td>
                                        <td>
                                            <a href="{{ route('clients.accounts.mt4UserDetails').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                               class="fa fa-file-text tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.mt4UserDetails')}}"></a>

                                            <a href="{{ route('clients.accounts.mt4Leverage').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                               class="fa fa-level-up tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.leverage')}}"></a>

                                            <a href="{{ route('clients.accounts.mt4ChangePassword').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                               class="fa fa-lock tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.changePassword')}}"></a>

                                            <a href="{{ route('clients.accounts.mt4InternalTransfer').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id}}"
                                               class="fa fa-retweet tooltip_number"
                                               data-original-title="{{ trans('accounts::accounts.internalTransfer') }}"
                                                    ></a>

                                            <a href="{{ route('client.accounts.withdrawal').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id}}"
                                               class="fa fa-external-link tooltip_number"
                                               data-original-title="{{ trans('accounts::accounts.withdrawal') }}"
                                                    ></a>

                                            <a href="{{ route('client.aaccounts.unssignUserFromMt4User').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}"
                                               onclick='if(!confirm("{{trans('accounts::accounts.are_you_sure')}}")) return false;'
                                               class="fa fa-unlink tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.un_assign')}}"></a>
                                        </td>


                                    </tr>



                                @endforeach
                            @endif

                            </tbody>
                        </table>


                        @if (count($oResults2))
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults2->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults2->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults2->total() }} {{trans('accounts::accounts.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults2->appends(Input::except('second_page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->
@stop

@section('hidden')

        <div class="theme-default page-mail ">

            <div class="mail-container page-left">
                <div class="mail-container-header">
                    {{ trans('accounts::accounts.mt4_users_lists') }}
                </div>
                <div class="center_page_all_div">
                    @include('client.partials.messages')

                    <div class="table-light">
                        <div class="table-header">
                            <div class="table-caption">
                                {{ trans('accounts::accounts.mt4Users') }}
                            </div>
                        </div>

                        <div class="primary_table_div info">
                            <div class="table">


                                <div class="thead">
                                    <div class="tr">

                                        <div class="th">{!! th_sort(trans('accounts::accounts.Login'), 'LOGIN', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</div>
                                        <div class="th">{!! trans('accounts::accounts.currency') !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.equity'), 'EQUITY', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.balance'), 'BALANCE', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.last_date'), 'LASTDATE', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.leverage'), 'LEVERAGE', $oResults) !!}</div>
                                        <div class="th"></div>


                                    </div>
                                </div>


                                <div class="tbody">


                                    @if (count($oResults))
                                        {{-- */$i=0;/* --}}
                                        {{-- */$class='';/* --}}
                                        @foreach($oResults as $oResult)
                                            {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                            <div class="tr {{ $class }}">


                                                <div class="td"><label>{!! trans('accounts::accounts.Login') !!} :</label><p>{{ $oResult->LOGIN }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.Name') !!} :</label><p>{{ $oResult->NAME }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.currency') !!} :</label><p>@if($oResult->currency){{ $oResult->currency->currency}} @endif</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.equity') !!} :</label><p>{{ $oResult->EQUITY }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.balance') !!} :</label><p>{{ $oResult->BALANCE }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.last_date') !!}:</label><p>{{ $oResult->LASTDATE }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.leverage') !!}:</label><p>1:{{ $oResult->LEVERAGE }}</p></div>
                                                <div class="td">
                                                    <a href="{{ route('clients.accounts.mt4UserDetails').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                                       class="fa fa-file-text tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.mt4UserDetails')}}"></a>

                                                    <a href="{{ route('clients.accounts.mt4Leverage').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                                       class="fa fa-level-up tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.leverage')}}"></a>

                                                    <a href="{{ route('clients.accounts.mt4ChangePassword').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                                       class="fa fa-lock tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.changePassword')}}"></a>

                                                    <a href="{{ route('clients.accounts.mt4InternalTransfer').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id}}"
                                                       class="fa fa-retweet tooltip_number"
                                                       data-original-title="{{ trans('accounts::accounts.internalTransfer') }}"
                                                            ></a>

                                                    <a href="{{ route('client.accounts.withdrawal').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id}}"
                                                       class="fa fa-external-link tooltip_number"
                                                       data-original-title="{{ trans('accounts::accounts.withdrawal') }}"
                                                            ></a>

                                                    <a href="{{ route('client.aaccounts.unssignUserFromMt4User').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}"
                                                       onclick='if(!confirm("{{trans('accounts::accounts.are_you_sure')}}")) return false;'
                                                       class="fa fa-unlink tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.un_assign')}}"></a>
                                                </div>


                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tableFooter">

                            </div>
                        </div>

                        <div class="table-footer ">

                            @if (count($oResults))
                                {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                @if($oResults->total()>25)
                                    <div class="DT-lf-right change_page_all_div">

                                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}

                                        {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                                    </div>
                                @endif
                                <div class="col-xs-12 col-lg-3">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="table-light">
                        <div class="table-header">
                            <div class="table-caption">
                                {{config('fxweb.demoServerName')}} - {{ trans('accounts::accounts.mt4Users') }}
                                @if(!$denyLiveAccount)
                                    <a href="{{ route('client.accounts.mt4DemoAccount') }}" style="float:right;">
                                        <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                               value="{{ trans('accounts::accounts.addDemoAccount') }}"> </a>
                                @endif
                            </div>
                        </div>

                        <div class="primary_table_div info">
                            <div class="table">


                                <div class="thead">
                                    <div class="tr">

                                        <div class="th">{!! th_sort(trans('accounts::accounts.Login'), 'LOGIN', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</div>
                                        <div class="th">{!! trans('accounts::accounts.currency') !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.equity'), 'EQUITY', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.balance'), 'BALANCE', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.last_date'), 'LASTDATE', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.leverage'), 'LEVERAGE', $oResults) !!}</div>
                                        <div class="th"></div>


                                    </div>
                                </div>


                                <div class="tbody">


                                    @if (count($oResults2))
                                        {{-- */$i=0;/* --}}
                                        {{-- */$class='';/* --}}
                                        @foreach($oResults2 as $oResult)
                                            {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                            <div class="tr {{ $class }}">


                                                <div class="td"><label>{!! trans('accounts::accounts.Login') !!} :</label>

                                                    <p>{{ $oResult->LOGIN }}</div>

                                                <div class="td">
                                                    <label>{!! trans('accounts::accounts.Name') !!} :</label>

                                                    <p>{{ $oResult->NAME }}</div>
                                                <div class="td"><label>{!! trans('accounts::accounts.currency') !!} :</label><p>@if($oResult->currency){{ $oResult->currency->currency}} @endif</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.equity') !!} :</label>

                                                    <p>{{ $oResult->EQUITY }}</div>
                                                <div class="td"><label>{!! trans('accounts::accounts.balance') !!} :</label>

                                                    <p>{{ $oResult->BALANCE }}</div>
                                                <div class="td"><label>{!! trans('accounts::accounts.last_date') !!}
                                                        :</label>

                                                    <p>{{ $oResult->LASTDATE }}</div>
                                                <div class="td"><label>{!! trans('accounts::accounts.leverage') !!}
                                                        :</label>

                                                    <p>1:{{ $oResult->LEVERAGE }}</div>
                                                <div class="td">
                                                    <a href="{{ route('clients.accounts.mt4UserDetails').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                                       class="fa fa-file-text tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.mt4UserDetails')}}"></a>

                                                    <a href="{{ route('clients.accounts.mt4Leverage').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                                       class="fa fa-level-up tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.leverage')}}"></a>

                                                    <a href="{{ route('clients.accounts.mt4ChangePassword').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                                       class="fa fa-lock tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.changePassword')}}"></a>

                                                    <a href="{{ route('clients.accounts.mt4InternalTransfer').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id}}"
                                                       class="fa fa-retweet tooltip_number"
                                                       data-original-title="{{ trans('accounts::accounts.internalTransfer') }}"
                                                            ></a>

                                                    <a href="{{ route('client.accounts.withdrawal').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id}}"
                                                       class="fa fa-external-link tooltip_number"
                                                       data-original-title="{{ trans('accounts::accounts.withdrawal') }}"
                                                            ></a>

                                                    <a href="{{ route('client.aaccounts.unssignUserFromMt4User').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}"
                                                       onclick='if(!confirm("{{trans('accounts::accounts.are_you_sure')}}")) return false;'
                                                       class="fa fa-unlink tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.un_assign')}}"></a>
                                                </div>


                                            </div>
                                        @endforeach
                                    @endif


                                </div>


                            </div>

                            <div class="tableFooter">

                            </div>
                        </div>

                        <div class="table-footer ">

                            @if (count($oResults2))
                                {!! str_replace('/?', '?', $oResults->appends(Input::except('second_page'))->appends($aFilterParams)->render()) !!}
                                @if($oResults2->total()>25)
                                    <div class="DT-lf-right change_page_all_div">

                                        {!! Form::text('page',$oResults2->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}

                                        {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                                    </div>
                                @endif
                                <div class="col-sm-3">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults2->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults2->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults2->total() }} {{trans('accounts::accounts.entries')}}</span>
                                </div>
                            @endif
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
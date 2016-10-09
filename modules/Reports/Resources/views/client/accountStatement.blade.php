@extends('client.layouts.main')
@section('title', trans('reports::reports.accounts'))
@section('content')

    <div class="theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                <ul class="sections">
                    <li class="active"><a href="#"> <i class="fa fa-search"></i> Search </a></li>

                    <li>
                        <div class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}</div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">

                            <div class="input-group date datepicker-warpper">
                                {!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('reports::reports.FromDate'),'class'=>'form-control input-sm']) !!}
                                <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </div>
                        </div>
                    </li>


                    <li>
                        <div class=" nav-input-div  ">
                            <div class="input-group date datepicker-warpper">
                                {!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('reports::reports.ToDate'),'class'=>'form-control input-sm']) !!}
                                <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </div>
                        </div>
                    </li>

                    <li>
                    <li><div  class=" nav-input-div  ">{!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}</div></li>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('reports::reports.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>


                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}
                {!! Form::close() !!}


            </div>
        </div>

        <div class="mail-container ">
            <div class="mail-container-header">
                {{ trans('reports::reports.accounts') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')


                @if (count($oResults))
                    <div class="stat-panel no-margin-b">
                        <div class="stat-row">
                            <div class="stat-counters bg-panel no-padding text-center">
                                <div class="stat-cell-account col-xs-4 padding-xs-vr">
                                    <span class="text-xs">{{ trans('reports::reports.account') }}{{ $oResults->LOGIN }} </span>
                                </div>
                                <div class="stat-cell-account col-xs-4 padding-xs-vr">
                                    <span class="text-xs">{{ trans('reports::reports.name') }}{{ $oResults->NAME }}  </span>
                                </div>
                                <div class="stat-cell-account col-xs-4 padding-xs-vr">
                                    <span class="text-xs">{{ trans('reports::reports.leverage') }}{{ $oResults->LEVERAGE }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="padding-xs-vr"></div>

                <!-- _____________open _  order___________________-->
                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('reports::reports.OpenOrders') }}

                        </div>
                    </div>


                    <div class="primary_table_div info" >
                        <div class="table">


                            <div class="thead">
                                <div class="tr">



                                    <div class="th">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.type'), 'CMD', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.SL'), 'SL', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.TP'), 'TP', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oOpenResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oOpenResults) !!}</div>



                                </div>
                            </div>


                            <div class="tbody">




                                @if (count($oOpenResults))
                                    {{-- */$i=0;/* --}}
                                    {{-- */$class='';/* --}}
                                    @foreach($oOpenResults as $oResult)
                                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                        <div class="tr {{ $class }}">




                                            <div class="td"><label>{!! trans('reports::reports.order#') !!} : </label><p>{{ $oResult->TICKET }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.Login') !!} : </label><p>{{ $oResult->LOGIN }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.liveDemo') !!} : </label><p>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.symbol') !!} : </label><p>{{ $oResult->SYMBOL }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.type') !!} : </label><p>{{ $oResult->TYPE }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.lots') !!} : </label><p>{{ $oResult->VOLUME }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.open_time') !!} : </label><p>{{ $oResult->OPEN_TIME }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.open_Price') !!} : </label><p>{{ $oResult->OPEN_PRICE }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.SL') !!} : </label><p>{{ $oResult->SL }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.TP') !!} : </label><p>{{ $oResult->TP }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.Commission') !!} : </label><p>{{ $oResult->COMMISSION }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.swaps') !!} : </label><p>{{ $oResult->SWAPS }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.price') !!} : </label><p>{{ $oResult->CLOSE_PRICE }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.profit') !!} : </label><p>{{ $oResult->PROFIT }}</p></div>




                                        </div>
                                    @endforeach
                                @endif




                            </div>







                        </div>

                        <div class="tableFooter">

                        </div>
                    </div>



                    <div class="table-footer">

                    </div>
                </div>

                <!-- ___________________close_order______________-->


                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('reports::reports.ClosedOrders') }}


                        </div>
                    </div>




                    <div class="primary_table_div info" >
                        <div class="table">


                            <div class="thead">
                                <div class="tr">



                                    <div class="th">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.type'), 'CMD', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.open_time'), 'open_time', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.open_Price'), 'OPEN_PRICE', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.SL'), 'SL', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.TP'), 'TP', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.swaps'), 'SWAPS', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.price'), 'CLOSE_PRICE', $oCloseResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('reports::reports.profit'), 'PROFIT', $oCloseResults) !!}</div>



                                </div>
                            </div>


                            <div class="tbody">




                                @if (count($oCloseResults))
                                    {{-- */$i=0;/* --}}
                                    {{-- */$class='';/* --}}
                                    @foreach($oCloseResults as $oResult)
                                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                        <div class="tr {{ $class }}">




                                            <div class="td"><label>{!! trans('reports::reports.order#') !!} : </label><p>{{ $oResult->TICKET }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.Login') !!} : </label><p>{{ $oResult->LOGIN }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.liveDemo') !!} : </label><p>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.symbol') !!} : </label><p>{{ $oResult->SYMBOL }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.type') !!} : </label><p>{{ $oResult->TYPE }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.lots') !!} : </label><p>{{ $oResult->VOLUME }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.open_time') !!} : </label><p>{{ $oResult->OPEN_TIME }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.open_Price') !!} : </label><p>{{ $oResult->OPEN_PRICE }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.SL') !!} : </label><p>{{ $oResult->SL }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.TP') !!} : </label><p>{{ $oResult->TP }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.Commission') !!} : </label><p>{{ $oResult->COMMISSION }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.swaps') !!} : </label><p>{{ $oResult->SWAPS }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.price') !!} : </label><p>{{ $oResult->CLOSE_PRICE }}</p></div>
                                            <div class="td"><label>{!! trans('reports::reports.profit') !!} : </label><p>{{ $oResult->PROFIT }}</p></div>




                                        </div>
                                    @endforeach
                                @endif




                            </div>







                        </div>

                        <div class="tableFooter">

                        </div>
                    </div>







                    <div class="table-footer text-center">

                    </div>
                </div>

                <!-- ___________________________footer_summery_____________-->
                @if (count($oResults))



                    <div class="panel-body " id="mt4StatementListAllDiv">

                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.registration_date') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->REGDATE }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.meta_quotes_id') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->MQID }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>


                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.name') }} </label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->NAME }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.phone_password :') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->MQID }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>


                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.state :') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->STATE }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.country') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->COUNTRY }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>


                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.address :') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->ADDRESS }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.zip_code') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->ZIPCODE }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.phone') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->PHONE }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.email') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->EMAIL }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.id_number :') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->ID }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.status :') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->STATUS }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.leverage :') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->LAVARGE }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.tax') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->TAXES }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.deposit_withdrawal') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $aSummery['deposit'] }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.credit_facility') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $aSummery['credit_facility'] }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.closed_trade') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $aSummery['closed_trade'] }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.floating') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $aSummery['floating'] }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.margin :') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->MARGIN }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.balance :') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->BALANCE }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>


                        <div class="row">
                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.equity :') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ $oResults->EQUITY }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->

                            <div class="col-xs-4 col-sm-2 text-right">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.free_margin') }}</label>
                                </div>
                            </div>
                            <!-- ol-sm-6 -->
                            <div class="col-xs-8 col-sm-4 text-left">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{  $oResults->MARGIN_FREE }}</label>
                                </div>
                            </div>
                            <!--ol-sm-6 -->
                        </div>

                    </div>

                    <table class="table table-bordered user-info-table " id="mt4StatementTable">
                        <tr>
                            <th colspan="3">{{ trans('accounts::accounts.registration_date') }} </th>
                            <td>{{ $oResults->REGDATE }}</td>
                            <th>{{ trans('accounts::accounts.meta_quotes_id') }} </th>
                            <td>{{ $oResults->MQID }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('accounts::accounts.name') }} </th>
                            <td colspan="3">{{ $oResults->NAME }}</td>
                            <th>{{ trans('accounts::accounts.phone_password :') }} </th>
                            <td>{{ $oResults->PASSWORD_PHONE }}</td>
                        </tr>
                        <tr>

                            <th>{{ trans('accounts::accounts.state :') }} </th>
                            <td>{{ $oResults->STATE }}</td>
                            <th>{{ trans('accounts::accounts.country') }} </th>
                            <td>{{ $oResults->COUNTRY }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('accounts::accounts.address :') }} </th>
                            <td colspan="3">{{ $oResults->ADDRESS }}</td>
                            <th>{{ trans('accounts::accounts.zip_code') }} </th>
                            <td>{{ $oResults->ZIPCODE }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('accounts::accounts.phone') }} </th>
                            <td>{{ $oResults->PHONE }}</td>
                            <th>{{ trans('accounts::accounts.email') }}</th>
                            <td colspan="3">{{ $oResults->EMAIL }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('accounts::accounts.id_number :') }} </th>
                            <td>{{ $oResults->ID }}</td>
                            <th>{{ trans('accounts::accounts.status :') }} </th>
                            <td>{{ $oResults->STATUS }}</td>
                            <th>{{ trans('accounts::accounts.leverage :') }}</th>
                            <td>{{ $oResults->LEVERAGE }}</td>
                        </tr>

                        <tr>

                            <th>{{ trans('accounts::accounts.tax') }} </th>
                            <td>{{ $oResults->TAXES }}%</td>
                            <th class="no-warp">{{ trans('accounts::accounts.deposit_withdrawal') }}</th>
                            <td>{{ $aSummery['deposit'] }}</td>
                            <th class="no-warp">{{ trans('accounts::accounts.credit_facility') }}</th>
                            <td>{{ $aSummery['credit_facility'] }}</td>
                        </tr>

                        <tr>
                            <th class="no-warp">{{ trans('accounts::accounts.closed_trade') }} </th>
                            <td>{{ $aSummery['closed_trade'] }}</td>
                            <th class="no-warp">{{ trans('accounts::accounts.floating') }} </th>
                            <td>{{ $aSummery['floating'] }}</td>
                            <th class="no-warp">{{ trans('accounts::accounts.margin :') }} </th>
                            <td>{{ $oResults->MARGIN }}</td>
                        </tr>
                        <tr>
                            <th class="no-warp">{{ trans('accounts::accounts.balance :') }} </th>
                            <td>{{ $oResults->BALANCE }}</td>
                            <th class="no-warp">{{ trans('accounts::accounts.equity :') }} </th>
                            <td>{{ $oResults->EQUITY }}</td>
                            <th class="no-warp">{{ trans('accounts::accounts.free_margin') }} </th>
                            <td>{{ $oResults->MARGIN_FREE }}</td>
                        </tr>
                    </table>




                    @endif
                            <!--______________tables__________-->
            </div>
        </div>
    </div>
    </div>
    <script>
        init.push(function () {
            var options = {
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto',
                format: "yyyy-mm-dd"
            }
            $('.datepicker-warpper').datepicker(options);


        });
    </script>
@stop
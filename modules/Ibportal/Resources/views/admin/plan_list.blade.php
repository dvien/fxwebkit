@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.plan'))
@section('content')

    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}


                <ul class="sections">
                    <li class="active"><a href="#"> <i
                                    class="fa fa-search"></i> {{ trans('ibportal::ibportal.search') }} </a></li>


                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('ibportal::ibportal.plan'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>
                {!! Form::close() !!}

            </div>
        </div>

        <div class="mail-container ">

            <div class="mail-container-header">
                {{ trans('ibportal::ibportal.plan') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">

                            {{ trans('ibportal::ibportal.plan') }}
                            <a href="{{ route('admin.ibportal.addPlan') }}" style="float:right;">
                                <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                       value="{{ trans('ibportal::ibportal.addPlan') }}"> </a>

                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.name'), 'name', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.type'), 'type', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.public'), 'Public', $oResults) !!}</th>
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
                                    <td>{{ $oResult->name }}</td>
                                    <td>{{ $oResult->type }}</td>
                                    <td>@if($oResult->public) {{trans('ibportal::ibportal.public') }}@endif </td>
                                    <td>
                                        <a href="{{ route('admin.ibportal.editPlan').'?edit_id='.$oResult->id }}"
                                           class="fa fa-edit tooltip_number" data-original-title="{{trans('ibportal::ibportal.editPlan')}}"></a>
                                        <a href="{{ route('admin.ibportal.deletePlan').'?delete_id='.$oResult->id }}"
                                           class="fa fa-trash-o tooltip_number" data-original-title="{{trans('ibportal::ibportal.deletePlan')}}"></a>
                                        <a href="{{ route('admin.ibportal.detailPlan').'?edit_id='.$oResult->id }}"
                                           class="fa fa-file-text tooltip_number" data-original-title="{{trans('ibportal::ibportal.detailPlan')}}"></a>
                                        @if(!$oResult->public)
                                        <a href="{{ route('admin.ibportal.assignPlan').'?planId='.$oResult->id }}"
                                           class="fa fa-link tooltip_number" data-original-title="{{trans('ibportal::ibportal.assignPlan')}}"></a>
                                            @endif

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="table-footer">


                        @if (count($oResults))

                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}
                            @if($oResults->total()>25)

                                <div class="DT-lf-right change_page_all_div">

                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}

                                    {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                                </div>
                            @endif

                            <div class="col-sm-3">
                                <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>


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
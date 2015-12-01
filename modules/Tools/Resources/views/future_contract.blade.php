@extends('admin.layouts.main')
@section('title', trans('tools::tools.tools'))
@section('content')
<style type="text/css">
    #content-wrapper{ padding: 0px; margin: 0px;}
    .nav-input-div{padding:7px;}
    .mail-container-header{
        border-bottom: 1px solid #ccc;
        margin-bottom: 7px;
        padding: 5px !important;
    }
    .theme-default .page-mail{ overflow: visible;height: auto; min-height: 800px;}
    .center_page_all_div{ padding: 0px 10px;}
    .mail-nav .navigation{margin-top: 35px;}
</style>
<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections">
                <li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('accounts::accounts.search') }} </a></li>
                
                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('tools::tools.id'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('tools::tools.name'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('symbol', $aFilterParams['symbol'], ['placeholder'=>trans('tools::tools.symbol'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li>
                    <div  class=" nav-input-div  ">
                        {!! Form::text('exchange', $aFilterParams['exchange'], ['placeholder'=>trans('tools::tools.exchange'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
              

                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>


            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
         


        </div>
    </div>

    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('tools::tools.tools') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')

            <div class="table-info">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('tools::tools.future-contract') }}  
                        <a href="{{ route('tools.addContract') }}" style="float:right;">
                            <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button" value="{{ trans('tools::tools.addContract') }}"> </a>
                   </div>
                    
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.id'), 'id', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.name'), 'name', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.symbol'), 'symbol', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.exchange'), 'exchange', $oResults) !!}</th>
                             <th class="no-warp">{!! th_sort(trans('tools::tools.month'), 'month', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.year'), 'year', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.start_date'), 'start_date', $oResults) !!}</th>
                              <th class="no-warp">{!! th_sort(trans('tools::tools.expiry_date'), 'expiry_date', $oResults) !!}</th>

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
                         
                            <td>{!! Form::checkbox('users_checkbox[]',$oResult->LOGIN,false,['class'=>'users_checkbox']) !!}{{ $oResult->id }}</td>
                            <td>{{ $oResult->name }}</td>
                            <td>{{ $oResult->symbol }}</td>
                            <td>{{ $oResult->exchange }}</td>
                            <td>{{date('F', mktime(0, 0, 0, $oResult->month, 10))}}</td>
                            <td>{{ $oResult->year }}</td>
                            <td>{{ $oResult->start_date }}</td>
                            <td>{{ $oResult->expiry_date }}</td>
                            
                             <td>
                                <a href="{{ route('tools.editContract').'?edit_id='.$oResult->id}}" class="fa fa-edit"></a>
                                <a href="{{ route('tools.deleteContract').'?delete_id='.$oResult->id }}" class="fa fa-trash-o"></a>
                               
                            </td>
                         
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="table-footer text-right">
                    @if (count($oResults))
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                   @if($oResults->total()>25)
                    
                    <div class="DT-lf-right change_page_all_div" >
                  
                           
                              
                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}                 
                    
                            
                               
                                    {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                               
                            
                   
                    </div>
                   @endif
                    
                    <div class="col-sm-3  padding-xs-vr">
                        <span class="text-xs">Showing {{ $oResults->firstItem() }} to {{ $oResults->lastItem() }} of {{ $oResults->total() }} entries</span>
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
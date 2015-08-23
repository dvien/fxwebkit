@extends(Config::get('cms.admin_theme'))

@section('content')

{!! Form::open(['url'=>asset('cms/customHtml/custom-html'),'method'=>'get','class'=>'panel form-horizontal']) !!}
<div class="panel-heading">
    <span class="panel-title">new article </span>
</div>
<div class="panel-body">
    {!! Form::submit('create new article',["name"=>'new_article_submit','class'=>'btn btn-primary' ]) !!}
</div>
{!! Form::close() !!}



<div class="table-info">
    <div class="table-header">
        <div class="table-caption">

           web site pages list
        </div>
    </div>
    {!! Form::open(['url'=>asset('cms/customHtml/custom-html')]) !!}
        <table border="0" class="table table-bordered">
            <thead>
            <th>id</th>
            <th>title</th>
            <th></th>
            </thead>
            <tbody>
                @foreach($customHtmls as $key=>$customHtml)
                <tr>
                    <td >{{ $key }}</td>
                    <td >{{ $customHtml }}</td>
                
                    
                    <td>
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_customHtml_submit' ,'class'=>'icon_button red_icon','type'=>'submit','value'=>$key ]) !!}
                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_customHtml_page' ,'class'=>'icon_button blue_icon','type'=>'submit','value'=>$key ]) !!}
                    </td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}
</div>

<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_custmHtmlList.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
@stop
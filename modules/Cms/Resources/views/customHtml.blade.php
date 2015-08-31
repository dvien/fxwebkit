@extends(Config::get('cms.admin_theme'))

@section('content') 

	<div class="page-header">
		<h1>{{ trans('cms::cms.newCustomHTML') }}</h1>
	</div>


{!! Form::open(['url'=>asset('cms/customHtml/insert-edit-custom-html'),'class'=>'panel form-horizontal']) !!}
                <div class="panel-heading">
                    <span class="panel-title">custom HTML </span>
                </div>
                <div class="panel-body">
                    {!! Form::text('title',(isset($edit_customHtml->title))?  $edit_customHtml->title:'',['id'=>'title','placeholder'=>'title','class'=>'form-control ']) !!}
                    {!! Form::textarea('editor1',(isset($edit_customHtml->body))?  $edit_customHtml->body:'',['id'=>'editor1','placeholder'=>'title']) !!}
                    {!! Form::hidden('customHtml_id' ,$selected_id) !!}
                    
                    {!! Form::submit('insert new custom Html',["name"=>'insert_customHtml_submit','id'=>'insert_customHtml_submit','class'=>'btn btn-primary' ]) !!}
                    
                    @if($selected_id > 0) 
                    {!! Form::hidden('edit_customHtml_id',$selected_id) !!}
                    {!! Form::submit('save edits',["name"=>'edit_customHtml_submit','id'=>'edit_customHtml_submit','class'=>'btn btn-primary' ]) !!}
                    
                    @endif
                    
             @if($errors->any())
                        <div class="alert alert-danger alert-dark">
                            @foreach($errors->all() as $key=>$error)
                            <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
                            @endforeach
                        </div>
                        @endif
                </div>
{!! Form::close() !!}



<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_customHtml.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'ckeditor/ckeditor.js') }}"></script>
<script>
//CKEDITOR.replace( textarea );
CKEDITOR.replace('editor1', {
    filebrowserBrowseUrl:" {{ asset('/cms/articles/file-browser') }}",
    filebrowserUploadUrl: "{{ asset('/cms/articles/upload-image' ).'?_token='. csrf_token() }}"
});

</script>

@stop
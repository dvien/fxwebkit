@extends(Config::get('cms.admin_theme'))

@section('content')
    <div id="content-wrapper">
<div class="page-header">
    <h1>{{ trans('cms::cms.newForms') }}</h1>
    @if($selected_id>0)               
    {!! Form::open(['url'=>asset('/cms/forms/forms'),'class'=>'language_select_form']) !!}
    {!! Form::hidden('form_id',$selected_id) !!}
    {!! Form::select('selected_language',$languages,$selected_language,['class'=>'language_select']) !!}
    {!! Form::submit(trans('cms::cms.translate'),["name"=>'select_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}

    {!! Form::close() !!}
    @endif
</div>


@if($selected_language == 1)
{!! Form::open(['url'=>asset('/cms/forms/insert-edit-form'),'class'=>'panel form-horizontal']) !!}
<div class="panel-heading">
    <span class="panel-title">{{ trans('cms::cms.form') }} </span>
</div>
<div class="panel-body">
    {!! Form::text('name',(isset($edit_form->name))?  $edit_form->name:'',['id'=>'name','placeholder'=>trans('cms::cms.name'),'class'=>'form-control ']) !!}
    {!! Form::hidden('form_id' ,$selected_id) !!}




    @if($errors->any())
    <div class="alert alert-danger alert-dark">
        @foreach($errors->all() as $key=>$error)
        <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
        @endforeach
    </div>
    @endif
</div>

<div class="panel-footer">

    <div style="width:250px;display: inline-block; ">
        {!! Form::select('page_id',$pages,(isset($edit_form->page_id))?  $edit_form->page_id:0 ) !!}
    </div>

    {!! Form::submit(trans('cms::cms.insert_new_form'),["name"=>'insert_form_submit','id'=>'insert_form_submit','class'=>'btn btn-primary' ]) !!}

    @if($selected_id > 0)
        {!! Form::hidden('edit_form_id',$selected_id) !!}
        {!! Form::submit(trans('cms::cms.save_edits'),["name"=>'edit_form_submit','id'=>'edit_form_submit','class'=>'btn btn-primary' ]) !!}

    @endif
</div>
{!! Form::close() !!}
@else
{!! Form::open(['url'=>asset('/cms/forms/save-form-translate'),'class'=>'panel form-horizontal']) !!}
<div class="panel-heading">
    <span class="panel-title">{{ trans('cms::cms.form') }} </span>
</div>
<div class="panel-body">
    {!! Form::text('title',(isset($edit_form->title))?  $edit_form->title:'',['id'=>'title','placeholder'=>trans('cms::cms.title') ,'class'=>'form-control ']) !!}
    {!! Form::textarea('editor1',(isset($edit_form->body))?  $edit_form->body:'',['id'=>'editor1','placeholder'=>'title']) !!}
    {!! Form::hidden('form_id' ,$selected_id) !!}
    {!! Form::hidden('selected_language' ,$selected_language) !!}
    {!! Form::submit('save translate',["name"=>'edit_form_submit','id'=>'edit_form_submit','class'=>'btn btn-primary' ]) !!}


</div>
        </div>
{!! Form::close() !!}
@endif


<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_forms.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset($asset_folder.'cms_forms.js') }}"></script>
<script>
//CKEDITOR.replace( textarea );
CKEDITOR.replace('editor1', {
    filebrowserBrowseUrl: " {{ asset('/cms/forms/file-browser') }}",
    filebrowserUploadUrl: "{{ asset('/cms/forms/upload-image' ).'?_token='. csrf_token() }}"
});
init.push(function () {
    // Single select
    $("select[name='page_id']").select2({
        allowClear: true,
        placeholder: "select page"
    });


});
</script>

@stop
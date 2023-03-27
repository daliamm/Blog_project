@extends('layouts.app')

@section('admin_content')

                
                <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                
    <script>  tinymce.init({  selector: '#mytextarea',  menubar:false});
    </script>
    <div class="card-header">{{ __('Add a Blog') }}</div>

    <div class="card-body">
    <form enctype="multipart/form-data" class="form-horizontal" action="{{url('/admin/store')}}" method="post">
        {{ csrf_field() }}    
        <div class="form-group">
            <input class="form-control" type="text" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <textarea name="body" id="mytextarea">Text</textarea>
        </div>
        <div class="form-group">
            <input class="form-control" type="file" name="thumbnail" accept="image/*" />
        </div>
        <div class="form-group">
            <input class="btn btn-success" type="submit" value="post"/>
        </div>
        </form>
    </div>
           
@endsection

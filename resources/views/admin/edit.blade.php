@extends('layouts.app')

@section('admin_content')     
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>  tinymce.init({  selector: '#mytextarea',
    menubar:false   });</script>
    <div class="card-header">{{ __('UpDate a Blog') }}</div>
                <div class="card-body">
                <form  enctype="multipart/form-data" class="form-horizontal"  action="{{url('/admin/update/'.$article->id)}}" method="post">
                {{csrf_field()}} 
                <input type="hidden" name="_method " value="PUT"/> 
                <div class="form-group">
                    <input type="text" name="title" placeholder="Title" class="form-control" value="{{$article-> title}}">
                </div>
                <div class="form-group">
                    <textarea name="body" id="mytextarea">{{$article->body}}</textarea>
                </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12"><img width="100%" class="bd-placeholder-img card-img-top" src="{{url('uploads/'.$article->thumbnail)}}"/></div>
                    <div class="col-md-12"><input class="form-control" type="file" name="thumbnail" accept="image/*" /></div>
                </div>
<!-- <input class="form-control" type="file" name="thumbnail" accept="image/*" > -->
</div>

<div class="form-group"> 
      <input  class="btn btn-success" type="submit" value="UpDate">
</div>

</form>                    
</div>
           
@endsection

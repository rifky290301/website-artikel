@extends('admin.layout.app')

@section('script-or-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.tiny.cloud/1/g556owebzva5ilvjh4vbddn8xnipvn7mrc9hcbib1vglssoi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit post</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit post</h6>
  </div>
  <div class="card-body">
    <form action="/admin/artikel/{{ $post->id }}" method="post" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <div class="form-group">
        <label for="author">Penulis<span class="required-star">*</span></label>
        <input value="{{ $post->author }}" name="author" type="author" class="@error('author') is-invalid @enderror form-control" id="author" placeholder="penulis...">
      </div>
      <div class="form-group">
        <label for="title">Judul<span class="required-star">*</span></label>
        <input value="{{ $post->title }}" name="title" type="title" class="@error('author') is-invalid @enderror form-control" id="title" placeholder="penulis...">
      </div>
      <div class="form-group">
        <label for="content">Konten<span class="required-star">*</span></label>
        <textarea name="content" id="content" rows="3">{{ $post->content }}</textarea>
      </div>
      <div class="form-group">
        <label for="image">Gambar<span class="required-star">*</span></label>
        <div class="custom-file">
          <input name="thumbnail" type="file" class="custom-file-input "@error('author') is-invalid @enderror" id="image" aria-describedby="inputGroupFileAddon01" onChange="mainThamUrl(this)">
          <label class="custom-file-label" for="image">Choose file</label>
        </div>
        <img class="mt-3" src="{{ asset("upload/post/$post->thumbnail") }}" id="mainThmb">
      </div>
      <div class="form-group">
        <label for="category">Kategori<span class="required-star">*</span></label>
        <select name="category_id" class="@error('author') is-invalid @enderror form-control" id="category">
          <option value="" selected disabled>--kategori--</option>
          @foreach ($categories as $item)
          <option value="{{ $item->id }}" {{ $item->id == $post->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="tags">Tag</label>
        <select name="tags[]" class="form-control select2" id="tags" multiple="multiple">
          @foreach ($post->tags as $item)
          <option selected value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
          @foreach ($tags as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="status">Status<span class="required-star">*</span></label>
        <select name="status" class="@error('author') is-invalid @enderror form-control" id="status">
          <option value="publish">PUBLISHED</option>
          <option value="draft">DRAFT</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
function mainThamUrl(input){
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e){
      $('#mainThmb').attr('src', e.target.result).width(100).height(100);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

tinymce.init({
  selector: 'textarea#content',
});

$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
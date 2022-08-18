@extends('admin.layout.app')

@section('script-or-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.tiny.cloud/1/g556owebzva5ilvjh4vbddn8xnipvn7mrc9hcbib1vglssoi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Buat artikel</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Buat artikel</h6>
  </div>
  <div class="card-body">
    <form action="/admin/artikel" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="author">Penulis<span class="required-star">*</span></label>
        <input name="author" value="{{ old('author') }}" type="text" class="@error('author') is-invalid @enderror form-control" id="author" placeholder="penulis...">
      </div>
      <div class="form-group">
        <label for="title">Judul<span class="required-star">*</span></label>
        <input name="title" value="{{ old('title') }}" type="text" class="@error('title') is-invalid @enderror form-control" id="title" placeholder="penulis...">
      </div>
      <div class="form-group">
        <label for="content">Konten<span class="required-star">*</span></label>
        <textarea name="content" id="content" rows="3">{{ old('content') }}</textarea>
      </div>
      <div class="form-group">
        <label for="image">Gambar<span class="required-star">*</span></label>
        <div class="custom-file">
          <input name="thumbnail" type="file" class="@error('thumbnail') is-invalid @enderror custom-file-input" id="image" aria-describedby="inputGroupFileAddon01" onChange="mainThamUrl(this)">
          <label class="custom-file-label" for="image">Choose file</label>
        </div>
        <img class="mt-3" src="" id="mainThmb">
      </div>
      <div class="form-group">
        <label for="category">Kategori<span class="required-star">*</span></label>
        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category">
          <option disabled selected>--kategori--</option>
          @foreach ($categories as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="tags">Tag</label>
        <select name="tags[]" class="form-control select2" id="tags" multiple="multiple">
          @foreach ($tags as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="status">Status<span class="required-star">*</span></label>
        <select name="status" class="@error('author') is-invalid @enderror form-control" id="status">
          <option value="" selected disabled>--status--</option>
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
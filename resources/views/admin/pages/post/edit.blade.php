@extends('admin.layout.app')

@section('script-or-css')
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
        <label for="author">Penulis</label>
        <input value="{{ $post->author }}" name="author" type="author" class="form-control" id="author" placeholder="penulis...">
      </div>
      <div class="form-group">
        <label for="title">Judul</label>
        <input value="{{ $post->title }}" name="title" type="title" class="form-control" id="title" placeholder="penulis...">
      </div>
      <div class="form-group">
        <label for="content">Konten</label>
        <textarea name="content" id="content" rows="3">{{ $post->content }}</textarea>
      </div>
      <div class="form-group">
        <label for="image">Gambar</label>
        <div class="custom-file">
          <input name="thumbnail" type="file" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01" onChange="mainThamUrl(this)">
          <label class="custom-file-label" for="image">Choose file</label>
        </div>
        <img class="mt-3" src="{{ asset("upload/post/$post->thumbnail") }}" id="mainThmb">
      </div>
      <div class="form-group">
        <label for="category">Kategori</label>
        <select name="category_id" class="form-control" id="category">
          <option value="" selected disabled>--kategori--</option>
          @foreach ($categories as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="tag">Tag</label>
        <select name="tag[]" class="form-control" id="tag">
          <option value="" selected disabled>--tag--</option>
          @foreach ($tags as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" id="status">
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
</script>
@endsection
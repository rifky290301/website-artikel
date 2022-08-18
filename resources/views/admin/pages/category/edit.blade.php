@extends('admin.layout.app')

@section('script-or-css')
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit kategori</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit kategori</h6>
  </div>
  <div class="card-body">
    <form action="/admin/kategori/{{ $category->id }}" method="post">
      @csrf
      @method('patch')
      <div class="form-group">
        <label for="category">Nama kategori<span class="required-star">*</span></label>
        <input value="{{ $category->name }}" name="name" type="text" class="form-control" id="category" placeholder="kategori...">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection

@section('script')
@endsection
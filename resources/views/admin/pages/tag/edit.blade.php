@extends('admin.layout.app')

@section('script-or-css')
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit tag</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit tag</h6>
  </div>
  <div class="card-body">
    <form action="/admin/tag/{{ $tag->id }}" method="post">
      @csrf
      @method('patch')
      <div class="form-group">
        <label for="tag">Nama tag<span class="required-star">*</span></label>
        <input value="{{ $tag->name }}" name="name" type="text" class="form-control" id="tag" placeholder="tag...">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection

@section('script')
@endsection
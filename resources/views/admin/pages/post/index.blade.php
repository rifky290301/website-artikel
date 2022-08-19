@extends('admin.layout.app')

@section('script-or-css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="mb-2 d-flex justify-content-between">
  <h1 class="h3 text-gray-800">Tabel post</h1>
  <a href="/admin/artikel/tambah" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah post</span>
  </a>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Thumbnail</th>
          <th>Penulis</th>
          <th>Judul</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Thumbnail</th>
          <th>Penulis</th>
          <th>Judul</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </tfoot>
      <tbody>
        @foreach ($posts as $item)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>
            <img src="{{ asset("upload/post/$item->thumbnail") }}" style="width: 12rem;" class="img-thumbnail" alt="{{ $item->title }}">
          </td>
          <td>{{ Str::limit($item->author, 30) }}</td>
          <td>{{ Str::limit($item->title, 20) }}</td>
          <td>{{ $item->status }}</td>
          <td class="d-flex">
            @include('admin.components.edit-button', ['url' => '/admin/artikel/' . $item->id])
            @include('admin.components.delete-button', ['url' => '/admin/artikel/' . $item->id])
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endsection
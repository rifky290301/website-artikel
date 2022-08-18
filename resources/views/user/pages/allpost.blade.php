@extends('user.layout.app')

@section('content')
@if (isset($posts))
<section>
  <div class="container">
    <div class="row">

      <div class="col-md-9" data-aos="fade-up">
        {{-- <h3 class="category-title">Kategori: {{ $posts[0]->category->name }}</h3> --}}

        @foreach($posts as $item)
        <div class="d-md-flex post-entry-2 half">
          <a href="/{{ $item->slug }}" class="me-4 thumbnail">
            <img src="{{ asset("upload/post/$item->thumbnail") }}" alt="" class="img-fluid">
          </a>
          <div>
            <div class="post-meta">
              <span class="date">{{ $item->category->name }}</span>
              <span class="mx-1">&bullet;</span>
              <span>{!! date('d/M/y', strtotime($item->created_at)) !!}</span>
            </div>
            <h3>
              <a href="/{{ $item->slug }}">{{ $item->title }}</a>
            </h3>
            <p>{{ $item->title }}</p>
            <div class="d-flex align-items-center author">
              <div class="name">
                <h3 class="m-0 p-0">{{ $item->author }}</h3>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        <div class="text-start py-4">
          {{ $posts->links('pagination::bootstrap-4') }}
        </div>
      </div>

      <div class="col-md-3">
        <div class="aside-block">
          <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Populer</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Terbaru</button>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
              @foreach($popular as $item)
              <div class="post-entry-1 border-bottom">
                <div class="post-meta">
                  <span class="date">{{ $item->category->name }}</span>
                  <span class="mx-1">&bullet;</span>
                  <span>{!! date('d/M/y', strtotime($item->created_at)) !!}</span>
                </div>
                <h2 class="mb-2">
                  <a href="/{{ $item->slug }}">{{ $item->title }}</a>
                </h2>
                <span class="author mb-3 d-block">{{ $item->author }}</span>
              </div>
              @endforeach
            </div>

            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
              @foreach($latest as $item)
              <div class="post-entry-1 border-bottom">
                <div class="post-meta">
                  <span class="date">{{ $item->category->name }}</span>
                  <span class="mx-1">&bullet;</span>
                  <span>{!! date('d/M/y', strtotime($item->created_at)) !!}</span>
                </div>
                <h2 class="mb-2">
                  <a href="/{{ $item->slug }}">{{ $item->title }}</a>
                </h2>
                <span class="author mb-3 d-block">{{ $item->author }}</span>
              </div>
              @endforeach
            </div>

          </div>
        </div>

        <div class="aside-block">
          <h3 class="aside-title">Kategori</h3>
          <ul class="aside-links list-unstyled">
            @foreach($categories as $item)
            <li><a href="/category/{{ $item->id }}"><i class="bi bi-chevron-right"></i> {{ $item->name }}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="aside-block">
          <h3 class="aside-title">Tags</h3>
          <ul class="aside-tags list-unstyled">
            @foreach($tags as $item)
            <li><a href="/tag/{{ $item->id }}">{{ $item->name }}</a></li>
            @endforeach
          </ul>
        </div>

      </div>

    </div>
  </div>
</section>
@else
Kategori belum ada
@endif
@endsection
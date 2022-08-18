@extends('user.layout.app')

@section('content')
<section id="hero-slider" class="hero-slider">
  <div class="container-md" data-aos="fade-in">
    <div class="row">
      <div class="col-12">
        <div class="swiper sliderFeaturedPosts">
          <div class="swiper-wrapper">
            @foreach($sliders as $item)
            <div class="swiper-slide">
              <a href="/baca/{{ $item->slug }}" class="img-bg d-flex align-items-end" style="background-image: url('upload/post/{{ $item->thumbnail }}');">
                <div class="img-bg-inner">
                  <h2>{{Str::limit($item->title, 20)}}</h2>
                  {{-- {!! \Illuminate\Support\Str::words($item->content, 30,'....')  !!} --}}
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <div class="custom-swiper-button-next">
            <span class="bi-chevron-right"></span>
          </div>
          <div class="custom-swiper-button-prev">
            <span class="bi-chevron-left"></span>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="post-entry-1 lg">
          <a href="/baca/{{ $firstPost->slug }}">
            <img src="{{ asset("upload/post/$firstPost->thumbnail") }}" alt="{{ $firstPost->title }}" class="img-fluid">
          </a>
          <div class="post-meta">
            <span class="date">{{ $firstPost->category->name }}</span>
            <span class="mx-1">&bullet;</span>
            <span>{!! date('d/M/y', strtotime($firstPost->created_at)) !!}</span>
          </div>
          <h2>
            <a href="/baca/{{ $firstPost->slug }}">{{ $firstPost->title }}</a>
          </h2>
          <p class="mb-4 d-block">
            {{ $firstPost->title }}
            {{-- {!! \Illuminate\Support\Str::words($firstPost->content, 30,'....')  !!} --}}
          </p>
          <div class="d-flex align-items-center author">
            <div class="name">
              <h3 class="m-0 p-0">{{ $firstPost->author }}</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="row g-5">
          <div class="col-lg-4 border-start custom-border">
            @foreach($articles as $item)
            <div class="post-entry-1">
              <a href="/baca/{{ $item->slug }}">
                <img src="{{ asset("upload/post/$item->thumbnail") }}" alt="" class="img-fluid">
              </a>
              <div class="post-meta">
                <span class="date">{{ $item->category->name }}</span>
                <span class="mx-1">&bullet;</span>
                <span>{!! date('d/M/y', strtotime($item->created_at)) !!}</span>
              </div>
              <h2><a href="/baca/{{ $item->slug }}">{{ $item->title }}</a></h2>
            </div>
            @endforeach
          </div>
          <div class="col-lg-4 border-start custom-border">
            @foreach($news as $item)
            <div class="post-entry-1">
              <a href="/baca/{{ $item->slug }}">
                <img src="{{ asset("upload/post/$item->thumbnail") }}" alt="" class="img-fluid">
              </a>
              <div class="post-meta">
                <span class="date">{{ $item->category->name }}</span>
                <span class="mx-1">&bullet;</span>
                <span>{!! date('d/M/y', strtotime($item->created_at)) !!}</span>
              </div>
              <h2><a href="/baca/{{ $item->slug }}">{{ $item->title }}</a></h2>
            </div>
            @endforeach
          </div>
          <div class="col-lg-4">
            <div class="trending">
              <h3>Terbaru</h3>
              <ul class="trending-post">
                @foreach($latest as $item)
                <li>
                  <a href="/baca/{{ $item->slug }}">
                    <span class="number">{{ $loop->index + 1 }}</span>
                    <h3>{{ $item->title }}</h3>
                    <span class="author">{{ $item->author }}</span>
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="category-section">
  <div class="container" data-aos="fade-up">
    <div class="section-header d-flex justify-content-between align-items-center mb-5">
      <h2>Jelajahi</h2>
      <div><a href="/category" class="more">Lihat semua</a></div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="d-lg-flex post-entry-2">
          <a href="/baca/{{ $random1->slug }}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
            <img src="{{ asset("upload/post/$random1->thumbnail") }}" alt="" class="img-fluid">
          </a>
          <div>
            <div class="post-meta">
              <span class="date">{{ $random1->category->name }}</span>
              <span class="mx-1">&bullet;</span>
              <span>{!! date('d/M/y', strtotime($random1->created_at)) !!}</span>
            </div>
            <h3>
              <a href="/baca/{{ $random1->slug }}">{{ $random1->title }}</a>
            </h3>
            <p>{{ $random1->title }}</p>
            <div class="d-flex align-items-center author">
              <div class="name">
                <h3 class="m-0 p-0">{{ $random1->author }}</h3>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4">
            @foreach($random2 as $item)
            <div class="post-entry-1 border-bottom">
              <a href="/baca/{{ $item->slug }}">
                <img src="{{ asset("upload/post/$item->thumbnail") }}" alt="{{ $item->title }}" class="img-fluid">
              </a>
              <div class="post-meta">
                <span class="date">{{ $item->category->name }}</span>
                <span class="mx-1">&bullet;</span>
                <span>{!! date('d/M/y', strtotime($item->created_at)) !!}</span>
              </div>
              <h2 class="mb-2">
                <a href="/baca/{{ $item->slug }}">{{ $item->title }}</a>
              </h2>
              <span class="author mb-3 d-block">{{ $item->author }}</span>
              {{ $item->title }}
              {{-- {!! \Illuminate\Support\Str::words($item->content, 30,'....')  !!} --}}
            </div>
            @endforeach
          </div>
          <div class="col-lg-8">
            <div class="post-entry-1">
              <a href="/baca/{{ $random1_2->slug }}">
                <img src="{{ asset("upload/post/$random1_2->thumbnail") }}" alt="{{ $random1_2->title }}" class="img-fluid">
              </a>
              <div class="post-meta">
                <span class="date">{{ $random1_2->category->name }}</span>
                <span class="mx-1">&bullet;</span>
                <span>{!! date('d/M/y', strtotime($random1_2->created_at)) !!}</span>
              </div>
              <h2>
                <a href="/baca/{{ $random1_2->slug }}">{{ $random1_2->title }}</a>
              </h2>
              <p class="mb-4 d-block">
                {{ $random1_2->title }}
                {{-- {!! \Illuminate\Support\Str::words($random1_2->content, 30,'....')  !!} --}}
              </p>
              <div class="d-flex align-items-center author">
                <div class="name">
                  <h3 class="m-0 p-0">{{ $random1_2->author }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        @foreach($random3 as $item)
        <div class="post-entry-1 border-bottom">
          <div class="post-meta">
            <span class="date">{{ $item->category->name }}</span>
            <span class="mx-1">&bullet;</span>
            <span>{!! date('d/M/y', strtotime($item->created_at)) !!}</span>
            <h2 class="mb-2">
              <a href="/baca/{{ $item->slug }}">{{ $item->title }}</a>
            </h2>
            <span class="author mb-3 d-block">{{ $item->author }}</span>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>
@endsection
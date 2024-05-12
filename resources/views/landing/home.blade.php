@extends('layouts-fe.app')

@section('style-fe')
<style>
 .limit-lines {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
  }
  .services__item:hover{
    background: #83cf00!important;
  }
  h5:hover{
    color: white!important;
  }
  .p-services:hover{
    color: white!important;
  }
  .carousel-control-prev{
    border: none;
    background: none;
  }
  .carousel-control-next{
    border: none;
    background: none;
  }
</style>
@endsection

@section('content-fe')
@include('sweetalert::alert')


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach ($banner as $key => $b)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->iteration }}" class="{{ $key == 1 ? 'active' : '' }}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach ($banner as $key => $b)
    <div class="carousel-item {{ $key == 1 ? 'active' : '' }}">
      <img src="{{ asset('assets/img/banner/'.$b->banner ?? '') }}" class="d-block w-100" alt="...">
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>

<!-- Hero Section End -->

<!-- Services Section Begin -->
<section class="services spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title">
                  <span>Sevice Kami</span>
                  <h2>Apa yang Kami Tawarkan</h2>
              </div>
          </div>
      </div>
      <div class="row">
        @foreach ($service as $s)
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="services__item">
                <img src="{{ asset('fe-new/img/services/services-1.png')}}" alt="">
                <h5>{{ $s->judul }}</h5>
                <p class="p-services">{{ $s->deskripsi }}.</p>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>
        @endforeach
          
      </div>
  </div>
</section>
<!-- Services Section End -->

<!-- Chooseus Section Begin -->
<section class="chooseus spad" style="padding-top:0px">
  <div class="container">
      <div class="row">
          <div class="col-lg-5">
              <div class="chooseus__text">
                  <div class="section-title">
                      <h2>Tentang Kami</h2>
                  </div>
                  {!! $about->about !!}
              </div>
          </div>
      </div>
  </div>
  <div class="chooseus__video set-bg">
    <iframe src="{{ $about->link_yt }}" frameborder="0" width="100%" height="100%"></iframe>
      {{-- <img src="img/chooseus-video.png" alt="">
      <a href="{{ $about->link_yt }}"
          class="play-btn video-popup"><i class="fa fa-play"></i></a> --}}
  </div>
</section>
<!-- Chooseus Section End -->

<!-- Chooseus Section Begin -->
<section class="chooseus spad" style="padding-top:40px">
  <div class="container">
      <div class="row">
          <div class="col-lg-6">
              <div class="chooseus__text">
                  <div class="section-title">
                      <h2>Sales Kami</h2>
                  </div>
                  <p>Nama Sales: {{ $sales->nama }}</p>
                  <p>No WhatsApp: {{ $sales->no_wa }}</p>
                  {!! $sales->detail !!}
              </div>
          </div>
          <div class="col-lg-6">
              <div class="chooseus__text mt-3">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="{{ asset('assets/img/sales/'.$sales->foto ?? '') }}" style="max-width: 300px" alt="">
                </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Chooseus Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title">
                  <span>Berita</span>
                  <h2>Update Berita Terkini</h2>
              </div>
          </div>
      </div>
      <div class="row">
        @php
            $berita = \App\Models\Berita::orderBy('created_at','desc')->get();
        @endphp
        @foreach ($berita as $item)
          <div class="col-lg-4 col-md-6">
              <div class="latest__blog__item ">
                  <div class="latest__blog__item__pic set-bg" data-setbg="{{ asset('assets/img/thumbnail/'.$item->image) }}">
                      <ul>
                        @php
                            $user = \App\Models\User::where('id',$item->created_by)->first();
                        @endphp
                          <li>By {{ $user->name ?? '-' }}</li>
                          <li>{{ $item->created_at }}</li>
                      </ul>
                  </div>
                  <div class="latest__blog__item__text">
                    <div class="limit-lines">
                      <h5>{{ $item->judul }}</h5>
                      <p class="">{!! $item->detail !!}</p>
                    </div>
                      <a href="{{ route('detail-berita',$item->slug) }}">View More <i class="fa fa-long-arrow-right"></i></a>
                  </div>
              </div>
          </div>
        @endforeach
          
      </div>
  </div>
</section>
<!-- Latest Blog Section End -->

<!-- Cta End -->
@endsection

@section('script-fe')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

</script>

@endsection
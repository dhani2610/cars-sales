@extends('layouts-fe.app')

@section('style-fe')
<style>
 .limit-lines {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
  }
    .car__item {
        transition: transform 0.3s ease; /* Efek transisi untuk perubahan posisi */
    }

    .car__item:hover {
        transform: translateY(-10px); /* Menggeser kartu ke atas 10 piksel ketika dihover */
    }
  h5:hover{
    color: white!important;
  }
  p:hover{
    color: white!important;
  }
</style>
@endsection

@section('content-fe')
@include('sweetalert::alert')
<!-- Breadcrumb End -->
<div class="breadcrumb-option set-bg" data-setbg="{{ asset('assets/img/kategori/'.$kat->image) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Daftar Truck {{ $kat->kategori }}</h2>
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>About</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Begin -->


<section class="car spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="car__filter__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="car__filter__option__item">
                                <h6>Daftar Truck {{ $kat->kategori }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (count($cars) == 0)
                    <center>
                        <h5>Tidak Ada Data!</h5>
                    </center>
                    @else
                        @foreach ($cars as $item)
                            <div class="col-lg-4 col-md-4">
                                <a href="{{ route('detail-cars',$item->slug) }}">
                                    <div class="car__item shadow-sm" style="background: white">
                                        <div class="car__item__pic__slider owl-carousel">
                                            <img src="{{ asset('assets/img/cars/'.$item->image) }}" alt="">
                                            <img src="{{ asset('assets/img/cars/'.$item->image) }}" alt="">
                                            <img src="{{ asset('assets/img/cars/'.$item->image) }}" alt="">
                                            <img src="{{ asset('assets/img/cars/'.$item->image) }}" alt="">
                                        </div>
                                        <div class="car__item__text">
                                            <div class="car__item__text__inner">
                                                <div class="label-date">{{ $kat->kategori }}</div>
                                                <h5><a href="#">{{ $item->nama }}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    @endif
                </div>
               
            </div>
        </div>
    </div>
</section>
@endsection

@section('script-fe')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

</script>

@endsection
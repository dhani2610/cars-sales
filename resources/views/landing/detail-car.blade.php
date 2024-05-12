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

  @charset "UTF-8";
#accordion .card-header {
  margin-bottom: 8px;
  padding-top:0px
}
#accordion .accordion-title {
  position: relative;
  display: block;
  padding: 8px 0 8px 50px;
  background: #213744;
  border-radius: 8px;
  overflow: hidden;
  text-decoration: none;
  color: #fff;
  font-size: 16px;
  font-weight: 700;
  width: 100%;
  text-align: left;
  transition: all 0.4s ease-in-out;
}
#accordion .accordion-title i {
  position: absolute;
  width: 40px;
  height: 100%;
  left: 0;
  top: 0;
  color: #fff;
  background: radial-gradient(rgba(33, 55, 68, 0.8), #213744);
  text-align: center;
  border-right: 1px solid transparent;
}
#accordion .accordion-title:hover {
  padding-left: 60px;
  background: #213744;
  color: #fff;
}
#accordion .accordion-title:hover i {
  border-right: 1px solid #fff;
}
#accordion [aria-expanded=true] {
  background: #24b365;
  color: #000;
}
#accordion [aria-expanded=true] i {
  color: #000;
  background: #24b365;
}
#accordion [aria-expanded=true] i:before {
  content: "";
}
#accordion .accordion-body {
  padding: 40px 55px;
}

.spad {
    padding-top: 0px; 
    padding-bottom: 0px; 
}
.section-title{
    margin-bottom:0px
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
                            <a href="#">Kategori</a>
                            <span>Cars</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Begin -->

    <!-- Car Details Section Begin -->
    <section class="car-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="car__details__pic">
                        <div class="car__details__pic__large">
                            <img class="car-big-img" src="{{ asset('assets/img/cars/'.$cars->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Car Details Section End -->
    @php
        $spec = \App\Models\Spesifikasi::where('id_cars',$cars->id)->get();
    @endphp
    <section class="car-detail spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Spesifikasi</span>
                        <h2>{{ $cars->nama }}</h2>
                    </div>
                </div>
            </div>
            <div id="accordion" class="py-5">
                @if (count($spec) == 0)
                    <h5>Belum ada Spesifikasi</h5>
                @else
                    @foreach ($spec as $t)
                        <div class="card border-0">
                            <div class="card-header p-0 border-0" id="heading-{{ $loop->iteration }}">
                            <button class="btn btn-link accordion-title border-0 collapse" data-toggle="collapse" data-target="#collapse-{{ $loop->iteration }}" aria-expanded="true" aria-controls="#collapse-{{ $loop->iteration }}">
                                <i class="fa fa-plus text-center d-flex align-items-center justify-content-center h-100"></i>{{ $t->judul }} </button>
                            </div>
                            <div id="collapse-{{ $loop->iteration }}" class="collapse" aria-labelledby="heading-{{ $loop->iteration }}" data-parent="#accordion">
                                <div class="card-body accordion-body">
                                    {!! $t->detail !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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
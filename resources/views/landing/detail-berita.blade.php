@extends('layouts-fe.app')

@section('style-fe')

@endsection

@section('content-fe')
@include('sweetalert::alert')

    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero spad set-bg" data-setbg="{{asset('fe-new/img/footer-bg.jpg')}}">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="blog__details__hero__text">
                        <span class="label">Berita</span>
                        <h2>{{ $berita->judul }}</h2>
                        <ul>
                            @php
                            $user = \App\Models\User::where('id',$berita->created_by)->first();
                        @endphp
                            <li><span>By {{ $user->name ?? '-' }}</span>
                            </li>
                            <li><i class="fa fa-calendar-o"></i> <span>{{ $berita->created_at }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="{{ asset('assets/img/thumbnail/'.$berita->image) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__text">
                        {!! $berita->detail !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection

@section('script-fe')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

</script>

@endsection
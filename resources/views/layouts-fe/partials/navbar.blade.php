<header class="header">
  <div class="container">
      <div class="row">
          <div class="col-lg-2">
              <div class="header__logo">
                  <a href="/"><img src="https://trukhino.id/wp-content/uploads/2022/08/logo.png" alt=""></a>
              </div>
          </div>
          <div class="col-lg-10">
              <div class="header__nav">
                  <nav class="header__menu">
                      <ul>
                          <li class=""><a href="/">Home</a></li>
                          @php
                              $tipe = \App\Models\Kategori::get();
                          @endphp
                          @foreach ($tipe as $item)
                            <li><a href="{{ route('show-kategori',$item->id) }}">{{ $item->kategori }}</a></li>
                          @endforeach
                      </ul>
                  </nav>
                  @php
                      $social = \App\Models\Social::first();
                  @endphp
                  <div class="header__nav__widget">
                      <a href="{{ $social->link_wa ?? '#' }}" class="primary-btn" target="_blank">Hubungi WhatsApp</a>
                  </div>
              </div>
          </div>
      </div>
      <div class="canvas__open">
          <span class="fa fa-bars"></span>
      </div>
  </div>
</header>
<footer class="footer set-bg" data-setbg="{{asset('fe-new/img/footer-bg.jpg')}}">
  <div class="container">
    
      <div class="row">
          <div class="col-lg-4 col-md-4">
              <div class="footer__about">
                  <div class="footer__logo">
                      <a href="#"><img src="https://trukhino.id/wp-content/uploads/2022/08/logo.png" alt=""></a>
                  </div>

              </div>
          </div>
          <div class="col-lg-2 offset-lg-1 col-md-3">
              <div class="footer__widget">
                  <h5>Infomation</h5>
                  <ul>
                      <li><a href="#"><i class="fa fa-angle-right"></i> Home</a></li>
                      @php
                          $tipe = \App\Models\Kategori::get();
                      @endphp
                      @foreach ($tipe as $item)
                        <li><a href="{{ route('show-kategori',$item->id) }}"><i class="fa fa-angle-right"></i> {{ $item->kategori }}</a></li>
                      @endforeach
                  </ul>
              </div>
          </div>
          <div class="col-lg-3 offset-lg-1 col-md-3">
              <div class="footer__widget">
                <div class="footer__social">
                  @php
                      $social = \App\Models\Social::first();
                  @endphp
                    <a href="{{ $social->link_facebook ?? '#' }}" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="{{ $social->link_twiter ?? '#' }}" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="{{ $social->link_gmail ?? '#' }}" class="google"><i class="fa fa-google"></i></a>
                </div>
              </div>
          </div>
      </div>
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      <div class="footer__copyright__text">
          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>
      </div>
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  </div>
</footer>
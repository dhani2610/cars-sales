<!DOCTYPE html>
<html lang="zxx">

<head>
  @include('layouts-fe.partials.head')
  <style>
    /* --- WhatsApp Button For Blogger CSS code by imamuddinwp.blogspot.com --- */
:root {
  --warna-background: #4dc247;
  --warna-bg-chat: #f0f5fb;
  --warna-icon: #fff;
  --warna-text: #505050;
  --warna-text-alt: #989b9f;
  --lebar-chatbox: 320px;
}
.sticky-button {
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  right: 20px;
  bottom: 76px;
  width: 45px;
  height: 45px;
  background-color: #fefefe;
  border-radius: 20px;
  box-shadow: 0 10px 20px 0 rgba(30, 30, 30, 0.1);
}
.sticky-button a,
.sticky-button label {
  display: flex;
  align-items: center;
  width: 55px;
  height: 55px;
  -webkit-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;
}
.sticky-button a svg,
.sticky-button label svg {
  margin: auto;
  fill: #4dc247;
}
.sticky-button label svg.svg-2 {
  display: none;
}
.sticky-chat {
  position: fixed;
  bottom: 70px;
  right: 20px;
  width: var(--lebar-chatbox);
  -webkit-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;
  z-index: 21;
  opacity: 0;
  visibility: hidden;
  line-height: normal;
}
.sticky-chat .chat-content {
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.05);
  overflow: hidden;
}
.sticky-chat .chat-header {
  position: relative;
  display: flex;
  align-items: center;
  padding: 15px 20px;
  background-color: var(--warna-background);
  overflow: hidden;
}
.sticky-chat .chat-header:after {
  content: "";
  display: block;
  position: absolute;
  bottom: 0;
  right: 0;
  width: 70px;
  height: 65px;
  background: rgba(0, 0, 0, 0.04);
  border-radius: 70px 0 5px 0;
}
.sticky-chat .chat-header svg {
  width: 35px;
  height: 35px;
  flex: 0 0 auto;
  fill: var(--warna-icon);
}
.sticky-chat .chat-header .title {
  padding-left: 15px;
  font-size: 14px;
  font-weight: 600;
  font-family: "Roboto", sans-serif;
  color: var(--warna-icon);
}
.sticky-chat .chat-header .title a {
  color: #fff;
}
.sticky-chat .chat-header .title span {
  font-size: 11px;
  font-weight: 400;
  display: block;
  line-height: 1.58em;
  margin: 0;
}
.sticky-chat .chat-text {
  display: flex;
  flex-wrap: wrap;
  margin: 25px 20px;
  font-size: 12px;
  color: var(--warna-text);
}
.sticky-chat .chat-text span {
  display: inline-block;
  margin-right: auto;
  padding: 10px 10px 10px 20px;
  background-color: var(--warna-bg-chat);
  border-radius: 3px 15px 15px;
}
.sticky-chat .chat-text span:after {
  content: "Just now";
  display: inline-block;
  margin-left: 15px;
  font-size: 9px;
  color: var(--warna-text-alt);
}
.sticky-chat .chat-text span.typing {
  margin: 15px 0 0 auto;
  padding: 10px 20px 10px 10px;
  border-radius: 15px 3px 15px 15px;
}
.sticky-chat .chat-text span.typing:after,
.chat-menu {
  display: none;
}
.sticky-chat .chat-text span.typing svg {
  height: 14px;
  fill: var(--warna-text-alt);
}
.sticky-chat .chat-button {
  display: flex;
  align-items: center;
  margin-top: 15px;
  padding: 12px 20px;
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.05);
  overflow: hidden;
  font-size: 12px;
  color: var(--warna-text);
}
.sticky-chat .chat-button svg {
  width: 20px;
  height: 20px;
  fill: var(--warna-text-alt);
  margin-left: auto;
  transform: rotate(40deg);
  -webkit-transform: rotate(40deg);
}
.chat-menu:checked + .sticky-button label {
  -webkit-transform: rotate(360deg);
  transform: rotate(360deg);
}
.chat-menu:checked + .sticky-button label svg.svg-1 {
  display: none;
}
.chat-menu:checked + .sticky-button label svg.svg-2 {
  display: table-cell;
}
.chat-menu:checked + .sticky-button + .sticky-chat {
  bottom: 77px;
  right: 81px;
  opacity: 1;
  visibility: visible;
}

  </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__widget">
            <a href="#" class="primary-btn">Hubungi WhatsApp</a>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="https://trukhino.id/wp-content/uploads/2022/08/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('layouts-fe.partials.navbar')
  
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @yield('content-fe')

    

    <!-- Footer Section Begin -->
    @include('layouts-fe.partials.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    @include('layouts-fe.partials.foot')

    <input class='chat-menu hidden' id='offchat-menu' type='checkbox'/><div class='sticky-button' id='sticky-button'><label for='offchat-menu'>
      <svg viewBox='0 0 24 24'><path d='M8.667 10.933 10.2 9.4 9.8 8H8S7.6 10.533 10.533 13.467 16 16 16 16V14.2L14.6 13.8 13.067 15.333' style='fill: none; stroke: rgb(44, 169, 188); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;'/><path d='M20.867 13.467A9 9 0 0 1 7.867 20L3 21 4 16.133a9 9 0 1 1 16.867 -2.667Z' style='fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;'/></svg>
      </label></div>
      <div class='sticky-chat'><div class='chat-content'><div class='chat-header'>
      <svg viewbox='0 0 32 32'><path d='M24,22a1,1,0,0,1-.64-.23L18.84,18H17A8,8,0,0,1,17,2h6a8,8,0,0,1,2,15.74V21a1,1,0,0,1-.58.91A1,1,0,0,1,24,22ZM17,4a6,6,0,0,0,0,12h2.2a1,1,0,0,1,.64.23L23,18.86V16.92a1,1,0,0,1,.86-1A6,6,0,0,0,23,4Z'/><rect height='2' width='2' x='19' y='9'/><rect height='2' width='2' x='14' y='9'/><rect height='2' width='2' x='24' y='9'/><path d='M8,30a1,1,0,0,1-.42-.09A1,1,0,0,1,7,29V25.74a8,8,0,0,1-1.28-15,1,1,0,1,1,.82,1.82,6,6,0,0,0,1.6,11.4,1,1,0,0,1,.86,1v1.94l3.16-2.63A1,1,0,0,1,12.8,24H15a5.94,5.94,0,0,0,4.29-1.82,1,1,0,0,1,1.44,1.4A8,8,0,0,1,15,26H13.16L8.64,29.77A1,1,0,0,1,8,30Z'/></svg>
      <div class='title'><a href=#' target='_new'>Admin:</a> <span>Customer Service</span></div></div>
      @php
          $social = \App\Models\Social::first();
      @endphp
      <div class='chat-text'><span>Halo! Bagaimana kami dapat membantu Anda hari ini?</span><span class='typing'><svg viewbox='0 0 512 512'><circle cx='256' cy='256' r='48'/><circle cx='416' cy='256' r='48'/><circle cx='96' cy='256' r='48'/></svg></span></div></div>
      <a class='chat-button' href="{{ $social->link_wa }}" rel='nofollow noreferrer' target='_blank'>
      <span>Start chat...</span><svg viewBox='0 0 32 32'><path class='cls-1' d='M19.47,31a2,2,0,0,1-1.8-1.09l-4-7.57a1,1,0,0,1,1.77-.93l4,7.57L29,3.06,3,12.49l9.8,5.26,8.32-8.32a1,1,0,0,1,1.42,1.42l-8.85,8.84a1,1,0,0,1-1.17.18L2.09,14.33a2,2,0,0,1,.25-3.72L28.25,1.13a2,2,0,0,1,2.62,2.62L21.39,29.66A2,2,0,0,1,19.61,31Z'/></svg></a></div>

</body>

</html>
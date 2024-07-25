<div class="thmv-top-nav">
    <nav id="navbar_top" class="navbar navbar-expand-sm fixed-top thmv-navbar-light ">
        <div class="container thmv-mob-nav">
            <div class="thmv-menu-left">
                <a class="offcanvas-toggler" href="#offcanvasExample" role="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </a>
                {{-- <div class="d-flex d-none d-md-block">
                    <ul class="navbar-nav flex-row align-items-center ml-3" data-sm-skip="true">
                        <li class="nav-item thmv-menu-drop thmv-language-select">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>en</option>
                                <option value="1">de</option>
                                <option value="2">es</option>
                            </select>
                        </li>
                    </ul>
                </div> --}}
            </div>
            <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end show" id="navbarSupportedContent">
                <a class="navbar-brand mx-auto d-none d-md-block" href="index.html">
                    <img src="{{ asset("front/images/aiva_losmen_logo.png") }}" width="170px" alt="">
                </a>
                <div class="d-flex thmv-right-menu">
                    <ul class="thmv-social d-none d-lg-flex">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn-outline" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Pesan Sekarang</button>
                </div>
            </div>
        </div>
    </nav>
    <!-- off canvas menu -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">
        <div class="thmv-offcanvas-header">
            <a href="javascript:void(0)" title="" class="thmv-menu-officon" data-bs-dismiss="offcanvas"
                aria-label="Close"><i class="fas fa-times"></i></a>
            <h5 class="thmv-offcanvas-title" id="offcanvasExampleLabel">
                <img src="{{ asset("front/images/aiva_losmen_logo.png") }}" width="170px" alt="">

            </h5>
        </div>
        <div class="offcanvas-body thmv-offcanvas-body">
            <div class="thmv-leftside-menu">
                <nav id="cd-lateral-nav">
                    <ul class="cd-navigation">
                        <li><a class="@if (request()->is('/')) active  @endif" href="{{ route("home") }}" title="">Beranda</a></li>
                        <li><a href="{{ route('kamar') }}" title="">Semua Kamar</a></li>
                        <li class="item-has-children">
                            <a href="#">Tipe Kamar</a>
                            <ul class="sub-menu">
                                @php
                                    $tipe_kamar = \App\Models\Tipe::all();
                                @endphp
                                @foreach ($tipe_kamar as $item)
                                    <li><a href="{{ route('kamar', ['tipe' => $item->id ]) }}" title="">{{ $item->nama }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route("about") }}" title="">Tentang Kami</a></li>
                        <li><a href="{{ route("contact") }}" title="">Hubungi Kami</a></li>


                    </ul>
                </nav>
            </div>
            <div class="thmv-leftmenu-option">
                <ul class="thmv-option-nav" data-sm-skip="true">
                    @auth
                        <li>
                            <div class="d-grid gap-2">
                                <a href="{{ route("profile") }}" class="btn btn-outline-light" >
                                    <img style="width: 40px"
                                        src="@if (auth()->user()->foto) {{ Storage::url('uploads/pengguna/' . auth()->user()->foto) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ auth()->user()->name }} @endif"
                                        class="img-thumbnail me-3" alt="{{ auth()->user()->name }}">
                                    {{ auth()->user()->name }}
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="text-light py-3 mt-3" href="#" title="">
                                <i class="fas fa-ticket-alt me-2"></i>
                                Pesanan Saya
                            </a>

                        </li>
                        <li>
                            <a class="text-light py-3" href="{{ route('auth.logout') }}" title="">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                Logout
                            </a>
                        </li>
                    @else
                        <li>
                            <div class="d-grid gap-2">
                                <a href="{{ route('auth.login') }}" class="btn btn-outline-light">
                                    Login
                                </a>
                            </div>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </div>
</div>

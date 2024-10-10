<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
        <!--begin::Scroll wrapper-->
        <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('back.dashboard')) here show @endif">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                class="ki-duotone ki-element-11 fs-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span
                                    class="path4"></span></i></span><span class="menu-title">Dashboards</span><span
                            class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a
                                class="menu-link @if (request()->routeIs('back.dashboard')) here show @endif"
                                href="{{ route('back.dashboard') }}"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Default</span></a>
                            <!--end:Menu link-->
                        </div>

                    </div><!--end:Menu sub-->
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('back.fasilitas-kamar.index') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-security-user fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span><span class="menu-title">Profil Saya
                            </span>
                        </a>
                    </div>
                </div><!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item pt-5"><!--begin:Menu content-->
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Manajemen
                            Kamar</span>
                    </div><!--end:Menu content-->
                </div><!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('back.fasilitas-kamar.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-note-2 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span><span class="menu-title">Fasilitas Kamar
                        </span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('back.kamar.*') || request()->routeIs('back.tipe-kamar.*')) here show @endif"><span
                        class="menu-link"><span class="menu-icon">
                            <i class="ki-duotone ki-clipboard fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span><span class="menu-title">Kamar</span><span class="menu-arrow"></span></span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('back.kamar.create')) active @endif"
                                href="{{ route('back.kamar.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot">
                                    </span>
                                </span>
                                <span class="menu-title">Tambah Kamar</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('back.tipe-kamar.index')) active @endif"
                                href="{{ route('back.tipe-kamar.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot">
                                    </span>
                                </span>
                                <span class="menu-title">Tipe Kamar</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('back.kamar.index')) active @endif"
                                href="{{ route('back.kamar.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot">
                                    </span>
                                </span>
                                <span class="menu-title">Daftar Kamar</span>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('back.ulasan.index')) active @endif"
                        href="{{ route('back.ulasan.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-like-shapes fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span><span class="menu-title">Ulasan
                        </span>
                    </a>
                </div>
                <div class="menu-item pt-5"><!--begin:Menu content-->
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">
                            Pemesanan & Pembayaran</span>
                    </div><!--end:Menu content-->
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('back.metode-pembayaran.index')) active @endif"
                        href="{{ route('back.metode-pembayaran.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-two-credit-cart fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </span><span class="menu-title"> Metode Pembayaran
                        </span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('back.transaksi.konfirmasi-pembayaran')) active @endif"
                        href="{{ route('back.transaksi.konfirmasi-pembayaran') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-bill fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                            </i>
                        </span><span class="menu-title">Konfirmasi Pemesanan
                        </span>
                    </a>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('back.transaksi.*')) here show @endif"><span
                        class="menu-link"><span class="menu-icon">
                            <i class="ki-duotone ki-price-tag fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span><span class="menu-title">Pemesanan</span><span class="menu-arrow"></span></span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('back.transaksi.reservasi')) active @endif"
                                href="{{ route('back.transaksi.reservasi') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot">
                                    </span>
                                </span>
                                <span class="menu-title">Reservasi</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('back.transaksi.reservasi.check-in')) active @endif"
                                href="{{ route('back.transaksi.reservasi.check-in') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot">
                                    </span>
                                </span>
                                <span class="menu-title">Digunakan</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('back.transaksi.reservasi.check-out')) active @endif"
                                href="{{ route('back.transaksi.reservasi.check-out') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot">
                                    </span>
                                </span>
                                <span class="menu-title">Selesai</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('back.transaksi.reservasi.cancel')) active @endif"
                                href="{{ route('back.transaksi.reservasi.cancel') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot">
                                    </span>
                                </span>
                                <span class="menu-title">Dibatalkan</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="menu-item pt-5"><!--begin:Menu content-->
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Manajemen
                            Pengguna</span>
                    </div><!--end:Menu content-->
                </div><!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('back.pengguna.pegawai')) active @endif"
                        href="{{ route('back.pengguna.pegawai') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-user-edit fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span><span class="menu-title">Pegawai
                        </span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('back.pengguna.pelanggan')) active @endif"
                        href="{{ route('back.pengguna.pelanggan') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-people fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </span><span class="menu-title">Pelanggan
                        </span>
                    </a>
                </div>
                <div class="menu-item pt-5"><!--begin:Menu content-->
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Bantuan</span>
                    </div><!--end:Menu content-->
                </div><!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                        href="https://wa.me/6289613390766?text=Saya butuh bantuan" target="_blank"><span
                            class="menu-icon">
                            <i class="ki-duotone ki-delivery-24 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span><span class="menu-title">Hubungi Bantuan</span></a><!--end:Menu link--></div>

                <!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                        href="https://github.com/farinchan/aiva_losmen" target="_blank"><span class="menu-icon"><i
                                class="ki-duotone ki-code fs-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span
                                    class="path4"></span></i></span><span class="menu-title">Changelog
                            v1.0.0</span></a><!--end:Menu link--></div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Scroll wrapper-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->

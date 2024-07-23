<!--begin::User account menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
    data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px me-5">
                <img alt="Logo"
                    src="@if (Auth::user()->foto ) {{ Storage::url('uploads/pengguna/' . Auth::user()->foto) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ Auth::user()->name }} @endif"
                    alt="{{ Auth::user()->name }}" />
            </div>
            <!--end::Avatar-->
            <!--begin::Username-->
            <div class="d-flex
                    flex-column">
                <div class="fw-bold d-flex align-items-center fs-5">
                    {{ Auth::user()->name }}
                    @if (Auth::user()->role == 'admin')
                        <span class="badge badge-light-danger fw-bold fs-8 px-2 py-1 ms-2">Admin</span>
                    @elseif (Auth::user()->role == 'owner')
                        <span class="badge badge-light-primary fw-bold fs-8 px-2 py-1 ms-2">Owner</span>
                    @else
                        <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pelanggan</span>
                    @endif
                </div>
                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                    {{ Auth::user()->email }}
                </a>
            </div>
            <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ route("profile") }}" class="menu-link px-5">
            My Profile
        </a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ route('auth.logout') }}" class="menu-link px-5">
            Sign Out
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::User account menu-->

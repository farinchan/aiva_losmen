@extends('back/app')

@section('styles')
@endsection

@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-user-table-filter="search"
                                class="form-control form-control-solid w-250px ps-13"
                                placeholder="Cari Metode Pembayaran" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            
                            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_export_users">
                                <i class="ki-duotone ki-exit-up fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Export</button>
                            <!--end::Export-->
                            <!--begin::Add user-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_user">
                                <i class="ki-duotone ki-plus fs-2"></i>Tambah Metode Pembayaran</button>
                            <!--end::Add user-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none" {{-- data-kt-user-table-toolbar="selected" --}}>
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                                Selected</button>
                        </div>
                        <!--end::Group actions-->
                        <!--begin::Modal - Adjust Balance-->
                        <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Export Users</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-users-modal-action="close">
                                            <i class="ki-duotone ki-cross fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_export_users_form" class="form" action="#">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mb-2">Pilih Bank:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="role" data-control="select2"
                                                    data-placeholder="Select a role" data-hide-search="true"
                                                    class="form-select form-select-solid fw-bold">
                                                    <option selected value="">Semua</option>
                                                    <option value="bpd-aceh">BPD-Aceh</option>
                                                    <option value="BSI">BSI</option>
                                                    <option value="BRI">BRI</option>
                                                    <option value="BNI">BNI</option>
                                                    <option value="Mandiri">Mandiri</option>
                                                    <option value="BCA">BCA</option>
                                                    <option value="BTN">BTN</option>
                                                    <option value="BTPN">BTPN</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-semibold form-label mb-2">Pilih Format Export:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="format" data-control="select2"
                                                    data-placeholder="Select a format" data-hide-search="true"
                                                    class="form-select form-select-solid fw-bold">
                                                    <option selected value="excel">Excel</option>
                                                    <option value="pdf">PDF</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="text-center">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - New Card-->
                        <!--begin::Modal - Add task-->
                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header" id="kt_modal_add_user_header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Tambah Metode Pembayaran</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-users-modal-action="close">
                                            <i class="ki-duotone ki-cross fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body px-5 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_add_user_form" class="form" method="POST"
                                            action="{{ route('back.metode-pembayaran.store') }}">
                                            @csrf
                                            <!--begin::Scroll-->
                                            <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                data-kt-scroll-offset="300px">
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-semibold fs-6 mb-2">Nama Rekening</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="nama_rek"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Nama Rekening" value="{{ old('nama_rek') }}"
                                                        required />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-semibold fs-6 mb-2">Nomor Rekening</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="no_rek"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="No. Rekening" value="{{ old('no_rek') }}" required />
                                                    <!--end::Input-->
                                                </div>
                                                <div class="mb-5">
                                                    <!--begin::Label-->
                                                    <label class="required fw-semibold fs-6 mb-5">BANK</label>

                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="bank"
                                                                type="radio" value="bpd-aceh"
                                                                id="kt_modal_update_role_option_0" checked='checked' />
                                                            <img class="w-45px me-3"
                                                                src="{{ asset('front/bank_logo/BPD-Aceh.png') }}"
                                                                alt="">
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_0">
                                                                <div class="fw-bold text-gray-800">Bank BPD Aceh</div>
                                                                <div class="text-gray-600">
                                                                    Metode Pembayaran dengan Bank Pembangunan Daerah Aceh
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="bank"
                                                                type="radio" value="bsi"
                                                                id="kt_modal_update_role_option_0" />
                                                            <img class="w-45px me-3"
                                                                src="{{ asset('front/bank_logo/BSI.png') }}"
                                                                alt="">
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_0">
                                                                <div class="fw-bold text-gray-800">BSI</div>
                                                                <div class="text-gray-600">
                                                                    Metode Pembayaran dengan Bank BSI
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="bank"
                                                                type="radio" value="BRI"
                                                                id="kt_modal_update_role_option_0" />
                                                            <img class="w-45px me-3"
                                                                src="{{ asset('front/bank_logo/BRI.png') }}"
                                                                alt="">
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_0">
                                                                <div class="fw-bold text-gray-800">BRI</div>
                                                                <div class="text-gray-600">
                                                                    Metode Pembayaran dengan Bank BRI
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="bank"
                                                                type="radio" value="BNI"
                                                                id="kt_modal_update_role_option_0" />
                                                            <img class="w-45px me-3"
                                                                src="{{ asset('front/bank_logo/BNI.png') }}"
                                                                alt="">
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_0">
                                                                <div class="fw-bold text-gray-800">BNI</div>
                                                                <div class="text-gray-600">
                                                                    Metode Pembayaran dengan Bank BNI
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="bank"
                                                                type="radio" value="Mandiri"
                                                                id="kt_modal_update_role_option_0" />
                                                            <img class="w-45px me-3"
                                                                src="{{ asset('front/bank_logo/Mandiri.png') }}"
                                                                alt="">
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_0">
                                                                <div class="fw-bold text-gray-800">Mandiri</div>
                                                                <div class="text-gray-600">
                                                                    Metode Pembayaran dengan Bank Mandiri
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="bank"
                                                                type="radio" value="BCA"
                                                                id="kt_modal_update_role_option_0" />
                                                            <img class="w-45px me-3"
                                                                src="{{ asset('front/bank_logo/BCA.png') }}"
                                                                alt="">
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_0">
                                                                <div class="fw-bold text-gray-800">BCA</div>
                                                                <div class="text-gray-600">
                                                                    Metode Pembayaran dengan Bank BCA
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="bank"
                                                                type="radio" value="BTN"
                                                                id="kt_modal_update_role_option_0" />
                                                            <img class="w-45px me-3"
                                                                src="{{ asset('front/bank_logo/BTN.png') }}"
                                                                alt="">
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_0">
                                                                <div class="fw-bold text-gray-800">BTN</div>
                                                                <div class="text-gray-600">
                                                                    Metode Pembayaran dengan Bank BTN
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="bank"
                                                                type="radio" value="BTPN"
                                                                id="kt_modal_update_role_option_0" />
                                                            <img class="w-45px me-3"
                                                                src="{{ asset('front/bank_logo/BTPN.png') }}"
                                                                alt="">
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_0">
                                                                <div class="fw-bold text-gray-800">BTPN</div>
                                                                <div class="text-gray-600">
                                                                    Metode Pembayaran dengan Bank BTPN
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>


                                                </div>
                                            </div>
                                            <!--end::Scroll-->
                                            <!--begin::Actions-->
                                            <div class="text-center pt-10">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">batal</button>
                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label">Simpan</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - Add task-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-125px">Nama Rekening</th>
                                <th class="min-w-125px">Nomor Rekening</th>
                                <th class="min-w-125px">Bank</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @foreach ($metode_pembayaran as $metode)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <a href="apps/customers/view.html"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $metode->nama_rek }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary mb-1">{{ $metode->no_rek }}</a>
                                    </td>
                                    <td data-filter="mastercard">
                                        @if ($metode->bank == 'bpd-aceh')
                                            <img src="{{ asset('front/bank_logo/BPD-Aceh.png') }}" class="w-35px me-3"
                                                alt="" />Bank {{ $metode->bank }}
                                        @elseif ($metode->bank == 'BSI')
                                            <img src="{{ asset('front/bank_logo/BSI.png') }}" class="w-35px me-3" alt="" />
                                            Bank {{ $metode->bank }}
                                        @elseif ($metode->bank == 'BRI')
                                            <img src="{{ asset('front/bank_logo/BRI.png') }}" class="w-35px me-3" alt="" />
                                            Bank {{ $metode->bank }}
                                        @elseif ($metode->bank == 'BNI')
                                            <img src="{{ asset('front/bank_logo/BNI.png') }}" class="w-35px me-3" alt="" />
                                            Bank {{ $metode->bank }}
                                        @elseif ($metode->bank == 'Mandiri')
                                            <img src="{{ asset('front/bank_logo/Mandiri.png') }}" class="w-35px me-3"
                                                alt="" />Bank {{ $metode->bank }}
                                        @elseif ($metode->bank == 'BCA')
                                            <img src="{{ asset('front/bank_logo/BCA.png') }}" class="w-35px me-3" alt="" />
                                            Bank {{ $metode->bank }}
                                        @elseif ($metode->bank == 'BTN')
                                            <img src="{{ asset('front/bank_logo/BTN.png') }}" class="w-35px me-3" alt="" />
                                            Bank {{ $metode->bank }}
                                        @elseif ($metode->bank == 'BTPN')
                                            <img src="{{ asset('front/bank_logo/BTPN.png') }}" class="w-35px me-3" alt="" />
                                            Bank {{ $metode->bank }}
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_edit_user{{ $metode->id }}">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_delete_user{{ $metode->id }}">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

    @foreach ($metode_pembayaran as $metode)
        <div class="modal fade" id="kt_modal_edit_user{{ $metode->id }}" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Edit Metode Pembayaran</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body px-5 my-7">
                        <!--begin::Form-->
                        <form id="kt_modal_add_user_form" class="form" method="POST"
                            action="{{ route('back.metode-pembayaran.update', $metode->id) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Nama Rekening</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="nama_rek"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nama Rekening"
                                        value="{{ $metode->nama_rek }}" required />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Nomor Rekening</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="no_rek"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="No. Rekening"
                                        value="{{ $metode->no_rek }}" required />
                                    <!--end::Input-->
                                </div>
                                <div class="mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-5">BANK</label>

                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="bank" type="radio"
                                                @if ($metode->bank == 'bpd-aceh') checked='checked' @endif value="bpd-aceh"
                                                id="kt_modal_update_role_option_0" checked='checked' />
                                            <img class="w-45px me-3" src="{{ asset('front/bank_logo/BPD-Aceh.png') }}"
                                                alt="">
                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                <div class="fw-bold text-gray-800">Bank BPD Aceh</div>
                                                <div class="text-gray-600">
                                                    Metode Pembayaran dengan Bank Pembangunan Daerah Aceh
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="bank" type="radio"
                                                @if ($metode->bank == 'BSI') checked='checked' @endif
                                                value="BSI" id="kt_modal_update_role_option_0" />
                                            <img class="w-45px me-3" src="{{ asset('front/bank_logo/BSI.png') }}"
                                                alt="">
                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                <div class="fw-bold text-gray-800">BSI</div>
                                                <div class="text-gray-600">
                                                    Metode Pembayaran dengan Bank BSI
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="bank" type="radio"
                                                @if ($metode->bank == 'BRI') checked='checked' @endif
                                                value="BRI" id="kt_modal_update_role_option_0" />
                                            <img class="w-45px me-3" src="{{ asset('front/bank_logo/BRI.png') }}"
                                                alt="">
                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                <div class="fw-bold text-gray-800">BRI</div>
                                                <div class="text-gray-600">
                                                    Metode Pembayaran dengan Bank BRI
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="bank" type="radio"
                                                @if ($metode->bank == 'BNI') checked='checked' @endif
                                                value="BNI" id="kt_modal_update_role_option_0" />
                                            <img class="w-45px me-3" src="{{ asset('front/bank_logo/BNI.png') }}"
                                                alt="">
                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                <div class="fw-bold text-gray-800">BNI</div>
                                                <div class="text-gray-600">
                                                    Metode Pembayaran dengan Bank BNI
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="bank" type="radio"
                                                @if ($metode->bank == 'Mandiri') checked='checked' @endif
                                                value="Mandiri" id="kt_modal_update_role_option_0" />
                                            <img class="w-45px me-3" src="{{ asset('front/bank_logo/Mandiri.png') }}"
                                                alt="">
                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                <div class="fw-bold text-gray-800">Mandiri</div>
                                                <div class="text-gray-600">
                                                    Metode Pembayaran dengan Bank Mandiri
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="bank" type="radio"
                                                @if ($metode->bank == 'BCA') checked='checked' @endif
                                                value="BCA" id="kt_modal_update_role_option_0" />
                                            <img class="w-45px me-3" src="{{ asset('front/bank_logo/BCA.png') }}"
                                                alt="">
                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                <div class="fw-bold text-gray-800">BCA</div>
                                                <div class="text-gray-600">
                                                    Metode Pembayaran dengan Bank BCA
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="bank" type="radio"
                                                @if ($metode->bank == 'BTN') checked='checked' @endif
                                                value="BTN" id="kt_modal_update_role_option_0" />
                                            <img class="w-45px me-3" src="{{ asset('front/bank_logo/BTN.png') }}"
                                                alt="">
                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                <div class="fw-bold text-gray-800">BTN</div>
                                                <div class="text-gray-600">
                                                    Metode Pembayaran dengan Bank BTN
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="bank" type="radio"
                                                @if ($metode->bank == 'BTPN') checked='checked' @endif
                                                value="BTPN" id="kt_modal_update_role_option_0" />
                                            <img class="w-45px me-3" src="{{ asset('front/bank_logo/BTPN.png') }}"
                                                alt="">
                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                <div class="fw-bold text-gray-800">BTPN</div>
                                                <div class="text-gray-600">
                                                    Metode Pembayaran dengan Bank BTPN
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>


                                </div>
                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"
                                    aria-label="Close">batal</button>
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Update</span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <div class="modal fade" id="kt_modal_delete_user{{ $metode->id }}" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Hapus Metode Pembayaran</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body px-5">
                        <!--begin::Form-->
                        <form id="kt_modal_add_user_form" class="form" method="POST"
                            action="{{ route('back.metode-pembayaran.destroy', $metode->id) }}">
                            @method('DELETE')
                            @csrf
                            <h3 class="text-center">
                                Apakah Anda Yakin Ingin Menghapus Metode Pembayaran {{ $metode->nama_rek }} ?
                            </h3>
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"
                                    aria-label="Close">batal</button>
                                <button type="submit" class="btn btn-danger" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Hapus</span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
    @endforeach
@endsection
@section('scripts')
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('back/js/custom/apps/user-management/users/list/table.js') }}"></script>
    <script src="{{ asset('back/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
    <script src="{{ asset('back/js/custom/apps/user-management/users/list/add.js') }}"></script>
    <!--end::Custom Javascript-->
@endsection

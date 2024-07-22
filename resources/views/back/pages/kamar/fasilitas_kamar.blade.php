@extends('back/app')
@section('styles')
@endsection
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-user-table-filter="search"
                                class="form-control form-control-solid w-250px ps-13" placeholder="Cari Fasilitas Kamar" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_user">
                                <i class="ki-duotone ki-plus fs-2"></i>Tambah Fasilitas Kamar</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center d-none" {{-- data-kt-user-table-toolbar="selected" --}}>
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                                Selected</button>
                        </div>
                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <div class="modal-content">
                                    <div class="modal-header" id="kt_modal_add_user_header">
                                        <h2 class="fw-bold">Tambah Fasilitas Kamar</h2>
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-users-modal-action="close">
                                            <i class="ki-duotone ki-cross fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="modal-body px-5 my-7">
                                        <form id="kt_modal_add_user_form" class="form" method="POST"
                                            action="{{ route('back.fasilitas-kamar.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                data-kt-scroll-offset="300px">
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-semibold fs-6 mb-2">Nama Fasilitas
                                                        Kamar</label>
                                                    <input type="text" name="nama"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Nama Tipe" value="{{ old('nama') }}" required />
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-semibold fs-6 mb-2">Detail</label>
                                                    <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="detail" rows="3" placeholder="Detail">{{ old('detail') }}</textarea>
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-semibold fs-6 mb-2">Icon</label>
                                                    <input type="file" name="icon"
                                                        accept="image/png, image/jpeg, image/jpg"
                                                        class="form-control form-control-solid mb-3 mb-lg-0" required />
                                                    <span class="form-text text-muted">Icon disarankan berukuran < 128px</span>
                                                </div>
                                            </div>
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
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-125px">Nama Fasilitas kamar</th>
                                <th class="min-w-125px">Deskripsi</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>

                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @foreach ($fasilitas_kamar as $fasilitas)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="symbol symbol-50px">
                                                <span class="symbol-label"
                                                    style="background-image:url(@if ($fasilitas->icon) {{ Storage::url('uploads/fasilitas/' . $fasilitas->icon) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $fasilitas->name }} @endif);"></span>
                                            </a>
                                            <div class="ms-5">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                                    data-kt-ecommerce-product-filter="product_name">{{ $fasilitas->nama }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pe-0">
                                        <span class="fw-bold">{{ $fasilitas->detail }}</span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_edit_user{{ $fasilitas->id }}">Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_delete_user{{ $fasilitas->id }}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @foreach ($fasilitas_kamar as $fasilitas)
        <div class="modal fade" id="kt_modal_edit_user{{ $fasilitas->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <h2 class="fw-bold">Edit Fasilitas Kamar</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body px-5 my-7">
                        <form id="kt_modal_add_user_form" class="form" method="POST"
                            action="{{ route('back.fasilitas-kamar.update', $fasilitas->id) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Nama Fasilitas
                                        Kamar</label>
                                    <input type="text" name="nama"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Nama Tipe" value="{{ $fasilitas->nama }}" required />
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Detail</label>
                                    <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="detail" rows="3" placeholder="Detail">{{ $fasilitas->detail }}</textarea>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class=" fw-semibold fs-6 mb-2">Icon</label>
                                    <input type="file" name="icon"
                                        accept="image/png, image/jpeg, image/jpg"
                                        class="form-control form-control-solid mb-3 mb-lg-0"  />
                                    <span class="form-text text-muted">Icon disarankan berukuran < 128px</span>
                                </div>
                            </div>
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"
                                    aria-label="Close">batal</button>
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="kt_modal_delete_user{{ $fasilitas->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <h2 class="fw-bold">Hapus Fasilitas Kamar</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body px-5">
                        <form id="kt_modal_add_user_form" class="form" method="POST"
                            action="{{ route('back.fasilitas-kamar.destroy', $fasilitas->id) }}">
                            @method('DELETE')
                            @csrf
                            <h3 class="text-center">
                                Apakah Anda Yakin Ingin Menghapus Fasilitas Kamar {{ $fasilitas->nama }} ?
                            </h3>
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"
                                    aria-label="Close">batal</button>
                                <button type="submit" class="btn btn-danger" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Hapus</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('scripts')
    <script src="{{ asset('back/js/custom/apps/user-management/users/list/table.js') }}"></script>
    <script src="{{ asset('back/js/custom/apps/user-management/users/list/add.js') }}"></script>
@endsection

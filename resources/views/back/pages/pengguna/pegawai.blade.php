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
                                class="form-control form-control-solid w-250px ps-13" placeholder="Cari Pegawai" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-filter fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Filter</button>
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <div class="px-7 py-5" data-kt-user-table-filter="form">
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">Role:</label>
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-kt-user-table-filter="jenis_kelamin" data-hide-search="true">
                                            <option></option>
                                            <option value="pegawai">Pegawai</option>
                                            <option value="admin super">Admin Super</option>
                                            <option value="admin hotel">Admin Hotel</option>
                                            <option value="admin pegawai">Admin Pegawai</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="reset"
                                            class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                            data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary fw-semibold px-6"
                                            data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_export_users">
                                <i class="ki-duotone ki-exit-up fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Export</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_user">
                                <i class="ki-duotone ki-plus fs-2"></i>Tambah Pegawai</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center d-none" {{-- data-kt-user-table-toolbar="selected" --}}>
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                                Selected</button>
                        </div>
                        <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="fw-bold">Export Users</h2>
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-users-modal-action="close">
                                            <i class="ki-duotone ki-cross fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <form id="kt_modal_export_users_form" class="form" action="#">
                                            <div class="fv-row mb-10">
                                                <label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
                                                <select name="role" data-control="select2"
                                                    data-placeholder="Select a role" data-hide-search="true"
                                                    class="form-select form-select-solid fw-bold">
                                                    <option></option>
                                                    <option value="Pegawaiistrator">Pegawaiistrator</option>
                                                    <option value="Analyst">Analyst</option>
                                                    <option value="Developer">Developer</option>
                                                    <option value="Support">Support</option>
                                                    <option value="Trial">Trial</option>
                                                </select>
                                            </div>
                                            <div class="fv-row mb-10">
                                                <label class="required fs-6 fw-semibold form-label mb-2">Select Export
                                                    Format:</label>
                                                <select name="format" data-control="select2"
                                                    data-placeholder="Select a format" data-hide-search="true"
                                                    class="form-select form-select-solid fw-bold">
                                                    <option></option>
                                                    <option value="excel">Excel</option>
                                                    <option value="pdf">PDF</option>
                                                </select>
                                            </div>
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
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <div class="modal-content">
                                    <div class="modal-header" id="kt_modal_add_user_header">
                                        <h2 class="fw-bold">Tambah Pegawai</h2>
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
                                            action="{{ route('back.pengguna.pegawai.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                data-kt-scroll-offset="300px">
                                                <div class="fv-row mb-7">
                                                    <label class="d-block fw-semibold fs-6 mb-5">Foto</label>
                                                    <div class="image-input image-input-outline image-input-empty"
                                                        data-kt-image-input="true">
                                                        <div class="image-input-wrapper w-125px h-125px"
                                                            style="background-image: url({{ asset('back/media/svg/files/blank-image.svg') }});">
                                                        </div>
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="Ubah Foto">
                                                            <i class="ki-duotone ki-pencil fs-7">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <input type="file" name="foto"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                        </label>
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                            title="Batalkan Foto">
                                                            <i class="ki-duotone ki-cross fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </span>
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                            title="Hapus Foto">
                                                            <i class="ki-duotone ki-cross fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </span>
                                                    </div>
                                                    <div class="form-text">Menerima Foto dengan Tipe: png, jpg,
                                                        jpeg.<br>Ukuran Maks 2 MB</div>
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-semibold fs-6 mb-2">Nama Lengkap</label>
                                                    <input type="text" name="name"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Nama Pegawai" value="{{ old('name') }}" required />
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-semibold fs-6 mb-2">Jabatan</label>
                                                    <input type="text" name="jabatan"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Jabatan Pegawai" value="{{ old('jabatan') }}"
                                                        required />
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-semibold fs-6 mb-2">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" data-control="select2"
                                                        data-placeholder="Pilih Jenis Kelamin"
                                                        class="form-select form-select-solid fw-bold" required>
                                                        <option></option>
                                                        <option value="L"
                                                            @if (old('jenis_kelamin') == 'L') selected @endif>Laki-Laki
                                                        </option>
                                                        <option value="P"
                                                            @if (old('jenis_kelamin') == 'P') selected @endif>Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class=" fw-semibold fs-6 mb-2">Alamat</label>
                                                    <textarea name="alamat" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Alamat Pegawai">{{ old('alamat') }}</textarea>
                                                </div>

                                                <div class="mb-5">
                                                    <label class="required fw-semibold fs-6 mb-5">Role</label>
                                                    <div class="d-flex fv-row">

                                                        <div class="form-check form-check-custom ">
                                                            <input class="form-check-input me-3" name="role_pegawai"
                                                                type="checkbox" value="pegawai"
                                                                id="kt_modal_update_role_option_0" checked='checked' />
                                                            <label
                                                                class="form-check-label"
                                                                for="kt_modal_update_role_option_0">
                                                                <div class="fw-bold text-gray-800">Pegawai</div>
                                                                <div class="text-gray-600">Pegawai dengan role pegawai
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="role_admin_super"
                                                                type="checkbox" value="admin super"
                                                                id="kt_modal_update_role_option_1" />
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_1">
                                                                <div class="fw-bold text-gray-800">Admin Super</div>
                                                                <div class="text-gray-600">Pegawai dengan role admin
                                                                    super</div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="role_admin_hotel"
                                                                type="checkbox" value="admin hotel"
                                                                id="kt_modal_update_role_option_2" />
                                                            <label
                                                                class="form-check-label"
                                                                for="kt_modal_update_role_option_2">
                                                                <div class="fw-bold text-gray-800">Admin Hotel</div>
                                                                <div class="text-gray-600">Pegawai dengan role admin
                                                                    hotel</div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <div class="d-flex fv-row">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-3" name="role_admin_pegawai"
                                                                type="checkbox" value="admin pegawai"
                                                                id="kt_modal_update_role_option_3" />
                                                            <label
                                                                class="form-check-label"
                                                                for="kt_modal_update_role_option_3">
                                                                <div class="fw-bold text-gray-800">Admin Pegawai</div>
                                                                <div class="text-gray-600">Pegawai dengan role admin
                                                                    pegawai</div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='separator separator-dashed my-5'></div>
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                    <input type="email" name="email"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="emailPegawai@domain.com" value="{{ old('email') }}"
                                                        required />
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="fw-semibold fs-6 mb-2">Nomor Telephone</label>
                                                    <input type="tel" name="no_telp"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="08xxxx" value="{{ old('no_telp') }}" />
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label class="required fw-semibold fs-6 mb-2">Password</label>
                                                    <input type="password" name="password"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="*********" value="{{ old('password') }}" required />
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
                                <th class="min-w-125px">Pegawai</th>
                                <th class="min-w-125px">Jabatan</th>
                                <th class="min-w-125px">Info</th>
                                <th class="min-w-125px">Role</th>
                                <th class="min-w-125px">Waktu Bergabung</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="#">
                                                <div class="symbol-label">
                                                    <img src="{{ $user->pegawai?->getFoto() }}"
                                                        alt="{{ $user->pegawai?->nama }}" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $user->pegawai->nama }}</a>
                                            <span>{{ $user->email }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $user->pegawai?->jabatan }}
                                    </td>
                                    <td>
                                        <ul>
                                            <li><strong>Jenis Kelamin: </strong>
                                                @if ($user->pegawai?->jenis_kelamin == 'L')
                                                    Laki-Laki
                                                @else
                                                    Perempuan
                                                @endif

                                            </li>
                                            <li><strong>Nomor Telepon: </strong>{{ $user->pegawai?->no_telp }}</li>
                                            <li><strong>Alamat: </strong>{{ $user->pegawai?->alamat }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        @foreach ($user->getRoleNames() as $role)
                                            @if ($role == 'admin super')
                                                <span class="badge badge-light-danger fw-bold fs-8 px-2 py-1 ms-2">Admin
                                                    Super</span>
                                            @elseif ($role == 'admin hotel')
                                                <span class="badge badge-light-primary fw-bold fs-8 px-2 py-1 ms-2">Admin
                                                    Hotel</span>
                                            @elseif ($role == 'admin pegawai')
                                                <span class="badge badge-light-warning fw-bold fs-8 px-2 py-1 ms-2">Admin
                                                    Pegawai</span>
                                            @elseif ($role == 'pegawai')
                                                <span
                                                    class="badge badge-light-info fw-bold fs-8 px-2 py-1 ms-2">Pegawai</span>
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_edit_user{{ $user->id }}">Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_delete_user{{ $user->id }}">Delete</a>
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
    @foreach ($users as $user)
        <div class="modal fade" id="kt_modal_edit_user{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <h2 class="fw-bold">Edit Pegawai</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body px-5 my-7">
                        <form id="kt_modal_add_user_form" class="form" method="POST"
                            action="{{ route('back.pengguna.pegawai.update', $user->id) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                <div class="fv-row mb-7">
                                    <label class="d-block fw-semibold fs-6 mb-5">Foto</label>
                                    <div class="image-input image-input-outline image-input-empty"
                                        data-kt-image-input="true">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url({{ $user->pegawai?->getFoto() }});">
                                        </div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Ubah Foto">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Batalkan Foto">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Hapus Foto">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-text">Menerima Foto dengan Tipe: png, jpg,
                                        jpeg.<br>Ukuran Maks 2 MB</div>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Nama Lengkap</label>
                                    <input type="text" name="name"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nama Pegawai"
                                        value="{{ $user->pegawai?->nama }}" required />
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Jabatan</label>
                                    <input type="text" name="jabatan"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Jabatan Pegawai"
                                        value="{{ $user->pegawai?->jabatan }}" required />
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" data-control="select2"
                                        data-placeholder="Pilih Jenis Kelamin"
                                        class="form-select form-select-solid fw-bold" required>
                                        <option></option>
                                        <option value="L"
                                            @if ($user->pegawai?->jenis_kelamin == 'L') selected @endif>Laki-Laki
                                        </option>
                                        <option value="P"
                                            @if ($user->pegawai?->jenis_kelamin == 'P') selected @endif>Perempuan
                                        </option>
                                    </select>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class=" fw-semibold fs-6 mb-2">Alamat</label>
                                    <textarea name="alamat" class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Alamat Pegawai">{{ $user->pegawai?->alamat }}</textarea>
                                </div>
                                <div class="mb-5">
                                    <label class="required fw-semibold fs-6 mb-5">Role</label>
                                    <div class="d-flex fv-row">

                                        <div class="form-check form-check-custom ">
                                            <input class="form-check-input me-3" name="role_pegawai" type="checkbox"
                                                value="pegawai" id="kt_modal_update_role_option_0"
                                                @if ($user->hasRole('pegawai')) checked @endif />
                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                <div class="fw-bold text-gray-800">Pegawai</div>
                                                <div class="text-gray-600">Pegawai dengan role pegawai</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="role_admin_super" type="checkbox"
                                                value="admin super" id="kt_modal_update_role_option_1"
                                                @if ($user->hasRole('admin super')) checked @endif />
                                            <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                <div class="fw-bold text-gray-800">Admin Super</div>
                                                <div class="text-gray-600">Pegawai dengan role admin super</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="role_admin_hotel" type="checkbox"
                                                value="admin hotel" id="kt_modal_update_role_option_2"
                                                @if ($user->hasRole('admin hotel')) checked @endif />
                                            <label class="form-check-label" for="kt_modal_update_role_option_2">
                                                <div class="fw-bold text-gray-800">Admin Hotel</div>
                                                <div class="text-gray-600">Pegawai dengan role admin hotel</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="role_admin_pegawai" type="checkbox"
                                                value="admin pegawai" id="kt_modal_update_role_option_3"
                                                @if ($user->hasRole('admin pegawai')) checked @endif />
                                            <label class="form-check-label" for="kt_modal_update_role_option_3">
                                                <div class="fw-bold text-gray-800">Admin Pegawai</div>
                                                <div class="text-gray-600">Pegawai dengan role admin pegawai</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Email</label>
                                    <input type="email" name="email"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="emailPegawai@domain.com" value="{{ $user->email }}" required />
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="fw-semibold fs-6 mb-2">Nomor Telephone</label>
                                    <input type="tel" name="no_telp"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="08xxxx"
                                        value="{{ $user->no_telp }}" />
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="fw-semibold fs-6 mb-2">Password</label>
                                    <input type="password" name="password"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="*********"
                                        value="" />
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
        <div class="modal fade" id="kt_modal_delete_user{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <h2 class="fw-bold">Hapus Pegawai</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body px-5">
                        <form id="kt_modal_add_user_form" class="form" method="POST"
                            action="{{ route('back.pengguna.pegawai.destroy', $user->id) }}">
                            @method('DELETE')
                            @csrf
                            <h3 class="text-center">
                                Apakah Anda Yakin Ingin Menghapus Pegawai {{ $user->pegawai?->nama }} ?
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
    <script src="{{ asset('back/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
    <script src="{{ asset('back/js/custom/apps/user-management/users/list/add.js') }}"></script>
@endsection

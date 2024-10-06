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
                                class="form-control form-control-solid w-250px ps-13" placeholder="Cari Pelanggan" />
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
                                <th class="min-w-125px">pengguna</th>
                                <th class="min-w-125px">Kamar</th>
                                <th class="min-w-125px">Rating</th>
                                <th class="min-w-125px">Komentar</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @foreach ($ulasan as $data)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-5 position-relative">
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{ $data->pelanggan?->getFoto() }}" />
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href=""
                                                    class="fs-6 text-gray-800 text-hover-primary">{{ $data->pelanggan?->nama }}</a>
                                                <span
                                                    class="fs-7 text-gray-500">{{ $data->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route("back.kamar.detail", $data->kamar->id ) }}"
                                            class="fs-6 text-gray-800 text-hover-primary">No Kamar: {{ $data->kamar->nomor_kamar }}
                                            <br>
                                            <span class="fs-7 text-gray-500">{{ $data->kamar->tipe->nama }}</span>
                                        </a>

                                    </td>
                                    <td>
                                        <div class="rating">
                                            @for ($i = 0; $i < $data->rating; $i++)
                                                <div class="rating-label checked">
                                                    <i class="ki-duotone ki-star fs-6"></i>
                                                </div>
                                            @endfor
                                            @for ($i = 0; $i < 5 - $data->rating; $i++)
                                                <div class="rating-label">
                                                    <i class="ki-duotone ki-star fs-6"></i>
                                                </div>
                                            @endfor
                                        </div>
                                    </td>
                                    <td>
                                        {{ $data->komentar }}
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            {{-- <div class="menu-item px-3">
                                                <a class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_edit_user{{ $data->id }}">Edit</a>
                                            </div> --}}
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_delete_user{{ $data->id }}">Delete</a>
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
    @foreach ($ulasan as $data)
        <div class="modal fade" id="kt_modal_delete_user{{ $data->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <h2 class="fw-bold">Hapus pelanggan</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body px-5">
                        <form id="kt_modal_add_user_form" class="form" method="POST"
                            action="{{ route('back.pengguna.pelanggan.destroy', $data->id) }}">
                            @method('DELETE')
                            @csrf
                            <h3 class="text-center">
                                Apakah Anda Yakin Ingin Menghapus Pelanggan {{ $data->name }} ?
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
@endsection

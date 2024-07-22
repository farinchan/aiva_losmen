@extends('back/app')
@section('styles')
@endsection
@section('content')
    <div class=" container-xxl " id="kt_content_container">
        <form id="kt_ecommerce_add_category_form"
            class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
            action="{{ route('back.kamar.update', $kamar->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Foto Kamar</h2>
                        </div>
                    </div>
                    <div class="card-body text-center pt-0">
                        <div class="image-input image-input-empty" data-kt-image-input="true">
                            <div class="image-input-wrapper w-200px h-150px"
                                style="background-image: url('{{ Storage::url('uploads/kamar/' . $kamar->foto) }}')">
                            </div>
                            <label
                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Change thumbnail">
                                <i class="bi bi-pencil"><span class="path1"></span><span class="path2"></span></i>
                                <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                            </label>
                            <span
                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Cancel thumbnail">
                                <i class="bi bi-x fs-3"></i>
                            </span>
                            <span
                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Remove thumbnail">
                                <i class="bi bi-x fs-3"></i>
                            </span>
                        </div>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="text-muted fs-7 pt-3">File yang diizinkan: *.png, *.jpg, *.jpeg <br>Maksimal 2mb
                            <br>Dengan rasio 18:9
                        </div>
                    </div>
                </div>
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Jenis Kamar</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <label class="form-label required">Tipe Kamar</label>
                        <select class="form-select mb-2" name="tipe_id" data-control="select2" required>
                            @foreach ($tipe_kamar as $tipe)
                                <option @if ($kamar->id == $tipe->id) selected @endif value="{{ $tipe->id }}">
                                    {{ $tipe->nama }}</option>
                            @endforeach
                        </select>
                        <div class="text-muted fs-7 mb-7">Pilih tipe kamar yang dibuat</div>
                        <a href="{{ route('back.tipe-kamar.index') }}" class="btn btn-light-primary btn-sm mb-2">
                            <i class="ki-duotone ki-plus fs-2"></i>Buat tipe kamar baru
                        </a>
                    </div>
                </div>
                <div class="card card-flush py-4">
                    <div class="card-body py-0">
                        <div class="card card-flush py-4">
                            <a href="https://demo.gariskode.com/menu/hotel" class="btn btn-light-primary">Batal</a>
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Informasi umum</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="required form-label">Nomor Kamar</label>
                            <input type="number" name="nomor_kamar"
                                class="form-control mb-2 @error('nomor_kamar') is-invalid @enderror"
                                placeholder="Nomor Kamar" value="{{ $kamar->nomor_kamar }}" required>
                        </div>
                        @error('nomor_kamar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="card-body pt-0">
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="form-label required">Deskripsi Kamar</label>
                            <div id="editor" class="min-h-250px mb-2">
                                {!! $kamar->deskripsi !!}
                                <p></p>
                            </div>
                            <input class="@error('deskripsi') is-invalid @enderror" type="hidden" id="description_quill"
                                name="deskripsi">
                        </div>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Informasi Kamar</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class=" mb-7 d-flex flex-wrap gap-5">
                            <div class="fv-row w-100 flex-md-root">
                                <label class="required form-label">Harga (RP.) Kamar per Malam</label>
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input name="harga" type="number" value="{{ $kamar->harga }}"
                                        class="form-control @error('harga') is-invalid @enderror" placeholder="Harga Kamar"
                                        aria-label="harga" aria-describedby="basic-addon1" />
                                </div>
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <label class="form-label required">Kapasitas Kamar</label>
                                <div class="input-group mb-5">
                                    <input name="kapasitas" type="number" value="{{ $kamar->kapasitas }}"
                                        class="form-control @error('kapasitas') is-invalid @enderror"
                                        placeholder="Kapasitas Kamar" aria-label="kapasitas"
                                        aria-describedby="basic-addon1" />
                                    <span class="input-group-text" id="basic-addon1">Orang</span>
                                </div>
                                @error('kapasitas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="fs-6 fw-semibold mb-2">Fasilitas Kamar
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Pilih fasilitas yang tersedia di kamar">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span></label>
                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-5">
                                @foreach ($fasilitas_kamar as $fasilitas)
                                    <div class="col">
                                        <label id="label-fasilitas-{{ $fasilitas->id }}"
                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6">
                                            <span
                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1 me-5 active">
                                                <input id="fasilitas-{{ $fasilitas->id }}" class="form-check-input"
                                                    type="checkbox" name="fasilitas[]" value="{{ $fasilitas->id }}" />
                                            </span>
                                            <img class="w-35px me-1"
                                                src="@if ($fasilitas->icon) {{ Storage::url('uploads/fasilitas/' . $fasilitas->icon) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $fasilitas->name }} @endif"
                                                alt="">
                                            <span class="ms-5">
                                                <span
                                                    class="fs-4 fw-bold text-gray-800 d-block">{{ $fasilitas->nama }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
        var quillEditor = document.getElementById('description_quill');
        quillEditor.value = quill.root.innerHTML;
        quill.on('text-change', function() {
            quillEditor.value = quill.root.innerHTML;
        });
    </script>

    @foreach ($fasilitas_kamar as $fasilitas)
        <script>
            $('#fasilitas-{{ $fasilitas->id }}').change(function() {
                if ($(this).is(':checked')) {
                    $('#label-fasilitas-{{ $fasilitas->id }}').addClass('active');
                } else {
                    $('#label-fasilitas-{{ $fasilitas->id }}').removeClass('active');
                }
            });
        </script>

        @foreach ($fasilitas_detail as $fasil)
            @if ($fasil->fasilitas->id === $fasilitas->id)
                <script>
                    $('#fasilitas-{{ $fasilitas->id }}').prop('checked', true);
                    $('#label-fasilitas-{{ $fasilitas->id }}').addClass('active');
                </script>
            @endif
        @endforeach

    @endforeach
@endsection

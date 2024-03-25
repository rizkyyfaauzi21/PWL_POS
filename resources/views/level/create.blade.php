@extends('layout.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Buat Level Baru</h3>
            </div>
            <form method="post" action="../level">
                <div class="card-body">
                    <div class="form-group">
                        {{-- <label for="kodeLevel">Level Kode</label>
                        <input type="text" class="form-control" id="kodeLevel" name="kodeLevel" placeholder="Kode Level"> --}}
                        <label for="level_kode">Kode Level</label>
                        <input id="level_kode"
                            type="text"
                            name="level_kode"
                            class="@error('level_kode') is-invalid @enderror">

                        @error('level_kode')
                            <div class = "alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="namaLevel">Level Nama</label>
                        <input type="text" class="form-control" id="namaLevel" name="namaLevel" placeholder="Nama Level"> --}}
                        <label for="level_nama">Nama Level</label>
                        <input id="level_nama"
                            type="text"
                            name="level_nama"
                            class="@error('level_nama') is-invalid @enderror">

                        @error('level_nama')
                            <div class = "alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
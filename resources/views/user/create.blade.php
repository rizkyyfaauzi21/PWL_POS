@extends('layout.app')
{{-- Customize layout sections --}}
@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Buat User baru</h3>
            </div>
            <form method="post" action="../user">
                <div class="card-body">
                    <div class="form-group">
                        {{-- <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"> --}}
                        <label for="user_username">Username</label>
                        <input id="user_username"
                            type="text"
                            name="user_username"
                            class="@error('user_username') is-invalid @enderror">

                        @error('user_username')
                            <div class = "alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="namaUser">Nama</label>
                        <input type="text" class="form-control" id="namaUser" name="namaUser" placeholder="Nama"> --}}
                        <label for="user_nama">Nama User</label>
                        <input id="user_nama"
                            type="text"
                            name="user_nama"
                            class="@error('user_nama') is-invalid @enderror">

                        @error('user_nama')
                            <div class = "alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="level_id">Level Id</label>
                        <input type="text" class="form-control" id="level_id" name="level_id" placeholder="Level Id"> --}}
                        <label for="level_id">Level User</label>
                        <input id="level_id"
                            type="text"
                            name="level_id"
                            class="@error('level_id') is-invalid @enderror">

                        @error('level_id')
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

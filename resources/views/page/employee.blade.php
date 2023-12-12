@extends('layout.app')
@section('content')
    <div class="container my-3">
        <div class="card">
            <div class="card-header">
                <h5>Data Petugas</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('Admin.employeeCreate') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Username</label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" name="username" value="{{ old('username') }}"
                                placeholder="Masukkan Username" class="form-control @error('username') is-invalid @enderror"
                                id="basic-default-name">
                        </div>
                        @error('username')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama"
                                class="form-control @error('name') is-invalid @enderror" id="basic-default-name">
                        </div>
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
                        <div class="col-sm-10 mb-3">
                            <input type="password" name="password" value="{{ old('password') }}"
                                placeholder="Masukkan Password" class="form-control @error('password') is-invalid @enderror"
                                id="basic-default-name">
                        </div>
                        @error('password')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alamat</label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" name="address" value="{{ old('address') }}" placeholder="Masukkan Alamat"
                                class="form-control @error('address') is-invalid @enderror" id="basic-default-name">
                        </div>
                        @error('address')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nomer Telpon</label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                placeholder="Masukkan Telpon"
                                class="form-control @error('phone_number') is-invalid @enderror" id="basic-default-name">
                        </div>
                        @error('phone_number')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                <hr>
                <div class="table-responsive text-nowrap pt-3">
                    @if (Session::has('success'))
                        <div id="myalert" class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>username</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Telpon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom">
                            @forelse ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->username }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>{{ $employee->phone_number }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Yakin ingin menghapus kategori?')"
                                            action="{{ route('Admin.employeeDelete', $employee->id) }}" method="post">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#employeeEdit{{ $employee->username }}"><i
                                                    class="bx bx-pencil me-1"></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="bx bx-trash me-1"></i></button>
                                        </form>
                                        @include('modal.employee.modal_employee_edit')
                                    </td>
                                </tr>
                            @empty
                                <div class="text-center">
                                    <h4>Tidak ada Kateogri</h4>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

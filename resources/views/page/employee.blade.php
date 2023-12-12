@extends('layout.app')
@section('content')
    <div class="container my-3">
        <div class="card">
            <div class="card-header">
                <h5>Data Petugas</h5>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#employeeCreate">Tambah
                    Data Petugas</button>
                @include('modal.employee.modal_employee_create')
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Telpon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom">
                            @forelse ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->code }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>{{ $employee->phone_number }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Yakin ingin menghapus kategori?')" action=""
                                            method="post">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#employeeEdit{{ $employee->code }}"><i
                                                    class="bx bx-pencil me-1"></i></button>
                                            @include('modal.employee.modal_employee_edit')
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="bx bx-trash me-1"></i></button>
                                        </form>
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

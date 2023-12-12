<div class="modal fade" id="employeeEdit{{ $employee->username }}" tabindex="-1" data-bs-backdrop="static"
    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Ubah Petugas
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Admin.employeeUpdate', $employee->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Username</label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" name="username_update" value="{{ old('username', $employee->username) }}"
                                placeholder="Masukkan Username"
                                class="form-control @error('username') is-invalid @enderror" id="basic-default-name"
                                disabled>
                        </div>
                        @error('username')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" name="name_update" value="{{ old('name', $employee->name) }}"
                                placeholder="Masukkan Nama" class="form-control @error('name') is-invalid @enderror"
                                id="basic-default-name">
                        </div>
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
                        <div class="col-sm-10 mb-3">
                            <input type="password" name="password_update" value="Password" placeholder="Masukkan Password"
                                class="form-control @error('password') is-invalid @enderror" id="basic-default-name"
                                disabled>
                        </div>
                        @error('password')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alamat</label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" name="address_update" value="{{ old('address',$employee->address) }}"
                                placeholder="Masukkan Alamat"
                                class="form-control @error('address') is-invalid @enderror" id="basic-default-name">
                        </div>
                        @error('address')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nomer Telpon</label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" name="phone_number_update" value="{{ old('phone_number', $employee->phone_number) }}"
                                placeholder="Masukkan Telpon"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                id="basic-default-name">
                        </div>
                        @error('phone_number')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

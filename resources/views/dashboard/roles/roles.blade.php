@extends('template.template-dashboard-view')
@section('side-nav-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Roles Management</h1>
            <div class="mt-4">
                <div class="alert alert-info fade show" role="alert">
                    <strong>Attention!</strong><br>
                    <ol class="list-group list-group-numbered mt-2">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">It is forbidden to delete data arbitrarily:</div>
                                Delete data only if you are sure that it will not negatively affect the system.<br>
                                Make sure that the deleted data is not used in the system.
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Double check before making any changes:</div>
                                Make sure you have checked carefully before making changes to the data.
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Do not change important data without a valid reason:</div>
                                Only change important data if there is a clear and valid reason to do so.
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="mt-4">
                @include('template.partials.alert-view')
            </div>
            <div class="card mt-5">
                <div class="card-header">
                    <h8>Data Roles</h8>
                    <a href="" class="btn btn-primary mr-4" data-bs-toggle="modal" data-bs-target="#modalAdd">Add <i
                            class="fas fa-add"></i></a>
                </div>
                {{-- MODAL ADD --}}
                <!-- Modal -->
                <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
                    data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Role</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('roles-management.store') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-floating">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputMerchant" type="text" name="rolesName"
                                                value="{{ old('rolesName') }}" />
                                            <label for="inputMerchant">Roles Name (Kasir,Admin, Etc)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- ENDMODAL --}}
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Roles Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Roles Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($data as  $index => $roles)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $roles->rolesName }}</td>
                                    <td>
                                        <div class="form-row d-flex align-items-center">
                                            <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $roles->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $roles->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </div>

                                    </td>
                                </tr>

                                {{-- MODAL EDIT --}}
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $roles->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Role</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('roles-management.update', $roles->id) }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <div class="form-floating">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputMerchant" type="text"
                                                                name="rolesName"
                                                                value="{{ old('rolesName') ?? $roles->rolesName }}" />
                                                            <label for="inputMerchant">
                                                                Roles Name (Kasir,Admin, Etc)
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- ENDMODAL --}}
                                {{-- MODAL DELETE --}}
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $roles->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Role</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form-floating">
                                                    <h5>Are you sure you want to delete this role?</h5>
                                                    <h3>{{ $roles->rolesName }}</h3>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('roles-management.destroy', $roles->id) }}"
                                                    method="post" class="ml-auto">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- ENDMODAL --}}
                            @empty
                                <tr>
                                    <td colspan="3">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script-tag')
    @include('template.components.general-script')
    @include('template.components.script-data-tables')
@endsection

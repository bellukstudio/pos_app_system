@extends('template.template-dashboard-view')
@section('side-nav-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ __('page-roles.roleManage') }}</h1>
            <div class="mt-4">
                <div class="alert alert-info fade show" role="alert">
                    <strong>{{ __('page-roles.attention') }}</strong><br>
                    <ol class="list-group list-group-numbered mt-2">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ __('page-roles.r_1') }}</div>
                                {!! __('page-roles.r_1_desc') !!}
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ __('page-roles.r_2') }}</div>
                                {!! __('page-roles.r_2_desc') !!}
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ __('page-roles.r_3') }}</div>
                                {!! __('page-roles.r_3_desc') !!}
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
                    Data {{ __('page-roles.roles') }}
                    <a href="#" class="btn btn-primary mr-4" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">{{ __('button.add') }} <i class="fas fa-add"></i></a>
                </div>
                {{-- MODAL ADD --}}
                <!-- Modal -->
                <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
                    data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    {{ __('page-roles.addNewRole') }}</h1>
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
                                            <label for="inputMerchant">{{ __('page-roles.rolesName') }} (Kasir,Admin,
                                                Etc)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('button.close') }}</button>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('button.save') }} Data</button>
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
                                <th>{{ __('table.rolesName') }}</th>
                                <th>{{ __('table.action') }}</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('table.rolesName') }}</th>
                                <th>{{ __('table.action') }}</th>
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    {{ __('page-roles.editRole') }}</h1>
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
                                                                {{ __('page-roles.rolesName') }} (Kasir,Admin, Etc)
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">{{ __('button.close') }}</button>
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('button.save') }}
                                                        Data</button>
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    {{ __('page-roles.deleteRole') }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form-floating">
                                                    <h5>{{ __('page-roles.deleteAlert') }}</h5>
                                                    <h3>{{ $roles->rolesName }}</h3>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">{{ __('button.close') }}</button>
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
                                    <td colspan="3">{{ __('table.noData') }}</td>
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

@extends('template.template-dashboard-view')
@section('side-nav-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">
                {{ __('page-user.userManage') }}
            </h1>
            <div class="mt-4">
                @include('template.partials.alert-view')
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    {{ __('page-user.dataUsers') }}
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
                                    {{ __('page-user.addNewUser') }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('users-management.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-floating">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputMerchant" type="text" name="fullName"
                                                value="{{ old('fullName') }}" />
                                            <label for="inputMerchant">{{ __('page-user.fullName') }}</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputMerchant" type="email" name="email"
                                                value="{{ old('email') }}" />
                                            <label for="inputMerchant">{{ __('page-user.email') }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">{{ __('page-user.photo') }}
                                                <code>Optional</code></label>
                                            <input class="form-control" type="file" id="formFile" name="photo"
                                                value="{{ old('photo') }}">
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputMerchant" type="password" name="password"
                                                value="{{ old('password') }}" />
                                            <label for="inputMerchant">{{ __('page-user.password') }}</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select name="rolesSelect" id="" class="form-control">
                                                <option value="">{{ __('page-user.selectRoles') }}</option>
                                                @foreach ($role as $roles)
                                                    <option value="{{ $roles->id }}">{{ $roles->rolesName }}</option>
                                                @endforeach
                                            </select>
                                            <label for="inputMerchant">{{ __('page-user.selectRoles') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">{{ __('button.close') }}</button>
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
                                <th>{{ __('table.fullName') }}</th>
                                <th>{{ __('table.email') }}</th>
                                <th>{{ __('table.photo') }}</th>
                                <th>{{ __('table.rolesName') }}</th>
                                <th>{{ __('table.action') }}</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('table.fullName') }}</th>
                                <th>{{ __('table.email') }}</th>
                                <th>{{ __('table.photo') }}</th>
                                <th>{{ __('table.rolesName') }}</th>
                                <th>{{ __('table.action') }}</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($user as  $index => $users)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $users->fullName }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>
                                        @if ($users->photo == null)
                                            N/A
                                        @else
                                            <img src="{{ asset('storage/' . $users->photo) }}" class="img-fluid"
                                                width="100" height="50" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $users->roles->rolesName }}</td>
                                    <td>
                                        <div class="form-row d-flex align-items-center">
                                            <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $users->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $users->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </div>

                                    </td>
                                </tr>
                                {{-- MODAL Edit --}}
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $users->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    {{ __('page-user.editUser') }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('users-management.update', $users->id) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <div class="form-floating">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputMerchant" type="text"
                                                                name="fullName"
                                                                value="{{ old('fullName') ?? $users->fullName }}" />
                                                            <label
                                                                for="inputMerchant">{{ __('page-user.fullName') }}</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputMerchant" type="email"
                                                                name="email"
                                                                value="{{ old('email') ?? $users->email }}" />
                                                            <label for="inputMerchant">{{ __('page-user.email') }}</label>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFile"
                                                                class="form-label">{{ __('page-user.photo') }}
                                                                <code>Optional</code></label>
                                                            <input class="form-control" type="file" id="formFile"
                                                                name="photo" value="{{ old('photo') }}">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputMerchant"
                                                                type="password" name="password"
                                                                value="{{ old('password') }}" />
                                                            <label
                                                                for="inputMerchant">{{ __('page-user.createNewPass') }}</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <select name="rolesSelect" id=""
                                                                class="form-control">
                                                                <option value="">{{ __('page-user.selectRoles') }}
                                                                </option>
                                                                @foreach ($role as $roles)
                                                                    <option value="{{ $roles->id }}"
                                                                        {{ $users->rolesId == $roles->id ? 'selected' : '' }}>
                                                                        {{ $roles->rolesName }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="inputMerchant">{{ __('page-user.selectRoles') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">{{ __('button.close') }}</button>
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('button.save') }} Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- ENDMODAL --}}
                                {{-- MODAL DELETE --}}
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $users->id }}" tabindex="-1"
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
                                                    <p>{{ $users->fullName }}</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">{{ __('button.close') }}</button>
                                                <form action="{{ route('users-management.destroy', $users->id) }}"
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
                                    <td colspan="6">{{ __('table.noData') }}</td>
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

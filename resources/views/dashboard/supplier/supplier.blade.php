@extends('template.template-dashboard-view')
@section('side-nav-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ __('page-supplier.supplierManagement') }}</h1>
            <div class="mt-4">
                @include('template.partials.alert-view')
            </div>
            <div class="card mt-4">
                <div class="card-header">{{ __('page-supplier.dataSupplier') }}
                    <a href="#" class="btn btn-primary mr-4" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">{{ __('button.add') }}
                        <i class="fas fa-add"></i></a>
                </div>
                {{-- MODAL ADD --}}
                <!-- Modal -->
                <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
                    data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    {{ __('page-supplier.dataSupplier') }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('supplier-management.store') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-floating">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputSupplier" type="text"
                                                name="supplierName" value="{{ old('supplierName') }}" />
                                            <label for="inputSupplier">
                                                {{ __('page-supplier.supplierName') }}</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputSupplier" type="text" name="companyName"
                                                value="{{ old('companyName') }}" />
                                            <label for="inputSupplier">
                                                {{ __('page-supplier.companyName') }}</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputSupplier" type="text" name="phoneNumber"
                                                value="{{ old('phoneNumber') }}" />
                                            <label for="inputSupplier">
                                                {{ __('page-supplier.phoneNumber') }} <code>+62...</code></label>
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
                                <th>{{ __('table.supplierName') }}</th>
                                <th>{{ __('table.companyName') }}</th>
                                <th>{{ __('table.phoneNumber') }}</th>
                                <th>{{ __('table.action') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($supplierData as $index => $supplier)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $supplier->supplierName }}</td>
                                    <td>{{ $supplier->companyName }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>
                                        <div class="form-row d-flex align-items-center">
                                            <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $supplier->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $supplier->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </div>

                                    </td>
                                </tr>
                                {{-- MODAL Edit --}}
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $supplier->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    {{ __('page-product.productCategory') }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('supplier-management.update', $supplier->id) }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <div class="form-floating">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputSupplier" type="text"
                                                                name="supplierName"
                                                                value="{{ old('supplierName') ?? $supplier->supplierName }}" />
                                                            <label for="inputSupplier">
                                                                {{ __('page-supplier.supplierName') }}</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputSupplier" type="text"
                                                                name="companyName"
                                                                value="{{ old('companyName') ?? $supplier->companyName }}" />
                                                            <label for="inputSupplier">
                                                                {{ __('page-supplier.companyName') }}</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputSupplier" type="tel"
                                                                name="phoneNumber"
                                                                value="{{ old('phoneNumber') ?? $supplier->phone }}" />
                                                            <label for="inputSupplier">
                                                                {{ __('page-supplier.phoneNumber') }}
                                                                <code>+62...</code></label>
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
                                <div class="modal fade" id="deleteModal{{ $supplier->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    {{ __('page-product.productCategory') }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form-floating">
                                                    <h5>{{ __('page-supplier.deleteAlert') }}</h5>
                                                    <h3>{{ $supplier->supplierName }}</h3>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">{{ __('button.close') }}</button>
                                                <form action="{{ route('supplier-management.destroy', $supplier->id) }}"
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
                            @endforeach
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

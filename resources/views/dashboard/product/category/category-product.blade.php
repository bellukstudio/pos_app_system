@extends('template.template-dashboard-view')
@section('side-nav-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ __('page-product.productCategory') }}</h1>
            <div class="mt-4">
                @include('template.partials.alert-view')
            </div>
            <div class="card mt-4">
                <div class="card-header">{{ __('page-product.dataproductCategory') }}
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
                                    {{ __('page-product.productCategory') }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('product-category.store') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-floating">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputProductCategory" type="text"
                                                name="categoryName" value="{{ old('categoryName') }}" />
                                            <label for="inputProductCategory">
                                                {{ __('page-product.categoryName') }}</label>
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
                                <th>{{ __('table.categoryName') }}</th>
                                <th>{{ __('table.action') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($category as $index => $categories)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $categories->categoryName }}</td>
                                    <td>
                                        <div class="form-row d-flex align-items-center">
                                            <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $categories->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $categories->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </div>

                                    </td>
                                </tr>
                                {{-- MODAL Edit --}}
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $categories->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    {{ __('page-product.productCategory') }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('product-category.update', $categories->id) }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <div class="form-floating">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputProductCategory"
                                                                type="text" name="categoryName"
                                                                value="{{ old('categoryName') ?? $categories->categoryName }}" />
                                                            <label for="inputProductCategory">
                                                                {{ __('page-product.categoryName') }}</label>
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
                                <div class="modal fade" id="deleteModal{{ $categories->id }}" tabindex="-1"
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
                                                    <h5>{{ __('page-product.deleteAlert') }}</h5>
                                                    <h3>{{ $categories->categoryName }}</h3>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">{{ __('button.close') }}</button>
                                                <form action="{{ route('product-category.destroy', $categories->id) }}"
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

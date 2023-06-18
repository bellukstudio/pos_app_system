@extends('template.template-dashboard-view')
@section('side-nav-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Profile</h1>
            <div class="card mt-4">
                <div class="card-header">
                    Data Merchant Profile
                </div>
                <div class="card-body">
                    {{-- ALERT --}}
                    @include('template.partials.alert-view')
                    <form action="{{ route('merchant-save') }}" method="post" class="mb-3">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputMerchant" type="text" name="merchantName"
                                value="{{ old('merchantName') ?? ($masterMerchant->nameMerchant ?? '') }}" />
                            <label for="inputMerchant">Merchant Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputMerchantAddress" name="merchantAddress"
                                value="{{ old('merchantAddress') ?? ($masterMerchant->address ?? '') }}" />
                            <label for="inputMerchantAddress">Merchant Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputMerchantFounder" type="text" name="merchantFounder"
                                value="{{ old('merchantFounder') ?? ($masterMerchant->founder ?? '') }}" />
                            <label for="inputMerchantFounder">Merchant Founder</label>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="custom-select">
                                <select name="categoryMerchant" id="inputCategory" class="form-control select2">
                                    <option value="">Select Category</option>
                                    @foreach ($categorie as $categories)
                                        <option value="{{ $categories->id }}"
                                            @if ($masterMerchant && $masterMerchant->categoryMerchantId == $categories->id) selected @endif>
                                            {{ $categories->categoryMerchant . ' (' . $categories->type . ') ' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-floating mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script-tag')
    @include('template.components.general-script')

    <!-- Select2 -->
    <script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            $('.select2').select2();
        });
    </script>
@endsection

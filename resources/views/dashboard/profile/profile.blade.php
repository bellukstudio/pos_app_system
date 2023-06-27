@extends('template.template-dashboard-view')
@section('side-nav-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ __('page-profil.profile') }}</h1>
            <div class="card mt-4">
                <div class="card-header">
                    {{ __('page-profil.dataProfileMerchant') }}
                </div>
                <div class="card-body">
                    {{-- ALERT --}}
                    @include('template.partials.alert-view')
                    <form action="{{ route('merchant-save') }}" method="post" class="mb-3">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputMerchant" type="text" name="merchantName"
                                value="{{ old('merchantName') ?? ($masterMerchant->nameMerchant ?? '') }}" />
                            <label for="inputMerchant">{{ __('page-profil.merchantName') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputMerchantAddress" name="merchantAddress"
                                value="{{ old('merchantAddress') ?? ($masterMerchant->address ?? '') }}" />
                            <label for="inputMerchantAddress">{{ __('page-profil.merchantAddress') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputMerchantFounder" type="text" name="merchantFounder"
                                value="{{ old('merchantFounder') ?? ($masterMerchant->founder ?? '') }}" />
                            <label for="inputMerchantFounder">{{ __('page-profil.merchantFounder') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="custom-select">
                                <select name="categoryMerchant" id="inputCategory" class="form-control select2">
                                    <option value="">{{ __('page-profil.selectCategory') }}</option>
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
                            <button type="submit" class="btn btn-primary">{{ __('button.save') }}</button>
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

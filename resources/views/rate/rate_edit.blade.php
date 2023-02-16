@extends('layouts.app', ['page_title' => 'Rates'])
@section('titles', 'Rates')
@section('title', 'Rate')
@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <span class="card-icon">
                                <i class="far fa-file-alt text-primary"></i>
                            </span>
                            <h3 class="card-label">Edit @yield('titles')</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a type="button" id="backButton" class="btn btn-secondary font-weight-bolder" href="{{ route('bank.rate.list') }}">
                                <span class="svg-icon svg-icon-md">
                                       <i class="flaticon2-left-arrow-1" ></i>
                                </span>
                                Back
                            </a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <form method="POST" action="{{ route('bank.rate.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Rate Type:</label>
                                        <select class="form-control" id="kt_select2_type" name="type" style="width: 100%;" required>
                                            <option value=""></option>
                                            <option value="{{ \App\Models\Rate::Is_Fixed }}" {{ $data->type == \App\Models\Rate::Is_Fixed ? 'selected':'' }}>Fixed</option>
                                            <option value="{{ \App\Models\Rate::Is_Variable }}" {{ $data->type == \App\Models\Rate::Is_Variable ? 'selected':'' }}>Variable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Bank Select:</label>
                                        <select class="form-control" id="kt_select2_bank" name="bank" style="width: 100%;" required>
                                            <option value=""></option>
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}" {{$bank->id == $data->bank_id ? 'selected':''}}>{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($data->rateValues as $value)
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ $value->label }}:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="{{ $value->label }}" value="{{ $value->value }}" required />
                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <label class="col-2 col-form-label" for="active">Active <span class="text-danger">*</span></label>
                                <div class="col-3">
                                        <span class="switch switch-outline switch-icon switch-success">
                                        <label>
                                            <input type="checkbox" name="active" {{ $data->active == 1 ? 'checked="checked"':'' }}/>
                                         <span></span>
                                        </label>
                                       </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6 text-lg-right">
                                    <input type="hidden" value="{{ $data->id }}" name="id">
                                    <button id="saveButton" type="submit" class="btn btn-primary mr-2">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection

@push('vendor-styles')
@endpush

@push('vendor-scripts')
@endpush

@push('custom-scripts')
@endpush

@push('scripts')
    <script>

    </script>
@endpush

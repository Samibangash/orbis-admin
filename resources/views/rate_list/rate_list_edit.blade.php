@extends('layouts.app', ['page_title' => 'Edit Rates'])
@section('titles', 'List')
@section('title', 'Rate')
@section('content')

<div class="content d-flex flex-column flex-column-fluid">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
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
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="far fa-plus text-primary"></i>
                        </span>
                        <h3 class="card-label">Edit @yield('title')</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href = "{{ route('rate_list.index') }}" type="button" id="newButton" class="btn btn-light-primary font-weight-bold">
                                <span class="svg-icon svg-icon-md">
                                        <i class="fa fa-arrow-left"></i>
                                </span>
                            Back
                        </a>
                        <!--end::Button-->
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('rate_list.update', $rate->id)}}">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <select class="form-control" id="kt_select2_bank" name="bank_id" style="width: 100%;" required>
                                            @foreach($banks as $bank)
                                            <option {{ ($rate->bank_id == $bank->id) ? 'selected' : '' }} value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Rate Type</label>
                                        <div class="input-group">
                                            <select class="form-control" id="kt_select2_type" name="type_id" required>
                                                <option value=""></option>
                                                <option {{ ($rate->type_id == \App\Models\RateList::Is_Fixed) ? 'selected' : '' }} value="{{ \App\Models\RateList::Is_Fixed }}">Fixed</option>
                                                <option {{ ($rate->type_id == \App\Models\RateList::Is_Variable) ? 'selected' : '' }} value="{{ \App\Models\RateList::Is_Variable }}">Variable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Rental</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="rental" value="{{ $rate->rental }}" required
                                                placeholder="Enter value" />
                                            <div class="input-group-append"><span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>INS CONV 75% - 80%</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="conv_one" value="{{ $rate->conv_one }}" required
                                                   placeholder="Enter value" />
                                            <div class="input-group-append"><span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>INS CONV 70% - 75%</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="conv_two" value="{{ $rate->conv_two }}" required
                                                   placeholder="Enter value" />
                                            <div class="input-group-append"><span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>INS CONV 65% - 70%</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="conv_three" value="{{ $rate->conv_three }}" required
                                                   placeholder="Enter value" />
                                            <div class="input-group-append"><span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>INS CONV 0% - 65%:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="conv_four" value="{{ $rate->conv_four }}" required
                                                placeholder="Enter value" />
                                            <div class="input-group-append"><span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Uninsurable Conv</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="uninsurable_conv" value="{{ $rate->uninsurable_conv }}" required
                                                placeholder="Enter value" />
                                            <div class="input-group-append"><span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Uninsurable Refinance</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="uninsurable_refinance" value="{{ $rate->uninsurable_refinance }}" required
                                                placeholder="Enter value" />
                                            <div class="input-group-append"><span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Amortization</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="amortization" value="{{ $rate->amortization }}" required
                                                placeholder="Enter value" />
                                            <div class="input-group-append"><span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>High Rate</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="high_rate" value="{{ $rate->high_rate }}" required
                                                   placeholder="Enter value" />
                                            <div class="input-group-append"><span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('vendor-styles')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('vendor-scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endpush

@push('custom-scripts')
@endpush

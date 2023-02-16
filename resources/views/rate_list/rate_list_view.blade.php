@extends('layouts.app', ['page_title' => 'Rate Details'])
@section('titles', 'Details')
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
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <span class="card-icon">
                                <i class="far fa-building text-primary"></i>
                            </span>
                            <h3 class="card-label">Rate @yield('titles')</h3>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Bank Name</th>
                                <th>High Rate</th>
                                <th>Rental</th>
                                <th>INS CONV 0% - 65%</th>
                                <th>INS CONV 65% - 70%</th>
                                <th>INS CONV 70% - 75%</th>
                                <th>INS CONV 75% - 80%</th>
                                <th>Uninsurable Conv</th>
                                <th>Uninsurable Refinance</th>
                                <th>Amortization</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $rate->bank->name }}</td>
                                        <td>{{ $rate->high_rate }}</td>
                                        <td>{{ $rate->rental }}</td>
                                        <td>{{ $rate->conv_one }}</td>
                                        <td>{{ $rate->conv_two }}</td>
                                        <td>{{ $rate->conv_three }}</td>
                                        <td>{{ $rate->conv_four }}</td>
                                        <td>{{ $rate->uninsurable_conv }}</td>
                                        <td>{{ $rate->uninsurable_refinance }}</td>
                                        <td>{{ $rate->amortization }}</td>
                                    </tr>
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
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
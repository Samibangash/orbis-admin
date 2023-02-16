@extends('layouts.app', ['page_title' => 'Rates List'])
@section('titles', 'List')
@section('title', 'Rate')
@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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
                            <h3 class="card-label">Rates @yield('titles')</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href = "{{ route('rate_list.create') }}" type="button" id="newButton" class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md">
                                        <i class="fa fa-plus"></i>
                                </span>
                                Create @yield('title')
                            </a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover" id="kt_datatable">
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Bank Name</th>
                                <th>Rate Type</th>
                                <th>High Rate</th>
                                <th>Rental</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
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
    <!--end::Content-->

    <!-- Modal Edit Bank -->
    <div class="modal fade" id="viewItemModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!--begin::Form-->

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View @yield('title')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <!--begin::Modal body-->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" disabled name="bank_name" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>High Rate</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="type_id" disabled name="type_id" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>High Rate</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="high_rate" disabled name="high_rate" />
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
                                        <input type="text" class="form-control" id="conv_one" disabled name="conv_one" />
                                        <div class="input-group-append"><span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>INS CONV 70% - 75%</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="conv_two" disabled name="conv_two" />
                                        <div class="input-group-append"><span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>INS CONV 65% - 70%</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="conv_three" disabled name="conv_three" />
                                        <div class="input-group-append"><span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>INS CONV 0% - 65%:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="conv_four" disabled name="conv_four" />
                                        <div class="input-group-append"><span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Uninsurable Conv</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="uninsurable_conv" disabled name="uninsurable_conv" />
                                        <div class="input-group-append"><span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Uninsurable Refinance</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="uninsurable_refinance" disabled name="uninsurable_refinance" />
                                        <div class="input-group-append"><span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Amortization</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="amortization" disabled name="amortization" />
                                        <div class="input-group-append"><span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Rental</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="rental" disabled name="rental" />
                                        <div class="input-group-append"><span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Modal body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    </div>

                <!--end::Form-->
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

@push('scripts')
    <script>
        $("#kt_datatable").on('click', '.view-item', function () {
            const itemID = $(this).attr("data-item-id");
            const method = 'GET';
            const url = "{{ route('rate_list.view') }}";
            const data = {itemID};
            $.ajax({ method, url, data, dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $("#bank_name").val(data.bank);
                    if(data.rate.type_id == 1) {
                        var rateType = 'Fixed';
                    } else {
                        var rateType = 'Variable';
                    }
                    $("#type_id").val(rateType);
                    $("#high_rate").val(data.rate.high_rate);
                    $("#rental").val(data.rate.rental);
                    $("#conv_one").val(data.rate.conv_one);
                    $("#conv_two").val(data.rate.conv_two);
                    $("#conv_three").val(data.rate.conv_three);
                    $("#conv_four").val(data.rate.conv_four);
                    $("#uninsurable_conv").val(data.rate.uninsurable_conv);
                    $("#uninsurable_refinance").val(data.rate.uninsurable_refinance);
                    $("#amortization").val(data.rate.amortization);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        "use strict";
        var KTDatatablesSearchOptionsAdvancedSearch = function() {

            $.fn.dataTable.Api.register('column().title()', function() {
                return $(this.header()).text().trim();
            });

            var initTypes = function() {
                // begin first table
                var table = $('#kt_datatable').DataTable({
                    responsive: true,
                    // Pagination settings
                    dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
                    // read more: https://datatables.net/examples/basic_init/dom.html

                    lengthMenu: [5, 10, 25, 50],

                    pageLength: 10,

                    language: {
                        'lengthMenu': 'Display _MENU_',
                    },
                    buttons: [
                        'pageLength',
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                        'print',
                    ],

                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('rate_list.list') }}",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        data: {
                            // parameters for custom backend script demo
                            columnsDef: [
                                'DT_RowIndex', 'bank_id', 'type_id', 'high_rate', 'rental', 'created_at', 'updated_at', 'Actions'],
                        },
                    },
                    columns: [
                        {data: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'bank.name'},
                        {data: 'type_id'},
                        {data: 'high_rate'},
                        {data: 'rental'},
                        {data: 'created_at'},
                        {data: 'updated_at'},
                        {data: 'Actions', responsivePriority: -1},
                    ],

                    columnDefs: [
                        {
                            targets: 2,
                            render: function(data, type, full, meta) {
                                var status = {
                                    {{ \App\Models\Rate::Is_Fixed }}: {'title': 'Fixed', 'class': ' label-outline-warning'},
                                    {{ \App\Models\Rate::Is_Variable }}: {'title': 'Variable', 'class': ' label-outline-info'},
                                };
                                if (typeof status[data] === 'undefined') {
                                    return data;
                                }
                                return '<span class="label' + status[data].class + ' label-pill label-inline">' + status[data].title + '</span>';
                            },
                        },
                        {
                            targets: 5,
                            render: function(data, type, full, meta) {
                                let pf = new Date(data);
                                const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };
                                return pf.toLocaleDateString('default', options);
                            },
                        },
                        {
                            targets: 6,
                            render: function(data, type, full, meta) {
                                let pf = new Date(data);
                                const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };
                                return pf.toLocaleDateString('default', options);
                            },
                        }
                    ],
                });


                $("#printButton").on("click", function() {
                    table.button( '.buttons-print' ).trigger();
                });
                $("#copyButton").on("click", function() {
                    table.button( '.buttons-copy' ).trigger();
                });
                $("#excelButton").on("click", function() {
                    table.button( '.buttons-excel' ).trigger();
                });
                $("#csvButton").on("click", function() {
                    table.button( '.buttons-csv' ).trigger();
                });
                $("#pdfButton").on("click", function() {
                    table.button( '.buttons-pdf' ).trigger();
                });


                var filter = function() {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    table.column($(this).data('col-index')).search(val ? val : '', false, false).draw();
                };

                var asdasd = function(value, index) {
                    var val = $.fn.dataTable.util.escapeRegex(value);
                    table.column(index).search(val ? val : '', false, true);
                };

                $('#kt_search').on('click', function(e) {
                    e.preventDefault();
                    var params = {};
                    $('.datatable-input').each(function() {
                        var i = $(this).data('col-index');
                        if (params[i]) {
                            params[i] += '|' + $(this).val();
                        }
                        else {
                            params[i] = $(this).val();
                        }
                    });
                    $.each(params, function(i, val) {
                        // apply search params to datatable
                        table.column(i).search(val ? val : '', false, false);
                    });
                    table.table().draw();
                });

                $('#kt_reset').on('click', function(e) {
                    e.preventDefault();
                    $('.datatable-input').each(function() {
                        $(this).val('');
                        table.column($(this).data('col-index')).search('', false, false);
                    });
                    table.table().draw();
                });

                $('#kt_datepicker').datepicker({
                    todayHighlight: true,
                    templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>',
                    },
                });

            };

            return {

                //main function to initiate the module
                init: function() {
                    initTypes();
                },

            };

        }();
        jQuery(document).ready(function() {
            KTDatatablesSearchOptionsAdvancedSearch.init();
        });

    </script>
@endpush

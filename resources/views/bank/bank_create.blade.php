@extends('layouts.app', ['page_title' => 'Banks'])
@section('titles', 'Banks')
@section('title', 'Bank')
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
                                <i class="flaticon2-supermarket text-primary"></i>
                            </span>
                            <h3 class="card-label">@yield('titles')</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a id="newButton" href="{{ route('bank.create') }}" class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md">
                                        <i class="fa fa-plus"></i>
                                </span>New Bank
                            </a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('bank.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-4">
                                        <div class="image-input image-input-outline" id="kt_image_4" style="background-image: url({{ asset('assets/media/>users/blank.png') }})">
                                            <div class="image-input-wrapper" style="background-image: url({{ asset('assets/media/>users/100_1.jpg') }}"></div>

                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"/>
                                                <input type="hidden" name="profile_avatar_remove"/>
                                            </label>

                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>

                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Category Name:</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Enter Category name" />
                                        <span class="form-text text-muted">Please enter your Category name</span>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Status:</label>
                                        <select class="form-control" id="kt_select2_status" name="status" required>
                                            <option value="">Select</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>
                                        </select>
                                        <span class="form-text text-muted">Please select status</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">

                                    </div>
                                    <div class="col-lg-6 text-lg-right">
                                        <button id="saveButton" type="submit" class="btn btn-primary mr-2">Save</button>
                                        <button id="cancelButton" onclick="window.location.href='{{ route('catalog.category.list') }}';" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
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
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('vendor-scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endpush

@push('custom-scripts')
@endpush

@push('scripts')
    <script>
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
                        url: "{{ route('bank.ajax.list') }}",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        data: {
                            // parameters for custom backend script demo
                            columnsDef: [
                                'DT_RowIndex', 'name', 'active', 'created_at', 'updated_at', 'Actions'],
                        },
                    },
                    columns: [
                        {data: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'name'},
                        {data: 'active'},
                        {data: 'created_at'},
                        {data: 'updated_at'},
                        {data: 'Actions', responsivePriority: -1},
                    ],

                    columnDefs: [
                        {
                            targets: 2,
                            render: function(data, type, full, meta) {
                                var status = {
                                    0: {'title': 'Disable', 'class': ' label-light-danger'},
                                    1: {'title': 'Enable', 'class': ' label-light-success'},
                                };
                                if (typeof status[data] === 'undefined') {
                                    return data;
                                }
                                return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                            },
                        },
                        {
                            targets: 3,
                            render: function(data, type, full, meta) {
                                let pf = new Date(data);
                                const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };
                                return pf.toLocaleDateString('default', options);
                            },
                        },
                        {
                            targets: 4,
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
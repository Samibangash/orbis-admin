@extends('layouts.app', ['page_title' => 'Bank Policies'])
@section('titles', 'Bank Policies')
@section('title', 'Bank Policy')
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
                            <a type="button" id="backButton" class="btn btn-secondary font-weight-bolder" href="{{ route('bank.policy.list') }}">
                                <span class="svg-icon svg-icon-md">
                                       <i class="flaticon2-left-arrow-1" ></i>
                                </span>
                                Back
                            </a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <form method="POST" action="{{ route('bank.policy.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>@yield('title') Title:</label>
                                    <input type="text" class="form-control" name="policy_title" value="{{ $data->title }}" required placeholder="Enter @yield('title') title" />
                                    <span class="form-text text-muted">Please enter your @yield('title') title</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Bank Select:</label>
                                    <select class="form-control" id="kt_select2_bank" name="bank" style="width: 100%;">
                                        <option value="">Select</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}" {{$bank->id == $data->bank_id ? 'selected':''}}>{{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Please select bank</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>@yield('title') Detail:</label>
                                    <textarea class="form-control" name="policy_detail" rows="10">{{ $data->detail }}</textarea>
                                    <span class="form-text text-muted">Please enter your @yield('title') detail</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-1 col-form-label" for="active">Active <span class="text-danger">*</span></label>
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
                                <div class="col-lg-6">

                                </div>
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

    <!-- Modal Add Bank -->
    <div class="modal fade" id="addItemModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!--begin::Form-->
                <form id="kt_modal_add" class="form" method="POST" enctype="multipart/form-data" action="{{ route('bank.policy.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add @yield('title')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <!--begin::Modal body-->
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label>Bank Select:</label>
                                    <select class="form-control" id="kt_select2_type" name="bank" style="width: 100%;">
                                        <option value="">Select</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Please select bank</span>
                                </div>

                                <div class="form-group">
                                    <label>@yield('title') Title:</label>
                                    <input type="text" class="form-control" name="policy_title" value="{{ old('policy_title') }}" required placeholder="Enter @yield('title') title" />
                                    <span class="form-text text-muted">Please enter your @yield('title') title</span>
                                </div>

                                <div class="form-group">
                                    <label>@yield('title') Detail:</label>
                                    <textarea id="kt-tinymce-2" name="policy_detail" class="tox-target"></textarea>
                                    <span class="form-text text-muted">Please enter your @yield('title') detail</span>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="active">Active <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <span class="switch switch-outline switch-icon switch-success">
                                        <label>
                                            <input type="checkbox" name="active" value="1" checked="checked"/>
                                         <span></span>
                                        </label>
                                       </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end::Modal body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>

    <!-- Modal Edit Bank -->
    <div class="modal fade" id="editItemModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!--begin::Form-->
                <form id="kt_modal_edit" class="form" method="POST" enctype="multipart/form-data" action="{{ route('bank.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit @yield('title')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <!--begin::Modal body-->
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label>Bank Select:</label>
                                    <select class="form-control" id="kt_select2_type" name="bank" style="width: 100%;">
                                        <option value="">Select</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Please select bank</span>
                                </div>

                                <div class="form-group">
                                    <label>@yield('title') Name:</label>
                                    <input type="text" id="item_name" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Enter @yield('title') name" />
                                    <span class="form-text text-muted">Please enter your @yield('title') name</span>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="active">Active <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <span class="switch switch-outline switch-icon switch-success">
                                        <label>
                                            <input type="checkbox" id="item_active" name="active" value="1" checked="checked"/>
                                         <span></span>
                                        </label>
                                       </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end::Modal body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <input type="hidden" id="item_id" name="item_id" value="">
                        <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>


@endsection

@push('vendor-styles')
@endpush

@push('vendor-scripts')
    <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/editors/tinymce.js') }}"></script>
@endpush

@push('custom-scripts')
@endpush

@push('scripts')
    <script>
        var avatar3 = new KTImageInput('kt_image_3');
        var avatar4 = new KTImageInput('kt_image_4');

        // Class definition

        var KTTinymce = function () {
            // Private functions
            var demos = function () {
                tinymce.init({
                    selector: '#kt-tinymce-2'
                });
            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTTinymce.init();
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
                        url: "{{ route('bank.policy.ajax.list') }}",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        data: {
                            // parameters for custom backend script demo
                            columnsDef: [
                                'DT_RowIndex', 'title', 'active', 'created_at', 'updated_at', 'Actions'],
                        },
                    },
                    columns: [
                        {data: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'title'},
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
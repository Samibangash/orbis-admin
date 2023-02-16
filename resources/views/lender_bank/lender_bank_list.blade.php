@extends('layouts.app', ['page_title' => 'Lender Banks'])
@section('titles', 'Lender Banks')
@section('title', 'Lender Bank')
@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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
                            <h3 class="card-label">@yield('titles')</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <button type="button" id="newButton" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addItemModel">
                                <span class="svg-icon svg-icon-md">
                                        <i class="fa fa-plus"></i>
                                </span>
                                Create @yield('title')
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover" id="kt_datatable">
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Id</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Active</th>
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

    <!-- Modal Add Bank -->
    <div class="modal fade" id="addItemModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!--begin::Form-->
                <form id="kt_modal_add" class="form" method="POST" enctype="multipart/form-data" action="{{ route('lender_bank.store') }}">
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
                            <div class="col-lg-4">
                                <label class="col-form-label" for="active">Bank Logo <span class="text-danger">*</span></label>
                                <div class="text-center">
                                    <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                        <div class="image-input-wrapper" style="background-image: url({{ asset('assets/media/users/blank.png') }})"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="image_path" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="profile_avatar_remove"/>
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>@yield('title') Name:</label>
                                    <input type="text" class="form-control" name="name" value="" required placeholder="Enter @yield('title') Name" />
                                </div>

                                <div class="form-group">
                                    <label>@yield('title') File Submission Process:</label>
                                    <textarea type="text" class="form-control" name="submission_process" value="" required placeholder="Enter @yield('title') File Submission Process" rows="3"></textarea>
                                    <!-- <input type="text" class="form-control" name="submission_process" value="" required placeholder="Enter @yield('title') File Submission Process" /> -->
                                </div>

                                <div class="form-group">
                                    <label>@yield('title') Acreditation Process:</label>
                                    <textarea type="text" class="form-control" name="acreditation_process" value="" required placeholder="Enter @yield('title') Acreditation Process" rows="3"></textarea>
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
                    <button type="button" id="cancelButton" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveButton" class="btn btn-primary font-weight-bold">Save changes</button>
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
                <form id="kt_modal_edit" class="form" method="POST" enctype="multipart/form-data" action="{{ route('lender_bank.update') }}">
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
                        <div class="col-lg-4">
                                <label class="col-form-label" for="active">Bank Logo <span class="text-danger">*</span></label>
                                <div class="text-center">
                                    <div class="image-input image-input-outline image-input-circle" id="kt_image_4">
                                        <div id="item_image_placeholder" class="image-input-wrapper" style="background-image: url({{ asset('assets/media/users/blank.png') }})"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" id="item_image_path" name="image_path" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="profile_avatar_remove"/>
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>@yield('title') Name:</label>
                                    <input type="text" class="form-control" id="item_name" name="name" value="" required placeholder="Enter @yield('title') Name" />
                                </div>

                                <div class="form-group">
                                    <label>@yield('title') File Submission Process:</label>
                                    <textarea type="text" class="form-control" id="item_submission_process" name="submission_process" value="" required placeholder="Enter @yield('title') File Submission Process" rows="3"></textarea>
                                    <!-- <input type="text" class="form-control" name="submission_process" value="" required placeholder="Enter @yield('title') File Submission Process" /> -->
                                </div>

                                <div class="form-group">
                                    <label>@yield('title') Acreditation Process:</label>
                                    <textarea type="text" class="form-control" id="item_acreditation_process" name="acreditation_process" value="" required placeholder="Enter @yield('title') Acreditation Process" rows="3"></textarea>
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

    <!-- Modal View Bank -->
    <div class="modal fade" id="viewItemModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@yield('title') Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <!--begin::Modal body-->
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>@yield('title') Name:</label>
                                    <input type="text" class="form-control" id="view_item_name" name="name" value="" disabled/>
                                </div>
                                <div class="form-group">
                                    <label>@yield('title') File Submission Process:</label>
                                    <textarea type="text" class="form-control" id="view_item_submission_process" name="submission_process" value="" disabled  rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>@yield('title') Acreditation Process:</label>
                                    <textarea type="text" class="form-control" id="view_item_acreditation_process" name="acreditation_process" value="" disabled  rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Modal body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <input type="hidden" id="view_item_id" name="item_id" value="">
                        <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
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

@push('scripts')
    <script>
        var avatar3 = new KTImageInput('kt_image_3');
        var avatar4 = new KTImageInput('kt_image_4');

        $("#kt_datatable").on('click', '.edit-item', function () {
            const itemID = $(this).attr("data-item-id");
            const method = 'POST';
            const url = "{{ route('lender_bank.edit') }}";
            const headers = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
            const data = {itemID};
            $.ajax({ method, url, headers, data, dataType: 'json',
                success: function (data) {
                    $("#item_id").val(data.id);
                    $("#item_name").val(data.name);
                    $("#item_submission_process").val(data.submission_process);
                    $("#item_acreditation_process").val(data.acreditation_process);
                    (data.image_path !== null)
                        ? $("#item_image_placeholder").css('background-image','url({{ URL::asset('/storage/images/lender_bank')}}/'+data.image_path+')')
                        : $("#item_image_placeholder").css('background-image','url({{ URL::asset('assets/media/users/blank.png') }})');
                    (data.active === 1)
                        ? $("#item_active").prop('checked', true)
                        : $("#item_active").prop('checked', false);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        $("#kt_datatable").on('click', '.view-item', function () {
            const itemID = $(this).attr("data-item-id");
            const method = 'GET';
            const url = "{{ route('lender_bank.view') }}";
            const data = {itemID};
            $.ajax({ method, url, data, dataType: 'json',
                success: function (data) {
                    console.log(data.name);
                    $("#view_item_id").val(data.id);
                    $("#view_item_name").val(data.name);
                    $("#view_item_submission_process").val(data.submission_process);
                    $("#view_item_acreditation_process").val(data.acreditation_process);
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
                        url: "{{ route('lender_bank.ajax.list') }}",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        data: {
                            // parameters for custom backend script demo
                            columnsDef: [
                                'DT_RowIndex', 'id', 'image', 'name', 'active', 'created_at', 'updated_at', 'Actions'],
                        },
                    },
                    columns: [
                        {data: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'id'},
                        {data: 'image'},
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
                                if(data !== null) {
                                    return '<img class="max-w-40px" src="{{ asset('/storage/images/lender_bank') }}/'+ data +'">';
                                } else {
                                    return '<img class="max-w-40px" src="{{ asset('assets/media/users/blank.png') }}">';
                                }

                            },
                        },
                        {
                            targets: 4,
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

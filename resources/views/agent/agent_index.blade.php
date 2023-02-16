@extends('layouts.app', ['page_title' => 'Agents'])
@section('titles', 'Agents')
@section('title', 'Agent')
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
                                <i class="fas fa-user-tie text-primary"></i>
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
                                <th>Picture</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Active</th>
                                <th>Created At</th>
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
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <!--begin::Form-->
                <form id="kt_modal_add" class="form" method="POST" enctype="multipart/form-data" action="{{ route('agent.store') }}">
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
                            <div class="col-lg-3">
                                <label class="col-form-label" for="active">Picture <span class="text-danger">*</span></label>
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

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Full Name:</label>
                                    <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required placeholder="Enter @yield('title') full name" />
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Enter @yield('title') email" />
                                </div>

                                <div class="form-group">
                                    <label>Phone:</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder="Enter @yield('title') phone" />
                                </div>

                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="text" class="form-control" name="password" value="{{ old('password') }}" required placeholder="Enter @yield('title') password" />
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="active">Active <span class="text-danger">*</span></label>
                                    <div class="col-6">
                                        <span class="switch switch-outline switch-icon switch-success">
                                        <label>
                                            <input type="checkbox" name="active" value="1" checked="checked"/>
                                         <span></span>
                                        </label>
                                       </span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea class="form-control" name="description" rows="14"></textarea>
                                    <span class="form-text text-muted">Please enter your @yield('title') description</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end::Modal body-->
                    <div class="modal-footer">
                    <button type="button" id="cancelButton" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveButton" class="btn btn-primary font-weight-bold">Save Data</button>
                </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>

    <!-- Modal Edit Bank -->
    <div class="modal fade" id="editItemModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <!--begin::Form-->
                <form id="kt_modal_edit" class="form" method="POST" enctype="multipart/form-data" action="{{ route('agent.update') }}">
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
                            <div class="col-lg-3">
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

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Full Name:</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name"  required placeholder="Enter @yield('title') full name" />
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="Enter @yield('title') email" />
                                </div>

                                <div class="form-group">
                                    <label>Phone:</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="Enter @yield('title') phone" />
                                </div>

                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="text" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter @yield('title') password" />
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="active">Active <span class="text-danger">*</span></label>
                                    <div class="col-6">
                                        <span class="switch switch-outline switch-icon switch-success">
                                        <label>
                                            <input type="checkbox" id="item_active" name="active" value="1" checked="checked"/>
                                         <span></span>
                                        </label>
                                       </span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea class="form-control" id="description" name="description" rows="14"></textarea>
                                    <span class="form-text text-muted">Please enter your @yield('title') description</span>
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
            const url = "{{ route('agent.edit') }}";
            const headers = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
            const data = {itemID};
            $.ajax({ method, url, headers, data, dataType: 'json',
                success: function (data) {
                    $("#item_id").val(data.id);
                    $("#full_name").val(data.full_name);
                    $("#email").val(data.email);
                    $("#phone").val(data.phone);
                    $("#description").val(data.description);
                    (data.image_path !== null)
                        ? $("#item_image_placeholder").css('background-image','url({{ URL::asset('/storage/images/agent')}}/'+data.image_path+')')
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
                        url: "{{ route('agent.ajax.list') }}",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        data: {
                            // parameters for custom backend script demo
                            columnsDef: [
                                'DT_RowIndex', 'picture', 'full_name', 'email', 'phone', 'active', 'created_at', 'Actions'],
                        },
                    },
                    columns: [
                        {data: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'picture'},
                        {data: 'full_name'},
                        {data: 'email'},
                        {data: 'phone'},
                        {data: 'active'},
                        {data: 'created_at'},
                        {data: 'Actions', responsivePriority: -1},
                    ],

                    columnDefs: [
                        {
                            targets: 1,
                            render: function(data, type, full, meta) {
                                if(data !== null) {
                                    return '<img class="max-w-40px" src="{{ asset('/storage/images/agent') }}/'+ data +'">';
                                } else {
                                    return '<img class="max-w-40px" src="{{ asset('assets/media/users/blank.png') }}">';
                                }

                            },
                        },
                        {
                            targets: 5,
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
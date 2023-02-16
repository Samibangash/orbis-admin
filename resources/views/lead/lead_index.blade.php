@extends('layouts.app', ['page_title' => 'Lender'])
@section('titles', 'Lender')
@section('title', 'Lender')
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
                                <i class="far fa-building text-primary"></i>
                            </span>
                            <h3 class="card-label">@yield('titles')</h3>
                        </div>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover" id="kt_datatable">
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Ids</th>
                                <th>Extra Payment</th>
                                <th>Amortization</th>
                                <th>condo Fees</th>
                                <th>Down Payment</th>
                                <th>Heat</th>
                                <th>Home Price</th>
                                <th>Mortgage</th>
                                <th>Others Expenses</th>
                                <th>Payment</th>
                                <th>Property</th>
                                <th>Rate</th>
                                <th>Rental Income</th>
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
            const url = "{{ route('lead.edit') }}";
            const headers = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
            const data = {itemID};
            $.ajax({ method, url, headers, data, dataType: 'json',
                success: function (data) {
                    {{--$("#item_id").val(data.id);--}}
                    {{--$("#item_name").val(data.name);--}}
                    {{--(data.image_path !== null)--}}
                    {{--    ? $("#item_image_placeholder").css('background-image','url({{ URL::asset('/storage/images/bank_logo')}}/'+data.image_path+')')--}}
                    {{--    : $("#item_image_placeholder").css('background-image','url({{ URL::asset('assets/media/users/blank.png') }})');--}}
                    {{--(data.active === 1)--}}
                    {{--    ? $("#item_active").prop('checked', true)--}}
                    {{--    : $("#item_active").prop('checked', false);--}}
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
                        url: "{{ route('lead.ajax.list') }}",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        data: {
                            // parameters for custom backend script demo
                            columnsDef: [
                                'DT_RowIndex', 'id','add_extra_payment','amortization','condo_fees'
                                ,'down_payment','heat','home_price','mortgage','others_expenses',
                                'payment','property','rate','rental_income','Actions'],
                        },
                    },
                    columns: [
                        {data: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'id'},
                        {data: 'add_extra_payment'},
                        {data: 'amortization'},
                        {data: 'condo_fees'},
                        {data: 'down_payment'},
                        {data: 'heat'},
                        {data: 'home_price'},
                        {data: 'mortgage'},
                        {data: 'others_expenses'},
                        {data: 'payment'},
                        {data: 'property'},
                        {data: 'rate'},
                        {data: 'rental_income'},
                        {data: 'Actions', responsivePriority: -1},
                    ],

                    columnDefs: [
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

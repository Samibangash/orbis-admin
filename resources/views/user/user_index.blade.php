@extends('layouts.app')


@section('content')

@if(session()->get('title') == "success")
<script>toastr.success("{{ session()->get('message') }}");</script>
@elseif (session()->get('title') == "error")
<script>toastr.error("{{ session()->get('message') }}");</script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>toastr.error("{{ $error }}")</script>
    @endforeach
@endif

<!--begin::Subheader-->
<div class="subheader py-5 py-lg-10 gutter-b subheader-transparent" id="kt_subheader" style="background-color: #663259; background-position: right bottom; background-size: auto 100%; background-repeat: no-repeat; background-image: url({{ asset('assets/media/svg/patterns/taieri.svg') }})">
    <div class="container-fluid d-flex flex-column">
        <!--begin::Title-->
        <div class="d-flex align-items-sm-end flex-column flex-sm-row">
            <h2 class="d-flex align-items-center text-white mr-5 mb-0">Users</h2>
        </div>
        <!--end::Title-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">

    <div class="container-fluid">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-delivery-package text-primary"></i>
                    </span>
                    <h3 class="card-label">All Users</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                    <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Export</button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi flex-column navi-hover py-2">
                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                <li class="navi-item">
                                    <a href="javascript:;" class="navi-link" id="printButton">
                                        <span class="navi-icon">
                                            <i class="la la-print"></i>
                                        </span>
                                        <span class="navi-text">Print</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="javascript:;" class="navi-link" id="copyButton">
                                        <span class="navi-icon">
                                            <i class="la la-copy"></i>
                                        </span>
                                        <span class="navi-text">Copy</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="javascript:;" class="navi-link" id="excelButton">
                                        <span class="navi-icon">
                                            <i class="la la-file-excel-o"></i>
                                        </span>
                                        <span class="navi-text">Excel</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="javascript:;" class="navi-link" id="csvButton">
                                        <span class="navi-icon">
                                            <i class="la la-file-text-o"></i>
                                        </span>
                                        <span class="navi-text">CSV</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="javascript:;" class="navi-link" id="pdfButton">
                                        <span class="navi-icon">
                                            <i class="la la-file-pdf-o"></i>
                                        </span>
                                        <span class="navi-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a id="newButton" href="{{ route('users.create') }}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                            <i class="fa fa-plus"></i>
                    </span>New User</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Search Form-->
                <form class="mb-15">
                    <div class="row mb-6">
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>Name:</label>
                            <input type="text" class="form-control datatable-input" placeholder="E.g: John Doe" data-col-index="1" />
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>Status:</label>
                            <select class="form-control datatable-input" data-col-index="6">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-8">
                        <div class="col-lg-12">
                        <button class="btn btn-primary btn-primary--icon" id="kt_search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>&#160;&#160;
                        <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button></div>
                    </div>
                </form>
                <!--begin: Datatable-->
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>

</div>
<!--end::Entry-->
<script src="{{ asset('custom_js/buttons.js') }}"></script>
<script>
    "use strict";
var KTDatatablesSearchOptionsAdvancedSearch = function() {

	$.fn.dataTable.Api.register('column().title()', function() {
		return $(this.header()).text().trim();
	});

	var initTable2 = function() {
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
				url: "{{ route('users.list') }}",
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'DT_RowIndex', 'name', 'email', 'phone_number', 'department_id', 'role_id', 'status', 'created_by', 'created_at', 'updated_at', 'Actions'],
				},
			},
			columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
				{data: 'name'},
				{data: 'email'},
				{data: 'phone_number'},
				{data: 'department_id'},
				{data: 'role_id'},
                {data: 'status'},
                {data: 'created_by'},
                {data: 'created_at'},
                {data: 'updated_at'},
				{data: 'Actions', responsivePriority: -1},
			],


			initComplete: function() {
				this.api().columns().every(function() {
					var column = this;

					switch (column.title()) {
						case 'Status':
							var status = {
								0: {'title': 'Disable', 'class': ' label-light-danger'},
							    1: {'title': 'Enable', 'class': ' label-light-success'},
							};
							column.data().unique().sort().each(function(d, j) {
								$('.datatable-input[data-col-index="6"]').append('<option value="' + d + '">' + status[d].title + '</option>');
							});
							break;
					}
				});
			},


			columnDefs: [
				{
					targets: 6,
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
					targets: 8,
					render: function(data, type, full, meta) {
                        let pf = new Date(data);
                        const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };
                        return pf.toLocaleDateString('default', options);
                    },
				},
                {
					targets: 9,
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
			initTable2();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesSearchOptionsAdvancedSearch.init();
});

</script>
<script>

    $("#kt_datatable").on("click", ".del_btn", function(e){
        e.preventDefault();
        var id = this.id;
        var $tr = $(this).closest('tr');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });

                $.ajax({
                    type:'POST',
                    url:"{{ route('users.delete') }}",
                    data:{id:id},
                    success:function(data)
                    {
                        $tr.remove();
                    }
                });
                Swal.fire(
                    "Deleted!",
                    "Your record has been deleted.",
                    "success"
                )
            }
        });
    });
</script>
@endsection

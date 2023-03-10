@extends('layouts.app', ['page_title' => 'Dashboard'])
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
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Actions</a>
                    <!--end::Actions-->
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                        <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-icon svg-icon-success svg-icon-2x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <li class="navi-header font-weight-bold py-4">
                                    <span class="font-size-lg">Choose Label:</span>
                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                </li>
                                <li class="navi-separator mb-3 opacity-70"></li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-success">Customer</span>
                                                </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-danger">Partner</span>
                                                </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                                </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-primary">Member</span>
                                                </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-dark">Staff</span>
                                                </span>
                                    </a>
                                </li>
                                <li class="navi-separator mt-3 opacity-70"></li>
                                <li class="navi-footer py-4">
                                    <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                        <i class="ki ki-plus icon-sm"></i>Add new</a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                    <!--end::Dropdown-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-4">
                        <!--begin::Mixed Widget 14-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title font-weight-bolder">Action Needed</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover py-5">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="flaticon2-drop"></i>
                                                                </span>
                                                        <span class="navi-text">New Group</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="flaticon2-list-3"></i>
                                                                </span>
                                                        <span class="navi-text">Contacts</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="flaticon2-rocket-1"></i>
                                                                </span>
                                                        <span class="navi-text">Groups</span>
                                                        <span class="navi-link-badge">
                                                                    <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                                                </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="flaticon2-bell-2"></i>
                                                                </span>
                                                        <span class="navi-text">Calls</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="flaticon2-gear"></i>
                                                                </span>
                                                        <span class="navi-text">Settings</span>
                                                    </a>
                                                </li>
                                                <li class="navi-separator my-3"></li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="flaticon2-magnifier-tool"></i>
                                                                </span>
                                                        <span class="navi-text">Help</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="flaticon2-bell-2"></i>
                                                                </span>
                                                        <span class="navi-text">Privacy</span>
                                                        <span class="navi-link-badge">
                                                                    <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                                                </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column">
                                <div class="flex-grow-1">
                                    <div id="kt_mixed_widget_14_chart" style="height: 200px"></div>
                                </div>
                                <div class="pt-5">
                                    <p class="text-center font-weight-normal font-size-lg pb-7">Notes: Current sprint requires stakeholders
                                        <br />to approve newly amended policies</p>
                                    <a href="#" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">Generate Report</a>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 14-->
                    </div>
                    <div class="col-lg-8">
                        <!--begin::Advance Table Widget 4-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Agents Stats</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-info font-weight-bolder font-size-sm mr-3">New Report</a>
                                    <a href="#" class="btn btn-danger font-weight-bolder font-size-sm">Create</a>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-0 pb-3">
                                <div class="tab-content">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                            <thead>
                                            <tr class="text-left text-uppercase">
                                                <th style="min-width: 250px" class="pl-7">
                                                    <span class="text-dark-75">products</span>
                                                </th>
                                                <th style="min-width: 100px">earnings</th>
                                                <th style="min-width: 100px">comission</th>
                                                <th style="min-width: 100px">company</th>
                                                <th style="min-width: 130px">rating</th>
                                                <th style="min-width: 80px"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="pl-0 py-8">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50 symbol-light mr-4">
                                                                        <span class="symbol-label">
                                                                            <img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="" />
                                                                        </span>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Brad Simmons</a>
                                                            <span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$8,000,000</span>
                                                    <span class="text-muted font-weight-bold">In Proccess</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$520</span>
                                                    <span class="text-muted font-weight-bold">Paid</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                                                    <span class="text-muted font-weight-bold">Web, UI/UX Design</span>
                                                </td>
                                                <td>
                                                    <img src="assets/media/logos/stars.png" alt="image" style="width: 5.5rem" />
                                                    <span class="text-muted font-weight-bold d-block font-size-sm">Best Rated</span>
                                                </td>
                                                <td class="pr-0 text-right">
                                                    <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View Offer</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0 py-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50 symbol-light mr-4">
                                                                        <span class="symbol-label">
                                                                            <img src="assets/media/svg/avatars/018-girl-9.svg" class="h-75 align-self-end" alt="" />
                                                                        </span>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Jessie Clarcson</a>
                                                            <span class="text-muted font-weight-bold d-block">C#, ASP.NET, MS SQL</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$23,000,000</span>
                                                    <span class="text-muted font-weight-bold">Pending</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$1,600</span>
                                                    <span class="text-muted font-weight-bold">Rejected</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Agoda</span>
                                                    <span class="text-muted font-weight-bold">Houses &amp; Hotels</span>
                                                </td>
                                                <td>
                                                    <img src="assets/media/logos/stars.png" alt="image" style="width: 5.5rem" />
                                                    <span class="text-muted font-weight-bold d-block font-size-sm">Above Avarage</span>
                                                </td>
                                                <td class="pr-0 text-right">
                                                    <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View Offer</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0 py-8">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50 symbol-light mr-4">
                                                                        <span class="symbol-label">
                                                                            <img src="assets/media/svg/avatars/047-girl-25.svg" class="h-75 align-self-end" alt="" />
                                                                        </span>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Lebron Wayde</a>
                                                            <span class="text-muted font-weight-bold d-block">PHP, Laravel, VueJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$34,000,000</span>
                                                    <span class="text-muted font-weight-bold">Paid</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$6,700</span>
                                                    <span class="text-muted font-weight-bold">Paid</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">RoadGee</span>
                                                    <span class="text-muted font-weight-bold">Paid</span>
                                                </td>
                                                <td>
                                                    <img src="assets/media/logos/stars.png" alt="image" style="width: 5.5rem" />
                                                    <span class="text-muted font-weight-bold d-block font-size-sm">Best Rated</span>
                                                </td>
                                                <td class="pr-0 text-right">
                                                    <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View Offer</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0 py-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50 symbol-light mr-4">
                                                                        <span class="symbol-label">
                                                                            <img src="assets/media/svg/avatars/014-girl-7.svg" class="h-75 align-self-end" alt="" />
                                                                        </span>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Natali Trump</a>
                                                            <span class="text-muted font-weight-bold d-block">Python, PostgreSQL, ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left pr-0">
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,600,000</span>
                                                    <span class="text-muted font-weight-bold">Paid</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$14,000</span>
                                                    <span class="text-muted font-weight-bold">Pending</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">The Hill</span>
                                                    <span class="text-muted font-weight-bold">Insurance</span>
                                                </td>
                                                <td>
                                                    <img src="assets/media/logos/stars.png" style="width: 5.5rem" alt="" />
                                                    <span class="text-muted font-weight-bold d-block font-size-sm">Avarage</span>
                                                </td>
                                                <td class="pr-0 text-right">
                                                    <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm" style="width: 7rem">View Offer</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 4-->
                    </div>
                </div>
                <!--end::Row-->
                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@endsection

@push('vendor-styles')
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('vendor-scripts')
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
@endpush
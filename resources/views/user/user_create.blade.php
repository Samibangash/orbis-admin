@extends('layouts.app')
@section('title', 'Users')

@section('content')
<!--begin::Subheader-->
<div class="subheader py-5 py-lg-10 gutter-b subheader-transparent" id="kt_subheader" style="background-color: #663259; background-position: right bottom; background-size: auto 100%; background-repeat: no-repeat; background-image: url({{ asset('assets/media/svg/patterns/taieri.svg') }})">
    <div class="container-fluid d-flex flex-column">
        <!--begin::Title-->
        <div class="d-flex align-items-sm-end flex-column flex-sm-row">
            <h2 class="d-flex align-items-center text-white mr-5 mb-0">@yield('title')</h2>
        </div>
        <!--end::Title-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">

    <div class="container-fluid">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <script>toastr.error("{{ $error }}")</script>
            @endforeach
        @endif
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Create User</h3>

                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a id="backButton" href="{{ route('users') }}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                            <i class="flaticon2-left-arrow-1" ></i>
                    </span>Back</a>
                    <!--end::Button-->
                </div>
            </div>
            <!--begin::Form-->
        <form class="form" action="{{ route('users.store')}}" method="post">
            @csrf;
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Enter Full name" />
                            <span class="form-text text-muted">Please enter Full name</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Enter Email" />
                            <span class="form-text text-muted">Please enter email</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" required placeholder="Enter password" />
                            <span class="form-text text-muted">Please enter password</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Phone Number:</label>
                            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required placeholder="Enter phone number" />
                            <span class="form-text text-muted">Please enter phone number</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Department:</label>
                            <select class="form-control" id="kt_select2_department" name="department_id" required>
                                <option value="">Select Department</option>
                                @foreach ($depts as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted">Please select Department</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Role:</label>
                            <select class="form-control" id="kt_select2_role" name="role_id" required>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted">Please select Role</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Status:</label>
                            <select class="form-control" id="kt_select2_status" name="status" required>
                                <option value="">Select</option>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                            <span class="form-text text-muted">Please select status</span>
                        </div>
                    </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-6 text-lg-right">
                            <button id="saveButton" type="submit" class="btn btn-primary mr-2">Save</button>
                            <button id="cancelButton" onclick="window.location.href='{{ route('users') }}';" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>

</div>
<!--end::Entry-->
<script src="{{ asset('custom_js/buttons.js') }}"></script>
@endsection

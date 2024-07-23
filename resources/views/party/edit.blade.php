@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title font-weight-bold text-uppercase"> Edit Party </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- Start Form  -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!--Include alert file-->
                        @include('message')

                        <h4 class="header-title text-uppercase"> Basic Info</h4>
                        <hr>
                        <form class="needs-validation" method="post" action="{{ route('update-party', $party->id) }}">
                            @csrf
                            <!--To pass a put request-->
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Type</label>
                                        <select name="party_type" class="form-control border-bottom" id="validationCustom01"
                                            placeholder="Please select Type">
                                            <option value="">Please select</option>
                                            <option value="client" @if ($party->party_type == 'client') selected @endif>Client
                                            </option>
                                            <option value="vendor" @if ($party->party_type == 'vendor') selected @endif>Vendor
                                            </option>
                                            <option value="employee" @if ($party->party_type == 'employee') selected @endif>
                                                Employee</option>
                                        </select>
                                        @if ($errors->has('party_type'))
                                            <span class="text-danger">{{ $errors->first('party_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Full Name</label>
                                        <input type="text" name="full_name" class="form-control border-bottom "
                                            id="validationCustom01" placeholder="Enter client's full name"
                                            value="{{ old('full_name', $party->full_name) }}">
                                        @if ($errors->has('full_name'))
                                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">Phone/Mobile Number</label>
                                        <input type="text" name="phone_no" class="form-control border-bottom "
                                            id="validationCustom02" placeholder="Enter phone/mobile number"
                                            value="{{ old('phone_no', $party->phone_no) }}">
                                        @if ($errors->has('phone_no'))
                                            <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please provide a Number.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Address</label>
                                        <input type="text" name="address" class="form-control border-bottom "
                                            id="validationCustom02" placeholder="Enter Address"
                                            value="{{ old('address', $party->address) }}">
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <h4 class="header-title text-uppercase">Bank Details</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom04">Account Holder Name</label>
                                        <input type="text" name="account_holder_name" class="form-control border-bottom "
                                            id="validationCustom04" placeholder="Enter Accoumt Holder name"
                                            value="{{ old('account_holder_name', $party->account_holder_name) }}">
                                        @if ($errors->has('account_holder_name'))
                                            <span class="text-danger">{{ $errors->first('account_holder_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom05">Account Number</label>
                                        <input type="text" name="account_no" class="form-control border-bottom "
                                            id="validationCustom05" placeholder="Enter Account Number"
                                            value="{{ old('account_no', $party->account_no) }}">
                                        @if ($errors->has('account_no'))
                                            <span class="text-danger">{{ $errors->first('account_no') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">Bank Name</label>
                                        <input type="text" name="bank_name"
                                            value="{{ old('bank_name', $party->bank_name) }}"
                                            class="form-control border-bottom " id="validationCustom02"
                                            placeholder="Enter Bank Name">
                                        @if ($errors->has('bank_name'))
                                            <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">IFSC Code</label>
                                        <input type="text" name="ifsc_code"
                                            value="{{ old('ifsc_code', $party->ifsc_code) }}"
                                            class="form-control border-bottom " id="validationCustom02"
                                            placeholder="Enter IFSC Code">
                                        @if ($errors->has('ifsc_code'))
                                            <span class="text-danger">{{ $errors->first('ifsc_code') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">Branch Address</label>
                                        <input type="text" name="branch_address"
                                            value="{{ old('branch_address', $party->branch_address) }}"
                                            class="form-control border-bottom " id="validationCustom02"
                                            placeholder="Enter Branch Address">
                                        @if ($errors->has('branch_address'))
                                            <span class="text-danger">{{ $errors->first('branch_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <br>

                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('manage-parties') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

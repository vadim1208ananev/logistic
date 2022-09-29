@extends('panels.layouts.master')
@section('content')
    <script defer src="{{ asset('public/js/picker.js') }}"></script>

    </body>
<style>
    i {
        margin-right: 10px;
    }

    /*------------------------*/
    input:focus,
    button:focus,
    .form-control:focus {
        outline: none;
        box-shadow: none;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #fff;
    }

    /*----------step-wizard------------*/
    .d-flex {
        display: flex;
    }

    .justify-content-center {
        justify-content: center;
    }

    .align-items-center {
        align-items: center;
    }

    /*---------signup-step-------------*/
    .bg-color {
        background-color: #333;
    }

    .signup-step-container {
        padding: 150px 0px;
        padding-bottom: 60px;
    }

    .wizard .nav-tabs {
        position: relative;
        margin-bottom: 0;
        border-bottom-color: transparent;
    }

    .wizard>div.wizard-inner {
        position: relative;
        margin-bottom: 50px;
        text-align: center;
    }

    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 75%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 15px;
        z-index: 1;
    }

    .wizard .nav-tabs>li.active>a,
    .wizard .nav-tabs>li.active>a:hover,
    .wizard .nav-tabs>li.active>a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
    }

    span.round-tab {
        width: 30px;
        height: 30px;
        line-height: 30px;
        display: inline-block;
        border-radius: 50%;
        background: #fff;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 16px;
        color: #0e214b;
        font-weight: 500;
        border: 1px solid #ddd;
    }

    span.round-tab i {
        color: #555555;
    }

    .wizard li.active span.round-tab {
        background: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .wizard li.active span.round-tab i {
        color: #5bc0de;
    }

    .wizard .nav-tabs>li.active>a i {
        color: #007bff;
    }

    .wizard .nav-tabs>li {
        width: 25%;
    }

    .wizard li:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: red;
        transition: 0.1s ease-in-out;
    }



    .wizard .nav-tabs>li a {
        width: 30px;
        height: 30px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
        background-color: transparent;
        position: relative;
        top: 0;
    }

    .wizard .nav-tabs>li a i {
        position: absolute;
        top: -15px;
        font-style: normal;
        font-weight: 400;
        white-space: nowrap;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 12px;
        font-weight: 700;
        color: #000;
    }

    .wizard .nav-tabs>li a:hover {
        background: transparent;
    }

    .wizard .tab-pane {
        position: relative;
        padding-top: 20px;
    }


    .wizard h3 {
        margin-top: 0;
    }

    .prev-step,
    .next-step {
        font-size: 13px;
        padding: 8px 24px;
        border: none;
        border-radius: 4px;
        margin-top: 30px;
        background-color: #6c757d;
        color: #fff;
    }

    .next-step {
        color: #fff;
        background-color: #007bff;
    }

    .step-head {
        font-size: 20px;
        text-align: center;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .term-check {
        font-size: 14px;
        font-weight: 400;
    }

    .custom-file {
        position: relative;
        display: inline-block;
        width: 100%;
        height: 40px;
        margin-bottom: 0;
    }

    .custom-file-input {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 40px;
        margin: 0;
        opacity: 0;
    }

    .custom-file-label {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1;
        height: 40px;
        padding: .375rem .75rem;
        font-weight: 400;
        line-height: 2;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: .25rem;
    }

    .custom-file-label::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 3;
        display: block;
        height: 38px;
        padding: .375rem .75rem;
        line-height: 2;
        color: #495057;
        content: "Browse";
        background-color: #e9ecef;
        border-left: inherit;
        border-radius: 0 .25rem .25rem 0;
    }

    .footer-link {
        margin-top: 30px;
    }

    .all-info-container {}

    .list-content {
        margin-bottom: 10px;
    }

    .list-content a {
        padding: 10px 15px;
        width: 100%;
        display: inline-block;
        background-color: #f5f5f5;
        position: relative;
        color: #565656;
        font-weight: 400;
        border-radius: 4px;
    }

    .list-content a[aria-expanded="true"] i {
        transform: rotate(180deg);
    }

    .list-content a i {
        text-align: right;
        position: absolute;
        top: 15px;
        right: 10px;
        transition: 0.5s;
    }

    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        background-color: #fdfdfd;
    }

    .list-box {
        padding: 10px;
    }

    .signup-logo-header .logo_area {
        width: 200px;
    }

    .signup-logo-header .nav>li {
        padding: 0;
    }

    .signup-logo-header .header-flex {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .list-inline li {
        display: inline-block;
    }

    .pull-right {
        float: right;
    }

    /*-----------custom-checkbox-----------*/
    /*----------Custom-Checkbox---------*/
    input[type="checkbox"] {
        position: relative;
        display: inline-block;
        margin-right: 5px;
    }

    input[type="checkbox"]::before,
    input[type="checkbox"]::after {
        position: absolute;
        content: "";
        display: inline-block;
    }

    input[type="checkbox"]::before {
        height: 16px;
        width: 16px;
        border: 1px solid #999;
        left: 0px;
        top: 0px;
        background-color: #fff;
        border-radius: 2px;
    }

    input[type="checkbox"]::after {
        height: 5px;
        width: 9px;
        left: 4px;
        top: 4px;
    }

    input[type="checkbox"]:checked::after {
        content: "";
        border-left: 1px solid #fff;
        border-bottom: 1px solid #fff;
        transform: rotate(-45deg);
    }

    input[type="checkbox"]:checked::before {
        background-color: #18ba60;
        border-color: #18ba60;
    }






    @media (max-width: 767px) {
        .sign-content h3 {
            font-size: 40px;
        }

        .wizard .nav-tabs>li a i {
            display: none;
        }

        .signup-logo-header .navbar-toggle {
            margin: 0;
            margin-top: 8px;
        }

        .signup-logo-header .logo_area {
            margin-top: 0;
        }

        .signup-logo-header .header-flex {
            display: block;
        }
    }

</style>

<section class="">
    <div class="container">

        <div class="show-errors mb-5">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error#{{$loop->iteration}}: </strong> {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                    aria-expanded="true" title="Step 1"><span class="round-tab">1 </span> <i>Basic</i></a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                    aria-expanded="false"><span class="round-tab">2</span> <i>Description</i></a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span
                                        class="round-tab"><span class="round-tab">3</span> <i>Calculation</i></a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span
                                        class="round-tab"><span class="round-tab">4</span> <i>Other</i></a>
                            </li>
                        </ul>
                    </div>


                    <form role="form" action="{{ route('quotation.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content" id="main_form">

                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <h4 class="text-center">Basic Info</h4>
                                <hr>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Origin of shipment *</label>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-12">
                                            <input type="text"
                                                class="form-control @error('origin') is-invalid @enderror"
                                                id="field1" placeholder="Origin"
                                                value="{{ old('origin') }}" name="origin">
                                            @error('origin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    <!--   <div class="col-md-3 mb-3">
                                            <input type="text"
                                                class="form-control @error('origin_state') is-invalid @enderror"
                                                id="validationServer04" placeholder="State" name="origin_state"
                                                value="{{ old('origin_state') }}">
                                            @error('origin_state')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <input type="text"
                                                class="form-control @error('origin_country') is-invalid @enderror"
                                                id="validationServer03" placeholder="Country" name="origin_country"
                                                value="{{ old('origin_country') }}">
                                            @error('origin_country')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <input type="text"
                                                class="form-control"
                                                id="validationServer05" placeholder="Zip" name="origin_zip"
                                                value="{{ old('origin_zip') }}">
                                            @error('origin_zip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>-->
                                    </div>

                                    <div class="col-md-6">
                                        <label>Destination of shipment *</label>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-12">
                                            <input type="text"
                                                class="form-control @error('destination') is-invalid @enderror"
                                                id="field2" placeholder="Destination" name="destination"
                                                value="{{ old('destination') }}">
                                            @error('destination')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                     <!--   <div class="col-md-3 mb-3">
                                            <input type="text"
                                                class="form-control @error('destination_state') is-invalid @enderror"
                                                id="validationServer04" placeholder="State" name="destination_state"
                                                value="{{ old('destination_state') }}">
                                            @error('destination_state')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <input type="text"
                                                class="form-control @error('destination_country') is-invalid @enderror"
                                                id="validationServer03" placeholder="Country" name="destination_country"
                                                value="{{ old('destination_country') }}">
                                            @error('destination_country')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <input type="text"
                                                class="form-control"
                                                id="validationServer05" placeholder="Zip" name="destination_zip"
                                                value="{{ old('destination_zip') }}">
                                            @error('destination_zip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>-->
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Ready to load date</label>
                                        <input type="text"
                                            class="calendar form-control "
                                            name="ready_to_load_date"  />
                                        @error('ready_to_load_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-9 mb-3">
                                        <label for="exampleFormControlTextarea1">Description of goods</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            name="description_of_goods">{{ old('description_of_goods') }}</textarea>
                                        @error('description_of_goods')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                </div>

                                <ul class="list-inline pull-right">
                                    <li>
                                        <button type="button"  href="#step2" data-toggle="tab" aria-controls="step2" id="step1_btn" role="tab"
                                    aria-expanded="false" class="default-btn next-step" >Continue to next
                                            step</button>
                                      <!--  <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                           aria-expanded="false"><span class="round-tab">to2</span> <i>Description</i></a>-->


                                    </li>
                                </ul>
                            </div>
<!--start2step-->

                            <div class="tab-pane" role="tabpanel" id="step2" >
                                <h4 class="text-center">Description of Goods</h4>
                                <hr>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="mr-sm-2" for="incoterms">Incoterms</label>
                                        <select class="custom-select mr-sm-2 @error('incoterms') is-invalid @enderror"
                                            id="incoterms" name="incoterms" value="{{ old('incoterms') }}">
                                            <option value="" selected>Choose..</option>
                                            <option value="EXW">EXW (Ex Works Place)</option>
                                            <option value="FOB">FOB (Free On Board Port)</option>
                                            <option value="CIP/CIF">CIF/CIP (Cost Insurance & Freight / Carriage &
                                                Insurance Paid)
                                            </option>
                                            <option value="DAP">DAP (Delivered At Place)</option>
                                        </select>
                                        @error('incoterms')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div id="exw">
                                    <div class="row py-3">
                                        <div class="col-md-6">
                                            <label for="validationServer01">Pick Up Address</label>
                                            <input type="text" class="form-control" name="pickup_address"
                                                value="{{ old('pickup_address') }}" id="autocomplete" autocomplete="off" onFocus="geolocate()"  />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="validationServer01">Final destination address</label>
                                            <input type="text" class="form-control" name="final_destination_address"
                                                value="{{ old('final_destination_address') }}" id="autocomplete2" autocomplete="off" onFocus="geolocate()"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 my-3">
                                        <label for="">Value of Goods</label>
                                        <input type="number"
                                            class="form-control @error('value_of_goods') is-invalid @enderror"
                                            id="validationServer03" placeholder="Value of Goods (USD)"
                                            name="value_of_goods" value="{{ old('value_of_goods') }}">
                                        @error('value_of_goods')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-auto my-1">
                                        <label class="mr-sm-2" for="transportation_type">Transportation Type</label>
                                        <select
                                            class="custom-select mr-sm-2 @error('transportation_type') is-invalid @enderror"
                                            id="transportation_type" name="transportation_type">
                                            <option value="" selected>Choose...</option>
                                            <option value="sea">Ocean Freight</option>
                                            <option value="air">Air Freight</option>
                                        </select>
                                        @error('transportation_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-auto my-1">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Type of Shipment</label>
                                        <select class="custom-select mr-sm-2 @error('type') is-invalid @enderror"
                                            id="type_of_shipment" name="type">
                                            <option value="" selected>Choose...</option>
                                        </select>
                                        @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dynamic Containers -->

                                <div id="for_flc">
                                    <div class="row" id="dynamic_containers">

                                        <div class="col-md-12">
                                            <label class="mt-3">Containers Specification</label>
                                        </div>

                                        <div class="dynamic-container row" style="margin: 20px 0px 10px 0px;"
                                            id="container-1">
                                            <label for="" style="font-weight: bold;">Container#1</label>
                                            <div class="col-md-5 mb-3">
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"
                                                    name="container_size[]">
                                                    <option selected="">Container size</option>
                                                    <option value="20f-dc">20' Dry Cargo</option>
                                                    <option value="40f-dc">40' Dry Cargo</option>
                                                    <option value="40f-hdc">40' add-high Dry Cargo</option>
                                                    <option value="45f-hdc">45' add-high Dry Cargo</option>
                                                    <option value="20f-ot">20' Open Top</option>
                                                    <option value="40f-ot">40' Open Top</option>
                                                    <option value="20f-col">20' Collapsible</option>
                                                    <option value="40f-col">40' Collapsible</option>
                                                    <option value="20f-os">20' Open Side</option>
                                                    <option value="20f-dv">20' D.V for Side Floor</option>
                                                    <option value="20f-ven">20' Ventilated</option>
                                                    <option value="40f-gar">40' Garmentainer</option>
                                                </select>
                                                @error('container_size')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <input type="number"
                                                    class="form-control @error('container_weight') is-invalid @enderror"
                                                    id="validationServer032" placeholder="Weight (kg)"
                                                    name="container_weight[]" value="">
                                                @error('gross_weight')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="dynamic_btn">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary btn-sm" id="add_container"
                                                style="padding: 0px 6px 0px 13px; height: 40px; margin: 0px 0px 20px 20px; font-size: 12px; border-radius: 10px;">
                                                <!-- <span>Add New</span> -->
                                                <i class="fal fa-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary btn-sm" id="remove_container"
                                                style="padding: 0px 6px 0px 13px; height: 40px; margin: 0px 0px 20px 20px; font-size: 12px; border-radius: 10px;">
                                                <!-- <span>Add New</span> -->
                                                <i class="fal fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-row my-3">
                                    <div class="col-md-3 mb-3">
                                        <div class="col-auto my-1">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customControlAutosizing" name="isStockable" value="Yes">
                                                <label class="custom-control-label" for="customControlAutosizing">Is
                                                    Stackable</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="col-auto my-1">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customControlAutosizing2" name="isDGR" value="Yes">
                                                <label class="custom-control-label" for="customControlAutosizing2">Is
                                                    DGR</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row my-3">
                                    <div class="col-md-3 mb-3">
                                        <div class="col-auto my-1">
                                            Dimensions Type
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="col-auto my-1">
                                            <div class="col-auto my-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dimension_type" id="exampleRadios13" value="cm" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Cm
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dimension_type" id="exampleRadios22" value="inches">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Inch
                                                    </label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <div class="form-row my-3">
                                    <div class="col-md-3 mb-3">
                                        <div class="col-auto my-1">
                                            Weight Type
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="col-auto my-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="weight_type" id="exampleRadios1" value="kg" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Kg
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="weight_type" id="exampleRadios2" value="pounds">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Lb
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                </div>




                                <ul class="list-inline pull-right">
                                    <li><button type="button" href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                    aria-expanded="false"  class="default-btn prev-step" onclick="document.getElementById('step1_btn').className='default-btn prev-step'; this.className='default-btn prev-step';" id="step2_btn">Back</button></li>
                                    <li><button type="button" href="#step3" data-toggle="tab" aria-controls="step3" role="tab"
                                    aria-expanded="false" class="default-btn next-step" id="step2b_btn">Continue</button>
                                    </li>
                                </ul>
                            </div>
<!--start3step-->
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <h4 class="text-center">Shipment Calculations</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div id="if_not_air">
                                                <input type="radio" id="customRadioInline1" name="calculate_by"
                                                    value="shipment" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline1">Calculate
                                                    by total
                                                    shipment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="calculate_by"
                                                value="units" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="customRadioInline2">Calculate
                                                by units</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="shipment">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number"
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                id="validationServer03" placeholder="Quantity" name="quantity"
                                                value="{{ old('quantity') }}">
                                            @error('quantity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="">Gross Weight (<span class="weight_type">Kg</span>)</label>
                                            <input type="number"
                                                class="form-control @error('total_weight') is-invalid @enderror"
                                                id="validationServer04" placeholder="Gross Weight" name="total_weight"
                                                value="{{ old('total_weight') }}">
                                            @error('total_weight')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div id="dynamic_fields">
                                        <div class="form-row dynamic-field" style="margin: 20px 0px 10px 0px;"
                                            id="units-1">
                                            <label for="" style="font-weight: bold;">Pallet#1</label>
                                            <!-- <label for="">Dimensions (cm)</label> -->
                                            <div class="form-row">
                                                <div class="col-md-2 mb-3">
                                                    <label for="">Length (<span class="dimension_type">CM</span>)</label>
                                                    <input type="number"
                                                        class="form-control @error('l') is-invalid @enderror"
                                                        id="validationServer04" placeholder="length" name="l[]">
                                                    @error('l')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="">Width (<span class="dimension_type">CM</span>)</label>
                                                    <input type="number"
                                                        class="form-control @error('w') is-invalid @enderror"
                                                        id="validationServer03" placeholder="width" name="w[]">
                                                    @error('w')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="">Height (<span class="dimension_type">CM</span>)</label>
                                                    <input type="number"
                                                        class="form-control @error('h') is-invalid @enderror"
                                                        id="validationServer03" placeholder="height" name="h[]">
                                                    @error('h')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-2 mb-3 ml-3">
                                                    <label for="">Gross Weight (<span class="weight_type">Kg</span>)</label>
                                                    <input type="number"
                                                        class="form-control @error('gross_weight') is-invalid @enderror"
                                                        id="validationServer03" placeholder="weight"
                                                        name="gross_weight[]">
                                                    @error('gross_weight')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-2 mb-3 ml-3">
                                                    <label for="">Vol Weight (<span class="weight_type">Kg</span>)</label>
                                                    <input type="number"
                                                        class="form-control @error('total_weight_units') is-invalid @enderror"
                                                        id="validationServer03" placeholder="weight"
                                                        name="total_weight_units[]" disabled>
                                                    @error('total_weight_units')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row" id="dynamic_buttons">
                                        <button type="button" class="btn btn-primary btn-sm" id="add-button"
                                            style="padding: 0px 6px 0px 13px; height: 40px; margin: 0px 0px 20px 20px; font-size: 12px; border-radius: 10px;">
                                            <!-- <span>Add New</span> -->
                                            <i class="fal fa-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm" id="remove-button"
                                            style="padding: 0px 6px 0px 13px; height: 40px; margin: 0px 0px 20px 20px; font-size: 12px; border-radius: 10px;">
                                            <!-- <span>Add New</span> -->
                                            <i class="fal fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <ul class="list-inline pull-right">
                                    <li><button type="button" href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                    aria-expanded="false" class="default-btn prev-step" onclick="document.getElementById('step2_btn').className='default-btn prev-step'; document.getElementById('step2b_btn').className='default-btn prev-step'; this.className='default-btn prev-step';" id="step3_btn">Back</button></li>
                                    <li><button type="button" href="#step4" data-toggle="tab" aria-controls="step4" role="tab"
                                    aria-expanded="false" class="default-btn next-step" id="step3b_btn">Continue</button>
                                    </li>
                                </ul>
                            </div>
<!--start4step-->
                            <div class="tab-pane" role="tabpanel" id="step4">
                                <h4 class="text-center">Other Info</h4>
                                <hr>
                                <div class="all-info-container">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">

                                            <label for="exampleFormControlTextarea1">Remarks</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                name="remarks">{{ old('remarks') }}</textarea>
                                            @error('remarks')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customControlAutosizing3" name="isClearanceReq" value="Yes">
                                                <label class="custom-control-label" for="customControlAutosizing3">
                                                    Customs Clearance Required?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customControlAutosizing4" name="insurance" value="Yes">
                                                <label class="custom-control-label" for="customControlAutosizing4">
                                                    Insurance</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Attach a file</label>
                                                <input type="file" style="border: 1px solid grey; border-radius: 5px; padding: 10px;" class="form-control-file" name="attachment" id="exampleFormControlFile1">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="list-content">
                                        <a href="#listthree" data-toggle="collapse" aria-expanded="false"
                                            aria-controls="listthree">Collapse 3 <i class="fa fa-chevron-down"></i></a>
                                        <div class="collapse" id="listthree">
                                            <div class="list-box">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name *</label>
                                                            <input class="form-control" type="text" name="name"
                                                                placeholder="">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Number *</label>
                                                            <input class="form-control" type="text" name="name"
                                                                placeholder="">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <ul class="list-inline pull-right">
                                    <li><button type="button" href="#step3" data-toggle="tab" aria-controls="step3" role="tab"
                                    aria-expanded="false"  class="default-btn prev-step" onclick="document.getElementById('step3_btn').className='default-btn prev-step'; document.getElementById('step3b_btn').className='default-btn prev-step'; this.className='default-btn prev-step';" id="step4_btn">Back</button></li>
                                    <li><button type="submit" class="default-btn next-step">Request Quotation</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('bottom_scripts')
<script>
    $(document).ready(function () {

      //  $(document).on('change', "input[name='weight_type']", function() {
       //    $("input[name='weight_type']:checked").change(function () {
       //        alert(456456)
            //    selected_value = $("input[name='weight_type']:checked").val();
         //  alert(selected_value);
      //  });



        // Dynamic changes
        $(document).on('keyup', "input[name^='l'], input[name^='w'], input[name^='h']", function () {
            $el = $(this);
            $unit_num = $el.parent().parent().parent();
            console.log($unit_num);
            if ($unit_num.find("input[name^='l']").val() && $unit_num.find("input[name^='w']").val() &&
                $unit_num.find("input[name^='h']").val()) {
                var l = $unit_num.find("input[name^='l']").val();
                var w = $unit_num.find("input[name^='w']").val();
                var h = $unit_num.find("input[name^='h']").val();
                var total_weight = (l * w * h) / 6000;
                $unit_num.find("input[name^='total_weight_units']").val(total_weight.toFixed(2));
            }
        });

        $('#exw').hide();
        $('#dynamic_buttons').show();
        $('.dynamic-field').show();

        $('#shipment').hide();
        $("input[name=quantity]").prop('', false);
        $("input[name=total_weight]").prop('', false);
        $('#for_flc').hide();

        // On load
        if ($("#transportation_type").find(':selected').val() == 'sea') {
            $('#type_of_shipment').empty();
            $("#type_of_shipment").append(new Option("LCL", "lcl"));
            $("#type_of_shipment").append(new Option("FCL", "fcl"));
        } else if ($("#transportation_type").find(':selected').val() == 'air') {
            $('#type_of_shipment').empty();
            $("#type_of_shipment").append(new Option("AIR", "air"));
        }

        if ($("#type_of_shipment").find(':selected').val() == 'fcl') {
            $('#for_flc').show();
        }

        $("#transportation_type").change(function () {
            if ($(this).find(':selected').val() == 'sea') {
                $('#if_not_air').show();
                $('#type_of_shipment').empty();
                $("#type_of_shipment").append(new Option("LCL", "lcl"));
                $("#type_of_shipment").append(new Option("FCL", "fcl"));
            } else if ($(this).find(':selected').val() == 'air') {
                $('#type_of_shipment').empty();
                $('#if_not_air').hide();
                $("#type_of_shipment").append(new Option("AIR", "air"));
                $('#for_flc').hide();
            }
        });

        // FCL options
        $("#type_of_shipment").change(function () {
            if ($(this).find(':selected').val() == 'fcl') {
                $('#for_flc').show();
            } else {
                $('#for_flc').hide();
            }
        });

        // On calculation radio button clicks
        $('input:radio').change(function () {

            var el = $(this).val();
           if(['inches','cm','pounds','kg'].find(inel=>inel==el)) return

            if (el == 'units') {
                $('#dynamic_buttons').show();
                $('.dynamic-field').show();
                $(".require").prop('', true);

                $('#shipment').hide();
                $("input[name=quantity]").prop('', false);
                $("input[name=total_weight]").prop('', false);
            } else {
                $('.dynamic-field').hide();
                $('#dynamic_buttons').hide();
                $('#shipment').show();

                $(".require").prop('', false);
            }
        });

        // Live results on calculations
        $("input[name=quantity_units], input[name=total_weight_units], input[name=l], input[name=w], input[name=h]")
            .keyup(function () {
                console.log('123');
                var quantity = $('input[name=quantity_units]').val() ? parseFloat($(
                    'input[name=quantity_units]').val()) : 1;
                var l = $('input[name=l]').val() ? parseFloat($('input[name=l]').val()) : 1;
                var w = $('input[name=w]').val() ? parseFloat($('input[name=w]').val()) : 1;
                var h = $('input[name=h]').val() ? parseFloat($('input[name=h]').val()) : 1;

                var total_weight = (l * w * h) / 6000 * quantity;
                $('input[name=total_weight_units]').val(total_weight);
                // $("#kg").text(total_weight);
                // $("#pcs").text(quantity);
            });


        // On Incoterms button clicks
        $('#incoterms').change(function () {
            var el = $(this).val();
            console.log(el);
            if (el == 'EXW') {
                $('#exw').show();
                $("input[name=pickup_address]").prop('', true);
                $("input[name=final_destination_address]").prop('',
                    true);
            } else {
                $('#exw').hide();
                $("input[name=pickup_address]").prop('', false);
                $("input[name=final_destination_address]").prop('',
                    false);
            }
        });

    });

   /* $(function () {
        $('input[name="ready_to_load_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: parseInt(moment().format('YYYY'), 10),
            autoApply: true,
            maxYear: 2050,
            locale: {
                format: 'D-M-YYYY'
            }
        });
    });*/

</script>

<!-- Add dynamic input fields -->
<script>
    $(document).ready(function () {
        var buttonAdd = $("#add-button");
        var buttonRemove = $("#remove-button");
        var className = ".dynamic-field";
        var count = 0;
        var field = "";
        var maxFields = 50;

        function totalFields() {
            return $(className).length;
        }

        function addNewField() {
            count = totalFields() + 1;
            field = $("#units-1").clone();
            field.attr("id", "units-" + count);
            field.children("label").text("Pallet# " + count);
            field.find("input").val("");
            $(className + ":last").after($(field));
        }

        function removeLastField() {
            if (totalFields() > 1) {
                $(className + ":last").remove();
            }
        }

        function enableButtonRemove() {
            if (totalFields() === 2) {
                buttonRemove.removeAttr("disabled");
                buttonRemove.addClass("shadow-sm");
            }
        }

        function disableButtonRemove() {
            if (totalFields() === 1) {
                buttonRemove.attr("disabled", "disabled");
                buttonRemove.removeClass("shadow-sm");
            }
        }

        function disableButtonAdd() {
            if (totalFields() === maxFields) {
                buttonAdd.attr("disabled", "disabled");
                buttonAdd.removeClass("shadow-sm");
            }
        }

        function enableButtonAdd() {
            if (totalFields() === (maxFields - 1)) {
                buttonAdd.removeAttr("disabled");
                buttonAdd.addClass("shadow-sm");
            }
        }

        buttonAdd.click(function () {
            addNewField();
            enableButtonRemove();
            disableButtonAdd();
        });

        buttonRemove.click(function () {
            removeLastField();
            disableButtonRemove();
            enableButtonAdd();
        });
    });

</script>

<!-- Add dynamic containers -->
<script>
    $(document).ready(function () {
        var buttonAdd = $("#add_container");
        var buttonRemove = $("#remove_container");
        var className = ".dynamic-container";
        var count = 0;
        var field = "";
        var maxFields = 50;

        function totalFields() {
            return $(className).length;
        }

        function addNewField() {
            count = totalFields() + 1;
            field = $("#container-1").clone();
            field.attr("id", "container-" + count);
            field.children("label").text("Container# " + count);
            field.find("input").val("");
            $(className + ":last").after($(field));
        }

        function removeLastField() {
            if (totalFields() > 1) {
                $(className + ":last").remove();
            }
        }

        function enableButtonRemove() {
            if (totalFields() === 2) {
                buttonRemove.removeAttr("disabled");
                buttonRemove.addClass("shadow-sm");
            }
        }

        function disableButtonRemove() {
            if (totalFields() === 1) {
                buttonRemove.attr("disabled", "disabled");
                buttonRemove.removeClass("shadow-sm");
            }
        }

        function disableButtonAdd() {
            if (totalFields() === maxFields) {
                buttonAdd.attr("disabled", "disabled");
                buttonAdd.removeClass("shadow-sm");
            }
        }

        function enableButtonAdd() {
            if (totalFields() === (maxFields - 1)) {
                buttonAdd.removeAttr("disabled");
                buttonAdd.addClass("shadow-sm");
            }
        }

        buttonAdd.click(function () {
            addNewField();
            enableButtonRemove();
            disableButtonAdd();
        });

        buttonRemove.click(function () {
            removeLastField();
            disableButtonRemove();
            enableButtonAdd();
        });
    });

</script>



@endsection

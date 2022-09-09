@extends('panels.layouts.master')
@section('content')


<div class="row">
    <div class="col-xl-8 col-md-8 mb-4 offset-md-2">
        
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

        <div class="card card shadow">
            <h5 class="card-header">Make Proposal for <b class="text-warning">quotation#{{ $quotation->id }} </b> </h5>
            <div class="card-body">

                <form action="{{ route('proposal.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="quotation_id" value="{{ $quotation->id }}">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <!-- <h6> Origin local charges (USD) </h6> -->
                            <input type="number" class="form-control @error('local_charges') is-invalid @enderror" id="validationServer03" placeholder="Origin local charges (USD)" value="{{ old('local_charges') }}" name="local_charges"  @if(in_array($incoterms,['EXW'])) required @endif >
                            @error('local_charges')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <!-- <h6> Freight Charges(USD) </h6> -->
                            <input type="number" class="form-control @error('freight_charges') is-invalid @enderror" id="validationServer04" placeholder="Freight Charges(USD)" value="{{ old('freight_charges') }}" name="freight_charges"  @if(in_array($incoterms,['EXW','FOB'])) required @endif>
                            @error('freight_charges')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <!-- <h6> Destination local charges </h6> -->
                            <input type="number" class="form-control @error('destination_local_charges') is-invalid @enderror" id="validationServer03" placeholder="Destination local charges" value="{{ old('destination_local_charges') }}" name="destination_local_charges" @if(in_array($incoterms,['EXW','FOB','CIP/CIF','DAP'])) required @endif>
                            @error('destination_local_charges')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <!-- <h6> Customs Clearance(USD) </h6> -->
                            <input type="number" class="form-control @error('customs_clearance_charges') is-invalid @enderror" id="validationServer04" placeholder="Customs Clearance(USD)" name="customs_clearance_charges" value="{{ old('customs_clearance_charges') }}" @if(in_array($incoterms,['EXW','FOB','CIP/CIF','DAP'])) required @endif>
                            @error('customs_clearance_charges')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Valid till:</label>
                            <input type="date" class="form-control" name="valid_till" value=""  />

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Departure date :</label>
                            <input type="date" class="form-control @error('departure_date') is-invalid @enderror"" name="departure_date" id="departure_date"  value=""  />


                        </div>
                    </div>
                    
                    

                    <hr>
                    <h5 class="mt-4"> <b> Other Info </b> </h5>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">

                            <label for="exampleFormControlTextarea1">Remarks</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remarks"></textarea>
                            @error('value_of_goods')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Make Proposal</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection


@section('bottom_scripts')
<script>
    $(function() {
        $('input[name="valid_till"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: parseInt(moment().format('YYYY'), 10),
            autoApply: true,
            maxYear: 2050,
            locale: {
                format: 'D-M-YYYY'
            }
        });
    });
</script>
@endsection
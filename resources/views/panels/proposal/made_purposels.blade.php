@extends('panels.layouts.master')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<div class="container-fluid">
   <p class="mb-4"> View status of Made Active  Proposals.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">proposals</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Quotation ID</th>
                            <th>Pickup Address</th>
                            <th>Destination Address</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Local Charges</th>
                            <th>Freight Charges</th>
                            <th>Destination Local Charges</th>
                            <th>Customs Clearance</th>
                             <th>Total</th>
                            <th>Valid Date</th>
                            <th>Remarks</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                      {{--  <?php echo"<pre>";print_r($proposal['user']);?> --}}
                        @foreach($proposal as $proposals)
                        <tr>
                        	<td><?php print_r($proposals['quotation']->quotation_id)  ?> </td>
                        	<td><?php print_r($proposals['quotation']->origin)  ?> </td>
                        	<td><?php print_r($proposals['quotation']->destination)  ?> </td>
                        	<td><?php print_r($proposals['quotation']->type)  ?> </td>
                        	<td>{{ $proposals->status }}</td>
                            <td>{{ $proposals->local_charges }}$</td>
                            <td>{{ $proposals->freight_charges }}$</td>
                            <td>{{ $proposals->destination_local_charges }}$</td>
                            <td>{{ $proposals->customs_clearance_charges }}$</td>
                            <td>{{ $proposals->total }}$</td>
                            <td>
                                <?php
                                    $date = Carbon\Carbon::parse($proposals->valid_till);
                                    echo $date->format('M d Y');
                                ?>
                            </td>
                            <td>{{ $proposals->remarks }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>

</div>


@endsection

@section('bottom_scripts')

@endsection
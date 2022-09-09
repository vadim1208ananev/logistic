@extends('panels.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Proposals</h1>
        <!-- <a href="{{ route('proposal.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add proposal
        </a> -->
    </div>
    <p class="mb-4"> View status of your Proposals.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">proposals</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"id="example" width="100%" cellspacing="0" >
                    <thead>
                        <tr>
                            <th>Quotation ID</th>
                            <th>Forwarder Name</th>
                            <th>Status</th>
                            <th>Local Charges</th>
                            <th>Freight Charges</th>
                            <th>Destination Local Charges</th>
                            <th>Customs Clearance</th>
                            <th>Total</th>
                            <th width="15%">Valid Till</th>
                            <th width="25%">Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php //print_r($proposals[0]['user']);exit();?>
                        @foreach($proposals as $proposal)
                        <tr>
                            <td> <b>{{ $proposal->quotation->id }} </b> </td>
                            
                            <td>
                                <?php if(!empty($proposal->vendor->name)){ ?>
                            <b>{{ $proposal->vendor->name }} </b> </td>
                            <?php }?>
                            <td>
                                @if($proposal->status == 'active')
                                    <span class="badge badge-success">{{ $proposal->status }}</span>
                                @elseif($proposal->status == 'withdrawn')
                                    <span class="badge badge-danger">{{ $proposal->status }}</span>
                                @elseif($proposal->status == 'completed')
                                    <span class="badge badge-primary">{{ $proposal->status }}</span>
                                @endif
                            </td>
                            <td>{{ $proposal->local_charges?$proposal->local_charges:0 }}$</td>
                            <td>{{ $proposal->freight_charges?$proposal->freight_charges:0 }}$</td>
                            <td>{{ $proposal->destination_local_charges?$proposal->destination_local_charges:0 }}$</td>
                            <td>{{ $proposal->customs_clearance_charges?$proposal->customs_clearance_charges:0 }}$</td>
                            <td>{{ $proposal->total }}$</td>
                            <td>
                                <?php
                                    $date = Carbon\Carbon::parse($proposal->valid_till);
                                    echo $date->format('M d Y');
                                ?>
                            </td>
                            <td>{{ $proposal->remarks }}</td>
                            <td>
                            <div class="dropdown">
                                <a class=" btn btn-primary fa-2x"
                                    href="{{ route('proposal.show', $proposal->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class=" btn btn-primary fa-2x"
                                    href="" style="cursor: not-allowed;">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>

</div>


<!-- /.container-fluid -->
@endsection

@section('bottom_scripts')

@endsection


@extends('panels.layouts.master')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('proposal.made_proposals') }}" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Proposals Made
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $proposals_made }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-file-certificate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('proposal.active_proposals') }}" class="text-xs font-weight-bold text-info text-uppercase mb-1">Active Proposals</a>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $active_proposals }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fal fa-clipboard-list-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('proposal.accept_purposels') }}" class="text-xs font-weight-bold text-warning text-uppercase mb-1">Accepted Proposals
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $accepted_proposals }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fal fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

@endsection
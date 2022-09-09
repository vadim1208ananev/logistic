@extends('panels.layouts.master')
@section('content')
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
    </div>
    <!-- <p class="mb-4"> View status of your users.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @if($page_name == 'all_users')
                    Users 
                @else
                    Vendors
                @endif
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="users_table" width="100%" cellspacing="0" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!--@if($page_name == 'all_vendors')-->
                            <!--<th>Additional Email</th>-->
                            <!--@endif-->
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th style="width:210px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td> <b>{{ $user->id }} </b> </td>
                            <td> <b>{{ $user->name }} </b> </td>
                            <td> <b>{{ $user->email }} </b> </td>
                            <!--@if($page_name == 'all_vendors')-->
                            <!--<td> <b>{{ $user->additional_email }} </b> </td>-->
                            <!--@endif-->
                            <td> <b>{{ $user->phone }} </b> </td>
                            <td> <b>{{ $user->company_name }} </b> </td>
                            <td>
                               <?php if(!empty($user->email_verified_at)){echo"<p>Approved</p>";}else{echo"<p style='color:red'>Pending</p>";}  ?>
                            </td>
                            
                            <td>
                                <a class=" btn btn-primary fa-2x btn-sm"
                                    href="{{ route('admin.view_user', $user->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <?php if(empty($user->email_verified_at)){?>
                                <a class=" btn btn-success fa-2x btn-sm"
                                    href="#" onclick="chek(<?php echo $user->id?>)">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a class=" btn btn-danger fa-2x btn-sm"
                                    href="{{ route('admin.destroy', $user->id) }}">
                                    <i class="fas fa-times"></i>
                                </a>
                                <?php } else{?>
                                <a class=" btn btn-primary fa-2x btn-sm"
                                    href="{{ route('admin.destroy', $user->id) }}">
                                    <i class="fas fa-times"></i>
                                </a>
                                <?php }?>
                                 
                                
                                
                            
                                
                                
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
<script>
    $(document).ready( function () {
        $('#users_table').DataTable();
    });
</script>
<script>
// function block(id,sel){
//     var id=id;
//     var status=sel.value;
//     alert(status);

// }

function chek(id,element){
    var status="Active";
    if (confirm("Are you sure ?")){
    $.ajax({
            type:'POST',
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:"{{ route('update_status') }}",
            data:{id:id,status:status},
            success: function(msg){ 
             //$('#responce').html(msg);
              //alert(msg);
              window.setTimeout(window.location='https://www.logistiquote.com/all_vendors',1000);
             }
                  });
}
}
</script>
@endsection

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('public/panel/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/panel/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('public/panel/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('public/panel/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <!-- <script src="{{ asset('public/panel/vendor/chart.js/Chart.min.js') }}"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="{{ asset('public/panel/js/demo/chart-area-demo.js') }}"></script> -->
  <!-- <script src="{{ asset('public/panel/js/demo/chart-pie-demo.js') }}"></script> -->

  @if(isset($page_name))

    @if($page_name == 'quotations')
      <!-- Page level plugins -->
      <script src="{{ asset('public/panel/vendor/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('public/panel/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
      <!-- Page level custom scripts -->
      <!-- <script src="{{ asset('public/panel/js/demo/datatables-demo.js') }}"></script> -->
    @endif


    @if($page_name == 'add_quotation' || $page_name == 'edit_quotation' || $page_name == 'create_quotation'
    || $page_name == 'make_proposal' || $page_name == 'edit_proposal' || $page_name == 'all_users' || $page_name == 'all_vendors')
      <script type="text/javascript" src="{{ asset('public/vendor/datepicker/moment.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('public/vendor/datepicker/daterangepicker.js') }}"></script>
      <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/datepicker/daterangepicker.css') }}" >
    @endif
  @endif

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  <script type="text/javascript">
      function initialize() {
          //return;
          var input = document.getElementById('field1');
          new google.maps.places.Autocomplete(input);
          var input1 = document.getElementById('field2');
          new google.maps.places.Autocomplete(input1);

      }

      google.maps.event.addDomListener(window, 'load', initialize)
  </script>

<script defer src="{{ asset('public/js/main.js') }}"></script></body>
<!-- Index scripts -->
<script type="text/javascript">
    function initialize() {
        //return;
        var input = document.getElementById('shipment-origin');
        new google.maps.places.Autocomplete(input);
        var input1 = document.getElementById('shipment-destination');
        new google.maps.places.Autocomplete(input1);

    }

    google.maps.event.addDomListener(window, 'load', initialize)
</script>

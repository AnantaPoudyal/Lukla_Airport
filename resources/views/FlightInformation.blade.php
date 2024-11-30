@extends('Master_Layout.masterPage')
@section('Flight-content')

{{-- <pre>{{ print_r($flight_data[0]) }}</pre> --}}

<table class="table table-striped table-bordered table-hover" id="flight-table">
    <thead class="thead-dark">
        <tr>
            @foreach(array_keys((array)$flight_data[0]) as $column)
                <th>
                    @if($column == 'distance')
                        Distance (km)
                    @elseif($column == 'speed')
                        Speed (knot/h)
                    @elseif($column == 'ftime')
                        Flight Arrival Time
                    @else
                        {{ ucfirst(str_replace('_', ' ', $column)) }}
                    @endif
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{-- @foreach($flight_data as $flight)
            <tr>
                <td>{{ $flight->ID }}</td>
                <td>{{ $flight->flight_name }}</td>
                <td>{{ $flight->flight_to }}</td>
                <td>{{ $flight->flight_from }}</td>
                <td>{{ $flight->distance }}</td>
                <td>{{ $flight->speed }}</td>
                <td>{{ $flight->ftime }}</td>
            </tr>
        @endforeach --}}
    </tbody>
</table>
<!-- Reload Button (optional) -->
<button id="reload-btn">Reload Data</button>

<script type="text/javascript" src="{{asset('js/skillTableSorting.js')}}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- <script type="text/javascript" src="js/jquery"></script> --}}
<script type="text/javascript">
$(document).ready(function() {
    // Function to load flight data
    function loadFlightData() {
        $.ajax({
            url: '{{ route('FlightInfo.loadData') }}', // Correct route for loading data
            type: 'GET',
            success: function(response) {
                // Clear the existing table rows
                $("#flight-table tbody").empty();

                // Iterate over the response data and append rows to the table
                $.each(response, function(index, flight) {
                    var row = "<tr>" +
                        "<td>" + flight.ID + "</td>" +
                        "<td>" + flight.flight_name + "</td>" +
                        "<td>" + flight.flight_to + "</td>" +
                        "<td>" + flight.flight_from + "</td>" +
                        "<td>" + flight.distance + "</td>" +
                        "<td>" + flight.speed + "</td>" +
                        "<td>" + flight.ftime + "</td>" +
                    "</tr>";
                    $("#flight-table tbody").append(row);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ',' + errorThrown); // Log errors
            }
        });
    }

    // Load data when the page loads
    loadFlightData();

    // Use setInterval to reload data every 5 seconds (5000ms)
    setInterval(function() {
        loadFlightData();
    }, 5000); // Adjust the interval as needed

    // If you want to manually reload the data after an event (e.g., a button click)
    $("#reload-btn").click(function() {
        loadFlightData();
    });
});



</script>
@endsection

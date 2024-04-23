<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <style>
        #result .container:not(:last-of-type) {
            border-bottom: 1px solid red;
        }
    </style>
</head>
<body>
    <div id='calendar'></div>

    <!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Events</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="result">
            
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        var calendarEvents = @json($events)
    
    
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            displayEventTime : false,
            dateClick: function(info) {
                // $('#exampleModal').modal('toggle');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Step 1: Parse the date
                const date = new Date(info.date);

                // Step 2: Extract components
                const year = date.getFullYear();  // gets the year
                let month = date.getMonth() + 1;  // getMonth() returns 0-11, so add 1
                let day = date.getDate();         // gets the day of the month

                // Step 3: Pad the month and day with leading zeros if necessary
                month = month < 10 ? '0' + month : month;
                day = day < 10 ? '0' + day : day;
                const newDate = `${year}-${month}-${day}`

                $.ajax({
                    type: 'GET',
                    url: `/calendar/search`,
                    data: {
                        date: newDate
                    },
                    success: function(data) {
                        // console.log(data)
                        $('#result').empty();
                        data.forEach(d => {
                            // Create the container div
                            var $container = $('<div></div>').addClass('container');

                            // Create the item div
                            var $user_id = $('<div></div>').addClass('item').text(d.user_id);
                            var $title = $('<div></div>').addClass('item').text(d.title);
                            var $content = $('<div></div>').addClass('item').text(d.content);   
                            var $image = $('<div></div>').addClass('item').text(d.image);
                            var $start = $('<div></div>').addClass('item').text(d.start);   
                            var $price = $('<div></div>').addClass('item').text(d.price);   
                            var $place = $('<div></div>').addClass('item').text(d.place);   
                            var $others = $('<div></div>').addClass('item').text(d.others);   
                            var $btn = $('<a></a>').addClass('item').text('show').attr('href', 'https://www.example.com');   

                            // Append the item div to the container
                            $container.append($user_id);
                            $container.append($title);
                            $container.append($content);
                            $container.append($image);
                            $container.append($start);
                            $container.append($price);
                            $container.append($place);
                            $container.append($others);
                            $container.append($btn);
                            $('#result').append($container);
                        });
                        $('#exampleModal').modal('toggle');
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            },
                events: calendarEvents
    
            });
            calendar.render();
        });
    
    </script>
</body>
</html>
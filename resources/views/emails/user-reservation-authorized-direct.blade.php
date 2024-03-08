<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Globus Transfers | Reservation confirmation</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            padding: 16px;
        }

        header {
            text-align: center; 
        }

        table {
            width: 100%;
        }

        table th {
            text-align: left;
            width: 50%;
            background-color: lightgrey;
            padding: 3px;
        }

        table td {
            text-align: left;
            width: 50%;
            padding: 3px;
        }

        footer {
            text-align: center;
        }

    </style>
</head>
<body>
    <header>
        <img src="https://www.freeiconspng.com/uploads/globe-png-22.png" alt="Logo" width="80">
        <h1>GLOBUS Transfers</h1>
    </header>
    <br>
    <br>
    <section>
        <h2>Thank You for Choosing Our Taxi Transfer Service!</h2>
        <p>Dear {{ ucfirst($routeAndReservationData['first_name']) }},</p>
        <p>Your taxi reservation has been created. Our team will review it within the next 6 to 12 hours, and we'll notify you once the reservation is confirmed.</p>
        <p>We're looking forward to providing you with a safe and comfortable journey.</p>
        <p>If you have any questions or need assistance, please feel free to <a href="mailto:luka.predovan01@gmail.com">contact our customer support</a>.</p>
        <p>Check the details of your booking below, and we will contact you as soon as possible!</p>
        <p style="margin: 30px 0;"><strong>You can view and download the invoice for your booking by finding the PDF attachment down below.</strong></p>
    </section>
    <section>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>Booking #</th>
                <th>{{ $bookingNumber }}</th>
            </tr>
            <tr>
                <td>Full name</td>
                <td>{{ ucfirst($routeAndReservationData['first_name']) . ' ' . ucfirst($routeAndReservationData['last_name'])}}</td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>{{ $routeAndReservationData['email'] }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $routeAndReservationData['phone'] }}</td>
            </tr>
            <tr>
                <td>Message</td>
                <td>{{ $routeAndReservationData['order_comments'] }}</td>
            </tr>
        </table>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th colspan="2">Reservation details</th>
            </tr>
            <tr>
                <td>Number of passengers</td>
                <td>{{ $routeAndReservationData['passengers'] }}</td>
            </tr>

            @if ($routeAndReservationData['infant_seat'] || $routeAndReservationData['child_seat'] || $routeAndReservationData['booster_seat'])
            <tr>
                <td>Infant seats</td>
                <td>{{ $routeAndReservationData['infant_seat'] }}</td>
            </tr>
            <tr>
                <td>Child seats</td>
                <td>{{ $routeAndReservationData['child_seat'] }}</td>
            </tr>
            <tr>
                <td>Booster seats</td>
                <td>{{ $routeAndReservationData['booster_seat'] }}</td>
            </tr>
            @endif

            @if ($routeAndReservationData['luggage'])
            <tr>
                <td>Luggage</td>
                <td>{{ $routeAndReservationData['luggage'] }}</td>
            </tr>
            @endif

            <tr>
                <td>Departure date</td>
                <td>{{ $routeAndReservationData['departure-date'] }}</td>
            </tr>
            <tr>
                <td>Departure time</td>
                <td>{{ $routeAndReservationData['pickup-time'] }}</td>
            </tr>
            <tr>
                <td>Departure address</td>
                <td>{{ $routeAndReservationData['pick_up_address'] }}</td>
            </tr>
            <tr>
                <td>Destination address</td>
                <td>{{ $routeAndReservationData['destination_address'] }}</td>
            </tr>
            @if ($routeAndReservationData['flight_number'])
            <tr>
                <td>Flight number</td>
                <td>{{ $routeAndReservationData['flight_number'] }}</td>
            </tr>
            @endif
            <tr>
                <td>Vehicle</td>
                <td>{{ $routeAndReservationData['vehicle'] }}</td>
            </tr>
            <tr>
                <td>Price for transfer</td>
                <td>{{ $routeAndReservationData['total_price'] }} €</td>
            </tr>
            <tr>
                <td>Payment method</td>
                <td>{{ $routeAndReservationData['payment_option'] }}</td>
            </tr>
            <tr>
                <td>Additional charges</td>
                <td>0.00 €</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>{{ $routeAndReservationData['total_price'] }} €</strong></td>
            </tr>
        </table>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>Departure</th>
                <th>Destination</th>
            </tr>
            <tr>
                <td>{{ $routeAndReservationData['departure'] }}</td>
                <td>{{ $routeAndReservationData['destination'] }}</td>
            </tr>
        </table>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>Route distance</th>
                <th>Duration</th>
            </tr>
            <tr>
                <td>{{ $routeAndReservationData['distance'] }} km</td>
                <td>{{ $routeAndReservationData['duration'] }}</td>
            </tr>
        </table>
    </section>
    <br>
    <br>
    <footer>
        <img src="https://www.freeiconspng.com/uploads/globe-png-22.png" alt="Logo" width="80">
        <p><strong>Globus<br> Ulica dr. Franje Tuđmana 85, Vrsi</strong></p>
    </footer>
</body>
</html>
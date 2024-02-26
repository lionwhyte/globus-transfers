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
        <p>Dear {{ ucfirst($reservationData['first_name']) }},</p>
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
                <td>{{ ucfirst($reservationData['first_name']) . ' ' . ucfirst($reservationData['last_name'])}}</td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>{{ $reservationData['email'] }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $reservationData['phone'] }}</td>
            </tr>
            <tr>
                <td>Message</td>
                <td>{{ $reservationData['order_comments'] }}</td>
            </tr>
        </table>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th colspan="2">Reservation details</th>
            </tr>
            <tr>
                <td>Number of passengers</td>
                <td>{{ $reservationData['passengers'] }}</td>
            </tr>

            @if ($reservationData['infant_seat'] || $reservationData['child_seat'] || $reservationData['booster_seat'])
            <tr>
                <td>Infant seats</td>
                <td>{{ $reservationData['infant_seat'] }}</td>
            </tr>
            <tr>
                <td>Child seats</td>
                <td>{{ $reservationData['child_seat'] }}</td>
            </tr>
            <tr>
                <td>Booster seats</td>
                <td>{{ $reservationData['booster_seat'] }}</td>
            </tr>
            @endif

            @if ($reservationData['luggage'])
            <tr>
                <td>Luggage</td>
                <td>{{ $reservationData['luggage'] }}</td>
            </tr>
            @endif

            <tr>
                <td>Departure date</td>
                <td>{{ $reservationData['departure-date'] }}</td>
            </tr>
            <tr>
                <td>Departure time</td>
                <td>{{ $reservationData['pickup-time'] }}</td>
            </tr>
            <tr>
                <td>Departure address</td>
                <td>{{ $reservationData['pick_up_address'] }}</td>
            </tr>
            <tr>
                <td>Destination address</td>
                <td>{{ $reservationData['destination_address'] }}</td>
            </tr>

            @if ($reservationData['flight_number'])
            <tr>
                <td>Flight number</td>
                <td>{{ $reservationData['flight_number'] }}</td>
            </tr>
            @endif
            
            <tr>
                <td>Vehicle</td>
                <td>{{ $reservationData['vehicle'] }}</td>
            </tr>
            <tr>
                <td>Price for transfer</td>
                <td>{{ $reservationData['total_price'] }} €</td>
            </tr>
            <tr>
                <td>Additional charges</td>
                <td>0.00 €</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>{{ $reservationData['total_price'] }} €</strong></td>
            </tr>
        </table>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>Departure</th>
                <th>Destination</th>
            </tr>
            <tr>
                <td>{{ $reservationData['departure'] }}</td>
                <td>{{ $reservationData['destination'] }}</td>
            </tr>
        </table>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>Route distance</th>
                <th>Duration</th>
            </tr>
            <tr>
                <td>{{ $reservationData['distance'] }} km</td>
                <td>{{ $reservationData['duration'] }}</td>
            </tr>
        </table>
    </section>
    <br>
    <br>
    <footer>
        <img src="https://www.freeiconspng.com/uploads/globe-png-22.png" alt="Logo" width="80">
        <p><strong>Globus d.o.o <br> Ulica dr. Franje Tuđmana 83, Vrsi</strong></p>
    </footer>
</body>
</html>
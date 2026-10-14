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
        <img src="{{ public_path('images/globus-transfers-logo.jpg') }}" alt="Logo" width="250">
        <h1>GLOBUS Transfers</h1>
    </header>
    <br>
    <br>
    <section>
        <h2>@lang('content.email_hdg')</h2>
        <p>@lang('content.email_para') {{ ucfirst($routeAndReservationData['first_name']) }},</p>
        <p>@lang('content.email_para2')</p>
        <p>@lang('content.email_para3')</p>
        <p>@lang('content.email_para4') <a href="mailto:luka.predovan01@gmail.com">@lang('content.email_para5')</a>.</p>
        <p>@lang('content.email_para6')</p>
        <p style="margin: 30px 0;"><strong>@lang('content.email_para7')</strong></p>
    </section>
    <section>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>@lang('content.email_label1')</th>
                <th>{{ $bookingNumber }}</th>
            </tr>
            <tr>
                <td>@lang('content.email_label2')</td>
                <td>{{ ucfirst($routeAndReservationData['first_name']) . ' ' . ucfirst($routeAndReservationData['last_name'])}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $routeAndReservationData['email'] }}</td>
            </tr>
            <tr>
                <td>@lang('content.email_label3')</td>
                <td>{{ $routeAndReservationData['phone'] }}</td>
            </tr>
            <tr>
                <td>@lang('content.email_label4')</td>
                <td>{{ $routeAndReservationData['order_message'] }}</td>
            </tr>
        </table>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th colspan="2">@lang('content.email_label5')</th>
            </tr>
            <tr>
                <td>@lang('content.email_label6')</td>
                <td>{{ $routeAndReservationData['passengers'] }}</td>
            </tr>

            @if ($routeAndReservationData['infant_seat'] || $routeAndReservationData['child_seat'] || $routeAndReservationData['booster_seat'])
            <tr>
                <td>@lang('content.email_label7')</td>
                <td>{{ $routeAndReservationData['infant_seat'] }}</td>
            </tr>
            <tr>
                <td>@lang('content.email_label8')</td>
                <td>{{ $routeAndReservationData['child_seat'] }}</td>
            </tr>
            <tr>
                <td>@lang('content.email_label9')</td>
                <td>{{ $routeAndReservationData['booster_seat'] }}</td>
            </tr>
            @endif

            @if ($routeAndReservationData['luggage'])
            <tr>
                <td>@lang('content.email_label10')</td>
                <td>{{ $routeAndReservationData['luggage'] }}</td>
            </tr>
            @endif

            <tr>
                <td>@lang('content.email_label11')</td>
                <td>{{ $routeAndReservationData['departure-date'] }}</td>
            </tr>
            <tr>
                <td>@lang('content.email_label12')</td>
                <td>{{ $routeAndReservationData['pickup-time'] }}</td>
            </tr>
            <tr>
                <td>@lang('content.email_label13')</td>
                <td>{{ $routeAndReservationData['pick_up_address'] }}</td>
            </tr>
            <tr>
                <td>@lang('content.email_label1')</td>
                <td>{{ $routeAndReservationData['destination_address'] }}</td>
            </tr>
            @if ($routeAndReservationData['flight_number'])
            <tr>
                <td>@lang('content.email_label14')</td>
                <td>{{ $routeAndReservationData['flight_number'] }}</td>
            </tr>
            @endif
            <tr>
                <td>@lang('content.email_label15')</td>
                <td>{{ $routeAndReservationData['vehicle'] }}</td>
            </tr>
            <tr>
                <td>@lang('content.email_label16')</td>
                <td>{{ $routeAndReservationData['total_price'] }} €</td>
            </tr>
            <tr>
                <td>@lang('content.email_label17')</td>
                <td>{{ $routeAndReservationData['payment_option'] }}</td>
            </tr>
            <tr>
                <td>@lang('content.email_label18')</td>
                <td>0.00 €</td>
            </tr>
            <tr>
                <td><strong>@lang('content.email_label19')</strong></td>
                <td><strong>{{ $routeAndReservationData['total_price'] }} €</strong></td>
            </tr>
        </table>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>@lang('content.email_label20')</th>
                <th>@lang('content.email_label21')</th>
            </tr>
            <tr>
                <td>{{ $routeAndReservationData['departure'] }}</td>
                <td>{{ $routeAndReservationData['destination'] }}</td>
            </tr>
        </table>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>@lang('content.email_label22')</th>
                <th>@lang('content.email_label23')</th>
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
        <img src="{{ public_path('images/globus-transfers-logo.jpg') }}" alt="Logo" width="250">
        <p><strong>Globus<br> Ulica dr. Franje Tuđmana 85, Vrsi</strong></p>
    </footer>
</body>
</html>
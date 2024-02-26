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
            color: rgb(73, 73, 73);
            padding: 16px;
        }
        header {
            align-items: flex-start;
            background-color: rgb(24, 110, 110);
            color: whitesmoke;
            display: flex;
            justify-content: space-between;
            padding: 8px 16px;
        }
        .success {
            padding: 60px 20px 20px;
            text-align: center;
        }

        .invoice {
            margin: 30px 0;
        }

        table {
            margin: 30px 0;
            width: 100%;
        }

        table th {
            text-align: left;
            width: 50%;
            background-color: lightgrey;
            padding: 6px;
        }

        table td {
            text-align: left;
            width: 50%;
            padding: 6px;
        }

        .footer {
            text-align: center;
            margin: 50px 0 0 0;
        }

    </style>
</head>
<body>
    <header>
        <h1>GLOBUS Transfers</h1>
        <img src="https://www.freeiconspng.com/uploads/globe-png-22.png" alt="Logo" width="80">
    </header>
    <section class="success">
            <img src="https://icon-library.com/images/complete-icon/complete-icon-15.jpg" alt="checked-icon" width="120">
    </section>
    
    <section>
        <h2>Thank You for Choosing Our Taxi Transfer Service!</h2>
        <p>Dear {{ ucfirst($reservationData['first_name']) }},</p>
        <p>Your taxi reservation has been created. Our team will review it within the next 6 to 12 hours, and we'll notify you once the reservation is confirmed.</p>
        <p>We're looking forward to providing you with a safe and comfortable journey.</p>
        <!-- Call to Action -->
        <p>If you have any questions or need assistance, please feel free to <a href="mailto:luka.predovan01@gmail.com">contact our customer support</a>.</p>

        <p>Check the details of your booking below, and we will contact you as soon as possible!</p>
        <p class="invoice"><strong>You can view and download the invoice for your booking by finding the PDF attachment down below.</strong></p>
    </section>
    <section>
        <table>
            <tr>
                <th>Booking #</th>
                <th>122</th>
            </tr>
            <tr>
                <td>Full name</td>
                <td>Toni Ikić</td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>toni.technoprom@gmail.com</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>0981757981</td>
            </tr>
            <tr>
                <td>Message</td>
                <td>Hello world!</td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="2">Reservation details</th>
            </tr>
            <tr>
                <td>Price for transfer</td>
                <td>170.00 €</td>
            </tr>
            <tr>
                <td>Additional charges</td>
                <td>0.00 €</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>170.00 €</strong></td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Departure</th>
                <th>Destination</th>
            </tr>
            <tr>
                <td>Zadar, Croatia (13/01/2024)</td>
                <td>Split, Croatia</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Route distance</th>
                <th>Duration</th>
            </tr>
            <tr>
                <td>158 km</td>
                <td>01:38 h</td>
            </tr>
        </table>

    </section>
    <section class="footer">
        <img src="https://www.freeiconspng.com/uploads/globe-png-22.png" alt="Logo" width="80">
        <p><strong>Globus d.o.o <br> Ulica dr. Franje Tuđmana 83, Vrsi</strong></p>
    </section>
    
</body>
</html>
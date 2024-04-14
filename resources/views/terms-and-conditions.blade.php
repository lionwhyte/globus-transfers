@extends('layout')

@section('meta')
<meta name="description" content=" Terms of Business - 
    Globus transfers company (Globus Transfers) made the following terms and conditions defining the rights and the obligations between the company Globus transfers company and users of transportation services provided by the company Globus transfers company. ">
<title>Terms and conditions| Globus Transfers Croatia</title>
@endsection

@php
    $breadcrumbs = [
    ['title' => 'HOME', 'url' => '/'],
    ['title' => 'Terms and conditions', 'url' => '']
];
@endphp

@section('content')
<section class="bg-gradient-to-br from-cyan-600 to-cyan-800 text-white">
    <div class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">Terms and conditions</h1>
        @include('partials.breadcrumbs')
    </div>
</section>

<div class="entry-content mx-auto container px-6 md:px-4 lg:px-20 py-10 mt-10 border rounded space-y-4">
    <p><strong>Terms of Business</strong></p>
    <p>Globus transfers company (Globus Transfers) made the following terms and conditions defining the rights and the obligations between the company Globus transfers company and users of transportation services provided by the company Globus transfers company. Globus Transfers is the trading name of the company Globus transfers company.</p>
    <p>Globus transfers company is licensed for transportation of passengers and in this text is a provider of services (“we”, “us” and “our” in this text refers to Globus transfers company).</p>
    <p>The “client” or “customer” is a person who uses our website, reservation system (booking form) and our transportation service.</p>
    <p>By filling out the Booking Form you acknowledge that you have the capacity to enter into legally binding contracts on behalf of yourself and/or any other Passengers. The Booking form shall be considered an integral and essential component of these Terms and Conditions.</p>
    <p>If for any reason you refuse to be bound by these Terms and Conditions and to adhere to them, you cannot order any Service from us. The Company will not knowingly perform any Service for a Customer that has not agreed to these Terms and Conditions.</p>
    <p>In case you consider any provision or statement listed in these Terms and the Booking Form unclear or if you are uncertain whether it applies to you, we strongly encourage you to contact our Customer Service Department for clarification. Failure to do so shall absolve us of any responsibility to you, whether listed or implied in these Terms and Conditions or otherwise.</p>
    <p>Any changes to these Terms and Conditions will be published in the form of an announcement on our websites.</p>
    <p>&nbsp;</p>
    <p><strong>Company Information</strong></p>
    <address>
        <p>Globus</p>
        <p>Ulica dr. Franje Tuđmana 85</p>
        <p>23235 Vrsi</p>
        <p>Croatia</p>
        <p>OIB: 98595920</p>
        <p>Phone: +385955261413</p>
        <p>Email: luka.predovan01@gmail.com</p>
        <p>Website: www.globustransferscroatia.com</p>
    </address>
    <p>&nbsp;</p>
    <p><strong>Transfers</strong></p>
    <p>The term transfer implies transportation of passengers from a pickup location to the drop off location, and is driven in accordance with the reservation which has been made by the customer.</p>
    <p>Prices of transfers are based upon the distance between the initial and the destination, number of passengers, type of vehicle and market conditions. Depending on the number of passengers, prices are formed into 4 groups (1-3 passengers, 4-8 passengers and 9-14 passengers &amp; 15-20 passengers).</p>
    <p>Prices for individual routes are available on our website. If the website does not have the price of the requested route, then the customer is to email a request to info@octopustransfers.com and we will provide a quotation for that route.</p>
    <p>Passengers will be met at the agreed pickup location by a driver. The driver will drive the passenger to the agreed drop-off address or to the nearest possible location accessible by vehicle.</p>
    <p>The Customer is required to sign a transfer agreement which is a legal obligation in Croatia and transfer prices are per vehicle and not per person.</p>
    <p>&nbsp;</p>
    <p><strong>Luggage</strong></p>
    <p>Personal luggage is included in the price. Standard Luggage is considered one large suitcase and one hand luggage per person. If the quantity of luggage is larger than standard luggage, it is necessary to inform us prior to the transfer so we can send a vehicle of suitable size for that transfer.</p>
    <p>We are not responsible for missing items or any damage to fragile items contained in the luggage of clients.</p>
    <p>We are not obligated to transport any extra luggage that was not declared in a reservation if there is not enough room in the vehicle.</p>
    <p>We are not responsible for the content of luggage. We nor any of our contracted or sub-contracted drivers will accept responsibility for luggage loss or damage.</p>
    <p>We and/or our contracted or sub-contracted drivers have the right to refuse any client or to make the journey due to the client having excess luggage which would result in the vehicle being unsafe whilst in motion.</p>
    <p>&nbsp;</p>
    <p><strong>Online Booking Procedure</strong></p>
    <p>A person who wants to make a reservation must be over 18 and have a valid credit / debit card or paypal account.</p>
    <p>The customer is to select the route of their choice and then proceed in filling out the Globus Travel booking form on the Globus Travel website.</p>
    <p>A customer who enters the data is responsible for its validity. We do not bear any responsibility for wrongly entered or untrue information. A person who enters the data for the group accepts the terms in the name of the whole group, and is responsible for the whole group.</p>
    <p>We do not have to accept a reservation. If the reservation is accepted, the customer will receive an e-mail confirmation. If a reservation is not accepted and the payment is completed, the amount paid is returned in full and in the shortest possible time.&nbsp;</p>
    <p>It is the customer’s responsibility to review the transfer reservation and immediately report any errors or faults to <a href="mailto:info@octopustransfers.com">info@octopustransfers.com</a>.</p>
    <p>All personal information that customers enter during the reservation process is secure and accessible only to authorized employees of Globus transfers company.</p>
    <p>Globus transfers company is committed to safeguarding its customers’ privacy and security of personal information. We do not sell, share or otherwise distribute our client’s personal information.</p>
    <p>&nbsp;</p>
    <p><strong>Methods of Payment</strong></p>
    <p>Globus Transfers requires full payment for its services through its website. A 10% deposit is required upon making the booking, and the remaining balance must be paid using one of the following methods:</p>
    <ul>
    <li><strong>Direct Bank Transfer:</strong> Transfer the full payment directly to our bank account. Account details will be provided upon booking confirmation.</li>
    <li><strong>PayPal:</strong> Securely pay the full amount using your PayPal account or credit card through the PayPal gateway.</li>
    </ul>
    <p>Please note that the full payment is necessary to confirm and secure your transfer reservation.</p>
    <p>&nbsp;</p>

    <p><strong>Cancellation Policy</strong></p>
    <p>We offer a full refund for all cancellations up to 12 hours prior to the scheduled transfer. For cancellations within 12 hours of the scheduled transfer, there is no refund of the deposit taken during the booking process.</p>
    <p>&nbsp;</p>
    <p><strong>Force Majeure</strong></p>
    <p>The Company shall be considered released from its obligations as per these Terms and Conditions if the Company or any of its representatives and contracted partners are unable to fulfill their obligations as a consequence of&nbsp;<em>force majeure</em>&nbsp;arising after the ordering of the Service.</p>
    <p><em>Force majeure</em>&nbsp;refers to emergency events that could neither be predicted by the Company nor prevented by reasonable measures.</p>
    <p>Events arising from force majeure are those for which the Company is not responsible and/or cannot influence them, but they considerably affect the provision of the Service. Such events are, for example, an earthquake, a flood, a fire, strikes, government regulations or orders of state bodies, military actions of any character etc.&nbsp;</p>
    <p>&nbsp;</p>
    <p><strong>Safety Issues</strong></p>
    <p>All vehicles that are used for transfers are properly inspected and insured.</p>
    <p>Passengers insurance is included in the price of the transfer.</p>
    <p>A passenger under the influence of alcohol, drugs or other controlled substances won’t be allowed to enter a vehicle and will not be entitled to a refund of the amount paid.</p>
    <p>A passenger whose behavior endangers the safety of driver, other passengers or other participants in traffic will be removed from the vehicle, and reported to local police department.</p>
    <p>Smoking, consuming food and beverages, alcohol or drugs in the vehicle is strictly prohibited. Exceptions to this policy are water and soft drinks in bottles. Everything else must be approved by the driver.</p>
    <p>&nbsp;</p>
    <p><strong>Collection and Protection of Personal Data</strong></p>
    <p>Your privacy is our priority. We are committed to protecting your personal information. Your name and address information is used solely to process bookings. This information will never be sold, given, rented or traded to others for purposes other than order fulfillment. Data is available only to authorized company representatives. All our employees and business partners are responsible for respecting the principle of protection of privacy under the GPDR. Refer to our privacy policy for more information.</p>
</div>

@endsection
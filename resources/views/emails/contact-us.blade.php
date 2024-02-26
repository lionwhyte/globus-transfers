<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poruka posjetitelja</title>
</head>
<body>
    <h3>Ime: {{ $request['contact_full_name'] }}</h3>
    <h3>Email: {{ $request['contact_email'] }}</h3>
    <h3>Telefon: {{ $request['contact_phone'] }}</h3>
    <p>{{ $request['contact_message'] }}</p>
</body>
</html>
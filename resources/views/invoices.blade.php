<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Invoices</title>
</head>
<body>
    <table class="table" >
        <tr>
            <th>Date</th>
            <th>Last Name</th>
            <th colspan="2">First Name</th>
        </tr>
        @foreach($invoices as $invoice)
        <tr>
            <td>{{$invoice->InvoiceDate}}</td>
            <td></td>
            <td></td>
            <td>
                <a href="/invoices/{{$invoice->InvoiceId}}">Details</a>
            </td>
        </tr>
    </table>
    
</body>
</html>
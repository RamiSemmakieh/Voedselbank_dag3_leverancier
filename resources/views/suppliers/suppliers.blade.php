<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Leveranciers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Overzicht Leveranciers</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Contactpersoon</th>
                    <th>Email</th>
                    <th>Mobiel</th>
                    <th>Leveranciernummer</th>
                    <th>LeverancierType</th>
                    <th>Product Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->contact_person }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->mobile }}</td>
                    <td>{{ $supplier->supplier_number }}</td>
                    <td>{{ $supplier->supplier_type }}</td>
                    <td><a href="#" class="btn btn-info">Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/" class="btn btn-primary">Home</a>
    </div>
</body>

</html>
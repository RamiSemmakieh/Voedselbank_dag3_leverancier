<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Producten</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Overzicht Producten</h1>
        <div class="mb-3">
            <strong>Naam:</strong> {{ $leverancier->naam }}<br>
            <strong>Leveranciernummer:</strong> {{ $leverancier->leverancier_nummer }}<br>
            <strong>Leverancierstype:</strong> {{ $leverancier->leverancier_type }}<br>
        </div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Soort Allergie</th>
                    <th>Barcode</th>
                    <th>Houdbaarheidsdatum</th>
                    <th>Wijzig Product</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leverancier->products as $product)
                <tr>
                    <td>{{ $product->naam }}</td>
                    <td>{{ $product->soort_allergie }}</td>
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->pivot->datum_eerst_volgende_levering }}</td>
                    <td>
                        <a href="{{ route('suppliers.editProduct', [$leverancier->id, $product->id]) }}" class="btn btn-warning">
                            &#9998;
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('suppliers.index') }}" class="btn btn-primary">Terug</a>
        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    </div>
</body>

</html>
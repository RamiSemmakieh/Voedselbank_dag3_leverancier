<!-- resources/views/suppliers/showProducts.blade.php -->
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
        <h1 class="text-center">Overzicht Producten voor Leverancier: {{ $leverancier->name }}</h1>
        @if($products->isEmpty())
        <div class="alert alert-warning mt-3">Er zijn geen producten beschikbaar voor deze leverancier</div>
        @else
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Houdbaarheidsdatum</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->naam }}</td>
                    <td>{{ $product->houdbaarheidsdatum }}</td>
                    <td>
                        <a href="{{ route('suppliers.editProduct', [$leverancier->id, $product->id]) }}" class="btn btn-warning">Wijzig</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    </div>
</body>

</html>
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
        <form method="GET" action="{{ route('suppliers.index') }}">
            <div class="form-group">
                <label for="leverancier_type">Selecteer Leverancierstype:</label>
                <select name="leverancier_type" id="leverancier_type" class="form-control">
                    <option value="">Selecteer Leverancierstype</option>
                    @foreach($supplierTypes as $type)
                    <option value="{{ $type }}" {{ $leverancierType == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Toon Leveranciers</button>
        </form>
        @if($leveranciers->isEmpty())
        <div class="alert alert-warning mt-3">Er zijn geen leveranciers bekent van het geselecteerde leverancierstype</div>
        @else
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
                @foreach($leveranciers as $leverancier)
                <tr>
                    <td>{{ $leverancier->naam }}</td>
                    <td>{{ $leverancier->contactpersoon }}</td>
                    <td>{{ $leverancier->contacts->first()->email ?? 'N/A' }}</td>
                    <td>{{ $leverancier->contacts->first()->mobiel ?? 'N/A' }}</td>
                    <td>{{ $leverancier->leverancier_nummer }}</td>
                    <td>{{ $leverancier->leverancier_type }}</td>
                    <td>
                        <a href="{{ route('suppliers.showProducts', ['id' => $leverancier->id]) }}" class="btn btn-secondary">Bekijk Producten</a>
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
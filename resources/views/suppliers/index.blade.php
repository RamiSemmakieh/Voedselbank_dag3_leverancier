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
        <form method="GET" action="{{ route('suppliers.index') }}" class="form-inline mb-3">
            <div class="form-group">
                <label for="leverancier_type" class="mr-2">Selecteer LeverancierType</label>
                <select name="leverancier_type" id="leverancier_type" class="form-control mr-2">
                    <option value="">Selecteer LeverancierType</option>
                    @foreach($supplierTypes as $type)
                    <option value="{{ $type }}" {{ request('leverancier_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Toon Leveranciers</button>
        </form>
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
                    <td>
                        @foreach($leverancier->contacts as $contact)
                        {{ $contact->email }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($leverancier->contacts as $contact)
                        {{ $contact->mobiel }}<br>
                        @endforeach
                    </td>
                    <td>{{ $leverancier->leverancier_nummer }}</td>
                    <td>{{ $leverancier->leverancier_type }}</td>
                    <td><a href="#" class="btn btn-info">Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/" class="btn btn-primary">Home</a>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Voedselbank Maaskantje</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Homepage voedselbank maaskantje</h1>
        <div class="text-center">
            <a href="{{ route('suppliers.index') }}" class="btn btn-primary">Overzicht Leveranciers</a>
            <!-- Example link to show products -->
            <a href="{{ route('suppliers.showProducts', ['id' => 1]) }}" class="btn btn-secondary">Overzicht Producten</a>
        </div>
    </div>
</body>

</html>
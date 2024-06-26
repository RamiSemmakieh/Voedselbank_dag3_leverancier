<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzig Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Wijzig Product : {{ $product->naam }}</h1>
        <form method="POST" action="{{ route('suppliers.updateProduct', [$leverancierId, $product->id]) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="houdbaarheidsdatum">Houdbaarheidsdatum</label>
                <input type="date" name="houdbaarheidsdatum" id="houdbaarheidsdatum" class="form-control" value="{{ $product->houdbaarheidsdatum }}">
                @if($errors->has('houdbaarheidsdatum'))
                <div class="alert alert-danger mt-2">{{ $errors->first('houdbaarheidsdatum') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-success">Wijzig Houdbaarheidsdatum</button>
        </form>
        <a href="{{ route('suppliers.showProducts', $leverancierId) }}" class="btn btn-primary mt-3">Terug naar Producten</a>
    </div>
</body>

</html>
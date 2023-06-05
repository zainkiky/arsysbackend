<!DOCTYPE html>
<html>
<head>
    <title>Select Option</title>
</head>
<body>
    <h1>Kieu lam?</h1>

    <form>
        <select>
            @foreach($dicoba as $dicobaa)
                <option value="{{ $dicobaa->id }}">
                    {{ $dicobaa->description }}</option>
            @endforeach
       

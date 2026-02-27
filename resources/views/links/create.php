<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Add Link to Category: {{ $category->name }}</h2>

<form method="POST" action="{{ route('categories.links.store', $category->id) }}">
    @csrf

    <input type="text" name="title" placeholder="Link Title">
    <br><br>

    <input type="text" name="url" placeholder="https://example.com">
    <br><br>

    <button type="submit">Save Link</button>
</form>

    
</body>
</html>
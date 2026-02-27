<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Edit Link for Category: {{ $category->name }}</h2>

<form method="POST" action="{{ route('categories.links.update', [$category->id, $link->id]) }}">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $link->title }}" required>
    <br><br>
    <input type="text" name="url" value="{{ $link->url }}" required>
    <br><br>
    <button type="submit">Update Link</button>
</form>

</body>
</html>
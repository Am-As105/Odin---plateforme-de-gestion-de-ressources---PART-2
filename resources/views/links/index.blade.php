<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>





    <h2>Links for Category: {{ $category->name }}</h2>
<a href="{{ route('categories.links.create', $category->id) }}">Add Link</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<ul>
@foreach($links as $link)
    <li>
        {{ $link->title }} - <a href="{{ $link->url }}" target="_blank">Visit</a>
        <a href="{{ route('categories.links.edit', [$category->id, $link->id]) }}">Edit</a>
        <form method="POST" action="{{ route('categories.links.destroy', [$category->id, $link->id]) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>

    
</body>
</html>
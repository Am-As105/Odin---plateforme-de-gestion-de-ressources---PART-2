<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('categories.update', $category->id)}}"  method="POST">

    @csrf 
    @METHOD ('PUT')

    <input type="text" name="name" value="{{$category->name}}">
    <button  > EDIT </button> 
    

    </form>
    
</body>
</html>
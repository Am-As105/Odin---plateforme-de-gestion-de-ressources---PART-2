<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Categories</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f8;
            padding:30px;
        }
        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        }
        .add{
            background:#4f46e5;
            color:#fff;
            padding:10px 14px;
            border-radius:10px;
            text-decoration:none;
        }
        .grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:16px;
        }
        .card{
            background:#fff;
            border-radius:16px;
            padding:16px;
            box-shadow:0 8px 20px rgba(0,0,0,.06);
        }
        .title{
            font-size:18px;
            font-weight:700;
            margin:0 0 10px;
        }
        .actions{
            display:flex;
            gap:10px;
        }
        .edit{
            background:#2563eb;
            color:#fff;
            padding:8px 12px;
            border-radius:10px;
            text-decoration:none;
            font-size:14px;
        }
        .del{
            background:#dc2626;
            color:#fff;
            border:none;
            padding:8px 12px;
            border-radius:10px;
            cursor:pointer;
            font-size:14px;
        }
        .link {
          background:blue;
          color : white ;
        }
    </style>
</head>
<body>

<div class="top"> 
    <h2>Categories</h2>
    <a class="add" href="{{ route('categories.create') }}">➕ Add Category</a>
</div>

<div class="grid"> 
   
   
    @foreach($categories as $category)
        <div class="card">
            <p class="title">{{ $category->name }}</p>
              
             <p class=""> <a href="">http://localhost:8000/</a></p>

            <div class="actions">
                <a class="edit" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                 
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE') 
                    <button   onclick="return confirm('are you sure')" class="del" type="submit">Delete</button>
                </form>

                 

                 <a href="{{route('categories.links.create', $category->id)}}"  > add links  </a>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>

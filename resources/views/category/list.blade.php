<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>




      <table>

      <tr> Name</tr>
      <Tr> action</Tr>

      @foreach  ($categories  as $category)
        <tr>
            <td>
                {{$category->name}}
                
            </td>
        </tr>

        @endforeach

      </table>



    
</body>
</html>
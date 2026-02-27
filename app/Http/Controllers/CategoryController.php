<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

      public function  create()
      { 
            return view('category.create');
      }

      public function  index()
      { 
             $categories =  Category::all();
            //  dd(var_dump($categories));

            return view('category.index', compact('categories'));
      } 

      public  function store( Request $request)
      { 
            $stock =$request->validate([
                'name' => 'required|min:2',
            ]);
            
            
            $stock['user_id'] = auth()->id();
            // dd($stock);
            // $request->validate([
            //     'name' => 'required|min:2',
                
            // ]);
            // dd($stock);
            Category::create($stock);
            // redirect('/category');
                return redirect()->route('categories.index');

            
            

      } 
      public function edit(Category $category)
     {
              return view('category.edit', compact('category'));
       }


      public  function destroy(Category $category )
      {
            $category->delete();


            return redirect()->route('categories.index'); 

      }
      public function update(Request $request, Category $category)
           {
                  $request->validate([
                'name' => 'required|min:2',
           ]);

            $category->update([
        'name' => $request->name,
    ]);


    return redirect()->route('categories.index');
}

      
}

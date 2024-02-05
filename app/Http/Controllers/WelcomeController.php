<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\tags;

class WelcomeController extends Controller
{
    public function index(){
        $data = Recipe::all();

        return view('recipe',compact('data'));
    }
    public function showAddForm()
{
    $tags = $this->showtags(); 
    return view('add', ['tags' => $tags]);
}
public function showtags()
{
    $tags = tags::all(); 
    return $tags; 
}
    public function add_recipe(Request $request){
        $data = new Recipe;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->recipe_main = $request->recipe_main;
        $image = $request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('img',$imagename);
        $data->image=$imagename;
        $data->save();
        if ($request->has('tags')) {
            $tagIds = $request->input('tags');
            $data->tags()->attach($tagIds);
        }
        return redirect('/recipe');
    }
// WelcomeController.php

public function store(Request $request)
{
    $recipeId = $request->input('recipe_id');
    $data = Recipe::findOrFail($recipeId);
    
    if ($request->has('tags')) {
        $tagIds = $request->input('tags');
        $data->tags()->attach($tagIds);
    }

    return redirect()->back()->with('success', 'Tags added successfully!');
}

    public function show_recipe(){
        $data = Recipe::all();
        $tags = tags::all();
        dd($tags);
        return view('add', ['tags' => $tags]);
        return view('recipe',compact('data'));
    }
    public function delete_recipe($id){
    $recipe = Recipe::find($id);
    $recipe->delete();
    return redirect()->back();
    }
    public function update_recipe($id){
        $data = Recipe::find($id);

        return view('recipe_update',compact('data'));
    }

    public function edit_recipe(Request $request, $id){
        $data = Recipe::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('img',$imagename);
            $data->image=$imagename;
        }

        $data->save();

        return redirect()->back();
    }
    public function search(Request $request)
    {
        $searchParam = $request->query('search');
        
       
        $data = Recipe::where('title', 'like', "%$searchParam%")->get();

        return view('recipe', compact('data', 'searchParam'));
    }
    public function detail_recipe($id){
        $recipe = Recipe::find($id);
        if(!$recipe){
            return response()->view('errors.404', [], 404);
        }
        return view('detail', compact('recipe'));
    }
}
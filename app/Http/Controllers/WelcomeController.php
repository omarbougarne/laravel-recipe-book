<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class WelcomeController extends Controller
{
    public function index(){
        $data = Recipe::all();

        return view('recipe',compact('data'));
    }
    public function showAddForm()
    {
        return view('add');
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
        return redirect('/recipe');
    }
    public function show_recipe(){
        $data = Recipe::all();

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
        dd($data);

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
























    
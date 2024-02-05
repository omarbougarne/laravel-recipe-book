<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto">
        <div class="flex justify-center mt-10">
            <a href="{{url('recipe')}}" class="btn btn-success">Show</a>
        </div>
        @if($errors)
        @foreach($errors->all() as $error)
        <li style="color: red;">{{$errors}}</li>
        @endforeach
        @endif
        <h1 class="text-center text-3xl font-bold mt-5">Add Recipe</h1>
        <form action="{{url('/add_recipe')}}" method="post" enctype="multipart/form-data" class="mt-5">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Recipe Title</label>
                <input type="text" name="title" id="title" class="form-input mt-1 block w-full" placeholder="Enter recipe title">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Recipe Description</label>
                <textarea name="description" id="description" class="form-textarea mt-1 block w-full" rows="3" placeholder="Enter recipe description"></textarea>
            </div>
            <div class="mb-4">
                <label for="recipe_main" class="block text-gray-700">Recipe Main</label>
                <textarea name="recipe_main" id="recipe_main" class="form-textarea mt-1 block w-full" rows="5" placeholder="Enter recipe main"></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Recipe Image</label>
                <input type="file" name="image" id="image" class="form-input mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="tags" class="block text-gray-700">Tags</label>
                <select name="tags[]" id="tags" multiple class="form-multiselect block w-full">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-center">
            <input type="submit" value="Add Product" class="bg-orange-500 text-white hover:bg-orange-600 px-4 py-2 rounded-md">
            </div>
            
        </form>
    </div>
</body>
</html>

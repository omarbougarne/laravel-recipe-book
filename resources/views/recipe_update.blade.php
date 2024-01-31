<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
    .div_deg
    {
    padding: 30px;
    }
    </style>
    <title>Document</title> 
</head>
<body>
    <center>
        <br>
        <a class="btn btn-success" href="{{url('recipe')}}">Show</a>
        <br>
    <h1>Update Product</h1>
    <form action="{{url('/edit_recipe',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="div_deg">
            <label for="">Recipe Title</label>
            <input type="text" name="title" value="{{$data->title}}">
        </div>
        <div class="div_deg">
            <label for="">Recipe Description</label>
            <textarea type="text" name="description">
            {{$data->description}}
            </textarea>
        </div>
        <div class="div_deg">
            <label for="">Recipe Main</label>
            <textarea type="text" name="recipe_main">
            {{$data->recipe_main}}
            </textarea>
        </div>
        <div class="div_deg">
            <label for="">Recipe Image</label>
            <img height="200" width="200" src="/img/{{$data->image}}" alt="" >
        </div>
        <div class="div_deg">
            <label for=""> Image</label>
            <input type="file" name="image">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="Update Product">
        </div>
    </form>
    </center>
    
</body>
</html>
    
    
    
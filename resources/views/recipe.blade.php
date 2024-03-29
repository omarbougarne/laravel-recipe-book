<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="crossorigin="anonymous"referrerpolicy="no-referrer"/>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>Recipe Book</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="index.html"><img class="w-24" src="images/logo.png" alt="" class="logo"/></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="register.html" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="login.html" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
                </li>
            </ul>
        </nav>

        <section class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4">
            <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"style="background-image: url('images/laravel-logo.png')"></div>

            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white">
                    Recipe<span class="text-black">Book</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                    Find all recipes
                </p>
            </div>
        </section>
        <main>
            <div class="container">
                <form action="{{ route('recipes.search') }}">
                    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                        <div class="absolute top-4 left-3">
                            <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                        </div>
                        <input type="text"name="search"class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"/>
                        <div class="absolute top-2 right-2">
                            <button type="submit"class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
                @if($data->isEmpty())
                <p>No recipes found.</p>
                 @else
                 @foreach($data as $search)
                    <div class="flex">
                        <img class="hidden w-48 mr-6 md:block" src="img/{{$search->image }}" alt="idk">
                        <div>
                            {{-- <div class="card mt-3" onclick="window.location='{{ url('detail', ['id' => $data->id]) }}';"style="cursor: pointer;"> --}}
                            <h3 class="text-2xl">
                                <a >{{ $search->title }}</a>
                            </h3>
                        {{-- </div> --}}
                            <div class="text-xl font-bold mb-4">{{ $search->description }}</div>
                        </div>
                    </div>
                    <br>
                    @endforeach
            @endif
            <!-- Main -->
            <center>
           <a href="{{ url('/add') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Add Product</a>
            </center>
            @foreach($data as $recipe)
                    <div class="flex">
                        <img class="hidden w-48 mr-6 md:block" src="img/{{$recipe->image}}" alt="idk">
                        <div>
                            <div class="card mt-3" onclick="window.location='{{ url('detail', ['id' => $recipe->id]) }}';"style="cursor: pointer;">
                                <h3 class="text-2xl">
                                    <a >{{ $recipe->title }}</a>
                                </h3>
                            </div>
                            <div class="text-xl font-bold mb-4">{{$recipe->description}}</div>
                                <div class="px-6 py-4">
                                    @foreach ($recipe->tags as $tag)
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </tr>
                        </div>
                    </div>
                    <div class="flex justify-center mt-4">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2" href="{{ route('update_recipe',['id'=>$recipe->id])}}">Update</a>
                    <a  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('delete_recipe',['id'=>$recipe->id]) }}">Delete</a>
                    </div>
                    <br>
                @endforeach
        </main>
        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>
        </footer>
    </body>
</html>
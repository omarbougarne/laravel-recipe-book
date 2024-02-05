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
        <title>Recipe Detail</title>
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
            </div>
        </section>
        <main>
            <!-- Main -->
                    <div class="flex">
                        <img class="hidden w-48 mr-6 md:block" src="/img/{{$recipe->image}}" alt="idk">
                        <div>
                            <h3 class="text-2xl">
                                <a href="show.html">{{$recipe->title}}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{$recipe->recipe_main}}</div>
                        </div>
                    </div>
                    <br>
        </main>
        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>
        </footer>
    </body>
</html>
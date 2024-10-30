<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workopia</title>
    <link href="./css/output.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <header class="bg-blue-900 text-white p-4">

        <div class="container mx-auto flex ">
            <!-- Navbar -->
            <nav class="container mx-auto flex justify-between items-center px-4">
                <div class="container mx-auto flex justify-between items-center px-4">
                    <h1 class="text-3xl font-semibold">Workopia</h1>
                    <div>
                        <a href="#" class="hover:underline py-2 text-yellow-500 font-bold">Home</a>
                        <a href="#" class="px-4 hover:text-gray-300">All Jobs</a>
                        <a href="#" class="px-4 hover:text-gray-300">Login</a>
                        <a href="#" class="px-4 hover:text-gray-300">Register</a>
                    </div>
                </div>
            </nav>
        </div>

    </header>



    <!-- Hero Section -->
    <section class="hero relative bg-cover bg-center h-80 flex items-center ">
        <div class="overlay"></div>
        <div class="container mx-auto text-center px-4 relative z-10">
            <h2 class="text-4xl md:text-5xl text-white font-bold mb-8">Find Your Dream Job</h2>

            <form action="get" method="get">
                <input type="text" placeholder="Job Title" class="w-full md:w-72 mx-1 px-4 py-2 text-gray-900 rounded-md focus:outline-none" />
                <input type="text" placeholder="Location" class="w-full md:w-72 mx-1 px-4 py-2 text-gray-900 rounded-md focus:outline-none" />
                <button class="bg-blue-600 hover:bg-blue-700 mx-1 px-6 py-2 rounded-md text-white">Search</button>
            </form>

        </div>
    </section>

    <!-- Unlock Potential Section -->
    <section class="bg-blue-900 text-white py-12">
        <div class="container mx-auto text-center px-4">
            <h3 class="text-2xl font-semibold mb-4">Unlock Your Career Potential</h3>
            <p class="text-lg">Discover the perfect job opportunity for you.</p>
        </div>
    </section>

</body>

</html>
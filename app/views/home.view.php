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

    <div class="max-w-6xl mx-auto py-10">
        <h1 class="text-3xl font-bold text-center mb-10">Welcome To Workopia</h1>
        <div class="grid grid-cols-3 gap-6">

            <!-- Job Card 1 -->

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="job image" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h2 class="text-xl font-bold">Software Engineer (C#)</h2>
                        <p class="text-sm text-gray-500">Full-Time</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    We are looking for a software engineer who is strategic Marketing Specialist to develop and execute...
                </p>
                <div class="mb-4">
                    <p class="text-gray-800 font-semibold">Salary: <span class="text-black">$140,000</span></p>
                    <p class="text-gray-800 font-semibold">Location: <span class="text-black">New York City, NY</span>
                        <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold ml-2 px-2.5 py-0.5 rounded">Remote</span>
                    </p>
                    <p class="text-gray-800 font-semibold">Tags: <span class="text-black">Development, Coding, Backend, Software</span></p>
                </div>
                <button class="bg-blue-100 text-blue-700 font-bold py-2 px-4 rounded">Details</button>
            </div>

            <!-- Job Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="job image" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h2 class="text-xl font-bold">Pes</h2>
                        <p class="text-sm text-gray-500">Full-Time</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    Staň se psem
                </p>
                <div class="mb-4">
                    <p class="text-gray-800 font-semibold">Salary: <span class="text-black">$200,000</span></p>
                    <p class="text-gray-800 font-semibold">Location: <span class="text-black">Nevada, USA</span>
                        <span class="inline-block bg-red-100 text-red-800 text-xs font-semibold ml-2 px-2.5 py-0.5 rounded">On-site</span>
                    </p>
                    <p class="text-gray-800 font-semibold">Tags: <span class="text-black">Pes, Fufín, Vlk</span></p>
                </div>
                <button class="bg-blue-100 text-blue-700 font-bold py-2 px-4 rounded">Details</button>
            </div>

            <!-- Job Card 3 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="job image" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h2 class="text-xl font-bold">Software Engineer</h2>
                        <p class="text-sm text-gray-500">Part-Time</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    As a Software Engineer at Algorix, you will be responsible for designing, developing, and maintain...
                </p>
                <div class="mb-4">
                    <p class="text-gray-800 font-semibold">Salary: <span class="text-black">$90,000</span></p>
                    <p class="text-gray-800 font-semibold">Location: <span class="text-black">Albany, NY</span>
                        <span class="inline-block bg-red-100 text-red-800 text-xs font-semibold ml-2 px-2.5 py-0.5 rounded">On-site</span>
                    </p>
                    <p class="text-gray-800 font-semibold">Tags: <span class="text-black">Development, Coding, Java, Python</span></p>
                </div>
                <button class="bg-blue-100 text-blue-700 font-bold py-2 px-4 rounded">Details</button>
            </div>

        </div>
    </div>

</body>

</html>
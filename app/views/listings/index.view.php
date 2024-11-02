<?=
loadPartialView('head')
?>
<?=
loadPartialView('navbar')
?>

<main class="container mx-auto p-4 mt-4">

    <div class="bg-blue-900 h-24 px-4 mb-4 flex justify-center items-center rounded">
        <form action="get" method="get" class="flex flex-wrap justify-center">
            <input type="text" placeholder="Job Title" class="w-full md:w-72 mx-1 px-4 py-2 text-gray-900 rounded-md focus:outline-none" />
            <input type="text" placeholder="Location" class="w-full md:w-72 mx-1 px-4 py-2 text-gray-900 rounded-md focus:outline-none" />
            <button class="bg-blue-600 hover:bg-blue-700 mx-1 px-6 py-2 rounded-md text-white">Search</button>
        </form>
    </div>

    <div class="grid grid-cols-3 gap-6 mb-4">

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
                    <h2 class="text-xl font-bold">Dog</h2>
                    <p class="text-sm text-gray-500">Full-Time</p>
                </div>
            </div>
            <p class="text-gray-700 mb-4">
                Become a dog
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
    <?= loadPartialView("bottom_banner") ?>
</main>


<?= loadPartialView("footer") ?>
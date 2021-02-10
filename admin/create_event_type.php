<div class="w-full flex flex-wrap">

    <!-- Login Section -->
    <div class="w-full  md:mx-40 md:my-20 flex flex-col">

        

        <div class="flex flex-col justify-center md:justify-start my-auto pt-10 md:pt-15 px-8 md:px-24 lg:px-32">
            <p class="text-center text-2xl">New Event Type</p>
            <div id="message"></div>
            <form class="flex flex-col pt-3 md:pt-8" id="eventTypeForm" method="POST">

                <div class="flex flex-col pt-4">
                    <label for="title" class="text-lg">Event Type Title</label>
                    <input type="text" name="title" id="title" placeholder="" class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                </div>

               
               
                <button id="submit" type="submit" class="group mt-4 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                   
                    Save
                </button>
                <button class="group mt-4 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" style="display: none;" type="button" id="spinner"><i class="fa fa-spinner fa-spin"></i></button>

               
        </div>

    </div>

    
</div>
<div class="w-full flex flex-wrap">

    <!-- Login Section -->
    <div class="w-full  md:mx-40 md:my-20 flex flex-col">



        <div class="flex flex-col justify-center md:justify-start my-auto pt-10 md:pt-5 px-8 md:px-24 lg:px-32">
            <p class="text-center text-2xl">New Event</p>
           
            <form class="flex flex-col pt-3 md:pt-8" id="eventForm" method="POST">

                <div class="flex flex-col pt-4">
                    <label for="title" class="text-lg">Event Title</label>
                    <input type="text" name="title" id="title" placeholder="" class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                </div>

                <div class="flex flex-col pt-4">
                    <label for="event_type" class="text-lg">Event Type</label>
                    <select id="event_type" name="event_type[]" multiple class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                        <option label="Select Category"></option>
                    </select>
                </div>
                <div class="flex flex-col pt-4">
                    <label for="location" class="text-lg">Event Image</label>
                    <input type="url" name="image" id="image" value="https://picsum.photos/400/300" class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                </div>
                <div class="flex flex-col pt-4">
                    <label for="location" class="text-lg">Event Location</label>
                    <input type="text" name="location" id="location" placeholder="e.g Ottawa Canada" class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                </div>
                <div class="flex gap-2 flex-wrap">
                    <div class="flex flex-col pt-4">
                        <label for="title" class="text-lg">Event Start Date / Time</label>
                        <input type="datetime-local" name="start_date" id="start_date" placeholder="" class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="title" class="text-lg">Event End Date / Time</label>
                        <input type="datetime-local" name="end_date" id="end_date" placeholder="" class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                    </div>
                    <div class="flex flex-col pt-4">
                        <label for="location" class="text-lg">Event Price ($) <small class="text-red-700">Leave empty if free</small></label>
                        <input type="number" name="price" min="0" id="price" placeholder="0.00" value="0.00" class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" >
                    </div>

                </div>

                <div class="flex flex-col pt-4">
                    <label for="title" class="text-lg">Event Description</label>
                    <textarea name="description" id="description" placeholder="" class="h-40 appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required></textarea>
                </div>

                <div class="flex flex-col pt-4">
                    <label for="featured" class="text-lg">Featured Event? </label>
                    <select id="efeatured" name="featured"  class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                        <option label="Select "></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                        

                </div>


                <button id="submit" type="submit" class="group mt-4 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">

                    Save
                </button>
                <button class="group mt-4 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" style="display: none;" type="button" id="spinner"><i class="fa fa-spinner fa-spin"></i></button>

                <div id="message"></div>
        </div>

    </div>


</div>

<script>
    loadEvents();

    function loadEvents() {
        var postData = {
            job: 'get_types'
        };

        $.ajax({
            url: "controller.php",
            method: "POST",
            data: postData,
            cache: false,
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                $.each(data, function(key, value) {
                    var options = `<option value="` + value.title + `">` + value.title + `</option>`;
                    $("#event_type").append(options);
                });
            }
        })
    }
</script>
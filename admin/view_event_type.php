<section>
    <div class="w-full py-5 flex flex-wrap justify-center">
       
       <table class="text-left w-full border-collapse shadow-md rounded">
       <thead >
       <tr class="h-10">
       <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">#</th>
       <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Title</th>
       <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light pr-8 text-right">Actions</th>
       </tr>
       </thead>
       <tbody id="load_data">
      
       </tbody>
       </table>

    </div>
    <div class="text-center items-center p-4" id="load_data_message"></div>
</section>

<script>
loadEventTypes();
/** load event types */
function loadEventTypes() {
    var postData = {
        job: 'get_event_types'
    };
    //console.log( postData);
    $.ajax({
        url: "controller.php",
        method: "POST",
        data: postData,
        cache: false,
        success: function (data) {

            //console.log(data)
            var sectionPanelLoader = $('#load_data');
            var sectionPanelMessage = $('#load_data_message');

            if (data == '') {
                //sectionPanelLoader.html('');
                sectionPanelMessage.html('<h3>No More Result Found</h3>');
                action = 'active';
            } else {

                sectionPanelLoader.html('');
                sectionPanelLoader.append(data);
                sectionPanelMessage.html("");
                action = 'inactive';
            }
        }
    })
}

/*** delete event type */
function deleteEventType(id) {
    $("#event_"+id).fadeOut(300).hide();
    $("#spinner_"+id).fadeIn(300).show();

    var postData = {
        id: id,
        job: 'delete_event_type'
    };
    //console.log( postData);
    $.ajax({
        url: "controller.php",
        method: "POST",
        data: postData,
        cache: false,
        dataType: 'json',
        success: function (data) {
            $("#spinner_"+id).fadeOut(300).hide();
            $("#event_"+id).fadeIn(300).show();

            console.log(data);

            if (data.status == "success") {
                loadEventTypes();
            } 

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + ' ' + xhr.statusText);
            $("#spinner_"+id).fadeOut(300).hide();
            $("#event_"+id).fadeIn(300).show();
            $('#load_data_message').fadeIn(300).html(`<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Something went wrong.</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
          </div>`);
            $('#load_data_message').fadeOut(900);
        }
    })
}
</script>
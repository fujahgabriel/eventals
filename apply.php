<?php require_once 'config.php' ?>
<?php
$id= base64_decode($_GET["id"]);
$condition = 'id ="'.$id.'"';
$event = $eventQuery->getEvent($condition);
$title = 'Apply';
if ($event['price'] == '0.00') :
    $price = 'Free';
else :
    $price = '$' . number_format($event['price'], 2);
endif;
if (strpos($event['eventType'], 'Premium') !== false) :
    $notify= '<div class="bg-red-900 text-center py-4 lg:px-4">
                <a href="#">            
                <div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Hey! </span>
                <span class="font-semibold mr-2 text-left flex-auto">Read more about Premium membership plan</span>
                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                </div>
                </a>
            </div>';
endif;
?>
<?php require_once ROOT_PATH . '/global/header.php'; ?>
<div class="w-full flex flex-wrap">

    <!-- Login Section -->
    <div class="w-full  md:mx-20 md:my-5 flex flex-col">

        <?=$notify?>
    
        <div class="flex flex-col justify-left md:justify-start my-auto pt-10 md:pt-15 px-8 md:px-24 lg:px-32">
       <h2 class="font-semibold text-2xl">Apply to  <span class="text-orange"><?= $event['title'] ?></span></h2>
        <div class="flex flex-col pt-4">
                    <table class="table w-full py-5 px-4 border text-left">
                        <tbody>
                            <tr class="h-10 border">
                                <th class="border w-1/2" >Event Title</th>
                                <td class=""><?= $event['title'] ?></td>
                            </tr>
                            <tr class="h-10 border">
                                <th class="border w-1/2">Event Price</th>
                                <td><?= $price ?></td>
                            </tr>
                            <tr class="h-10 border">
                                <th class="border w-1/2">Event Location</th>
                                <td><?= $event['location'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


           

            <form class="flex flex-col pt-3 md:pt-8" id="applyForm" method="POST">
                <div class="flex flex-col pt-4">
                    <label for="first_name" class="text-lg">First Name</label>
                    <input type="text" name="first_name" id="first_name" placeholder="" class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                </div>
                <div class="flex flex-col pt-4">
                    <label for="last_name" class="text-lg">Last Name</label>
                    <input type="text" name="last_name" id="last_name" placeholder="" class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                </div>
                <div class="flex flex-col pt-4">
                    <label for="title" class="text-lg">Phone</label>
                    <input type="tel" name="phone" id="phone" placeholder="" class=" appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                </div>
                <div class="flex flex-col pt-4">
                    <label for="email" class="text-lg">Email</label>
                    <input type="email" name="email" id="email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                </div>

                

                <input type="hidden" id="id" value="<?=$id?>" name="id">

                <button id="submit" type="submit" class="group mt-4 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">

                    Submit
                </button>
                <button class="group mt-4 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" style="display: none;" type="button" id="spinner"><i class="fa fa-spinner fa-spin"></i></button>

                <div id="message"></div>
        </div>

    </div>


</div>
<?php require_once ROOT_PATH . '/global/footer.php'; ?>

<script>
    /*** apply to event form */
$("#applyForm").submit(function (e) {
    e.preventDefault();

    $("#submit").fadeOut(300).hide();
    $("#spinner").fadeIn(300).show();

    const url = '<?php echo BASE_URL;?>controller.php';

    var id = $("#id").val();

    var postData = {
            firstName: $("#first_name").val(),
            lastName: $("#last_name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            eventID: id,
            job: 'event_apply'
    };
    console.log(url);
    $.ajax({
        type: "POST",
        url:  url,
        data: postData,
        cache: false,
        success: function (data) {
            var data = JSON.parse(data);
            $("#spinner").fadeOut(300).hide();
            $("#submit").fadeIn(300).show();

            console.log(data);

            if (data.status == "success") {
                $('#message').fadeIn(300).html(`<div class="bg-green-300 border border-green-400 text-white px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline text-white">`+ data.message + `</span>
                
              </div>`);
                $('#message').fadeOut(900);
                location.href = '<?php echo BASE_URL;?>confirmation/'+btoa(data.id);

            } else {
                $("#spinner").fadeOut(300).hide();
                $("#submit").fadeIn(300).show();
                $('#message').fadeIn(300).html(`<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">`+ data.message + `</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
              </div>`);
                $('#message').fadeOut(900);
            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + ' ' + ajaxOptions);
            $("#spinner").fadeOut(300).hide();
            $("#submit").fadeIn(300).show();
            $('#message').fadeIn(300).html(`<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Something went wrong.</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
          </div>`);
            $('#message').fadeOut(900);
        }
    });

    return false;
});


</script>
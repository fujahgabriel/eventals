$(document).ready(function () {
    $(".nav-toggler").each(function (_, navToggler) {
        var target = $(navToggler).data("target");
        $(navToggler).on("click", function () {
            $(target).animate({
                height: "toggle"
            });
        });
    });

    window.onscroll = function () { stickyHeader() };

    var header = document.getElementById("header");
    var sticky = header.offsetTop;

    function stickyHeader() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }



});

$("#loginform").submit(function (e) {

    e.preventDefault();

    $("#submit").fadeOut(300).hide();
    $("#spinner").fadeIn(300).show();

    const url = 'controller.php';

    $.ajax({
        type: "POST",
        url: url,
        data: {
            email: $("#email").val(),
            password: $("#password").val(),
            job: 'auth'
        },
        dataType: 'json',
        success: function (data) {

            $("#spinner").fadeOut(300).hide();
            $("#submit").fadeIn(300).show();

            console.log(data);

            if (data.status == "success") {
                location.reload();
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
            console.log(xhr.status + ' ' + xhr.statusText);
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


/*** submit event type form */
$("#eventTypeForm").submit(function (e) {
    e.preventDefault();

    $("#submit").fadeOut(300).hide();
    $("#spinner").fadeIn(300).show();
    const url = 'controller.php';

    $.ajax({
        type: "POST",
        url: url,
        data: {
            title: $("#title").val(),
            job: 'store_event_type'
        },
        dataType: 'json',
        success: function (data) {

            $("#spinner").fadeOut(300).hide();
            $("#submit").fadeIn(300).show();

            //console.log(data);

            if (data.status == "success") {
                $('#message').fadeIn(300).html(`<div class="bg-green-300 border border-green-400 text-white px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline text-white">`+ data.message + `</span>
                
              </div>`);
                $('#message').fadeOut(900);
                $("#eventTypeForm")[0].reset();

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
            console.log(xhr.status + ' ' + xhr.statusText);
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



/*** update event type form */
$("#updateEventTypeForm").submit(function (e) {
    e.preventDefault();

    $("#submit").fadeOut(300).hide();
    $("#spinner").fadeIn(300).show();
    const url = 'controller.php';

    $.ajax({
        type: "POST",
        url: url,
        data: {
            title: $("#title").val(),
            id: $("#id").val(),
            job: 'update_event_type'
        },
        dataType: 'json',
        success: function (data) {

            $("#spinner").fadeOut(300).hide();
            $("#submit").fadeIn(300).show();

            //console.log(data);

            if (data.status == "success") {
                $('#message').fadeIn(300).html(`<div class="bg-green-300 border border-green-400 text-white px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline text-white">`+ data.message + `</span>
                
              </div>`);
                $('#message').fadeOut(900);
                location.href = '?job=view_event_type';

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
            console.log(xhr.status + ' ' + xhr.statusText);
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


/*** submit event form */
$("#eventForm").submit(function (e) {
    e.preventDefault();

    $("#submit").fadeOut(300).hide();
    $("#spinner").fadeIn(300).show();
    const url = 'controller.php';
    var selected = [];
    for (var option of document.getElementById('event_type').options) {
        if (option.selected) {
            selected.push(option.value);
        }
    }
    console.log(selected);
    var postData = {
        title: $("#title").val(),
        event_type: selected,
        description: $("#description").val(),
        price: $("#price").val(),
        location: $("#location").val(),
        start_date: $("#start_date").val(),
        end_date: $("#end_date").val(),
        image: $("#image").val(),
        featured: $("#featured").val(),
        job: 'store_event'
    };


    $.ajax({
        type: "POST",
        url: url,
        data: postData,
        dataType: 'json',
        success: function (data) {

            $("#spinner").fadeOut(300).hide();
            $("#submit").fadeIn(300).show();

            //console.log(data);

            if (data.status == "success") {
                $('#message').fadeIn(300).html(`<div class="bg-green-300 border border-green-400 text-white px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline text-white">`+ data.message + `</span>
                
              </div>`);
                $('#message').fadeOut(900);
                $("#eventForm")[0].reset();

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
            console.log(xhr.status + ' ' + xhr.statusText);
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



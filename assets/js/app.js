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


$(document).ready(function () {
    loadFeatured();

    var limit = 3;
    var start = 0;
    var action = 'inactive';
    var eventType = 'all';
    $('input[type=radio][name=tabset]').change(function () {
        limit = 3;
        start = 0;
        action = 'inactive';
        eventType = this.value

        load_data(limit, start, eventType);
    });

    //

    function lazzy_loader(limit) {
        var output = '';
        for (var count = 0; count < limit; count++) {
            output += '<div class="post_data w-1/4 overflow-hidden xl:my-2 xl:px-2 py-6 p-5 object-center">';
            output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
            output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
            output += '</div>';
        }
        // $('#load_data').html(output);
    }

    lazzy_loader(limit);
    

    function load_data(limit, start, eventType) {

        var postData = {
            limit: limit,
            start: start,
            job:"feed",
            type: eventType
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

    if (action == 'inactive') {
        action = 'active';
        load_data(limit, start, eventType);
    }

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
            lazzy_loader(limit);
            action = 'active';
            start = start + limit;
            setTimeout(function () {
                load_data(limit, start, eventType);
            }, 1000);
        }
    });

});

$("#searchform").submit(function (e) {
    e.preventDefault();
    var q = $("#searchbox").val();
   
    if (q != "") {
        search(q);
    }
   
    return false;
});
$("#searchbox").on('keyup kepress', function (e) {
    var q = $("#searchbox").val();
   
    if (q != "") {
        search(q);
    }

    return false;
});

function search(q) {
    var postData = {
        job:"search",
        query: q
    };
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
                sectionPanelMessage.html('<h3>No Result Found</h3>');
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

function loadFeatured(){
    var postData = {
        job:"featured",
        limit: 3
    };
    $.ajax({
        url: "controller.php",
        method: "POST",
        data: postData,
        cache: false,
        success: function (data) {
            //console.log(data)
        
            if (data != '') {
                
                $('#featured').append(data);
                
            }
        }
    })
}


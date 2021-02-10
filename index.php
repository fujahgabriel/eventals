<?php require_once 'config.php' ?>
<?php require_once 'global/header.php'; ?>

<div class="container">
    <div class="featured">
        <h2>Top Featured Events</h2>
        <p>Browse through some of the best collections in Online Events hand picked by people who know the area best.</p>
    </div>
   
    <div class="container w-full py-5 mb-4 flex flex-wrap justify-between">
        <div id="featured" class="w-full flex flex-wrap gap-2 overflow-hidden justify-center "></div>
    </div>

    <div class="search_box mt-4">
        <form method="post" id="searchform">
            <input id="searchbox" required type="text" name="q" placeholder="What are you searching for?">
            <button class="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <h2 class="header-text">Upcoming Events</h2>
    <div class="tabset">

        <!-- Tab 1 -->
        <input type="radio" name="tabset" id="tab1" value="all" aria-controls="all" checked>
        <label for="tab1">All</label>
        <!-- Tab 2 -->
        <input type="radio" name="tabset" id="tab2" value="MeetUp" aria-controls="meetup">
        <label for="tab2">MeetUp</label>
        <!-- Tab 3 -->
        <input type="radio" name="tabset" id="tab3" value="Leap" aria-controls="leap">
        <label for="tab3">Leap</label>
        <!-- Tab 4 -->
        <input type="radio" name="tabset" id="tab4" value="Recruiting Mission" aria-controls="recruiting_mission">
        <label for="tab4">Recruiting Mission</label>
        <!-- Tab 5 -->
        <input type="radio" name="tabset" id="tab5" value="Hackathon" aria-controls="hackathon">
        <label for="tab5">Hackathon</label>
        <!-- Tab 6 -->
        <input type="radio" name="tabset" id="tab6" value="Premium-only Webinar" aria-controls="premium_only_webinar">
        <label for="tab6">Premium-only Webinar</label>
        <!-- Tab 7 -->
        <input type="radio" name="tabset" id="tab7" value="Open Webinar" aria-controls="open_webinar">
        <label for="tab7">Open Webinar</label>

   
        <section>
            <div class="w-full py-5 flex flex-wrap justify-left">
                <div id="load_data" class="w-full flex flex-wrap gap-2 overflow-hidden p-2 justify-center "></div>

            </div>
            <div class="text-center items-center p-4" id="load_data_message"></div>
        </section>
    </div>

</div>

<?php require_once 'global/footer.php'; ?>
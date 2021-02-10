<div class="h-full">
    <div class="flex my-6">
        <a href="?job=create_event_type" class="group mx-1 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black">Create Event Types</a>
        <a href="?job=view_event_type" class="group mx-1 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black">View Event Types</a>
        <a href="?job=create_event" class="group mx-1 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black">Create Events</a>
        <a href="?job=events" class="group mx-1 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black">View Events</a>
    </div>

    <div class="mx-auto my-4">
        <?php
        if ($_REQUEST["job"] == "events") :
            include_once 'events.php';
        elseif ($_REQUEST["job"] == "create_event") :
            include_once 'create.php';
        elseif ($_REQUEST["job"] == "edit_event") :
            include_once 'edit.php';
        elseif ($_REQUEST["job"] == "create_event_type") :
            include_once 'create_event_type.php';
        elseif ($_REQUEST["job"] == "view_event_type") :
            include_once 'view_event_type.php';
        elseif ($_REQUEST["job"] == "edit_event_type") :
            include_once 'edit_event_type.php';
        elseif ($_REQUEST["job"] == "logout") :
            session_unset();
            header('location:' . BASE_URL);
        else :
            include_once 'events.php';
        endif;
        ?>
    </div>
</div>
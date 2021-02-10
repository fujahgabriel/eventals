<?php
if (empty($_REQUEST)) {
    exit('No direct script access allowed');
}
require_once 'config.php';
require_once ROOT_PATH . '/includes/auth.php';

if ($_REQUEST["job"] == "feed") :
    //$output = [];
    $premium = '';
    $events = $eventQuery->loadEvents($_POST["limit"], $_POST["start"],  $_POST["type"]);

    foreach ($events as $event) {
        if (strpos($event['eventType'], 'Premium') !== false) :

            $premium = '<span class="absolute top-5 right-5 text-sm font-medium bg-red-600 py-1 px-2 text-white ">Premium Only Webinar</span>';
        else:
            $premium = '';
        endif;
        if ((strpos($event['eventType'], 'Hackathon') !== false) || (strpos($event['eventType'], 'Leap') !== false) || (strpos($event['eventType'], 'Mission') !== false)) :
            $customcss = 'border-4 border-yellow-400 focus:outline-red-400';
            $tagColor = 'bg-yellow-300';
        else :
            $customcss = '';
            $tagColor = 'bg-black';
        endif;
        $output .= '
                        <div class="bg-white w-full md:w-1/4 shadow-lg cursor-pointer rounded transform hover:scale-105 duration-300 ease-in-out m-4 ' . $customcss . '">
                          
                            <div class="">
                                <img src="' . $event['image'] . '" alt="" class="rounded-t w-full">
                               ' . $premium . '
                            </div>
                            <div class="p-4 text-left">
                            <h2 class="text-sm md:text-xl capitalize"> <a href="' . BASE_URL . 'e/' . $event['slug'] . '">' . $event['title'] . '</a></h2>
                            <p class="text-xs  text-red-600  mt-4  md:text-xs lg:text-sm"><i class="fa fa-clock text-black text-center items-center align-middle "></i> ' . date("M j, Y - h:i:s A", strtotime($event["startDate"])) . '</p>

                            </div>
                            <div class="flex  flex-wrap items-center justify-between px-4 py-2">
                                <a href="#" class="' . $tagColor . ' px-2 py-1  border text-sm text-white font-semibold rounded text-center justify-between  align-middle">' . $event['eventType'] . '</a>
                                <a href="' . BASE_URL . 'e/' . $event['slug'] . '" class="px-3 py-1  border text-sm text-gray-900 font-semibold rounded text-center justify-between  align-middle"> Read More</a>
                            </div>
                        </div>
        ';
    }
    echo $output;

endif;

if ($_REQUEST["job"] == "search") :
    $output = '';
    $premium = '';
    $events = $eventQuery->searchEvents($_POST["query"]);

    foreach ($events as $event) {
        if (strpos($event['eventType'], 'Premium') !== false) :
            $premium = '<span class="absolute top-5 right-5 text-sm font-medium bg-red-600 py-1 px-2 text-white ">Premium Only Webinar</span>';
        else:
            $premium = '';
        endif;
        if ((strpos($event['eventType'], 'Hackathon') !== false) || (strpos($event['eventType'], 'Leap') !== false) || (strpos($event['eventType'], 'Mission') !== false)) :
            $customcss = 'border-4 border-yellow-400 focus:outline-red-400';
            $tagColor = 'bg-yellow-300';
        else :
            $customcss = '';
            $tagColor = 'bg-black';
        endif;
        $output .= '
                        <div class="bg-white w-full md:w-1/4 shadow-lg cursor-pointer rounded transform hover:scale-105 duration-300 ease-in-out m-4 ' . $customcss . '">
                          
                            <div class="">
                                <img src="' . $event['image'] . '" alt="" class="rounded-t w-full">
                               ' . $premium . '
                            </div>

                            <div class="p-4 text-left">
                            <h2 class="text-sm md:text-xl capitalize"> <a href="' . BASE_URL . 'e/' . $event['slug'] . '">' . $event['title'] . '</a></h2>
                            <p class="text-xs  text-red-600  mt-4  md:text-xs lg:text-sm"><i class="fa fa-clock text-black text-center items-center align-middle "></i> ' . date("M j, Y - h:i:s A", strtotime($event["startDate"])) . '</p>

                            </div>
                            <div class="flex  flex-wrap items-center justify-between px-4 py-2">
                                <a href="#" class="' . $tagColor . ' px-2 py-1  border text-sm text-white font-semibold rounded text-center justify-between  align-middle">' . $event['eventType'] . '</a>
                                <a href="' . BASE_URL . 'e/' . $event['slug'] . '" class="px-3 py-1  border text-sm text-gray-900 font-semibold rounded text-center justify-between  align-middle"> Read More</a>
                            </div>
                        </div>
        ';
    }
    echo $output;

endif;


if ($_REQUEST["job"] == "featured") :
    $output = '';
    $premium = '';
    $events = $eventQuery->loadFeatured($_POST["limit"]);

    foreach ($events as $event) {
        if (strpos($event['eventType'], 'Premium') !== false) :
            $premium = '<span class="absolute top-5 right-5 text-sm font-medium bg-red-600 py-1 px-2 text-white ">Premium Only Webinar</span>';
        else:
            $premium = '';
        endif;
        if ((strpos($event['eventType'], 'Hackathon') !== false) || (strpos($event['eventType'], 'Leap') !== false) || (strpos($event['eventType'], 'Mission') !== false)) :
            $customcss = 'border-4 border-yellow-400 focus:outline-red-400';
            $tagColor = 'bg-yellow-300';
        else :
            $customcss = '';
            $tagColor = 'bg-black';
        endif;
        $output .= '
                        <div class="bg-white  w-full md:w-1/4  shadow-lg cursor-pointer rounded transform hover:scale-105 duration-300 ease-in-out m-4 ' . $customcss . '">
                          
                            <div class="">
                                <img src="' . $event['image'] . '" alt="" class="rounded-t w-full">
                               ' . $premium . '
                            </div>

                            <div class="p-4 text-left">
                            <h2 class="text-sm md:text-xl capitalize"> <a href="' . BASE_URL . 'e/' . $event['slug'] . '">' . $event['title'] . '</a></h2>
                            <p class="text-xs  text-red-600  mt-4  md:text-xs lg:text-sm"><i class="fa fa-clock text-black text-center items-center align-middle "></i> ' . date("M j, Y - h:i:s A", strtotime($event["startDate"])) . '</p>

                            </div>
                            <div class="flex  flex-wrap items-center justify-between px-4 py-2">
                                <a href="#" class="' . $tagColor . ' px-2 py-1  border text-sm text-white font-semibold rounded text-center justify-between  align-middle">' . $event['eventType'] . '</a>
                                <a href="' . BASE_URL . 'e/' . $event['slug'] . '" class="px-3 py-1  border text-sm text-gray-900 font-semibold rounded text-center justify-between  align-middle"> Read More</a>
                            </div>
                        </div>
                       
        ';
    }
    echo $output;

endif;


/** apply to event */
if ($_REQUEST["job"] == "event_apply") :
    $response = [];
    $apply->eventID = $database->escape($_POST["eventID"]);
    $apply->firstName =  $database->escape($_POST["firstName"]);
    $apply->lastName =  $database->escape($_POST["lastName"]);
    $apply->phone =  $database->escape($_POST["phone"]);
    $apply->email =  $database->escape($_POST["email"]);

    $result = $apply->store();

    if ($result !== FALSE) :

        $response = ["status" => "success", "message" => "Application successful!", "id" => $result];
    else :
        $response = ["status" => "failed", "message" => "operation failed"];
    endif;

    echo json_encode($response, true);

endif;

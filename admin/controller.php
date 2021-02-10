<?php
if (empty($_REQUEST)) {
    exit('No direct script access allowed');
}
require_once 'config.php';
require_once ROOT_PATH . '/includes/db.php';

function cleanInput($input)
{
    $clean = strip_tags($input);

    return $clean;
}

if ($_REQUEST["job"] == "auth") :
    $email = cleanInput($_POST["email"]);
    $password = cleanInput($_POST["password"]);

    $result = $auth->doLogin($email, $password);

    if (!empty($result)) :
        $_SESSION["admin"] = $result[0]["id"];

        $response = ["status" => "success", "data" => $result];
    else :
        $response = ["status" => "failed", "message" => "invalid login"];
    endif;
    echo json_encode($response, true);
//error_log($result, 3, "errors.log");
endif;

if ($_REQUEST["job"] == "getevents") :


    $premium = '';
    $results = $eventQuery->loadEvents();

    foreach ($results as $event) {
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
        $id = $event['id'];
        $output .= '
                            <div class="bg-white w-full md:w-1/4 shadow-lg cursor-pointer rounded transform hover:scale-105 duration-300 ease-in-out m-4 ' . $customcss . '">
                              
                                <div class="">
                                    <img src="' . $event['image'] . '" alt="" class="rounded-t w-full">
                                   ' . $premium . '
                                </div>
    
                                <div class="p-4 text-left">
                                    <h2 class="text-2xl uppercase">' . $event['title'] . '</h2>
                                    <p class="text-xs  text-red-600 my-2  md:text-xs lg:text-sm"><i class="fa fa-clock text-black text-center items-center align-middle "></i> ' . date("M j, Y - h:i:s A", strtotime($event["startDate"])) . '</p>
    
                                </div>
                                <div class="flex  flex-wrap items-center justify-between px-4 py-2">
                                <a href="#" class="px-2 py-1 bg-black border text-sm text-white font-semibold rounded text-center justify-between  align-middle"></a>
                                <a href="#" id="event_' . $id . '" onClick="deleteEvent(' . $id . ');" class="px-3 py-1  bg-red-700 border text-sm text-white font-semibold rounded text-center justify-between  align-middle"> Delete</a>
                                <button class="py-1 px-3 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" style="display: none;" type="button" id="spinner_' . $id . '"><i class="fa fa-spinner fa-spin"></i></button>
                                </div>
                            </div>
                            <div id="message_' . $id . '"></div>
            ';
    }
    echo $output;

endif;


if ($_REQUEST["job"] == "store_event") :
    $title = cleanInput($_POST["title"]);
    $chars = array(' ', '%', '#', '*', '"', '@', '!', '&', '^', '$', '£');
    $eventQuery->title = $title;
    $eventQuery->userID = $_SESSION["admin"];
    $eventQuery->description =  cleanInput($_POST["description"]);
    $eventQuery->slug = str_replace($chars, "-", cleanInput($title));
    $eventQuery->location =  cleanInput($_POST["location"]);
    $eventQuery->price  = cleanInput($_POST["price"]);
    $eventQuery->event_type =  $_POST["event_type"];
    $eventQuery->image =  cleanInput($_POST["image"]);
    $eventQuery->start_date =  cleanInput($_POST["start_date"]);
    $eventQuery->end_date =  cleanInput($_POST["end_date"]);
    if($_POST["featured"] === "on"){
        $featured = 1;
    }
    else{
        $featured = 0;
    }
    $eventQuery->is_featured =  $featured;

    $result = $eventQuery->storeEvent();

    if ($result) :

        $response = ["status" => "success", "message" => $title . " saved"];
    else :
        $response = ["status" => "failed", "message" => "operation failed"];
    endif;
    echo json_encode($response, true);
//error_log($result, 3, "errors.log");
endif;

if ($_REQUEST["job"] == "delete_event") :
    $id = $_POST["id"];


    $result = $eventQuery->deleteEvent($id);

    if ($result) :
        $response = ["status" => "success"];
    else :
        $response = ["status" => "failed", "message" => "operation failed"];
    endif;
    echo json_encode($response, true);

endif;

if ($_REQUEST["job"] == "store_event_type") :
    $title = cleanInput($_POST["title"]);

    $result = $eventQuery->storeEventType($title);

    if ($result) :

        $response = ["status" => "success", "message" => $title . " saved"];
    else :
        $response = ["status" => "failed", "message" => "operation failed"];
    endif;
    echo json_encode($response, true);
//error_log($result, 3, "errors.log");
endif;

if ($_REQUEST["job"] == "get_event_types") :

    $results = $eventQuery->getEventTypes();
    $i = 0;
    foreach ($results as $value) {
        $id = $value['id'];
        $i++;
        $output .= '<tr class="hover:bg-grey-lighter">
        <td class="py-4 px-6 border-b border-grey-light">' . $i . '</td>
        <td class="py-4 px-6 border-b border-grey-light">' . $value['title'] . '</td>
        <td class="py-4 px-6 border-b border-grey-light"><div class="flex px-4 py-2 float-right">
        <a href="?job=edit_event_type&id=' . base64_encode($id) . '" class="px-2 py-1 bg-black border text-sm text-white font-semibold rounded text-center justify-between  align-middle">Edit</a>
        <a href="#" id="event_' . $id . '" onClick="deleteEventType(' . $id . ');" class="px-3 py-1  bg-red-700 border text-sm text-white font-semibold rounded text-center justify-between  align-middle"> Delete</a>
        <button class="py-1 px-3 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" style="display: none;" type="button" id="spinner_' . $id . '"><i class="fa fa-spinner fa-spin"></i></button>
        </div></td>
        </tr>
                           
            ';
    }
    echo $output;

endif;

if ($_REQUEST["job"] == "delete_event_type") :
    $id = $_POST["id"];


    $result = $eventQuery->deleteEventType($id);

    if ($result) :
        $response = ["status" => "success"];
    else :
        $response = ["status" => "failed", "message" => "operation failed"];
    endif;
    echo json_encode($response, true);

endif;



if ($_REQUEST["job"] == "update_event_type") :
    $id = cleanInput($_POST["id"]);
    $title = cleanInput($_POST["title"]);

    $result = $eventQuery->updateEventType($title, $id);

    if ($result) :

        $response = ["status" => "success", "message" => $title . " saved"];
    else :
        $response = ["status" => "failed", "message" => "operation failed"];
    endif;
    echo json_encode($response, true);
//error_log($result, 3, "errors.log");
endif;


if ($_REQUEST["job"] == "get_types") :

    $results = $eventQuery->getEventTypes();

    echo json_encode($results, true);

endif;

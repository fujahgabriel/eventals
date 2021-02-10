<?php require_once 'config.php' ?>
<?php
$title = 'Confirmation';

$id= base64_decode($_GET["id"]);

/** get event application data */
$apply->id = $id;
$attendee = $apply->get();
//var_dump($attendee);
/** get event data */
$condition = 'id ="'.$attendee["eventID"].'"';
$event = $eventQuery->getEvent($condition);
if ($event['price'] == '0.00') :
    $price = 'Free';
else :
    $price = '$' . number_format($event['price'], 2);
endif;



?>
<?php require_once ROOT_PATH . '/global/header.php'; ?>
<div class="w-full flex flex-wrap">

    <!-- Login Section -->
    <div class="w-full  md:mx-20 md:my-5 flex flex-col">

    
        <div class="flex flex-col justify-left md:justify-start my-auto pt-10 md:pt-15 px-8 md:px-24 lg:px-32">
       <h2 class="font-semibold text-2xl">Event Confirmation </h2>
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

                            <tr class="h-10 border">
                                <th class="border w-1/2">Name</th>
                                <td><?= $attendee['firstName'] .' '.$attendee['lastName'] ?></td>
                            </tr>

                            <tr class="h-10 border">
                                <th class="border w-1/2">Email</th>
                                <td><?php  echo $attendee['email'] ?></td>
                            </tr>

                            <tr class="h-10 border">
                                <th class="border w-1/2">Phone</th>
                                <td><?= $attendee['phone'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
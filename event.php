<?php require_once 'config.php' ?>
<?php
$condition = 'slug ="'.$database->escape($_GET["slug"]).'"';
$event = $eventQuery->getEvent($condition);
//$event = $eventQuery->getEvent($_REQUEST["slug"]);
$title = $event['title'];
if (strpos($event['eventType'], 'Premium') !== false) :
    $premium = '<span class="absolute top-5 right-5 text-sm font-medium bg-red-600 py-1 px-2 text-white ">Premium Only Webinar</span>';
endif;
if ($event['price'] == '0.00') :
    $price = 'Free';
else :
    $price = '$' . number_format($event['price'], 2);
endif;

?>
<?php require_once ROOT_PATH . '/global/header.php'; ?>

<div class="bg-white w-full shadow-lg ">

    <div class="" style="background: url(<?= $event['image'] ?>); background-size:cover; height:50vh;">

    </div>
    <div class="flex  flex-wrap items-center justify-between px-2 py-2">
        <a href="#" class="px-2 py-1  text-lg text-black font-semibold rounded text-left justify-between  align-middle"><?= $event['title'] ?> <br> <?= $price; ?></a>
        <a href="<?php echo BASE_URL; ?>apply/<?=base64_encode($event["id"]); ?>" class="bg-green-700 px-8 w-full md:w-1/3 py-4  border text-lg text-white font-semibold rounded text-center justify-between  align-middle">Apply</a>
    </div>
</div>
<div class="container">
    <div class="w-full flex mt-20">
        <div class="w-full md:w-4/6 p-4 md:min-h-screen">
            <h2 class="font-semibold text-black text-sm md:text-3xl ">About this Event</h2>
            <p class="ext-gray-600 text-lg pt-3 text-left"><?= $event['description'] ?></p>
        </div>
        <div class="w-full md:w-2/6 py-4 px-6 rounded-lg md:min-h-full ">
            <div class="">
                <h2 class="font-semibold text-black text-sm md:text-2xl ">Date And Time</h2>
                <p class="text-gray-700 text-lg pt-3 "><?= date("F j, Y ", strtotime($event["startDate"])); ?></p>
                <p class="text-gray-700 text-lg"><?= date("h:i:s", strtotime($event["startDate"])) . ' - ' . date("h:i:s", strtotime($event["endDate"])); ?></p>
                <p class=""><a href="<?= make_google_calendar_link($event['title'], strtotime($event['startDate']), strtotime($event['endDate']),  $event['description'], $event['location']) ?>" target="_blank" class="text-blue-600 text-lg font-semibold">Add to calender</a></p>
            </div>
            <div class="pt-10">
                <h2 class="font-semibold text-black text-sm md:text-2xl ">Location</h2>
                <p class="text-gray-700 text-lg pt-3"><?= $event["location"]; ?></p>
            </div>
        </div>


    </div>
    <div class="w-full my-8">
        <h2 class="font-semibold text-black text-sm md:text-2xl ">Share With Friends</h2>
        <div class="w-2/3 pt-4 flex items-left">
		<div class="bg-white rounded-lg">

			<div class="flex my-2">
				<a href="#"><i style="background-color: #3B5998;"
                class="flex items-center justify-center h-12 w-12 mx-1 rounded-full fab fill-current text-white text-xl fa-facebook-f"></i></a>
				<a href="#"><i style="background-color:#dd4b39"
                class="flex items-center justify-center h-12 w-12 mx-1 rounded-full fas fill-current text-white text-xl fa-envelope"></i></a>
				<a href="#"><i style="background-color:#125688;"
                class="flex items-center justify-center h-12 w-12 mx-1 rounded-full fab fill-current text-white text-xl fa-instagram"></i></a>
				<a href="#"><i style="background-color:#55ACEE;"
                class="flex items-center justify-center h-12 w-12 mx-1 rounded-full fab fill-current text-white text-xl fa-twitter"></i></a>
			</div>
		</div>
	</div>
    </div>

</div>
<?php require_once ROOT_PATH . '/global/footer.php'; ?>
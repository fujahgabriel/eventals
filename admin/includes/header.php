<!doctype html>
<html lang="eng">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- seo meta tags -->
    <meta name="description" content="" />
    <meta name="apple-itunes-app" content="app-id=" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="fb:app_id" content="" />
    <meta property="og:image" content="" />

    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->

    <title><?= $title ?: 'Home' ?></title>

    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/style.css' ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo BASE_URL . '../assets/css/tailwind.min.css' ?>" />

    <script src="<?php echo BASE_URL . '../assets/js/jquery.min.js' ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/fontawesome.min.js" integrity="sha512-pafh0hrrT9ZPZl/jx0cwyp7N2+ozgQf+YK94jSupHHLD2lcEYTLxEju4mW/2sbn4qFEfxJGZyIX/yJiQvgglpw==" crossorigin="anonymous"></script>

</head>
<div class="wrapper">
    <!-- Main Header -->
    <nav class="flex items-center bg-gray-800 p-3 flex-wrap z-30" id="header">
        <a href="#" class="p-2 mr-4 inline-flex items-center">
            <!--<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-white h-8 w-8 mr-2">
                <path d="M12.001 4.8c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624C13.666 10.618 15.027 12 18.001 12c3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C16.337 6.182 14.976 4.8 12.001 4.8zm-6 7.2c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624 1.177 1.194 2.538 2.576 5.512 2.576 3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C10.337 13.382 8.976 12 6.001 12z" />
            </svg>-->
            <span class="text-xl text-white font-bold uppercase tracking-wide">Eventals</span>
        </a>
        <button class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler" data-target="#navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
            <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto">
                <a href="<?php echo BASE_URL; ?>" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                    <span>Home</span>
                </a>
                <?php if (isset($_SESSION["admin"]) && !empty($_SESSION["admin"])) : ?>
                    <!--<a href="#" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                    <span>Host an Event</span>
                </a>
                <a href="#" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                    <span>Help</span>
                </a>-->
                    <a href="?job=logout" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                        <span>Logout</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </nav>
    <section class="main">
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

    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/style.css' ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/tailwind.min.css'?>"  />


</head>
<div class="wrapper">
    <!-- Main Header -->
    <nav class="flex items-center bg-gray-800 p-3 flex-wrap z-30" id="header">
        <a href="#" class="p-2 mr-4 inline-flex items-center">
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
                <a href="#" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                    <span>Host an Event</span>
                </a>
                <a href="#" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                    <span>FAQ</span>
                </a>
                
            </div>
        </div>
    </nav>
    <section class="main">
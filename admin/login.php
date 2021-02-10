<div class="w-full flex flex-wrap">

    <!-- Login Section -->
    <div class="w-full  md:mx-40 md:my-20 flex flex-col">

        

        <div class="flex flex-col justify-center md:justify-start my-auto pt-10 md:pt-15 px-8 md:px-24 lg:px-32">
            <p class="text-center text-2xl">Admin.</p>
            <div id="message"></div>
            <form class="flex flex-col pt-3 md:pt-8" id="loginform" method="POST">

                <div class="flex flex-col pt-4">
                    <label for="email" class="text-lg">Email</label>
                    <input type="email" name="email" id="email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                </div>

                <div class="flex flex-col pt-4">
                    <label for="password" class="text-lg">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 mt-1 leading-tight focus:outline-blue-400 focus:shadow-outline" required>
                </div>
                <div class="flex items-center justify-between pt-4">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>

                   
                </div>
                <button id="submit" type="submit" class="group mt-4 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Heroicon name: lock-closed -->
                        <svg class="h-5 w-5 text-white group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Sign in
                </button>
                <button class="group mt-4 relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" style="display: none;" type="button" id="spinner"><i class="fa fa-spinner fa-spin"></i></button>

               
        </div>

    </div>

    
</div>
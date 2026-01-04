<?php 
get_header(); 
    ?>
<div class="grid grid-cols-12">
    <div class="col-span-12 h-[60vh] bg-black relative flex justify-center items-center">
        <img src="<?php echo get_theme_file_uri(); ?>/images/hero-image.jpg" alt="Hero Image"
            class="w-full h-full object-cover opacity-70">

        <h1
            class="text-white text-center text-5xl font-bold absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            Welcome to My Custom Theme
        </h1>
        <button
            class="absolute top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-all duration-75">
            Get Started
        </button>

    </div>
    <div class=" col-span-6 h-[40vh] bg-yellow-200"></div>
    <div class="col-span-6 h-[40vh]"></div>

</div>
<?php
get_footer();
    ?>
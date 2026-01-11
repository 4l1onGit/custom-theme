<?php
get_header();

?>
<div class="min-h-screen h-full w-full">
    <?php
    while( have_posts() ) {
        the_post();
        ?>

    <div class="relative h-[35vh] w-full mb-12 shadow-lg">

        <img src="<?php echo get_theme_file_uri(); ?>/images/hero-image.jpg" alt="Page Hero Image"
            class="w-full h-full object-cover brightness-50">
        <h1 class="text-white text-center text-5xl font-bold absolute top-1/2  transform -translate-y-1/2 pl-20">
            <?php the_title(); ?></h1>
        <div class="-translate-y-2 text-sm font-semibold">
            <span class="bg-yellow-400 px-4 py-2 ml-2 text-yellow-800"><a href="<?php echo home_url(); ?>">Back To
                    Home</a></span>

            <span class="bg-blue-500 px-4 py-2 text-white"><a
                    href="<?php echo get_post_type_archive_link('event') ?>">Back to
                    Events</a></span>

        </div>
    </div>
    <div class="h-full  mx-auto w-3/4 ">

        <div class="mt-2 w-full overflow-y-scroll">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php
    }
get_footer();

    ?>
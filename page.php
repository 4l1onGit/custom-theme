<?php
get_header();

$parentId = wp_get_post_parent_id(get_the_ID());

    while( have_posts() ) {
        the_post();?>
<div class="h-full w-full">
    <div class="relative h-[35vh] w-full mb-12 shadow-lg">

        <img src="<?php echo get_theme_file_uri(); ?>/images/hero-image.jpg" alt="Page Hero Image"
            class="w-full h-full object-cover ">
        <h1 class="text-white text-center text-5xl font-bold absolute top-1/2  transform -translate-y-1/2 pl-20">
            <?php the_title(); ?></h1>
        <div class="-translate-y-2 text-sm font-semibold">
            <span class="bg-yellow-400 px-4 py-2 ml-2 text-yellow-800"><a href="<?php echo home_url(); ?>">Back To
                    Home</a></span>
            <?php if ($parentId) : ?>
            <span class="bg-blue-500 px-4 py-2 text-white">Back to
                <?php echo get_the_title($parentId); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="container mx-auto bg-white bg-opacity-90 p-8  ">
        <p class="text-md font-medium "> <?php  the_content()  ?></p>
    </div>
</div>

<?php
    }
get_footer();
    ?>
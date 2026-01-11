<?php
get_header();
$parentId = wp_get_post_parent_id(get_the_ID());
?>
<div class="min-h-screen h-full w-full">


    <div class="relative h-[35vh] w-full mb-12 shadow-lg">

        <img src="<?php echo get_theme_file_uri(); ?>/images/hero-image.jpg" alt="Page Hero Image"
            class="w-full h-full object-cover brightness-50">
        <div class="absolute top-1/2  transform -translate-y-1/2 pl-20 flex flex-col space-y-6">
            <h1 class="text-white text-5xl font-bold">
                All Events
            </h1>
            <span class="text-white font-medium text-xl">Latest Nature Events</span>
        </div>


        <div class="-translate-y-2 text-sm font-semibold">
            <span class="bg-yellow-400 px-4 py-2 ml-2 text-yellow-800"><a href="<?php echo home_url(); ?>">Back To
                    Home</a></span>
            <?php if ($parentId) : ?>
            <span class="bg-blue-500 px-4 py-2 text-white">Back to
                <?php echo get_the_title($parentId); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="container mx-auto h-full flex flex-col justify-center px-8">
        <h2 class="text-2xl font-semibold mb-6 text-center ">
            Latest Events
        </h2>
        <div class="flex flex-col">
            <?php
            // Query for latest blog posts
            $latest_events = new WP_Query(
                array(
                    'post_type' => 'event',
                    'posts_per_page' => 2,
                  
                )
            );
            while( $latest_events->have_posts() ) {
                $latest_events->the_post();
                ?>

            <div class="mb-4 w-full bg-gray-100  p-4 rounded-md space-y-2 flex flex-1">
                <div class="w-3/4">
                    <h3 class="text-lg"><a class="text-purple-500 underline"
                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="text-sm max-w-xl">
                        <?php  echo get_the_content()?>
                    </p>
                    <span class="text-xs font-light"><?php echo get_the_date(); ?></span>
                </div>
                <?php if (has_post_thumbnail()) { ?>
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>"
                    alt="<?php echo get_the_title(); ?>" class="mt-2 object-cover w-1/4 rounded-md" />
                <?php } ?>
            </div>

            <?php
            }
            wp_reset_postdata()
            
            ?>
        </div>


        <?php
get_footer();
?>
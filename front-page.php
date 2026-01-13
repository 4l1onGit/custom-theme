<?php 
get_header(); 
    ?>
<!--- Styling to be improved later --->
<div class="grid grid-cols-12">
    <div class="col-span-12 h-[60vh] bg-black relative flex flex-col justify-center items-center">
        <img src="<?php echo get_theme_file_uri(); ?>/images/hero-image.jpg" alt="Hero Image"
            class="w-full h-full object-cover opacity-70 brightness-75 ">
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col space-y-4 items-center">
            <h1 class="text-white text-center text-5xl font-bold">
                Nature Blog
            </h1>
            <p class="text-md text-white font-light text-center">Explore with a community of Nature lovers and keep up
                to date with
                latest
                events
                and posts</p>
        </div>

        <!-- <button
            class="absolute top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-all duration-75">
            Get Started
        </button> -->

    </div>
    <div class="md:col-span-6 col-span-12 h-[30rem] border-l border-r border-gray-300 bg-gray-50">
        <div class="container mx-auto h-full flex flex-col justify-between py-10 px-8">

            <h2 class="text-2xl font-semibold mb-6 text-center">
                Latest Blog Posts
            </h2>
            <div class="flex flex-col justify-center items-center space-y-4">
                <?php
            // Query for latest blog posts
            $latest_posts = new WP_Query(
                array(
                    'posts_per_page' => 2,
                  
                )
            );
            while( $latest_posts->have_posts() ) {
                $latest_posts->the_post();
                ?>

                <div class="w-full h-1/2  bg-gray-50 shadow-md rounded-md flex flex-1">
                    <div class="w-3/4 h-full p-4 flex flex-col justify-between">
                        <div class="">

                            <h3 class="text-lg"><a class="text-purple-500 underline"
                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="text-sm max-w-xl mt-2">
                                <?php echo has_excerpt() ? wp_trim_words( get_the_excerpt(), 15 ) : wp_trim_words( get_the_content(), 15 ); ?>
                                <span class="text-xs text-purple-600 underline font-light"><a
                                        href="<?php the_permalink(); ?>">Read
                                        More</a></span>

                            </p>
                        </div>
                        <span class="text-xs font-light"><?php echo get_the_date(); ?></span>
                    </div>

                    <?php if (has_post_thumbnail()) { ?>

                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>"
                        alt="<?php the_title(); ?>" class="object-cover  rounded-r-md w-1/4" />

                    <?php } ?>
                </div>

                <?php
            }
            wp_reset_postdata()
            
            ?>
            </div>
            <button
                class="bg-purple-900 text-md text-white px-4 py-2  hover:bg-purple-950 transition-all duration-125 mt-4 self-center">
                <a href="<?php echo site_url('/blog'); ?>">

                    View All Posts
                </a>
            </button>

        </div>
    </div>
    <div class="md:col-span-6 col-span-12 h-[30rem] bg-green-50">
        <div class="container mx-auto h-full flex  flex-col justify-between py-10 px-8">
            <h2 class="text-2xl font-semibold mb-6 text-center ">
                Latest Events
            </h2>
            <div class="flex flex-col justify-center items-center space-y-4 ">
                <?php
                $today= date('Ymd');
            // Query for latest blog posts
            $latest_events = new WP_Query(
                array(
                    'post_type' => 'event',
                    'posts_per_page' => 2,
                    'orderby' => 'meta_value',
                    'meta_query' => array(
                       array(
                           'key' => 'event_date',
                           'compare' => '>=',
                           'value' => $today,
                           'type' => 'DATE',
                       ),
                    ),
                 
                    'meta_key' => 'event_date',
                )
            );
            while( $latest_events->have_posts() ) {
                $latest_events->the_post();
                ?>

                <div class="w-full h-1/2 bg-gray-50 shadow-md rounded-md flex flex-1">
                    <div class="w-3/4 h-full p-4 flex flex-col justify-between">
                        <div class="">
                            <?php $eventDate = new DateTime(get_field('event_date'))?>

                            <div class="flex justify-between">
                                <span
                                    class="bg-purple-400 text-purple-800  text-xs font-medium mr-2 px-2.5 py-0.5 rounded my-0.5">
                                    <?php echo $eventDate->format('F j, Y'); ?>
                                </span>

                            </div>
                            <h3 class="text-lg"><a class="text-purple-500 underline"
                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="text-sm max-w-xl mt-2">
                                <?php echo has_excerpt() ? wp_trim_words( get_the_excerpt(), 15 ) : wp_trim_words( get_the_content(), 15 ); ?>
                                <span class="text-xs text-purple-600 underline font-light"><a
                                        href="<?php the_permalink(); ?>">Read
                                        More</a></span>

                            </p>
                        </div>
                        <span class="text-xs font-light">Posted: <?php echo get_the_date(); ?></span>
                    </div>

                    <?php if (has_post_thumbnail()) { ?>

                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>"
                        alt="<?php the_title(); ?>" class="rounded-r-md w-1/4" />

                    <?php } ?>
                </div>

                <?php
            }
            wp_reset_postdata()
            
            ?>
            </div>
            <button
                class="bg-purple-900 text-md text-white px-4 py-2  hover:bg-purple-950 transition-all duration-125 mt-4 self-center">
                <a href="<?php echo site_url('/events'); ?>">

                    View All Events
                </a>
            </button>

        </div>
    </div>
</div>
<?php
get_footer();
    ?>
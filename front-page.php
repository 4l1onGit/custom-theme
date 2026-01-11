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
    <div class="md:col-span-6 col-span-12 h-[40vh] bg-gray-200">
        <div class="container mx-auto h-full flex flex-col justify-center px-8">

            <h2 class="text-2xl font-semibold mb-6 text-center">
                Latest Blog Posts
            </h2>
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

            <div class=" mb-4 w-full bg-slate-300 p-4 rounded-md space-y-2">
                <h3 class="text-lg"><a class="text-purple-500 underline"
                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="text-sm max-w-xl">
                    <?php echo wp_trim_words( get_the_content(), 20 ); ?> <span
                        class="text-xs text-purple-600 underline font-light"><a href="<?php the_permalink(); ?>">Read
                            More</a></span>
                </p>
                <span class="text-xs font-light"><?php the_date(); ?></span>
            </div>

            <?php
            }
            wp_reset_postdata()
            
            ?>
            <button
                class="bg-purple-600 text-md text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-all duration-105 mt-4 self-center">
                <a href="<?php echo site_url('/blog'); ?>">

                    View All Posts
                </a>
            </button>

        </div>
    </div>
    <div class="md:col-span-6 col-span-12 h-[40vh] bg-orange-200">
        <div class="container mx-auto h-full flex flex-col justify-center items-center">
            <h2 class="text-4xl font-bold mb-6">Placeholder</h2>
            <p class="text-lg text-center max-w-xl">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
    <div class="col-span-12 h-[100vh] bg-sky-200">
        <div class="container mx-auto h-full flex flex-col justify-center items-center">
            <h2 class="text-4xl font-bold mb-6">Placeholder</h2>
            <p class="text-lg text-center max-w-2xl">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>

</div>
<?php
get_footer();
    ?>
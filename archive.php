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
                <!-- <?php
                if(is_category()) {
                    single_cat_title();
                }
                if(is_author()) {
                    echo "Posts by ".get_the_author();
                }
                if(is_tag()) {
                    echo "Posts tagged ".single_tag_title('', false);
                }
                if(is_date()) {
                    echo "Archives for ".get_the_date('F Y');
                }
                ?>-->
                <?php the_archive_title(); ?>
            </h1>
            <span class="text-white font-medium text-xl"><?php the_archive_description(); ?></span>
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
    <div class="grid md:grid-cols-2 grid-cols-1 gap-8 container mx-auto p-8 bg-white bg-opacity-90">
        <?php 
        while( have_posts() ) {
            the_post(); ?>
        <div
            class="col-span-1 flex flex-col justify-between border border-gray-300 rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="">

                <h2
                    class="text-2xl font-light underline hover:-translate-y-1 duration-150 transition-transform text-blue-950">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="text-xs text-yellow-950 font-medium bg-yellow-200 inline-block px-2 py-1 rounded mt-2">
                    Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?> in
                    <?php echo get_the_category_list(', '); ?>
                </div>
                <div class="pt-4 text-sm font-medium text-gray-700">
                    <?php the_excerpt(); ?>

                </div>
            </div>
            <p><a class="text-sm text-blue-600 hover:underline " href="<?php the_permalink(); ?>">View more</a>
            </p>
        </div>
        <?php
        }
    
 
        ?>
    </div>
    <?php 
      echo  paginate_links();
    ?>
</div>
<?php
get_footer();
?>
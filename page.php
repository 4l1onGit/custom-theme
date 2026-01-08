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
    <div class="flex w-full h-full">

        <div class="container mx-auto  p-8 w-3/4  h-full">
            <p class="text-md font-medium "> <?php  the_content()  ?></p>
        </div>
        <?php if($parentId || get_pages(array('child_of' => get_the_ID()))) { ?>
        <div class="w-1/4  p-8">
            <h2 class="bg-yellow-300 text-yellow-950 font-semibold px-4 py-2"><a
                    href="<?php echo get_permalink($parentId); ?>">
                    <?php echo get_the_title($parentId); ?>

                </a></h2>
            <ul class="text-md font-medium mt-1  text-white">
                <?php 
                if ($parentId) {
                    $linkID = $parentId;
                 } else {
                    $linkID = get_the_ID();
                 }
                 $pages = get_pages(array(
                    'title_li' => NULL,
                    'child_of' => $linkID,
                 ));

                 if ($pages) {
                    foreach ($pages as $page) {
                        $pageTitle = $page->post_title;
                        $pageLink = get_permalink($page->ID);
                        ?>
                <li
                    class="bg-blue-500 px-4 py-2 hover:bg-blue-600 hover:scale-105 hover:shadow-lg transition-all duration-125 ease-in">
                    <a href="<?php echo $pageLink; ?>"><?php echo $pageTitle; ?></a>
                </li>
                <?php
                    }
                 }

                ?>

            </ul>
        </div>
        <?php } ?>
    </div>
</div>

<?php
    }
get_footer();
    ?>
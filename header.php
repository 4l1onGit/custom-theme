<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<!-- <?php
    $links = [
        ['name' => 'Home',  'url' => home_url('/')],
        ['name' => 'About',  'url' => home_url('/about')],
        ['name' => 'Blog',  'url' => home_url('/blog')],
        ["name" => 'Contact',  'url' => home_url('/contact')],
    ]
?> -->


<body class="max-w-7xl flex flex-col mx-auto min-h-screen">

    <header>
        <div class="flex justify-between items-center mx-auto bg-gray-100">

            <h1 class="text-3xl font-bold p-4"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            </h1>


            <nav class="md:block hidden">
                <?php wp_nav_menu(['theme_location' => 'header-menu-location', 'li_class' => 'transition-all duration-75 hover:scale-105 hover:text-purple-400', 'menu_class' => 'w-full flex space-x-8 px-4 py-6 font-medium ']) ?>
                <!-- <ul class=" w-full flex space-x-8 px-4 py-6 font-medium text-lg">
                    <?php foreach ($links as $link): ?>
                    <li class=""><a href="<?php echo $link['url']; ?>"><?php echo $link['name']; ?></a></li>
                    <?php endforeach; ?>

                </ul> -->
            </nav>



        </div>
    </header>
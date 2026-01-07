<footer class="bg-gray-100 border-t border-gray-300 mt-2">
    <nav class="md:flex hidden h-32 justify-center items-center mx-auto ">
        <?php wp_nav_menu(['theme_location' => 'footer-menu-location', 'menu_class' => 'w-full flex space-x-8 px-4 py-6 font-medium font-thin', 'li_class' => 'transition-all duration-75 hover:scale-105 hover:text-purple-400']) ?>
    </nav>
    <div class="container mx-auto py-4 text-center text-gray-600">
        &copy; <?php echo date('Y'); ?> My Custom Theme. All rights reserved.
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
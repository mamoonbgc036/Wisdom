<a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

<nav class="header__nav-wrap">

    <h2 class="header__nav-heading h6">Site Navigation</h2>

    <?php 
        $wisdom_nav_menus = wp_nav_menu( 
            array(
                'theme_location' => 'topmenu',
                'menu_id'        => 'topmenu',
                'menu_class'     => 'header__nav',
                'echo' => false,
            )
        );

        $wisdom_final_menus = str_replace('menu-item-has-children', 'menu-item-has-children has-children', $wisdom_nav_menus);

        echo $wisdom_final_menus;
    ?>

    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

</nav> <!-- end header__nav-wrap -->
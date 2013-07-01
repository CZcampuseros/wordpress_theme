<?php
    function getrandcolor($num) {
        //$color = array('838B8B', '668B8B', '2F4F4F', '528B8B', '388E8E', '8FD8D8', '70DBDB', '8DEEEE', '008B8B', '00FFFF', 'BBFFFF', '00CED1', '00C5CD', '67E6EC', '53868B', '7AC5CD', '98F5FF', '39B7CD', 'C3E4ED', '9AC0CD', 'B2DFEE', '0099CC', 'BFEFFF', '87CEEB', '42C0FB', '236B8E', '33A1DE', '5D92B1', 'A4D3EE', 'B0E2FF', '4A708B', '87CEFF', '42647F', '5CACEE', '36648B', 'F0F8FF', '708090', '778899', '7D9EC0', '1C86EE', '1E90FF', '739AC5', '499DF5', '7AA9DD', '6E7B8B', '4372AA', '687C97', '4973AB', 'BCD2EE', '4D71A3', '88ACE0', '3579DC', '4D6FAC', '6D9BF1', '3A5894', '5971AD', '27408B', '436EEE', 'A9ACB6', '3B4990', '838EDE', '2E37FE', '8F8FBC', 'D9D9F3', '3232CD', '000033', '00009C', '0000FF', '6666FF', 'F8F8FF', '302B54', '3B3178', '7A67EE', '7B68EE', '9F79EE', 'AB82FF', '7A8B8B', 'B4CDCD', '5F9F9F', 'E0EEEE', '79CDCD', '66CCCC', 'AEEEEE', '37FDFC', '00CDCD', '00FFFF', 'E0FFFF', '5F9EA0', '00E5EE', '4A777A', '73B1B7', '8EE5EE', 'B0E0E6', '65909A', '68838B', '50A6C2', '00688B', '00B2EE', '33A1C9', '38B0DE', '6996AD', '3299CC', '607B8B', '8DB6CD', '82CFFD', '87CEFA', '9BC4E2', '517693', '4682B4', '63B8FF', '62B1F6', '4E78A0', '708090', '6183A6', '104E8B', '60AFFE', '6C7B8B', '75A1D0', 'C6E2FF', '0276FD', '506987', '26466D', '344152', 'B0C4DE', '7EB6FF', '2B4F81', '5993E5', '5190ED', '2C5197', '5B90F6', '7093DB', '0147FA', '3A5FCD', '003EFF', '22316C', '283A90', 'E6E8FA', '2F2F4F', '5959AB', '23238E', '191970', '000080', '0000CD', '3333FF', 'AAAAFF', '5B59BA', '483D8B', '6A5ACD', '8470FF', '3300FF', '8968CD', '6600FF', 'C1CDCD', '2F4F4F', 'C0D9D9', '96CDCD', 'D1EEEE', 'ADEAEA', 'AFEEEE', '008080', '00EEEE', '97FFFF', 'F0FFFF', '00868B', '00F5FF', '05EDFF', '05E9FF', '05B8CC', 'C1F0F6', '0EBFE9', '63D1F4', 'ADD8E6', '009ACD', '00BFFF', '507786', '0BB5FF', '539DC2', '0198E1', '35586C', '325C74', '67C8FF', '6CA6CD', '7EC0EE', '5D7B93', '4F94CD', '525C65', '74BBFB', '0D4F8B', '778899', '9FB6CD', '1874CD', '007FFF', 'B7C3D0', 'B9D3EE', '3B6AA0', '003F87', 'A2B5CD', '1D7CF2', '50729F', '3063A5', 'CAE1FF', '4981CE', '3A66A7', '42526C', '6495ED', '1464F4', '1B3F8B', '3D59AB', '4169E1', '4876FF', '162252', '6F7285', '7D7F94', '42426F', '7171C6', '3232CC', 'E6E6FA', '00008B', '0000EE', '4D4DFF', 'CCCCFF', '120A8F', '473C8B', '6959CD', '836FFF', '5D478B', '9370DB', '380474');
        //$color = array('1CF', '3CF', '5CF', '7CF', '9CF', '0CF');
        //$color = array('0066CC', '0066FF', '0099CC', '0099FF', '3366CC', '3366FF', '3399CC', '3399FF', '306EFF', '2B65EC', '1589FF', '157DEC', '1569C7');
        $color = array('0099FF', '2EB135', 'FF5A00', 'DE1C85');
        return '#'.$color[$num];
    }

    function the_slug() { $post_data = get_post($post->ID, ARRAY_A); $slug = $post_data['post_name']; return $slug; }

    function my_function_admin_bar() { return false; }
    add_filter( 'show_admin_bar' , 'my_function_admin_bar');

    function new_excerpt_more($more) { return '...'; }
    add_filter( 'excerpt_more', 'new_excerpt_more' );
    function custom_excerpt_length($length) { return 999; }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

    add_theme_support( 'custom-header', array( 'width' => 490, 'height' => 60, 'uploads' => true ) );
    add_theme_support('post-thumbnails');

    register_sidebar(array( 'name' => 'Header', 'id' => 'header', 'before_widget' => '<div id="%2$s">', 'after_widget' => '</div>', 'before_title' => '<h1>', 'after_title' => '</h1>' ));
	register_sidebar(array( 'name' => 'Sidebar', 'id' => 'sidebar', 'before_widget' => '<section class="widget" id="%2$s">', 'after_widget' => '</section>', 'before_title' => '<h1>', 'after_title' => '</h1>' ));
    register_sidebar(array( 'name' => 'Main 1', 'id' => 'main1', 'before_widget' => '<section class="widget" id="%2$s">', 'after_widget' => '</section>', 'before_title' => '<h1>', 'after_title' => '</h1>' ));
    register_sidebar(array( 'name' => 'Main 2', 'id' => 'main2', 'before_widget' => '<section class="widget" id="%2$s">', 'after_widget' => '</section>', 'before_title' => '<h1>', 'after_title' => '</h1>' ));

    function register_my_menus() { register_nav_menus( array('headermenu' => __('Header Menu'))); }
	add_action( 'init', 'register_my_menus' );
 ?>
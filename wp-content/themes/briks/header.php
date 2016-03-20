<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till </nav>
 *
 * @package bricks
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <!-- <meta charset="utf-8"> -->
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

      <?php wp_head();?>  
    </head>
    <body <?php body_class(); ?>>
        
        <?php do_action( 'before' ); ?>
        <header id="head" class="">
            <div class="navbar navbar-inverse navbar-fixed-top head-top">
                <div class="container">
                    <div class="navbar-header">
                        <?php if ( get_theme_mod( 'bricks_logo' ) ) : ?>
                            <div class='site-logo'>
                                <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'bricks_logo' ) ); ?>' class="img-responsive" alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
                            </div>
                        <?php else : ?>
                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>    
                        <?php endif; ?>
                    </div>
                    
                    <form class="navbar-form navbar-right" method="get" id="searchform" action="">
                        <div class="form-group">
                            <input type="text" placeholder="Search" name="s" class="form-control" id="s">
                        </div>
                        <i class="fa fa-search fa-2x"></i>
                        <input type="submit" class="hidden">
                    </form>
                </div>
            </div>
        </header>
    
        <div class="container " id="container">
            <a href=""><i class="fa fa-plus fa-2x icon-plus menu-plus "></i></a>
            <a href=""><i class="fa fa-minus fa-2x icon-minus menu-minus "></i></a>
            <nav class="main-nav">
                <?php

                    if(has_nav_menu('primary')):
                        $args = array(
                            'theme_location' => 'primary',
                            'container' => '',
                            'container_class' => '',
                            'menu_class' => 'nav',
                            'menu_id' => '',
                            'echo' => true,
                            'walker' => new briks_bootstrap_navwalker(),
                        );
                    else:
                        $args = array(
                            'theme_location' => 'primary',
                            'container' => '',
                            'container_class' => '',
                            'menu_class' => 'nav',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb'=> 'wp_page_menu',
                            'depth'=>-1
                        );
                    endif;
                wp_nav_menu( $args ); ?>
            </nav>
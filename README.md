# vincit
vincit

process
```
////////Setting up

1. install local server
2. install git 
3. Download wordpress from wordpress.org
3. install node.js
4. install gulp
5. Download wordpress template from https://underscores.me/
6. gulpfile.js
7. package.json
8. test if Sass is working.

////////Theme development

0. Complete the static file first.
1. style.css (https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/)
2. index.php
3. function.php
   - register css (https://developer.wordpress.org/reference/functions/wp_enqueue_style/)
   - register js *jQuery is already included as default for WP (https://developer.wordpress.org/reference/functions/wp_enqueue_script/)
   https://teamtreehouse.com/library/wordpress-theme-development/working-with-css-and-js-in-wordpress-themes/how-to-link-to-js-from-functionsphp-file
4. js code that build based on jQuery need to add jQuery no conflic wrapper

    jQuery( document ).ready( function( $ ) {
        // $() will work as an alias for jQuery() inside of this function
        [ your code goes here ]
    } );
    
5. header.php / footer.php / index.php

   <?php get_header(); ?>
   <?php get_footer(); ?>


6. Porting existing headers and footers into WP
7. Remove the code that's going to be replaced by dynamic code.

   -----at header.php------
   
   - <title><?php wp_title(); ?></title>
   - remove ref for css and js put in <?php wp_head(); ?> at the end of head tag.
   - get url of the site <?php bloginfo('url); ?>
   - get the output of the site <?php bloginfo('url); ?>



   -----at footer.php----------
   
   - get copy right year  <?php echo date('Y'); ?>
   - remove all js link
   - put <?php wp_footer(); ?> just before </body>
   
   
   
   ----at index.php -(default template)---------
   
   - Loop----wrap the content with this code
   
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     // content
    <?php endwhile; else : ?>
      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
    
    
    - add title and content
    exp.
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
    
    
    -----at page.php -(teamplate for all template)---------------------------
    
  8. custom template 
    ------ page-sidebar-left.php----------exp.name-----------------------------------
    
    
    - Enclose the template name at the top
    
      <?php
      /*
       Template Name: Left Sidebar
      */
      ?>
  
  
  9. wp_nav_menu function
     (https://developer.wordpress.org/reference/functions/wp_nav_menu/)
     
     --------------add theme support for menu on function.php
       (https://developer.wordpress.org/reference/functions/add_theme_support/)
       
       add_theme_support( 'menus');
       
     ------------- Create menu on wordpress backend.
     
     ------------- Register menu on function.php
     
       function register_theme_menus() {
        register_nav_menus(
         array(
          'primary-menu' =>__('Primary Menu')
         )
        );
       }
       add_action('init', 'register_theme_menus');
       
       
     ------------- Add menu on header.php
      <?php
       $defaults = array(
        'container' => false,
        'theme_location' => 'primary-menu',
        'menu_class' => 'no-bullet'
       )
       wp_nav_menu($defaults);
      ?>
      
      ------------ Get rid of menu on the static page code.
      
      ------------- Wrap up the body class on <body>
        <?php body_class(); ?>
        
        
   10. Custom post type template
         https://codex.wordpress.org/Function_Reference/register_post_type
         https://wordpress.org/plugins/advanced-custom-fields/
         https://wordpress.org/plugins/custom-post-type-ui/
         
      ----------------add_theme_support('post-thumbnails');   on function.php for feature image.
      ----------------WP Query (https://codex.wordpress.org/Class_Reference/WP_Query)
      ----------------create a new theme eg. page-portfolio.php
      ----------------Put the loop mark up in and test
      ----------------add parameter from custom post type
      
      <?php
      $arg = array(
       'post_type' => 'portfolio
      );
      $query = new WP_Query( $arg );
      ?>
      
      <section class="row no-max pad">
        //loop
       <?php if( $query->have_posts() ): while( $query->have_post() ): $query-the_post(); ?>
       
       <div>
       <a href="<?php the_permalink();"><?php the_post_thumbnail('large'); ?></a>
       </div>
       
       
       <?php endwhile; endif; wp_reset_postdata(); ?>  
      </section>     
      
      -----------------Portfolio single page  single-portfolio.php 
      -----------------remove the template name becasue it is altomatic relevent to portfolio.php
      
      <?php previous_post_link(); ?> - 
      <a href="<?php bloginfo('url); ?>/portfolio">Back to Portfolio </a> -
      <?php next_post_link(); ?>
       
       
// Resources
- WP coding standards
  https://make.wordpress.org/core/handbook/best-practices/coding-standards
- Loops (https://codex.wordpress.org/The_Loop)
- Function ref (https://codex.wordpress.org/Function_Reference)
```

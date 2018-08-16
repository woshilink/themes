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
   
   - <title><?php wp_title('|', true, 'right'); bloginfo('name') ?></title>
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
       
       
   11. Blog homepage
       -------------create home.php
       -------------create blog on pages
       -------------Set post page to blog on Appearance
       -------------Add blog page to Menus
       ---Don't 
       class name : avatar
       
      -------------Codex Reference
          --the_excerpt() --- cut the content off at some point and only display a small part of content.
                 (https://developer.wordpress.org/reference/functions/the_excerpt/)
          -- get_avatar()
              (https://codex.wordpress.org/Function_Reference/get_avatar)
          -- get_the_author_meta()
              (https://developer.wordpress.org/reference/functions/get_the_author_meta/)
          -- the_author_posts_link()
              (https://codex.wordpress.org/Function_Reference/the_author_posts_link)
          -- the_category()--- this tag is altomatically create link
              (https://codex.wordpress.org/Function_Reference/the_category)
          -- the_date()
              (https://codex.wordpress.org/Function_Reference/the_date)
          -- the_time()
              (https://codex.wordpress.org/Function_Reference/the_time)
          -- the_post_thumbnail()
              (https://developer.wordpress.org/reference/functions/the_post_thumbnail/)
            
            <article>
             <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h1>
             <h2><?php echo strip_tags( get_the_excerpt() ); ?></h2> // echo strip_tags gets rid  of <p> inside <h2>
             ///// to limit the excerpt charactor go to function.php and add
                   function wpt_excerpt_length($length) {
                    return 16;
                   }
                   add_filter( 'excerpt_length', 'wpt_excerpt_length', 999 );
             /////
                <ul>
                   <li class="author">
                   
                       <span class="wpt-avatar small">
                        <?php echo get_avatar( get_the_author_metal('ID'), 24 ); ?> /// already contains link to author page
                       </span>
                       by <?php the_author_posts_link(); ?>  
                  
                   </li>
                   <li class="cat">in <?php the_category(', '); ?></li> ///(', ') is prevent category echo out in a <li>
                   <li class="date">on <?php the_time('F j, Y'); ?></li> /// avoid using the_date(); because it just work on the first post
                </ul>
                
                ////if it has post thumbnail
                <?php if( get_the_post_thumbnail() ); ?> ///get need to be added when run conditional statement
                   <div class="img-container">
                       <?php the_post_thumbnail('large'): ?>
                   </div>
                <?php endif; ?>
                
            </article>
    
    
    12.  single.php page (single-post.php)
         - home.php as a starting page.
         - reorganise the template hirachy.
         - add comment section by comment template function
           (https://developer.wordpress.org/reference/functions/comments_template/)#
           <?php comments_template(); ?>
           
         - or can create comments.php >>  wp will automatically use the file for the comment area.
         
     13. archive.php
         - That will automatically control archives for author pages, categories,custom post types, custom taxonomies, dates, and tag    archives.
         - home.php as a starting page.
         - leave the loop
         - above loop add 
         
           <div class="leader">
            <h1><?php wp_title(''); ?>Blog Posts</h1>
           </div>
  
  
     14. Static homepage  front-page.php
         (https://codex.wordpress.org/Function_Reference/is_front_page)
         
         - start with index.php
         - content-portfolio.php /// component for portfolio area
           place the custom loop from portfolio.php
           - add <?php get_tempalte_part('content', 'portfolio'); ?>
           - limit the number of post display,
           - inside content-portfolio.php add on top of the first <?php ?> code
           
                $num_posts = -1; // all post
                if( is_front_page() ) $num_posts = 4 // if it is front-page show only 4 post 
                
                //simplify format 
                $num_posts = ( is_front_page() ) ? 4 : -1;
                
                /////in conclusion//////
                <?php
                 $num_posts = (is_front_page() ) ? 4 : -1;
                 $args = array(
                  'post_type' => 'portfolio',
                  'posts_per_page' => $num_posts
                 );
                 $query = new WP_Query( $args );
                ?>
         
        15. Setting the blog page as a home page, front-page.php will override home.php so get rid of front-page.php first.
        
        16. Widget area
            https://codex.wordpress.org/Function_Reference/register_sidebar
            https://developer.wordpress.org/reference/functions/get_sidebar/
            https://codex.wordpress.org/Function_Reference/dynamic_sidebar
            
            - to make the sidebar widgets working
              1. function.php before the wpt_theme_styles()
                 
                 function wpt_create_widget( $same, $id, $description) {
                   register_sidebar(array(
                    'name' => __( $name ),
                    'id' => $id,
                    'description' => __( $description ),
                    'before_widget' => '<div class="widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<h2 class="module-heading">',
                    'after_title' => </h2>'
                   ));
                 }
                 create_widget( 'Page Sidebar', 'page', 'Display on the side of page with a sidebar' );
                 create_widget( 'Blog Sidebar', 'blog', 'Display on the side of pages in the blog section' );
                 
                 
                 //after than in clude <?php get_sidebar(); ?>  to the template that need it.
                 
          17. sidebar.php 
              -paste the sidebar code
                <div class="small-12 medium-4 medium-pull-8 columns">
                  <div class="secondary">
                   //add  widget here
                    <?php if( !dynamic_sidebar('page') ): ?>
                     <h2 class="module-heading">Sidebar Setup</h2>
                     <p>Please add widgets via the admin area!</p>
                    <?php endif; ?>
                  </div>
                </div>
                
                // sidebar-page.php <<< will use specificall with page section
                
              <div class="small-12 medium-4 medium-pull-8 columns">
                  <div class="secondary">
                   //add  widget here
                    <?php if( !dynamic_sidebar('blog') ): ?>
                     <h2 class="module-heading">Sidebar Setup</h2>
                     <p>Please add widgets via the admin area!</p>
                    <?php endif; ?>
                  </div>
                </div>
                
                
           18. Adding Shortcodes to the theme 
               (https://wordpress.org/plugins/easy-foundation-shortcodes/)
               
           19. Testing wp theme
           
           - on wp_confif.php
             at define('WP_DEBUG', false); << change false to true will show the error on the page once display
       
// Resources
- WP coding standards
  https://make.wordpress.org/core/handbook/best-practices/coding-standards
- Loops (https://codex.wordpress.org/The_Loop)
- Function ref (https://codex.wordpress.org/Function_Reference)
```

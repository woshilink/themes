# vincit
vincit

process

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
```
    jQuery( document ).ready( function( $ ) {
        // $() will work as an alias for jQuery() inside of this function
        [ your code goes here ]
    } );
```    
5. header.php / footer.php / index.php
```
   <?php get_header(); ?>
   <?php get_footer(); ?>
```

6. Porting existing headers and footers into WP
7. Remove the code that's going to be replaced by dynamic code.
```
   -----at header.php------
   - <title><?php wp_title(); ?></title>
   - remove ref for css and js put in <?php wp_head(); ?> at the end of head tag.
   - get url of the site <?php bloginfo('url); ?>
   - get the output of the site <?php bloginfo('url); ?>
```   
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
    
// Resources
- WP coding standards
  https://make.wordpress.org/core/handbook/best-practices/coding-standards
// Loops (https://codex.wordpress.org/The_Loop)

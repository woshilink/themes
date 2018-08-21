```
1. Style.css 
    
    for child theme

  - on the top part include the name of the parent theme
    Template: twentytwelve
  - on the first line of CSS
    @import url("../twentytwelve/style.css"); << is not the best way to do better to do in function.php

2. index.php
3. header.php
4. home.php << working with post
5. front-page.php << working with page
6. default template
   page + $id
   page-102.php
   page + slug
   page-about-us.php
7. template
   page-pagename << this will overwrite the default template
   
8. Single post and post format templates
9. comment.php
10. archive.php
11. category archives // category.php
    category-4.php << target the category id4
    category-special.php << target the special category
12. author archives // author.php
    
--custom post type---------------------------------------------

1. add custom post type UI Plugin
   1. add new post type Name
   2. at advance setting don't forget to set Archive page to true.
   3. at Rewrite check if it is true.
   4. go out to admin area check if have a new pin name as custom post type.
   5. set archive-portfolio.php << as the template for the post type.
   6. or set single-portfolio.php << as the template for the post type.
   
--Media template -----------------------------------------------
  Attatchment post
  - The template that contains info. for tha media.
  - image.php, imagepng.php, attachment.php
  
--Search template-----------------------------------------------
  1. Make sure that you get search form enable on widget
  2. If you have searchform.php  //  <?php get_search_form(); ?>
  3. by default search page go to search.php

--404.php------------------------------------------------------
   
```

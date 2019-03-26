<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vincit_coffee
 */

get_header();
?>
<!-- <div class="front-banner">
	เมล็ดกาแฟ<br>
	คัดสรรค์จากดอยช้าง<br>
	ทำเองทุกขั้นตอน<br>
</div> -->
<section id="home-banner-box" class="home-banner loading">
	<div class="image video-slide">
		<div class="video-background">
			<div class="video-foreground" id="YouTubeBackgroundVideoPlayer">
				</div>
		</div>
	</div>
</section>


<section class="container">




<div class="row">
<div class="col-12">	<h3 class="text-center">ผลิตภัณฑ์ของเรา</h3>
	<p class="text-center">เม็ดกาแฟพันธุ์ อาราบิก้าแท้ 100% จากดอยช้างเกรดพรีเมี่ยม   ที่เราคัดสรรมาและลงมือทำเองทุกขั้นตอน
เพื่อให้ลูกค้าได้รับ ความสดชื่น กลิ่นหอม และการเติมพลังให้กับชีวิตมากขึ้น</p></div>
<div class="col-sm-4 text-center p-0">
  <img src="http://localhost:8080/vincit/wp-content/uploads/2018/08/vincit_coffee_labor_roast.png" width="200" alt="" class="img-fluid">
	<p>LABOR ROAST 200G </p>
  <p>(Dark) Arabica 100% (เข้มแต่ไม่ขม)</p>
</div>

<div class="col-sm-4 text-center p-0">
  <img src="http://localhost:8080/vincit/wp-content/uploads/2018/08/vincit-coffee-omnia-roast.png" width="200" alt="" class="img-fluid">
	<p>OMNIA ROAST 200G </p>
	<p>(Medium To Light) สายดริปกาแฟ</p>
</div>

<div class="col-sm-4 text-center p-0">
  <img src="http://localhost:8080/vincit/wp-content/uploads/2018/08/vincit-coffee-vincit-roast.png" width="200" alt="" class="img-fluid">
	<p>VINCIT ROAST 200G </p>
	<p>(Medium to Dark) Arabica 100%</p>
</div>

</div>
</section>

<section class="container">
	<div class="row">
		<div class="col-sm-6 p-0">
			<img src="http://localhost:8080/vincit/wp-content/uploads/2018/08/vinit-chanwan.jpg" alt="" class="img-fluid">
		</div>
		<div class="col-sm-6 p-0">
<div class="pl-5">			<img src="http://localhost:8080/vincit/wp-content/uploads/2018/08/chanwan.jpg" alt="" width="50" class="img-fluid">
			<p>นอกจากผลิตภัณฑ์กาแฟแล้ว Vincit coffee ยังมีร้านกาแฟไว้บริการด้วย</p>
			<p>แวะเข้ามาจิบกาแฟที่ร้าน Chanwhan by Vincit ได้ที่</p>

			<p>939/52 ซอย จันทน์ 23/2</br>
			แขวง ทุ่งวัดดอน เขต สาทร </br>
			กรุงเทพมหานคร </br>
			10120</p>

			<p><a href="https://www.facebook.com/Chanwhanbyvincit/" target="_blank">https://www.facebook.com/Chanwhanbyvincit/</a></p></div>
		</div>

	</div>

</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			//get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>




	</main><!-- #main -->
 </div><!-- #primary -->

<?php
// get_sidebar();
get_footer();

<?php get_header(); ?>

<div class="l-col2-wrap">
   <!-- ▼ l-main ▼ -->
   <main class="l-main -col2 p-article">

      <?php if (have_posts()) : ?>
         <?php while (have_posts()) : the_post(); ?>
            <div class="p-article__head">
               <h1><?php the_title(); ?></h1>
               <time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y年m月d日'); ?></time>
            </div>
            <div class="p-article__area">
               <div class="p-article__imgWrap">
                  <img src="./img/sample-img.png" alt="">
               </div>
               <div class="p-article__msgArea">
                  <?php the_content(); ?>
               </div>
            </div>
         <?php endwhile; ?>
      <?php endif; ?>
   </main>
   <!-- ▲ l-main ▲ -->

   <!-- ▼ l-aside ▼ -->
   <?php get_sidebar(); ?>
   <!-- ▲ l-aside ▲ -->
</div>

<?php get_footer(); ?>

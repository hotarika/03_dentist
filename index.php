<?php
/*
Template Name: ブログ
*/
?>

<?php get_header(); ?>

<div class="l-col2-wrap">
   <!-- ▼ l-main ▼ -->
   <main class="l-main -col2 p-blog-main">

      <?php if (is_month()) : ?>
         <div class="p-blog-main__head">
            <h1><?php the_time('Y年m月'); ?></h1>
         </div>
      <?php else : ?>
         <div class="p-blog-main__head">
            <h1><?php wp_title(); ?></h1>
         </div>
      <?php endif; ?>

      <div class="p-blog__blogItems">

         <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
               <?php get_template_part('template-parts/loop', 'posts'); ?>
            <?php endwhile; ?>
         <?php endif; ?>
      </div>

      <?php
      $args = array(
         'mid-size' => 1,
         'prev_text' => '<',
         'next_text' => '>',
      ); ?>
      <?php the_posts_pagination($args); ?>
   </main>
   <!-- ▲ l-main ▲ -->

   <!-- ▼ l-aside ▼ -->
   <?php get_sidebar(); ?>
   <!-- ▲ l-aside ▲ -->
</div>

<?php get_footer(); ?>

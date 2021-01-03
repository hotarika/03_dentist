<?php
/*
Template Name: ホーム
*/
?>

<?php get_header(); ?>

<!-- ▼ l-main ▼ -->
<main class="l-main -col1 p-index">
   <!-- img -->
   <div class="l-sec p-index-mainImg">
      <img src="<?= get_template_directory_uri(); ?>/img/dentist-img.jpg" alt="">
      <p>お客さまを第一に考えた歯科医療を提供します</p>
   </div>
   <!-- catch -->
   <section class="l-sec p-index-sec -catch">
      <h1>私たちはお客さまの<span>"歯の健康"</span>を第一に考えます</h1>
      <p>治療前のカウンセリングから、歯の治療、そして治療後のケアまで徹底的にお付き合いさせていただきます。<br>歯について考え抜いた私たちだからこそできる治療を提供させていただきたいのです。</p>
   </section>
   <!-- importance -->
   <section class="l-sec p-index-sec -imp">
      <h1>私たちが<span> 大切 </span>にしていること</h1>
      <div class="p-index-sec__artArea">
         <?php dynamic_sidebar('メリットエリア'); ?>
      </div>
   </section>


   <!-- notify -->
   <section id="notify" class="l-sec p-index-sec -notify">
      <h1>お知らせ</h1>
      <div class="p-index-sec__notifyItems">
         <?php $args = array(
            'post_type' => 'post',
            'category_name' => 'notify',
            'posts_per_page' => 5
         );
         $new_query = new WP_Query($args);
         if ($new_query->have_posts()) :
            while ($new_query->have_posts()) : $new_query->the_post();
         ?>
               <a href="<?php the_permalink(); ?>" class="p-index-sec__notifyLink">
                  <div class="p-index-sec__notifyItem">
                     <time class="p-index-sec__notifyTime" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y年m月d日'); ?></time>
                     <div class="p-index-sec__notifyCat">お知らせ</div>
                     <div class="p-index-sec__notifyMsg"><?php the_title(); ?></div>
                  </div>
               </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
         <?php else : ?>
            <p class="c-notPost">投稿はありません。</p>
         <?php endif; ?>
      </div>
   </section>

   <!-- blog -->
   <section class="l-sec p-index-sec -blog">
      <h1>活動記録</h1>
      <div class="p-index-sec__blogItems">
         <?php
         $args = array(
            'post_type' => 'post',
            'category__not_in' => array(6),
            'posts_per_page' => 3,
         );
         $new_query = new WP_Query($args);
         if ($new_query->have_posts()) :
            while ($new_query->have_posts()) : $new_query->the_post();
         ?>
               <?php get_template_part('template-parts/loop', 'posts'); ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
         <?php else : ?>
            <p class="c-notPost">投稿はありません。</p>
         <?php endif; ?>
      </div>
      <a href="<?php the_permalink(); ?>/category/blog/" class="p-index-sec__blogMore">もっと見る</a>
   </section>

</main>
<!-- ▲ l-main ▲ -->

<?php get_footer(); ?>

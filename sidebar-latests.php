<!-- latest -->
<?php
$args = array(
   'post_type' => 'post', //投稿記事だけを指定
   'posts_per_page' => 5, //最新記事を5件表示
);
$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
?>
   <div class="p-aside-sec -latest">
      <div class="p-aside-sec__headWrap">
         <h2>最新投稿</h2>
      </div>
      <ul class="p-aside-sec__sideLists -latest">
         <?php while ($the_query->have_posts()) :  $the_query->the_post(); ?>
            <li>
               <div>▶︎&nbsp;</div>
               <div>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
               </div>
            </li>
         <?php endwhile; ?>
         <?php wp_reset_postdata(); ?>
      </ul>
   </div>
<?php endif; ?>

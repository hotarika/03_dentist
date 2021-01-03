<div id="post-<?php the_ID(); ?>" class="c-blogCard__blogItem p-index-sec__blogItem">
   <a href="<?php the_permalink(); ?>" class="c-blogCard__blogLink">
      <div class="c-blogCard__blogImgWrap">
         <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(); ?>
         <?php else : ?>
            <img src="<?= get_template_directory_uri(); ?>/img/sample-img.png" alt="">
         <?php endif; ?>
      </div>
      <div class="c-blogCard__blogMsgWrap">
         <time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y年m月d日'); ?></time>
         <p><?php the_title(); ?></p>
      </div>
   </a>
</div>

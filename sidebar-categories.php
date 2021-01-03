      <!-- category -->
      <div class="p-aside-sec -cat">
         <div class="p-aside-sec__headWrap">
            <h2>カテゴリ</h2>
         </div>
         <ul class="p-aside-sec__sideLists -cat">
            <?php
            $args = array(
               'title_li' => '', //見出しを削除
            );
            wp_list_categories($args);
            ?>
         </ul>
      </div>

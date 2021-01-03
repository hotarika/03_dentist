<?php

function mytheme_setup()
{
   // 縦横比を維持したレスポンシブを有効化
   add_theme_support('responsive-embeds');

   // ページのタイトルを有効化
   add_theme_support('title-tag');

   // link、style、scriptのHTML5対応を有効化
   add_theme_support('html5', array(
      'style',
      'script'
   ));

   // アイキャッチ画像を有効化
   add_theme_support('post-thumbnails');

   // メニューのロケーションを登録
   register_nav_menus(array(
      'header_nav' => 'ナビゲーション'
   ));
}
add_action('after_setup_theme', 'mytheme_setup');



// editor-style.css適用
add_action('after_setup_theme', 'my_editor_support');
function my_editor_support()
{
   add_theme_support('editor-styles');
   add_editor_style('editor-style.css');
}


/* *********************************
 * カスタムウィジェット
 * ********************************* */
// ウィジェットエリアを作成する関数がどれなのかを登録する
add_action('widgets_init', 'my_widgets_area');
// ウィジェットエリアを作成する
function my_widgets_area()
{
   register_sidebar(array(
      'name' => 'メリットエリア',
      'id' => 'widget_merit',
   ));
   register_sidebar(array(
      'name' => '右サイドバー',
      'id' => 'my_sidebar',
   ));
   register_sidebar(array(
      'name' => 'スタッフ登録',
      'id' => 'widget_staff',
   ));
}

// ************************************************
// メリットウィジェットの作成（ウィジェット自体の作成する関数がどれなのかを登録する）
// ************************************************
add_action('widgets_init', function () {
   register_widget('my_widgets_item1');
});
// ウィジェット自体を作成する（項目の作成:メリットエリア）
class my_widgets_item1 extends WP_Widget
{
   // 初期化（管理画面で表示するウィジェットの名前を設定する）
   function __construct()
   {
      // parent::WP_Widget(false, $name = 'メリットウィジェット');
      parent::__construct(
         'my_widget', // Base ID
         'メリットウィジェット。', // Name
      );
   }

   // ウィジェットの入力項目を作成する処理
   function form($instance)
   {
      // 入力された情報をサニタイズして変数へ格納
      if (!empty($instance)) {
         $title = esc_attr($instance['title']);
         $body = esc_attr($instance['body']);
      }
?>

      <!-- メリットエリアのHTML -->
      <p>
         <label for="<?= @$this->get_field_id('title'); ?>"><?= 'タイトル:' ?></label>
         <input class="widefat" id="<?= @$this->get_field_id('title'); ?>" name="<?= @$this->get_field_name('title'); ?>" type="text" value="<?= $title; ?>">
      </p>
      <p>
         <label for="<?= @$this->get_field_id('body'); ?>"><?= '内容'; ?></label>
         <textarea class="widefat" rows="16" cols="20" id="<?= $this->get_field_id('body'); ?>" name="<?= @$this->get_field_name('body'); ?>"><?= $body; ?></textarea>
      </p>
      <?php
   }

   // ウィジェットに入力された情報を保存する処理
   function update($new_instance, $old_instance)
   {
      $instance = $old_instance;
      // php,htmlタグを取り除く
      $instance['title'] = strip_tags($new_instance['title']);
      // 先頭と最後尾の空白を取り除く
      $instance['body'] = trim($new_instance['body']);

      return $instance;
   }

   // 管理画面から入力されたウィジェットを画面に表示する処理
   function widget($args, $instance)
   {
      // 配列を変数に展開
      extract($args);

      //ウィジェットから入力された情報を取得
      $title = apply_filters('widget_title', $instance['title']);
      $body = apply_filters('widget_body', $instance['body']);

      // ウィジェットから入力された情報がある場合、htmlを表示する
      if ($title) {
      ?>
         <article <?php post_class('p-index-sec__impArt'); ?>>
            <h2><?= $title; ?></h2>
            <div class="p-index-sec__impArtPara">
               <?= $body; ?>
         </article>
<?php
      }
   }
}

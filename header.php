<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="<?= get_stylesheet_uri(); ?>">
   <script src="https://kit.fontawesome.com/30b5c0ced2.js" crossorigin="anonymous"></script>
   <title><?php bloginfo('name'); ?> | <?php the_title(); ?></title>
   <?php wp_head();
   ?>
</head>

<body <?php body_class('l-body') ?>>
   <?php wp_body_open(); ?>

   <!-- ▼ l-header ▼ -->
   <header class="l-header">
      <div class="p-header__wrap">
         <h1 class="p-header__title"><a href="<?= esc_url(home_url('/')); ?>">マルイ歯科</a></h1>

         <!-- ▼ l-nav ▼ -->
         <?php if (has_nav_menu('header_nav')) : ?>
            <?php
            $args = array(
               'theme_location' => 'header_nav',
               'container' => 'nav',
               'container_class' => 'l-nav',
               'menu_class' => 'p-nav__lists',
            ); ?>
            <?php wp_nav_menu($args); ?>
         <?php endif; ?>
         <!-- ▲ l-nav ▲ -->

      </div>
   </header>
   <!-- ▲ l-header ▲ -->

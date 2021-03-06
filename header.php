<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <?php echo get_template_part('blocks/debag-grid'); ?>
   <div class="popup-menu-mobile">
      <nav>
         <?php
         $args = array(
            'theme_location' => 'mobile'
         );
         wp_nav_menu($args);
         ?>
      </nav>
      <div class="popup-menu-mobile__contact">
         <a href="https://www.instagram.com/architect.digital" class="insta">instagram</a>
         <a href="https://www.facebook.com/thearchitectdigital" class="facebook">facebook</a>
         <a href="mailto:hello@thearchitect.digital" class="mail">mail</a>
         <a href="tel:+79220010050" class="phone">+7 922 001 00 50</a>
      </div>

   </div>
   <header class="header">
      <?php echo get_template_part('blocks/header-block'); ?>
   </header>
<?php
/*
Template Name: Страница проектов
Template Post Type: page
*/
?>

<?php get_header(); ?>
<section class="page-content">
   <div class="wrapper">
      <div class="row">
         <div class="page-title">
            <h1 class="font-super-gigant"><?php the_title() ?></h1>
            <div class="fillter">
            <?php
            $terms_product_cat = get_terms(array(
               'post_type' => 'product',
               'hide_empty' => true,
               'orderby' => 'id',
               'taxonomy' => 'category'
            ));
            if (!empty($terms_product_cat)) {
            ?>
               <?php foreach ($terms_product_cat as $key => $product_cat) { ?>
                  <a class="fillter__item <?php if ($key == 0) echo 'fillter__item-active'; ?>" href="#<?php echo $product_cat->slug; ?>" data-tab="<?php echo $product_cat->slug; ?>"><?php echo $product_cat->name; ?></a>
               <?php } ?>


         </div>
         </div>
      </div>
   </div>
</section>
<section>

   <div class="">
      <?php foreach ($terms_product_cat as $key => $product_cat) { ?>

         <div class="project_content_tab projects <?php if ($key == 0) echo 'project_content_tab-active'; ?>" id="<?php echo $product_cat->slug; ?>" data-tab="<?php echo $product_cat->slug; ?>">
            <?php
                  $mypost = array('post_type' => 'project', 'numberposts' => -1, 'category' => $product_cat->term_id);
                  $products = get_posts($mypost);
            ?>
            <?php foreach ($products as $post) {
                     setup_postdata($post);
                     $url = get_field('kartinka');
                     $category = get_the_category();
                     $darktext = get_field('dark-text');
                     $darkclass = '';
                     if ($darktext){
                        $darkclass = 'project-item_corlordark';
                     }

            ?>
               <div class="project-item <?php echo $darkclass?> " style="background-image:url(<?php echo $url ?>)">                  

                  <a href="<?php the_permalink() ?>"></a>
                  <div class="project-item__content">
                     <div>
                        <div class="project-item__title">
                           <?php the_field('zagolovok') ?>
                        </div>
                        <div class="project-item__client">
                        <?php the_field('klient') ?>
                        </div>
                     </div>
                     <div class="">
                        <div class="project-item__factoid">
                           <h3><?php the_field('czifra_dlya_faktoida') ?></h3>
                           <p><?php the_field('tekst_dlya_faktoida') ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            <?php }
                  wp_reset_postdata(); ?>
         </div>
      <?php } ?>
   </div>
<?php } ?>
</div>
</div>
</section>


<div class="site-content page">
   <?php the_post();
   the_content(); ?>
</div>
<?php get_footer(); ?>
<?php
    $args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 4, 'orderby' =>'date','order' => 'DESC' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            
            <div class="a-product">   
              
              <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                
                  <?php if ( has_post_thumbnail() ) {
                  $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'product-image' );
                  echo '<img width="100%" src="' . $image_src[0] . '">';} ?>

                  <h2><?php the_title(); ?></h2>

                  <span class="price"><?php echo $product->get_price_html(); ?></span>

              </a>

                <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
          
            </div>

<?php endwhile; ?>
<?php wp_reset_query(); ?>

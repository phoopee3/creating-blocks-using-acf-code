<?php 
$images = get_field( 'slider_gallery' );
$use_lightbox = get_field( 'use_lightbox' );
if( $images ): ?>
    <ul class="slider-gallery">
        <?php foreach( $images as $image ): ?>
            <li class="centered">
                <?php if ( $use_lightbox ) { ?><a href="<?php echo esc_url($image['url']); ?>"><?php } ?>
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php if ( $use_lightbox ) { ?></a><?php } ?>
                <p><?php echo esc_html($image['caption']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
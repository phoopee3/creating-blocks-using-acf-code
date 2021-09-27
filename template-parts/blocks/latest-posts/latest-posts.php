<?php
$acf_fields = get_fields();
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$latest_posts_args = [
    'post_type' => 'post',
];
if ( $acf_fields['number_of_posts_to_show'] ) {
    $latest_posts_args['posts_per_page'] = $acf_fields['number_of_posts_to_show'];
}
if ( $acf_fields['post_category'] ) {
    $latest_posts_args['category__in'] = $acf_fields['post_category'];
}
$latest_posts = new WP_Query( $latest_posts_args );
?>
<div class="latest-posts-wrapper <?php echo $align_class; ?>">
    <div class="latest-posts-text">
        <div class="latest-posts-title">
            <?php echo $acf_fields['title']; ?>
        </div>
        <?php if ( !empty( $acf_fields['subtitle'] ) ) { ?>
            <div class="latest-posts-subtitle">
                <?php echo $acf_fields['subtitle']; ?>
            </div>
        <?php } ?>
        <?php if ( !empty( $acf_fields['content'] ) ) { ?>
            <div class="latest-posts-content">
                <?php echo $acf_fields['content']; ?>
            </div>
        <?php } ?>
        <?php if ( !empty( $acf_fields['button_text'] ) ) { ?>
            <div class="latest-posts-button">
                <a href="<?php echo $acf_fields['button_link']; ?>">
                    <?php echo $acf_fields['button_text']; ?>
                </a>
            </div>
        <?php } ?>
    </div>
    <?php if ( !empty( $acf_fields['image'] ) ) { ?>
        <div class="latest-posts-image" style="background-image:url(<?php echo $acf_fields['image']; ?>);"></div>
    <?php } ?>
</div>
<?php if ( $latest_posts->have_posts() ) { ?>
    <div class="latest-posts-list <?php echo $align_class; ?>">
        <?php while ( $latest_posts->have_posts() ) {
            $latest_posts->the_post();
            ?>
            <div class="latest-post">
                <div class="latest-post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
                <div class="latest-post-content"><?php the_excerpt(); ?></div>
            </div>
        <?php } ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php } ?>
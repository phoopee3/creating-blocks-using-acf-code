<?php
$acf_fields = get_fields();
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>
<div class="split-image-wrapper <?php echo $align_class; ?>">
    <div class="split-image-text">
        <div class="split-image-title">
            <?php echo $acf_fields['title']; ?>
        </div>
        <?php if ( isset( $acf_fields['subtitle'] ) ) { ?>
            <div class="split-image-subtitle">
                <?php echo $acf_fields['subtitle']; ?>
            </div>
        <?php } ?>
        <?php if ( isset( $acf_fields['content'] ) ) { ?>
            <div class="split-image-content">
                <?php echo $acf_fields['content']; ?>
            </div>
        <?php } ?>
        <?php if ( isset( $acf_fields['button_text'] ) ) { ?>
            <div class="split-image-button">
                <a href="<?php echo $acf_fields['button_link']; ?>">
                    <?php echo $acf_fields['button_text']; ?>
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="split-image-image" style="background-image:url(<?php echo $acf_fields['image']; ?>);"></div>
</div>
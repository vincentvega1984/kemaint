<?php $productDinamicAttributes = ['aroma_notes', 'packaging', 'aroma_percent', 'certificate', 'piramide']; ?>

<div class="product-page__characteristics">
    <?php if (get_theme_mod('attribute_storage_value', false)) : ?>
        <div class="product-page__storage-conditions">
            <strong><?php echo get_theme_mod('attribute_storage_label'); ?></strong>
            <p><?php echo get_theme_mod('attribute_storage_value'); ?></p>
        </div>
    <?php endif; ?>
    <?php foreach ($productDinamicAttributes as $attribute) {
        $field = get_field_object($attribute);
        if (get_field($attribute)): ?>
            <div class="product-page__characteristics__row">
                <div class="product-page__characteristics__row-label">
                    <?php echo $field['label']; ?>
                </div>
                <div class="product-page__characteristics__row-value">
                    <?php echo $field['value']; ?>
                </div>
            </div>
        <?php endif;
    } ?>
</div>
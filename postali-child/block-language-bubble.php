<?php
/*
    Block: Language Bubble Slider
*/
?>
 
<?php if( have_rows('languages', 'option') ) : ?>
<div class="translate-btn">            
    <div class="translate-bubble">
        <div class="language-slide">
            <?php while( have_rows( 'languages', 'option' ) ) : 
                the_row();
                $label = get_sub_field('label');
                ?>
                <p class="language-intro"><?php echo $label; ?></p>
            <?php endwhile; ?>
        </div>
        <div class="language-slide">
            <?php while( have_rows( 'languages', 'option' ) ) : 
                the_row();
                $language = get_sub_field('language');?>
                <p class="language"><?php echo $language;?></p>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>
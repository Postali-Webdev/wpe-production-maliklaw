<!-- Pre-Footer Block --> 
<?php 
$title = get_field('prefooter_title');
$content = get_field('prefooter_content');
$global_title = get_field('global_pf_title', 'options');
$global_content = get_field('global_pf_content', 'options');
?>
<section class="pre-footer">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div>
                    <div class="spacer-15"></div>
                    <?php if ( !empty($title) ) { ?>
                        <h2><?php echo $title; ?></h2>
                    <?php } else { ?>
                        <h2><?php echo $global_title; ?></h2>
                    <?php } ?>
                    
                    <?php if ( !empty($content) ) { ?>
                        <?php echo $content; ?>
                    <?php } else { ?>
                        <?php echo $global_content; ?>
                    <?php } ?>
                    <span class="spacer-30"></span>
                    <p class="centered">Contact American Immigration Law Group Today</p>
                    <span class="spacer-15"></span>
                    <a class="btn" href="tel:<?php the_field('phone', 'options'); ?>" title="Call American Immigration Law Group"><?php the_field('phone', 'options'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
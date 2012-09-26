<?php head(array('bodyid'=>'home')); ?>

<div id="primary">

    <?php if (get_theme_option('Homepage Text')): ?>
    <p><?php echo get_theme_option('Homepage Text'); ?></p>
    <?php endif; ?>
	
	<div id="image-show"><img src="themes/gerould-tribute/images/index-image.png"></div>
	
	<div id="large-text-intro">
	<span class="name-color">Daniel Charles Gerould</span> (March 28, 1928 - February 13, 2012) was a scholar, teacher, translator, editor, and playwright. Gerould was a specialist in United States melodrama, Central and Eastern European theatre of the 20th century, and fin-de-siècle European avant-garde performance.		
	</div>
	<div id="small-text-intro">

		<div id="small-text-intro-right">
		Sed dictum dolor ac magna eleifend varius. Sed sit amet nulla purus. Proin in fringilla magna. Praesent a tortor eget lorem placerat adipiscing. Vivamus vel felis erat. Sed dolor nisi, pretium a pellentesque vel, facilisis et lacus. Suspendisse venenatis porta volutpat. Phasellus rhoncus tristique nulla, sed fringilla mi volutpat nec. Sed ornare placerat dapibus. Vestibulum urna augue, vulputate at mollis id, lacinia ut nisi. Nunc facilisis scelerisque malesuada.	
		</div>
		
		<div id="small-text-intro-left">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra tristique elementum. Nam aliquam laoreet erat, quis varius diam feugiat in. Nulla facilisi. Proin in tortor nulla. Vestibulum lobortis nunc vitae elit condimentum dictum. Integer pretium elit sit amet magna ullamcorper eu tristique est lacinia. Nam pulvinar iaculis euismod. Cras ut ante mi, sollicitudin tempus risus. 		
		</div>
		
		<div style="clear:both"></div>

	</div>

    <?php if (get_theme_option('Display Featured Item') !== '0'): ?>
    <!-- Featured Item -->
    <div id="featured-item">
        <?php echo gerould_display_random_featured_item(); ?>
    </div><!--end featured-item-->
    <?php endif; ?>

    <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
    <!-- Featured Collection -->
    <div id="featured-collection">
        <?php echo gerould_display_random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>

    <?php if ((get_theme_option('Display Featured Exhibit') !== '0')
            && plugin_is_active('ExhibitBuilder')
            && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    <?php endif; ?>

</div><!-- end primary -->

<div id="secondary">

    <div id="recent-items">
        <h2><?php echo __('Recently Added Items'); ?></h2>

        <?php
        $homepageRecentItems = (int)get_theme_option('Homepage Recent Items') ? get_theme_option('Homepage Recent Items') : '4';
        set_items_for_loop(recent_items($homepageRecentItems));
        if (has_items_for_loop()):
        ?>

        <div class="items-list">
            <?php while (loop_items()): ?>
            <div class="item">

                <h3><?php echo link_to_item(); ?></h3>

                <?php if(item_has_thumbnail()): ?>
                <div class="item-img">
                    <?php echo link_to_item(item_square_thumbnail()); ?>
                </div>
	                <?php if($desc = item('Dublin Core', 'Description', array('snippet'=>150))): ?>

	                <div class="item-image-description"><?php echo $desc; ?><?php echo link_to_item('see more',(array('class'=>'show'))) ?></div>

	                <?php endif; ?>
                <?php elseif($desc = item('Dublin Core', 'Description', array('snippet'=>150))): ?>

                <div class="item-description"><?php echo $desc; ?><?php echo link_to_item('see more',(array('class'=>'show'))) ?></div>

                <?php endif; ?>


            </div>
            <?php endwhile; ?>
        </div>

        <?php else: ?>

        <p><?php echo __('No recent items available.'); ?></p>

        <?php endif; ?>

        <p class="view-items-link"><a href="<?php echo html_escape(uri('items')); ?>"><?php echo __('View All Items'); ?></a></p>

    </div><!--end recent-items -->

</div><!-- end secondary -->

<?php foot(); ?>

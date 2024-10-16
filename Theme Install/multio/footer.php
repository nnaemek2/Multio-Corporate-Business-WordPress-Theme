<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Multio
 */
$back_totop_on = multio_get_opt('back_totop_on', true); ?>

			</div><!-- #content inner -->
		</div><!-- #content -->
	</div><!-- #page -->
	<?php multio_footer(); ?>
	
	<?php multio_popup_search(); ?>
	
	<?php multio_hidden_sidebar(); ?>

	<?php if (isset($back_totop_on) && $back_totop_on) : ?>
	    <a href="#" class="ct-scroll-top">
	    	<i class="ti-angle-up"></i>
	    </a>
	<?php endif; ?>

	<?php wp_footer(); ?>
	
	</body>
</html>

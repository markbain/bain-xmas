<div class="purchase-options">
	<span id="buy-toggle" class="meta-label">Buy this book!</span>
	<div class="purchase-options-menu">
		

		<?php if( have_rows('purchase_options') ): ?>

			<nav class="nav-collapse hidden-purchase-options">
				
				<ul>

				<?php while( have_rows('purchase_options') ): the_row(); 

					// vars
					// $image = get_sub_field('image');
					$name = get_sub_field('retailer_name');
					$link = get_sub_field('retailer_link');

					?>

					<li>

						<?php if( $link ): ?>
							<a href="<?php echo $link; ?>">
						<?php endif; ?>

						<?php echo $name; ?>

						<?php if( $link ): ?>
							</a>
						<?php endif; ?>

						 

					</li>

				<?php endwhile; ?>

				</ul>
			</nav>
			<?php
				else: 
?>
<nav class="nav-collapse hidden-purchase-options"><ul><li><a href="">Sorry, nobody selling! Why not sign up to my mailing list?</a></li></ul></nav>
		<?php endif; ?>
	</div>
</div>

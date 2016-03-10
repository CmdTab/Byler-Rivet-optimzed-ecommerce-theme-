<?php if( have_rows('flexible_section') ): ?>
	<?php while ( have_rows('flexible_section') ) : the_row(); ?>
	<section class="flexible-section group">
		<?php if( get_row_layout() == 'half_and_half' ): ?>
		<div class="half first">
			<?php the_sub_field('first_half'); ?>
		</div>
		<div class="half">
			<?php the_sub_field('second_half'); ?>
		</div>
		<?php elseif( get_row_layout() == 'third_and_two_third' ): ?>
		<div class="third first">
			<?php the_sub_field('third'); ?>
		</div>
		<div class="two-third">
			<?php the_sub_field('two_third'); ?>
		</div>
		<?php elseif( get_row_layout() == 'two_third_and_third' ): ?>
		<div class="two-third first">
			<?php the_sub_field('two_third2'); ?>
		</div>
		<div class="third">
			<?php the_sub_field('third2'); ?>
		</div>
		<?php elseif( get_row_layout() == 'full_width' ): ?>
			<?php the_sub_field('full_section'); ?>
		<?php elseif( get_row_layout() == 'three_column_list' ): ?>
		<ul class="three-list group">
			<?php while ( have_rows('item') ) : the_row(); ?>
			<li>
				<?php the_sub_field('item_content'); ?>
			</li>
			<?php endwhile; ?>
		</ul>
		<?php elseif( get_row_layout() == 'divider' ): ?>
			<hr />
		<?php endif; ?>
	</section>
	<?php endwhile; ?>
<?php endif; ?>
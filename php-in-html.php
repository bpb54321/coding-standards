<?php
	// Example formatting for PHP/HTML Templates.
  // Use WordPress coding standards: https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/
  // Use tabs, not spaces.
  // Use lots of space around things: https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/#space-usage
?>

<?php 
	/*
	* Order of classes:
	* BEM element and modifiers, BEM block and modifiers, Bootstrap layout/grid classes, state/javascript classes.
	*/
?>
<div class="mission__list-box mission__list-box--right list-box list-box--dark col-xl-5 js-hidden">
</div>

<?php // PHP comments can be on one line. ?>
<?php
	// Or they can be as part of a multi-line PHP block.
	// Indent with respect to opening and closing PHP tags.
?>

<?php 
	/*
	 * In templates, favor using <?php echo $variable; ?> statements to insert data values, rather than using PHP
	 * double-quoted strings with interpolated variables.
	 * Use indentation to designate code folding regions (works well in Visual Studio Code).
	 */
?>

<?php
	// Get all ACF data before you insert it into the HTML.
	$page_content = get_field('page_content');
?>

<?php
	// Always indent for a child HTML element or for a PHP code block.
	// Indent the amount of tabs necesssary so that that sibling HTML elements line up on the same column.
	// See example below.
?>

<div class="container flexible-content">
	<?php foreach ( $page_content as $layout ) : ?>
		<div class="row">
			<?php if ( $layout['acf_fc_layout'] === 'heading' ) : ?>
						<?php // This h2 is indented by three tabs relative to the above line, so that the HTML lines up with its sibling elements in the other "if" blocks. ?>
						<h2 class='col-12'><?php echo $layout['heading']; ?></h2>
			<?php elseif ( $layout['acf_fc_layout'] === '1_column_layout' ) : ?>
				<?php if ( $layout['content_type'] === 'image' ) : ?>
						<?php
							$image_id = $layout['image'];
							$image = mld_get_image( $image_id, false );
							// This img is indented by two tabs relative to the above line, so that the HTML lines up with its sibling elements in the other "if" blocks.
						?>
						<img class="" src="<?php echo $image['src']; ?>"" alt="<?php echo $image['alt']; ?>"" srcset="<?php echo $image['srcset']; ?>" sizes="100vw">
				<?php elseif ( $layout['content_type'] === 'text' ) : ?>
					<?php foreach ( $layout['columns'] as $column ) : ?>
						<div class='flexible-content__text'><?php echo $column['text']; ?></div>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
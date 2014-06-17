<?php
/**
 * Sharing Links Output View.
 *
 * @package Async_Social_Sharing
 * @author  Rachel Baker <rachel@rachelbaker.me>
 */
global $post;
$options = $this->get_options();
?>
<div class="async-wrapper">
	<?php if ( isset( $options['facebook'] ) ) : ?>
		<div id="fb-root"></div>
	<?php endif; ?>
	<ul class="async-list">
		<?php if ( isset( $options['twitter'] ) ) : ?>
			<li class="twitter-share">
				<a href="<?php echo esc_url( 'https://twitter.com/share' ); ?>" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a>
			</li>
		<?php endif; ?>
		<?php if ( isset( $options['facebook'] ) ) : ?>
			<li class="fb-share">
				<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="verdana"></div>
			</li>
		<?php endif; ?>
		<?php if ( isset( $options['gplus'] ) ) : ?>
			<li class="gplus-share">
				<div class="g-plus" data-action="share" data-annotation="bubble" data-height="21" data-href="<?php the_permalink(); ?>"></div>
			</li>
		<?php endif; ?>
		<?php if ( isset( $options['linkedin'] ) ) : ?>
			<li class="linkedin-share">
				<script type="IN/Share" data-url="<?php the_permalink(); ?>"></script>
			</li>
		<?php endif; ?>
		<?php if ( isset( $options['hackernews'] ) ) : ?>
			<li class="hn-share">
				<a href="<?php echo esc_url( 'http://news.ycombinator.com/submit' ); ?>" class="hn-share-button" data-url="<?php the_permalink(); ?>">Vote on HN</a>
			</li>
		<?php endif; ?>
	</ul>
</div>
<?php
/**
 * Async Social Sharing Plugin Admin View.
 *
 * @package Async_Social_Sharing
 * @author  Rachel Baker <rachel@rachelbaker.me>
 */
?>
<div class="row-fluid">
	<div class="page-header">
		<img class="pull-left" src="<?php echo esc_url ( ASYNC_SOCIAL_SHARING_PLUGIN_URL . '/assets/images/async-icon.png' ); ?>" />

		<h2><?php _e( 'Async Social Sharing Options' ); ?></h2>

		<p class="lead">Loading JavaScript asynchronously is critical for reducing page load and increasing website performance.</p>
	</div>

	<img src="<?php echo esc_url ( ASYNC_SOCIAL_SHARING_PLUGIN_URL . '/assets/images/async-social-example.png' ); ?>" />

	<h3>Social Sharing Widget Options</h3>
	<br />
	<h5>Select which social widgets you would like to display on your posts.</h5>
	<br />

	<form class="form-horizontal" role="form" method="post" action="options.php">
		<?php settings_fields( 'async_share_plugin_options' ); ?>
		<?php $options = get_option( 'async_share_options' ); ?>

			<div class="checkbox">
				<label><input name="async_share_options[twitter]" type="checkbox" value="true"  <?php if ( isset( $options['twitter'] ) ) {
						checked( 'true', $options['twitter'] );
					} ?> /> Twitter </label><br />
			</div>

			<div class="checkbox">
				<label><input name="async_share_options[facebook]" type="checkbox" value="true"  <?php if ( isset( $options['facebook'] ) ) {
						checked( 'true', $options['facebook'] );
					} ?> /> Facebook </label><br />
			</div>

			<div class="checkbox">
				<label><input name="async_share_options[gplus]" type="checkbox" value="true" <?php if ( isset( $options['gplus'] ) ) {
						checked( 'true', $options['gplus'] );
					} ?> /> Google Plus </label><br />
			</div>

			<div class="checkbox">
				<label><input name="async_share_options[linkedin]" type="checkbox" value="true" <?php if ( isset( $options['linkedin'] ) ) {
						checked( 'true', $options['linkedin'] );
					} ?> /> Linkedin </label><br />
			</div>

			<div class="checkbox">
				<label><input name="async_share_options[hackernews]" type="checkbox" value="true" <?php if ( isset( $options['hackernews'] ) ) {
						checked( 'true', $options['hackernews'] );
					} ?> /> HackerNews </label>
			</div>

			<h3>Display Options</h3>

			<p class="help-block">Display sharing widgets above or below the content?</p>

			<div class="radio">
				<label><input name="async_share_options[position]" type="radio" value="above" <?php if ( isset( $options['position'] ) ) {
						checked( 'above', $options['position'] );
					} ?> /> Display above content </label>
				<input name="async_share_options[position]" type="radio" value="below" <?php if ( isset( $options['position'] ) ) {
					checked( 'below', $options['position'] );
				} ?> /> Display below content </label>
			</div>


			<p class="help-block">Display the sharing widgets with the posts on blog and archive pages (not just on the single post)</p>

			<div class="checkbox">
				<label><input name="async_share_options[paged]" type="checkbox" value="true" <?php if ( isset( $options['paged'] ) ) {
						checked( 'true', $options['paged'] );
					} ?> /> Yes </label>
			</div>

			<p class="help-block">Disable loading the included CSS styles</p>

			<div class="checkbox">
				<label><input name="async_share_options[disable_css]" type="checkbox" value="true" <?php if ( isset( $options['disable_css'] ) ) {
						checked( 'true', $options['disable_css'] );
					} ?> /> Yes </label>
			</div>


			<p class="help-block">Where would you like to display the sharing widgets?</p>
			<select name="async_share_options[types][]" size=5 multiple="multiple">
				<?php
				$types_args = array(
					'_builtin' => false
				);

				$post_types = get_post_types( $types_args, 'names' );
				$post_types[] = 'post';
				$post_types[] = 'page';

				foreach ( $post_types as $post_type ) {
					if ( isset( $options['types'] ) && is_array( $options['types'] ) && in_array( $post_type, $options['types'] ) ) {
						echo "\n\t<option selected='selected' value='" . esc_attr( $post_type ) . "'>  " . esc_attr( $post_type ) . "</option>";
					}
					else
						echo "\n\t<option value='" . esc_attr( $post_type ) . "'>" . esc_attr( $post_type ) . "</option>";
				} ?>
			</select>

			<p class="description"><?php _e( 'To select multiple post types hold down the Ctrl (Windows) or Command (OSX) key while selecting' ); ?></p>

			<input type="submit" class="button" value="<?php _e( 'Save Changes' ) ?>" />

	</form>
	<hr />
	<h4>Credits:</h4>
	<cite>Developed by <a href="<?php echo esc_url( 'http://rachelbaker.me' ); ?>">Rachel Baker</a>, inspired by
		<a href="<?php echo esc_url( 'http://www.phpied.com/social-button-bffs/' ); ?>">Stoyan Stefanov's Social Button BFFs</a> blog post</cite>
</div>


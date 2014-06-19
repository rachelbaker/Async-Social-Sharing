<?php
/**
 * Async Social Sharing Plugin Admin View.
 *
 * @package  Async_Social_Sharing
 * @author   Rachel Baker <rachel@rachelbaker.me>
 */
?>
<div class="row-fluid">
	<div class="page-header">

		<h2><?php _e( 'Async Social Sharing Options' ); ?></h2>

		<p class="lead"><?php _e( 'Loading JavaScript asynchronously is critical for reducing page load and increasing website performance.' ); ?></p>
	</div>

	<img src="<?php echo esc_url( ASYNC_SOCIAL_SHARING_PLUGIN_URL . '/assets/images/async-social-example.png' ); ?>" />


	<form class="form-horizontal" role="form" method="post" action="options.php">
		<?php settings_fields( 'async_share_plugin_options' ); ?>
		<?php $options = get_option( 'async_share_options' ); ?>

		<h3>Social Sharing Widgets</h3>

		<p class="" help-block"><?php _e( 'Select which social network sharing widgets to display.' ); ?></p>
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
		<br />

		<h3>Location</h3>

		<p class="help-block"><?php _e( 'What position would you prefer to display the selected social sharing widgets?' ); ?></p>
		<div class="radio">
			<label><input name="async_share_options[position]" type="radio" value="above" <?php if ( isset( $options['position'] ) ) {
					checked( 'above', $options['position'] );
				} ?> /> <?php _e( 'Before the content' ); ?> </label><br />
			<input name="async_share_options[position]" type="radio" value="below" <?php if ( isset( $options['position'] ) ) {
				checked( 'below', $options['position'] );
			} ?> /> <?php _e( 'After the content' ); ?> </label>
		</div>
		<br />

		<p class="help-block"><?php _e( 'Which post types should display the selected social sharing widgets?' ); ?></p>
		<select name="async_share_options[types][]" size=5 multiple="multiple">
			<?php
			$types_args = array(
				'_builtin' => false
			);

			$post_types   = get_post_types( $types_args, 'names' );
			$post_types[] = 'post';
			$post_types[] = 'page';

			foreach ( $post_types as $post_type ) {
				if ( isset( $options['types'] ) && is_array( $options['types'] ) && in_array( $post_type, $options['types'] ) ) {
					echo "\n\t<option selected='selected' value='" . esc_attr( $post_type ) . "'>  " . esc_attr( $post_type ) . "</option>";
				} else {
					echo "\n\t<option value='" . esc_attr( $post_type ) . "'>" . esc_attr( $post_type ) . "</option>";
				}
			} ?>
		</select>
		<p class="description"><?php _e( 'To select multiple post types hold down the Ctrl (Windows) or Command (OSX) key while selecting' ); ?></p>
		<br />

		<p class="help-block"><?php _e( 'Would you like to display the selected social sharing widgets on blog and archive templates (not just the single templates)?' ); ?></p>
		<div class="checkbox">
			<label><input name="async_share_options[paged]" type="checkbox" value="true" <?php if ( isset( $options['paged'] ) ) {
					checked( 'true', $options['paged'] );
				} ?> /> <?php _e( 'Yes' ); ?> </label>
		</div>
		<br />

		<h3>Style</h3>

		<p class="help-block"><?php _e( 'Would you like to disable the included CSS styles?' ); ?></p>
		<div class="checkbox">
			<label><input name="async_share_options[disable_css]" type="checkbox" value="true" <?php if ( isset( $options['disable_css'] ) ) {
					checked( 'true', $options['disable_css'] );
				} ?> /> Yes </label>
		</div>
		<br />

		<p class="submit">
			<input type="submit" class="button button-primary" value="<?php _e( 'Save Changes' ) ?>" />
		</p>

	</form>
	<hr />

	<h4>Credits:</h4>
	<cite>Developed by <a href="<?php echo esc_url( 'http://rachelbaker.me' ); ?>">Rachel Baker</a>, inspired by
		<a href="<?php echo esc_url( 'http://www.phpied.com/social-button-bffs/' ); ?>">Stoyan Stefanov's Social Button BFFs</a> blog post</cite>

</div>

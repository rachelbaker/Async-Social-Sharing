<?php
/**
 * Async Social Sharing Plugin Admin View.
 *
 * @package Async_Social_Sharing
 * @author  Rachel Baker <rachel@rachelbaker.me>
 */
?>
	<div class="wrap">
		<div class="page-header">
			<img class="pull-left" src="<?php echo ASYNC_SOCIAL_SHARING_PLUGIN_URL . '/assets/images/async-icon.png'; ?>" />

			<h2>Async Social Sharing Options</h2>

			<p class="lead">Loading JavaScript asynchronously is critical for reducing page load and increasing website performance.</p>
		</div>

		<img src="<?php echo ASYNC_SOCIAL_SHARING_PLUGIN_URL . '/assets/images/async-social-example.png'; ?>" />

		<h3>Social Sharing Widget Options</h3>
		<br />
		<h5>Select which social widgets you would like to display on your posts.</h5>
		<br />

		<form method="post" action="options.php" class="form-horizontal">
			<?php settings_fields( 'async_share_plugin_options' ); ?>
			<?php $options = get_option( 'async_share_options' ); ?>
			<fieldset>
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

				<p class="help-block">Display the sharing widgets under the posts on blog and archive pages (not just on the single post)</p>

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
							echo "\n\t<option selected='selected' value='" . esc_attr( $post_type ) . "'>  " . $post_type . "</option>";
						}
						else
							echo "\n\t<option value='" . esc_attr( $post_type ) . "'>" . $post_type . "</option>";
					} ?>
				</select>

				<p class="description">To select multiple post types hold down the Ctrl (Windows) or Command (OSX) key while selecting</p>

				<p class="submit">
					<input type="submit" class="btn btn-primary" value="<?php _e( 'Save Changes' ) ?>" />
				</p>

			</fieldset>
		</form>
		<div class="clearfix"></div>
		<hr />
		<h4>Credits:</h4>
		<cite>Developed by <a href="http://www.rachelbaker.me">Rachel Baker</a>, inspired by
			<a href="http://www.phpied.com/social-button-bffs/">Stoyan Stefanov's Social Button BFFs</a> blog post</cite>


		<div class="clearfix"></div>
	</div>
<?php

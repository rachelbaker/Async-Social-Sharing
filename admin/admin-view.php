<?php ?>
<div id= "admin-wrap">
    <div class="row">
        <!-- Display Plugin Icon, Header, and Description -->
        <div class="span12">	<img class="left" src="<?php echo plugins_url( 'images/async-icon.png', __FILE__ );?>"/>
            <h1>Async Social Sharing Options</h1><br />
            <p class="lead">Loading JavaScript asynchronously is critical for reducing page load and increasing website performance.</p></div><!--/.span12 -->
        </div><!--/.row -->
        <hr />
        <div class="row">
            <div class="span12">
                <img src="<?php echo plugins_url( 'images/async-social-example.png', __FILE__ );?>"/>
                <h3>Social Sharing Widget Options</h3>
                <br />
                <h5>Select which social widgets you would like to display on your posts.</h5>
                <br />
            </div><!--/.span12 -->
        </div><!--/.row -->
        <div class="row">
            <div class="span12">
                <!-- Beginning of the Plugin Options Form -->
                <form method="post" action="options.php" class="form-horizontal">
                    <?php settings_fields( 'async_share_plugin_options' ); ?>
                    <?php $options = get_option( 'async_share_options' ); ?>
                    <fieldset>
                        <div class="control-group">
                        <!-- First checkbox button -->
                        <label><input name="async_share_options[twitter]" type="checkbox" value="true"  <?php if ( isset( $options['twitter'] ) ) { checked( 'true', $options['twitter'] ); } ?> /> Twitter </label><br />
</div><!--/.control-group --><div class="control-group">

                        <label><input name="async_share_options[facebook]" type="checkbox" value="true"  <?php if ( isset( $options['facebook'] ) ) { checked( 'true', $options['facebook'] ); } ?> /> Facebook </label><br />
</div><!--/.control-group --><div class="control-group">

                        <label><input name="async_share_options[gplus]" type="checkbox" value="true" <?php if ( isset( $options['gplus'] ) ) { checked( 'true', $options['gplus'] ); } ?> /> Google Plus </label><br />
</div><!--/.control-group -->
<div class="control-group">

                        <label><input name="async_share_options[linkedin]" type="checkbox" value="true" <?php if ( isset( $options['linkedin'] ) ) { checked( 'true', $options['linkedin'] ); } ?> /> Linkedin </label><br />
</div><!--/.control-group --><div class="control-group">

                        <label><input name="async_share_options[hackernews]" type="checkbox" value="true" <?php if ( isset( $options['hackernews'] ) ) { checked( 'true', $options['hackernews'] ); } ?> /> HackerNews </label>
</div><!--/.control-group -->
<h3>Display Options</h3>
<div class="control-group">
<p class="help-block">Display the sharing widgets under the posts on blog and archive pages (not just on the single post)</p>
<label><input name="async_share_options[paged]" type="checkbox" value="true" <?php if ( isset( $options['paged'] ) ) { checked( 'true', $options['paged'] ); } ?> /> Yes </label>
<p class="help-block">Disable loading the included CSS styles</p>
<label><input name="async_share_options[disable_css]" type="checkbox" value="true" <?php if ( isset( $options['disable_css'] ) ) { checked( 'true', $options['disable_css'] ); } ?> /> Yes </label>
</div><!--/.control-group -->
<div class="control-group">
    <p class="help-block">Where would you like to display the sharing widgets?</p>
    <SELECT NAME="async_share_options[types][]" SIZE=3 multiple="multiple" >
        <?php $post_types = async_share_post_types_options();
            foreach ($post_types as $post_type) {
            if ( is_array($options['types'] ) && in_array( $post_type, $options['types'] ) ) {
            echo "\n\t<option selected='selected' value='" . esc_attr( $post_type ) . "'>  ".$post_type."</option>";
            } else
                echo "\n\t<option value='" . esc_attr( $post_type ) . "'>".$post_type."</option>";
            } ?>
          </select>
              </div><!--/.control-group -->
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ) ?>" />
            </p>

        </fieldset>
        </form>
    </div></div>
    <div class="row">
        <div class="span12">
            <hr />
            <h4>Credits:</h4>
            <cite>Developed by <a href="http://www.rachelbaker.me">Rachel Baker</a>, inspired by <a href="http://www.phpied.com/social-button-bffs/">Stoyan Stefanov's Social Button BFFs</a> blog post</cite>
        </p></div></div>

    </div>
    <?php

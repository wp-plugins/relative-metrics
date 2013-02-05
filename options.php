<div class="wrap">
  <h2>Relative Metrics</h2>

  <h3>
    Upload the Relative Metrics plugin to your blog, Activate it, then enter your <a href="https://relativemetrics.com/api-keys">relativemetrics.com API key</a>.
    1, 2, 3: You're done!
  </h3>

  <form method="post" action="options.php">

    <?php wp_nonce_field('update-options'); ?>
    <?php settings_fields('relativemetrics'); ?>

    <table class="form-table">
      <tr valign="top">
        <th scope="row">Your API Key (<a href="https://relativemetrics.com/api-keys">find here</a>):</th>
        <td><input type="text" name="relativemetrics_api_key" value="<?php echo get_option('relativemetrics_api_key'); ?>" /></td>
      </tr>
    </table>

    <input type="hidden" name="action" value="update" />

    <p class="submit">
      <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

  </form>
</div>

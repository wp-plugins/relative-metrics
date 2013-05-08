<div class="wrap">
  <h2>Relative Metrics</h2>

  <form method="post" action="options.php">

    <?php wp_nonce_field('update-options'); ?>
    <?php settings_fields('relativemetrics'); ?>

    <h3>
      API-key: 
      <input type="text" name="relativemetrics_api_key" value="<?php echo get_option('relativemetrics_api_key'); ?>" style="width:300px;" />
    </h3> 
    
    You will find your <strong>API-key</strong> after you sign up at <a href="https://relativemetrics.com">relativemetrics.com</a>
    
    <input type="hidden" name="action" value="update" />

    <p class="submit">
      <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

  </form>
</div>

<?php
/*
Plugin Name: Relative Metrics
Plugin URI: https://relativemetrics.com
Description: Simple and clear to understand reports about your website users statistics.
Version: 0.3
Author: Edijs Petersons
Author URI: http://www.linkedin.com/in/edijs
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_relativemetrics() {
  add_option('relativemetrics_api_key', '');
}

function deactive_relativemetrics() {
  delete_option('relativemetrics_api_key');
}

function admin_init_relativemetrics() {
  register_setting('relativemetrics', 'relativemetrics_api_key');
}

function admin_menu_relativemetrics() {
  add_options_page('Relative Metrics', 'Relative Metrics', 'manage_options', 'relativemetrics', 'options_page_relativemetrics');
}

function options_page_relativemetrics() {
  include(WP_PLUGIN_DIR.'/relative-metrics/options.php');  
}

function render_relativemetrics($relativemetrics_api_key) {
  if($relativemetrics_api_key) {
?>

<script type="text/javascript">
  var _rmq = _rmq || [];
  function _rms(u){
    setTimeout(function(){
      var s = document.createElement('script'); var f = document.getElementsByTagName('script')[0]; s.type = 'text/javascript'; s.async = true;
      s.src = u; f.parentNode.insertBefore(s, f);
    }, 1);
  }
  var protocol = ('https:' == document.location.protocol) ? 'https://' : 'http://';
  _rms(protocol + 'relativemetrics.com/script/<?php echo $relativemetrics_api_key; ?>/rm.js');
</script>

<?php
  }
}



function relativemetrics() { 
  
  $relativemetrics_api_key = get_option('relativemetrics_api_key');
  if (!$relativemetrics_api_key) {
    $relativemetrics_api_key = 'undefined'; 
  }
  render_relativemetrics($relativemetrics_api_key);

}

register_activation_hook(__FILE__, 'activate_relativemetrics');
register_deactivation_hook(__FILE__, 'deactive_relativemetrics');

if (is_admin()) {
  add_action('admin_init', 'admin_init_relativemetrics');
  add_action('admin_menu', 'admin_menu_relativemetrics');
}

if (!is_admin()) {
	add_action('wp_head', 'relativemetrics');
}

?>
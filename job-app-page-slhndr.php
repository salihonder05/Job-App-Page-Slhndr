<?php
/**
 * @package   Job_Application_Page_Slhndr
 * @author    Salih ÖNDER
 * @license   GPL-2.0+
 * @link      https://salihonder.com.tr
 * @copyright Salih ÖNDER - @2022
 *
 * @wordpress-plugin
 * Plugin Name:       Job Application Page Salih ÖNDER
 * Plugin URI:        https://salihonder.com/plugins/Job_Application_Page_Slhndr
 * Description:       Job Application Page Plugin For WordPress
 * Version:           1.0.0
 * Author:            Salih ÖNDER
 * Author URI:        https://salihonder.com.tr
 * Text Domain:       jobappslhndr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

/**
 *-----------------------------------------
 * Do not delete this line
 * Added for security reasons: http://codex.wordpress.org/Theme_Development#Template_Files
 *-----------------------------------------
 */
defined('ABSPATH') or die("Direct access to the script does not allowed");
/*-----------------------------------------*/

/*----------------------------------------------------------------------------*
 * * * ATTENTION! * * *
 * FOR DEVELOPMENT ONLY
 * SHOULD BE DISABLED ON PRODUCTION
 *----------------------------------------------------------------------------*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*----------------------------------------------------------------------------*/
ob_clean();
ob_start();
define( 'JOBAPPSLHNDR_VERSION', '1.0.1' );
define( 'JOBAPPSLHNDR_FILE', __FILE__ );
load_plugin_textdomain('jobappslhndr', false, dirname(plugin_basename(__FILE__)) . '/languages/');
function save_jobappslhndr_version() {

	if ( get_option( 'jobappslhndr_version' ) ) {
		update_option( 'jobappslhndr_version', JOBAPPSLHNDR_VERSION );
	} else {
		add_option( 'jobappslhndr_version', JOBAPPSLHNDR_VERSION );
	}

}
save_jobappslhndr_version();


require plugin_dir_path( JOBAPPSLHNDR_FILE ) . 'inc/loader.php';

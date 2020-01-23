<?php
/*
Plugin Name: Epluno Mission Control Client
Plugin URI:
Description: multi-instance WP client for order and product management.
Version: 0.0.1
Author: J.Fischer @ Epluno
Author URI: epluno.com
============================================================================================================
This software is provided "as is" and any express or implied warranties, including, but not limited to, the
implied warranties of merchantibility and fitness for a particular purpose are disclaimed. In no event shall
the copyright owner or contributors be liable for any direct, indirect, incidental, special, exemplary, or
consequential damages(including, but not limited to, procurement of substitute goods or services; loss of
use, data, or profits; or business interruption) however caused and on any theory of liability, whether in
contract, strict liability, or tort(including negligence or otherwise) arising in any way out of the use of
this software, even if advised of the possibility of such damage.
============================================================================================================
*/
/**
 * Type	: Plugin
 * Name	: Epluno Mission Control Client
 *
 * @since 0.0.1
 * @author J.Fischer @ Epluno
 */
/**
 * Create namespace and include supporting files and functions
 */
namespace Epluno\missioncontrolclient;

include plugin_dir_path( __FILE__ ) . '/resources/emc-client.php';
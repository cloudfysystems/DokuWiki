<?php
/**
 * settawk - enabling CORS (Cross-Origin Resource Sharing)
 * Enable/disable CORS (Cross-Origin Resource Sharing). Used to enable CORS http headers to permits web client visiting other website to load some data from your dokuwiki website.
 * 
 * @author Cyrille Giquello <cyrille@comptoir.net>
 * @copyright 2016 Cyrille Giquello
 * @license LGPL v3 http://www.gnu.org/licenses/lgpl.html
 * @link http://savoirscommuns.comptoir.net
 */

if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'action.php');

class action_plugin_settawk extends DokuWiki_Action_Plugin {

	/**
	 * return some info
   */
	function getInfo() {
		return array(
		 'author' => 'Nelson Augusto Pires',
		 'email'  => 'nelson.pires@cloudfy.net.br',
		 'date'   => '2019-03-18',
		 'name'   => 'TAWK - Setting USEINFO for tawk',
		 'desc'   => 'usado para passar a variavel do php $USERINFO para a variavel
					 do javascript JSINFO',
		 'url'    => 'http://app.padariananuvem.com'
		);
	}

	/**
	 * Register its handlers with the DokuWiki's event controller.
	 * 
	 * https://www.dokuwiki.org/devel:events
	 */
	function register( $controller) {

		$controller->register_hook('DOKUWIKI_STARTED', 'AFTER', $this, 'tawkUser');

	}
	
	function tawkUser($event, $param) {
		//call globals
		global $JSINFO;
		global $USERINFO;
		$USERINFO['tawkHash'] = hash_hmac("sha256",$USERINFO["mail"],"13032314a0571088b35b264355539033772ed719");//set TAWK API hash
		$JSINFO['user'] = $USERINFO;//add USEINFO na var JSINFO que eh passada para uma var no javascript
	}

}


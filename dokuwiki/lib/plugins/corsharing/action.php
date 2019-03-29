<?php
/**
 * CORSharing - enabling CORS (Cross-Origin Resource Sharing)
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

class action_plugin_corsharing extends DokuWiki_Action_Plugin {

	/**
	 * return some info
   */
	function getInfo() {
		return array(
		 'author' => 'Cyrille Giquello',
		 'email'  => 'cyrille@comptoir.net',
		 'date'   => '2016-07-31',
		 'name'   => 'CORS - enabling Cross-Origin Resource Sharing',
		 'desc'   => 'Used to enable Cross-Origin Resource Sharing http headers
									to permit client visiting other website
									to load some data from your dokuwiki website',
		 'url'    => 'http://savoirscommuns.comptoir.net'
		);
	}

	/**
	 * Register its handlers with the DokuWiki's event controller.
	 * 
	 * https://www.dokuwiki.org/devel:events
	 */
	function register( $controller) {

		//$controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE',  $this, 'handleEvent');
		//$controller->register_hook('ACTION_HEADERS_SEND', 'BEFORE',  $this, 'handleEvent');
		//$controller->register_hook('ACTION_HEADER_SEND', 'BEFORE', $this,'handleEvent');

		$controller->register_hook('DOKUWIKI_STARTED', 'AFTER', $this, 'handleEvent');

	}

	function handleEvent( $event, $param ) {

		header('Access-Control-Allow-Origin: http://localhost:8080');
		header('Access-Control-Allow-Headers: aut-token, Transaction');
		header('Access-Control-Allow-Credentials: true');
	}

}


<?php

/**************************************************
 * PHP DEBUGGER
 **************************************************/

/**************************************************
 * @package phpDebugger
 * @subpackage interface
 **************************************************/

/**************************************************
 * @author: Roman Matthias Keil
 * @copyright: Roman Matthias Keil
 **************************************************/

/**************************************************
 * $Id: Debugger.class.php 803 2010-05-20 13:47:08Z webadmin $
 * $HeadURL: http://svn.rm-keil.de/rm-keil/webpages/rm-keil.de/Release%20(1.0)/httpdocs/_app/core/debugger/Debugger.class.php $
 * $Date: 2010-05-20 15:47:08 +0200 (Do, 20 Mai 2010) $
 * $Author: webadmin $
 * $Revision: 803 $
 **************************************************/

require_once 'classes/masterpage/StandardMasterpage.class.php';
require_once 'classes/debugger/DebuggerConnection.class.php';
require_once 'config/version.inc.php';

class Index extends StandardMasterpage {

	/**
	 * @return unknown_type
	 */
	function __construct() {
		parent::__construct();
	}

	/* (non-PHPdoc)
	 * @see classes/masterpage/StandardMasterpage#workbench($engine)
	 */
	protected function workbench(Smarty $_engine) {

		if(isset($_GET['cmd']))
		$cmd = $_GET['cmd'];
		else $cmd='all';

		switch ($cmd) {
			case 'all':
				$connection = new DebuggerConnection();
				$result = $connection->selectALL();
				$this->show($_engine, $result);
				break;

			case 'last':
				$connection = new DebuggerConnection();
				$result = $connection->selectLAST();
				$this->show($_engine, $result);
				break;
					
			case 'clear':
				$connection = new DebuggerConnection();
				$result = $connection->clear();
				$result = $connection->selectALL();
				$this->show($_engine, $result);
				break;

			default:
				$connection = new DebuggerConnection();
				$result = $connection->selectALL();
				$this->show($_engine, $result);
				break;
		}

		$_engine->assign('TITLE', 'phpDebuggger - '.$cmd);
		$_engine->assign('cmd', $cmd);

		$_engine->assign('interface_version', VERSION);
		$_engine->assign('interface_build', BUILD);
		$_engine->assign('core_version', CORE_VERSION);
	}

	/**
	 * @param Smarty $_engine
	 * @param $_values
	 * @return unknown_type
	 */
	private function show(Smarty $_engine, $_values) {

		$tmpSession = "";
		$tmpTimestamp = "";
		
		$sessions = array();

		while((list($session, $timestamp, $identifier, $value) =  mysql_fetch_row($_values)))
		{
			$sessions['Session: '.$session]['timestamp'] = $timestamp;
			$sessions['Session: '.$session]['entries'][$identifier] = str_replace(';', '; ', unserialize($value)); 
		}
		$_engine->assign('sessions', $sessions);
	}
}

new Index();
?>

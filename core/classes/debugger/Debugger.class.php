<?php

/**************************************************
 * PHP DEBUGGER
 **************************************************/

/**************************************************
 * @package phpDebugger
 * @subpackage core
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

Application::import('core.debugger.DebuggerConnection');

class Debugger {

	private $session;
	
	/**
	 * @param string $_level
	 * @return unknown_type
	 */
	function __construct() {
		$this->session = $this->getSession();
	}

	/**
	 * @param string $_identifier
	 * @param string $_value
	 * @return unknown_type
	 */
	public function ASSIGN($_identifier, $_value) {
		if(DEBUGGER) $this->save($this->session, $_identifier, serialize($_value));
	}

	/**
	 * @return int
	 */
	private function getSession() {
		$connection = new DebuggerConnection();
		$session = $connection->getSession();
		return ++$session;
	}

	/**
	 * @param string $_session
	 * @param string $_identifier
	 * @param string $_value
	 * @return unknown_type
	 */
	private function save($_session, $_identifier, $_value) {
		$connection = new DebuggerConnection();
		$connection->insert($_session, $_identifier, $_value);
	}
}
?>

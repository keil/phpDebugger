<?php

/**************************************************
 * PHP DEBUGGER
 **************************************************/

/**************************************************
 * @package phpDebugger
 * @subpackage core
 * @version 1.01
 * @build 1042
 **************************************************/

/**************************************************
 * @author: Roman Matthias Keil
 * @copyright: Roman Matthias Keil
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

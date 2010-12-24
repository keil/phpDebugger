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

Application::import('config.debugger');

Application::import('core.debugger.Debugger');

class DebuggerFactory {

	/**
	 * @var Debugger
	 */
	private static $debugger = null;
	
	/**
	 * @param string $_level
	 * @return unknown_type
	 */
	static function getInstance() {
		if(!isset(DebuggerFactory::$debugger))
			DebuggerFactory::$debugger = new Debugger();
		
		return DebuggerFactory::$debugger;
	}
}
?>
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
 * $Id: DebuggerFactory.class.php 803 2010-05-20 13:47:08Z webadmin $
 * $HeadURL: http://svn.rm-keil.de/rm-keil/webpages/rm-keil.de/Release%20(1.0)/httpdocs/_app/core/debugger/DebuggerFactory.class.php $
 * $Date: 2010-05-20 15:47:08 +0200 (Do, 20 Mai 2010) $
 * $Author: webadmin $
 * $Revision: 803 $
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
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

require_once 'config/debugger.inc.php';

class DebuggerConnection {

	/**
	 * @var unknown_type
	 */
	private $connection;

	/**
	 * @return unknown_type
	 */
	function __construct() {
		$this->connection = mysql_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD) or die(": " . mysql_error());
		mysql_select_db(DATABASE) or die(": " . mysql_error());
	}

	/**
	 * @return unknown_type
	 */
	function __destruct() {
		mysql_close($this->connection);
	}

	/**
	 * @return unknown_type
	 */
	public function selectALL() {
		$sql = 'SELECT * FROM `'.DATABASE_TABLE.'` ORDER BY `timestamp` DESC';
		return mysql_query($sql);
	}

	/**
	 * @return unknown_type
	 */
	public function selectLAST() {
		$sql = 'SELECT * FROM `'.DATABASE_TABLE.'` WHERE `session` = (SELECT MAX(`session`) FROM `'.DATABASE_TABLE.'`)';
		return mysql_query($sql);
	}

	/**
	 * @return unknown_type
	 */
	public function clear() {
		$sql = 'TRUNCATE TABLE `'.DATABASE_TABLE.'`';
		return mysql_query($sql);
	}
}
?>
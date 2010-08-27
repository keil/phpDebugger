{**************************************************
 * PHP DEBUGGER
 **************************************************}

{**************************************************
 * @package phpDebugger
 * @subpackage interface
 **************************************************}

{**************************************************
 * @author: Roman Matthias Keil
 * @copyright: Roman Matthias Keil
 **************************************************}

{**************************************************
 * $Id: Debugger.class.php 803 2010-05-20 13:47:08Z webadmin $
 * $HeadURL: http://svn.rm-keil.de/rm-keil/webpages/rm-keil.de/Release%20(1.0)/httpdocs/_app/core/debugger/Debugger.class.php $
 * $Date: 2010-05-20 15:47:08 +0200 (Do, 20 Mai 2010) $
 * $Author: webadmin $
 * $Revision: 803 $
 **************************************************}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="de" xml:lang="de" xmlns="http://www.w3.org/1999/xhtml">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-15" />
		<meta http-equiv="content-language" content="de" />
		<meta http-equiv="pragma" content="no-cache" />

		<meta name="author" content="Roman Matthias Keil" />
		<meta name="publisher" content="Roman Matthias Keil" />
		<meta name="copyright" content="Roman Matthias Keil" />
		<meta name="owner" content="Roman Matthias Keil" />
		<meta name="date" content="2009-09-15 14:01:05" />

		<meta name="description" content="php2log interface" />
		<meta name="keywords" content="php, logs, logging, php2log" />
		<meta name="language" content="de" />
		<meta name="robots" content="index, follow" />
		<meta name="revisit-after" content="7 days" />

		<link rel="stylesheet" type="text/css"	href="stylesheets/template.css" media="all" />
		<link rel="stylesheet" type="text/css" href="stylesheets/content.css" media="all" />

		<title>{$TITLE}</title>

	</head>
	<body>

		<ul id="menue">
			<li><a {if !isset($cmd) || $cmd=="all"}class="current"{/if} href="?cmd=all">all</a></li>
			<li><span class="red">|<span></li>
			<li><a {if $cmd=="last"}class="current"{/if} href="?cmd=last">last</a></li>
			<li><span class="red">|<span></li>
			<li><a {if $cmd=="clear"}class="current"{/if} href="?cmd=clear">clear</a></li>
		</ul>

		<div id="content">
			<h1>{$TITLE}</h1>
			<!-- BEGINN DEBUG INFORMATION -->
{foreach key=name item=session from=$sessions}
			<h2>{$name} ({$session.timestamp})</h2>
{foreach key=identifier item=values from=$session.entries}
					<h3>{$identifier}</h3>
					<ul id="debug">
{foreach key=key item=value from=$values}
					<li>
						<span class="debug">{$key}</span>
						{$value}
					</li>
{/foreach}
					</ul>
{/foreach}
{/foreach}

			<!-- END DEBUG INFORMATION -->
		</div>

		<div id="footline">
			<p><a href="http://rm-keil.de">phpDebugger</a> - php debugging engine<br />
			Copyright © by <a href="http://matthias-keil.de">Roman Matthias Keil</a><br />
			Interface: Version {$interface_version} Build {$interface_build} | Core: Version {$core_version}</p>
		</div>

	</body>
</html>

<?php
// Can I use a namespace here? And which one? yepp
// Maybe TS is not able to find/call it, hmm…
// namespace gp\addons\Generic;

defined('is_running') or die('Not an entry point...');

/*
 * Plugin.php
 *
 * Main entry point for the generic plugin, called by Typesetter system
 * TODO: find_that_out
 * Actually by the include/Addon/Addon php???? module ????
 * During the development version I allow myself to let the message calls in
 * They will be replaced by a Log Object
 *
 */

//require 'source/Model/GenericObject.php';
//require 'source/Controller/Greeting.php';

class Plugin
{

    // storing the needed prefs and variables in config file
    // it will be available in Typesetter's very own data storage /data/_addondata/Generic/config.php

	protected	static	$greetingController = NULL;


	// main constructor of ExampleObject
    public function __construct($object)
    {
// TODO: find cmd for plugin from $page object

// TODO: define general object commands for editing and stuff. Maybe outsourcing. Hmm. Model.Object would be a good place…
		$cmd = "Create";
		$cmd = "Edit/Update";
		$cmd = "About";
		$cmd = "Error";
		$cmd = "Show";	// also list, for several items

		// to see if we are alive
//		message("Plugin::__construct()");

/* interesting info for the Log class, now please impllement it

echo "<br />backtrace3, caller = <br />".$caller."<br />";

$callers = debug_backtrace();
foreach( $callers as $call ) {
    echo "<br>" . $call['class'] . '->' . $call['function'];
}
echo "<br />";

*/

		$this->PreInit();	// will get out, if we have persistance
		$this->Init($object);
//		$this->Init($object);
		$this->RunCommand($cmd);
    }

// nice method will be called before anythings happens, good for testing weird stuff…
	protected function PreInit()
    {
		echo "Hello world. <br /><br />This will become the admin area";
		echo "<br /><br />Already existing:";
		echo "<br />1. GetContent_After hook, you can see the greetings on every single published page e.g. the home <a href='/'>page</a>.";
		// http://ubuntu-laptop.local/index.php
		echo "<br />2. A gadget, will render after activation in the <a href='Admin_Theme_Content/Edit/default'>layout editor</a>";
// TODO: get rid of this code…
//       and all the message() calls , will be replaced by Log4P class…
/*
		global $addonRelativeCode, $addonPathCode, $addonFolderName, $addonCodeFolder;
		echo "<br />addonRelativeCode = $addonRelativeCode<br />";
		echo "addonPathCode = $addonPathCode<br />";
		echo "addonFolderName = $addonFolderName<br />";
		echo "addonCodeFolder = $addonCodeFolder<br />";
		echo $_SERVER['DOCUMENT_ROOT']."<br />";

*/
// include test, can I include a file from a different plugin
//		require('/home/ingo/Dev/web/workspace/htdocs/addons/DeepL-Translator/Install_Check.php');
//		require('../DeepL-Translator/Install_Check.php');
	}

    protected function Init($object)
    {
//		message("Plugin::Init()");

		// initialize greetingObjects
		// self::$greetingModel = new Generic\Model\Greeting("Hello from generic");
//		self::$greetingController = new Generic\Controller\Greeting();

		// store object params if given, will probably be TS page object
		if( $object )
			$page = $object['page'];
    }

	// delegation method
	protected function RunCommand($cmd)
	{
//		message("Plugin::RunCommand(),cmd = ".$cmd);

		switch ($cmd)
		{
			case 'Show':
// 				self::$greetingController->Show();
			break;
			case 'Edit':
// 				self::$greetingController->Edit();
			break;
			case 'Save':
// 				self::$greetingController->Save();
			break;

			case 'Delete':
// 				self::$greetingController->Save();
			break;

			default:
				// code...
			break;
		}

	}

	// you can simply build more hooks the same way
	// look up https://www.typesettercms.com/Docs/Plugins/Hooks
	// I usually don't use them so they are not in here
	// TODO: extend greeting object for saved greetings
	// the greeting appears on every published TS page after the last content block
	public function GetContent_After()
	{
		$greetinx = "Hello world!!!<br />From the TS hook Plugin::GetContent_After()<br /><br /><i>Generated by Generic Addon…</i>";
		$br = "<br />";

		// to make sure, we are alive
//		message("Plugin::GetContent_After()");

		echo $br.$br.$greetinx.$br.$br."<hr>";

		self::init(NULL);

		// now let the controller do it's work
		if( self::$greetingController )
			self::$greetingController->Show();

	}
}

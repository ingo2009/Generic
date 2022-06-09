<?php
defined('is_running') or die('Not an entry point...');


/*
 *      Install_Check() can be used to check the destination server for required features
 *      This can be helpful for addons that require PEAR support or extra PHP Extensions
 *      Install_Check() is called from step1 of the install/upgrade process
 */

// nothing much to check so far… or is it?

// TODO: write install check code
function Install_Check()
{
    // insert your install check code here
    return true;
}

<?php

########################################################################
# Extension Manager/Repository config file for ext "staticfilecache_mananger".
#
# Auto generated 18-10-2010 10:09
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Static Filecache Mananger',
	'description' => 'Manager for the static file cache',
	'category' => 'module',
	'author' => 'Axel Jung',
	'author_email' => 'axel.jung@aoemedia.de',
	'shy' => '',
	'dependencies' => 'cms,nc_staticfilecache',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '0.0.2',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'typo3' => '4.3.0',
			'php' => '5.2.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:11:{s:9:"ChangeLog";s:4:"11be";s:10:"README.txt";s:4:"ee2d";s:12:"ext_icon.gif";s:4:"1bdc";s:14:"ext_tables.php";s:4:"344b";s:19:"doc/wizard_form.dat";s:4:"7d6e";s:20:"doc/wizard_form.html";s:4:"86a1";s:13:"mod1/conf.php";s:4:"d710";s:14:"mod1/index.php";s:4:"f096";s:18:"mod1/locallang.xml";s:4:"f633";s:22:"mod1/locallang_mod.xml";s:4:"e7be";s:19:"mod1/moduleicon.gif";s:4:"8074";}',
);

?>
<?php
if (! defined ( 'TYPO3_MODE' )) {
	die ( 'Access denied.' );
}
if (TYPO3_MODE == 'BE') {
	/**
	$controllerActions = array();
	$controllerActions ['List'] = 'index';
	$config = array ();
	$config ['access'] = 'user,group';
	$config ['icon'] = 'EXT:' . $_EXTKEY . '/ext_icon.gif';
	$config ['labels'] = 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml';
	$mainModule = 'web';
	$subModule = 'txstaticfilecachemanangerM1';
	$position = '';
	Tx_Extbase_Utility_Extension::registerModule ( $_EXTKEY, $mainModule, $subModule, $position, $controllerActions, $config );
	*/
	
	t3lib_extMgm::addModulePath('tools_txstaticfilecachemanangerM1', t3lib_extMgm::extPath($_EXTKEY) . 'mod1/');
		
	t3lib_extMgm::addModule('tools', 'txstaticfilecachemanangerM1', '', t3lib_extMgm::extPath($_EXTKEY) . 'mod1/');
}
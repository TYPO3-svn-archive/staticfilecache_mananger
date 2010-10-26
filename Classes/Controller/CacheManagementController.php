<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2009 AOE media GmbH <dev@aoemedia.de>
 * All rights reserved
 *
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Domain' . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'CacheDatabaseEntryRepository.php';
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Domain' . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'CacheFileRepository.php';
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . 'View.php';

/**
 * Controller for Cache Management
 * @package staticfilecache_mananger
 */
class Tx_StaticfilecacheMananger_Controller_CacheManagementController {
	/**
	 * @var Tx_StaticfilecacheMananger_Domain_Repository_CacheDatabaseEntryRepository
	 */
	private $cacheDatabaseEntryRepository;
	/**
	 * @var Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository
	 */
	private $cacheFileRepository;
	/**
	 * @var Tx_StaticfilecacheMananger_View_View
	 */
	private $view;
	/**
	 * Initializes  controller
	 */
	public function __construct() {
		$this->cacheDatabaseEntryRepository = t3lib_div::makeInstance ( 'Tx_StaticfilecacheMananger_Domain_Repository_CacheDatabaseEntryRepository' );
		$this->cacheFileRepository = t3lib_div::makeInstance ( 'Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository' );
		$this->view = t3lib_div::makeInstance ( 'Tx_StaticfilecacheMananger_View_View' );
		$this->view->setTemplatePath ( dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'Private' . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR );
		$conf = unserialize ( $GLOBALS ['TYPO3_CONF_VARS'] ['EXT'] ['extConf'] ['staticfilecache_mananger'] );
		$this->cacheFileRepository->setCacheDir ( PATH_site . $conf ['cacheDir'] );
		$this->cacheDatabaseEntryRepository->setFileTable ( $conf ['fileTable'] );
	
	}
	/**
	 * @return Tx_StaticfilecacheMananger_Domain_Repository_CacheDatabaseEntryRepository
	 */
	/**
	 * @return Tx_StaticfilecacheMananger_View_View
	 */
	public function getView() {
		return $this->view;
	}
	
	/**
	 * @param Tx_StaticfilecacheMananger_View_View $view
	 */
	public function setView(Tx_StaticfilecacheMananger_View_View $view) {
		$this->view = $view;
	}
	
	public function getCacheDatabaseEntryRepository() {
		return $this->cacheDatabaseEntryRepository;
	}
	/**
	 * @return Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository
	 */
	public function getCacheFileRepository() {
		return $this->cacheFileRepository;
	}
	
	/**
	 * @param Tx_StaticfilecacheMananger_Domain_Repository_CacheDatabaseEntryRepository $cacheDatabaseEntryRepository
	 */
	public function setCacheDatabaseEntryRepository(Tx_StaticfilecacheMananger_Domain_Repository_CacheDatabaseEntryRepository $cacheDatabaseEntryRepository) {
		$this->cacheDatabaseEntryRepository = $cacheDatabaseEntryRepository;
	}
	
	/**
	 * @param Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository $cacheFileRepository
	 */
	public function setCacheFileRepository(Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository $cacheFileRepository) {
		$this->cacheFileRepository = $cacheFileRepository;
	}
	/**
	 * Show the count of both repositorys
	 * @return string
	 */
	public function indexAction() {
		$this->view->assign ( 'countFiles', $this->cacheFileRepository->countAll () );
		$this->view->assign ( 'countDatbaseEntrys', $this->cacheDatabaseEntryRepository->countAll () );
		return $this->view->render ( 'index' );
	}
	/**
	 * @return string
	 */
	public function allFilesAction() {
		$this->view->assign ( 'allFiles', $this->cacheFileRepository->getAll () );
		return $this->view->render ( 'allFiles' );
	}
	/**
	 * @return string
	 */
	public function deleteFileAction() {
		$this->cacheFileRepository->removeFile($_GET['id']);
		return $this->allFilesAction();
	}
	
	/**
	 * @return string
	 */
	public function allDatabaseEntrysAction() {
		$this->view->assign ( 'allDatabaseEntrys', $this->cacheDatabaseEntryRepository->getAll () );
		return $this->view->render ( 'allDatabaseEntrys' );
	}
	/**
	 * @return string
	 */
	public function allFoldersAction() {
		$getFoldersWhichDoesNotContainFiles = $GLOBALS['BE_USER']->getModuleData('tx_staticfilecache_manager_getFoldersWhichDoesNotContainFiles') === FALSE ? FALSE : TRUE;
		$this->view->assign ( 'allFolders', $this->cacheFileRepository->getAllFolders ( $getFoldersWhichDoesNotContainFiles ) );
		return $this->view->render ( 'allFolders' );
	}
	/**
	 * @return string
	 */
	public function deleteFolderAction() {
		$this->cacheFileRepository->removeFolder($_GET['id']);
		return $this->allFoldersAction();
	}
	/**
	 * @return string
	 */
	public function setConfigGetFoldersWhichDoesNotContainFilesAction() {
		$GLOBALS['BE_USER']->pushModuleData('tx_staticfilecache_manager_getFoldersWhichDoesNotContainFiles', (boolean) t3lib_div::_GP('getFoldersWhichDoesNotContainFiles'));
		return $this->allFoldersAction();
	}
}
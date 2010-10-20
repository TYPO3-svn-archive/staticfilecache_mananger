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
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Classes' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'CacheManagementController.php';
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Classes' . DIRECTORY_SEPARATOR . 'Domain' . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'CacheDatabaseEntryRepository.php';
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Classes' . DIRECTORY_SEPARATOR . 'Domain' . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'CacheFileRepository.php';
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Classes' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . 'View.php';
/**
 * Tx_StaticfilecacheMananger_Controller_CacheManagementController test case.
 * @package staticfilecache_mananger
 */
class Tx_StaticfilecacheMananger_Controller_CacheManagementControllerTest extends tx_phpunit_testcase {
	/**
	 * @var Tx_StaticfilecacheMananger_Controller_CacheManagementController
	 */
	private $cacheManagementController;
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
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		$this->cacheManagementController = $this->getMock ( 'Tx_StaticfilecacheMananger_Controller_CacheManagementController', array ('__construct' ), array (), '', FALSE );
		$this->cacheDatabaseEntryRepository = $this->getMock ( 'Tx_StaticfilecacheMananger_Domain_Repository_CacheDatabaseEntryRepository', array (), array (), '', FALSE );
		$this->cacheFileRepository = $this->getMock ( 'Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository', array (), array (), '', FALSE );
		$this->view = $this->getMock ( 'Tx_StaticfilecacheMananger_View_View', array (), array (), '', FALSE );
		$this->cacheManagementController->setCacheDatabaseEntryRepository ( $this->cacheDatabaseEntryRepository );
		$this->cacheManagementController->setCacheFileRepository ( $this->cacheFileRepository );
		$this->cacheManagementController->setView ( $this->view );
	}
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		unset($this->cacheManagementController);
		unset($this->cacheDatabaseEntryRepository);
		unset($this->cacheFileRepository);
	}
	/**
	 * Tests Tx_StaticfilecacheMananger_Controller_CacheManagementController->indexAction()
	 * @test
	 */
	public function indexAction() {
		$this->view->expects($this->once())->method('render');
		$this->cacheDatabaseEntryRepository->expects($this->once())->method('countAll');
		$this->cacheFileRepository->expects($this->once())->method('countAll');
		$this->cacheManagementController->indexAction ();
	}
}
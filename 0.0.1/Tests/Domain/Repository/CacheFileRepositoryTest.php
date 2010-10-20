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
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Classes' . DIRECTORY_SEPARATOR . 'Domain' . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'CacheFileRepository.php';
/**
 * Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository test case.
 * @package staticfilecache_mananger
 */
class Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepositoryTest extends tx_phpunit_testcase {
	/**
	 * @var Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository
	 */
	private $cacheFileRepository;
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		$this->cacheFileRepository = new Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository ();
		$this->cacheFileRepository->setCacheDir(dirname(__FILE__).DIRECTORY_SEPARATOR.'fixtures'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR);
	}
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		unset ( $this->cacheFileRepository );
	}
	/**
	 * Tests Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository->countAll()
	 * @test
	 */
	public function countAll() {
		$result = $this->cacheFileRepository->countAll ();
		$this->assertType ( 'integer', $result );
		$this->assertEquals(2,$result);
	}
	/**
	 * Tests Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository->getAll()
	 * @test
	 */
	public function getAll() {
		$results = $this->cacheFileRepository->getAll ();
		$this->assertType ( 'array', $results );
		$this->assertEquals(2,count($results));
		foreach($results as $result){
			$this->assertType ( 'Tx_StaticfilecacheMananger_Domain_Model_CacheFile', $result );
			$this->assertNotNull( $result->getName() );
		}
	}
}
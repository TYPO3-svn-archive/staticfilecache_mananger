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
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR.'Model' . DIRECTORY_SEPARATOR . 'CacheDatabaseEntry.php';
/**
 * Database cache entry repository
 * @package staticfilecache_mananger
 */
class Tx_StaticfilecacheMananger_Domain_Repository_CacheDatabaseEntryRepository {
	/**
	 * @var string
	 */
	private $fileTable;
	
	/**
	 * @return integer
	 */
	public function countAll() {
		return $this->count();
	}
	/**
	 * @return array
	 */
	public function getAll() {
		return $this->query();
	}
	
	/**
	 * @param string $fileTable
	 */
	public function setFileTable($fileTable) {
		$this->fileTable = $fileTable;
	}
	
	/**
	 * @return string
	 */
	protected function getFileTable() {
		return $this->fileTable;
	}

	/**
	 * @param string $where
	 * @return array
	 */
	private function query($where = '1=1'){
		$db = $GLOBALS['TYPO3_DB'];
		$orderBy = 'host,uri';
		$rows = $db->exec_SELECTgetRows('*', $this->getFileTable(), $where, '', $orderBy);
		$entries = array();
		foreach($rows as $row){
			$entry = new Tx_StaticfilecacheMananger_Domain_Model_CacheDatabaseEntry();
			$entry->setUid($row['uid']);
			$entry->setTstamp($row['tstamp']);
			$entry->setCrdate($row['crdate']);
			$entry->setCache_timeout($row['cache_timeout']);
			$entry->setExplanation($row['explanation']);
			$entry->setHost($row['host']);
			$entry->setFile($row['file']);
			$entry->setPid($row['pid']);
			$entry->setUri($row['uri']);
			$entry->setIsdirty($row['isdirty']);
			$entry->setReg1($row['reg1']);
			$entry->setAdditionalhash($row['additionalhash']);
			$entries[] = $entry;
		}
		return $entries;
	}
	/**
	 * @param string $where
	 * @return integer
	 */
	private function count($where = ''){
		$db = $GLOBALS['TYPO3_DB'];
		return intval($db->exec_SELECTcountRows('uid', $this->getFileTable(),$where));
	}
	

}
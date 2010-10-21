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
/**
 * Database cache entry
 * @package staticfilecache_mananger
 */
class Tx_StaticfilecacheMananger_Domain_Model_CacheDatabaseEntry {
	/**
	 * @var integer
	 */
	private $uid;
	/**
	 * @var integer
	 */
	private $tstamp;
	/**
	 * @var integer
	 */
	private $crdate;
	/**
	 * @var integer
	 */
	private $cache_timeout;
	/**
	 * @var string
	 */
	private $explanation;
	/**
	 * @var integer
	 */
	private $pid;
	/**
	 * @var string
	 */
	private $host;
	/**
	 * @var string
	 */
	private $file;
	/**
	 * @var string
	 */
	private $uri;
	/**
	 * @var integer
	 */
	private $isdirty;
	/**
	 * @var integer
	 */
	private $reg1;
	/**
	 * @var string
	 */
	private $additionalhash;
	/**
	 * @return integer
	 */
	public function getUid() {
		return $this->uid;
	}
	
	/**
	 * @return integer
	 */
	public function getTstamp() {
		return $this->tstamp;
	}
	
	/**
	 * @return integer
	 */
	public function getCrdate() {
		return $this->crdate;
	}
	
	/**
	 * @return integer
	 */
	public function getCache_timeout() {
		return $this->cache_timeout;
	}
	
	/**
	 * @return string
	 */
	public function getExplanation() {
		return $this->explanation;
	}
	
	/**
	 * @return integer
	 */
	public function getPid() {
		return $this->pid;
	}
	
	/**
	 * @return string
	 */
	public function getHost() {
		return $this->host;
	}
	
	/**
	 * @return string
	 */
	public function getFile() {
		return $this->file;
	}
	
	/**
	 * @return string
	 */
	public function getUri() {
		return $this->uri;
	}
	
	/**
	 * @return integer
	 */
	public function getIsdirty() {
		return $this->isdirty;
	}
	
	/**
	 * @return integer
	 */
	public function getReg1() {
		return $this->reg1;
	}
	
	/**
	 * @return string
	 */
	public function getAdditionalhash() {
		return $this->additionalhash;
	}
	
	/**
	 * @param integer $uid
	 */
	public function setUid($uid) {
		$this->uid = $uid;
	}
	
	/**
	 * @param integer $tstamp the $tstamp to set
	 */
	public function setTstamp($tstamp) {
		$this->tstamp = $tstamp;
	}
	
	/**
	 * @param integer $crdate the $crdate to set
	 */
	public function setCrdate($crdate) {
		$this->crdate = $crdate;
	}
	
	/**
	 * @param integer $cache_timeout the $cache_timeout to set
	 */
	public function setCache_timeout($cache_timeout) {
		$this->cache_timeout = $cache_timeout;
	}
	
	/**
	 * @param string $explanation the $explanation to set
	 */
	public function setExplanation($explanation) {
		$this->explanation = $explanation;
	}
	
	/**
	 * @param integer $pid the $pid to set
	 */
	public function setPid($pid) {
		$this->pid = $pid;
	}
	
	/**
	 * @param string $host the $host to set
	 */
	public function setHost($host) {
		$this->host = $host;
	}
	
	/**
	 * @param string $file the $file to set
	 */
	public function setFile($file) {
		$this->file = $file;
	}
	
	/**
	 * @param string $uri the $uri to set
	 */
	public function setUri($uri) {
		$this->uri = $uri;
	}
	
	/**
	 * @param integer $isdirty the $isdirty to set
	 */
	public function setIsdirty($isdirty) {
		$this->isdirty = $isdirty;
	}
	
	/**
	 * @param integer $reg1 the $reg1 to set
	 */
	public function setReg1($reg1) {
		$this->reg1 = $reg1;
	}
	
	/**
	 * @param string $additionalhash the $additionalhash to set
	 */
	public function setAdditionalhash($additionalhash) {
		$this->additionalhash = $additionalhash;
	}

}
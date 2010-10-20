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
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR.'Model' . DIRECTORY_SEPARATOR . 'CacheFile.php';
/**
 * file cache repository
 * @package staticfilecache_mananger
 */
class Tx_StaticfilecacheMananger_Domain_Repository_CacheFileRepository {
	/**
	 * @var string
	 */
	private $cacheDir;
	/**
	 * @return integer
	 */
	public function countAll() {
		return $this->count($this->getFiles());
	}
	
	/**
	 * @return array
	 */
	public function getAll() {
		return $this->reconstitute($this->getFiles());
	}
	/**
	 * @return string
	 */
	public function getCacheDir() {
		return $this->cacheDir;
	}
	/**
	 * @param string $cacheDir
	 */
	public function setCacheDir($cacheDir) {
		$this->cacheDir = $cacheDir;
	}
	/**
	 * @param string $id
	 */
	public function removeFile($id){
		$fileName = base64_decode($id);
		if(FALSE === $fileName || FALSE !== strpos($fileName,'..') ){
			throw new Exception('invalid id');
		}
		if(FALSE === unlink($this->cacheDir.$fileName)){
			throw new Exception('could not delete file: '.$fileName);
		}
		
	}
	/**
	 * @param RegexIterator $regexIterator
	 * @return array
	 */
	private function reconstitute(RegexIterator $regexIterator){
		$files = array();
		foreach( $regexIterator as $file){
			$cacheFile = new Tx_StaticfilecacheMananger_Domain_Model_CacheFile();
			$cacheFile->setName(str_replace($this->cacheDir,'',$file[0]));
			$files[] = $cacheFile;
		}
		return $files;
	}
	/**
	 * @param RegexIterator $regexIterator
	 * @return integer
	 */
	private function count(RegexIterator $regexIterator){
		$count = 0;
		foreach( $regexIterator as $file){
			$count ++;
		}
		return $count;
	}
	/**
	 * @return RegexIterator
	 */
	private function getFiles(){
		$folder = $this->cacheDir;
		$directory = new RecursiveDirectoryIterator($folder);
		$iterator = new RecursiveIteratorIterator($directory);
		$regex = new RegexIterator($iterator, '/^.+\.html$/i', RecursiveRegexIterator::GET_MATCH);
		return $regex;
	}

}
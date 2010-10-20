<?php
$LANG->includeLLFile ( 'EXT:staticfilecache_mananger/mod1/locallang.xml' );
require_once (PATH_t3lib . 'class.t3lib_scbase.php');
require_once dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Classes' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'CacheManagementController.php';
$BE_USER->modAccess ( $MCONF, 1 ); // This checks permissions and exits if the users has no permission for entry.
/**
 * Module '' for the 'staticfilecache_mananger' extension.
 *
 * @package	TYPO3
 * @subpackage	tx_staticfilecachemananger
 */
class tx_staticfilecachemananger_module1 extends t3lib_SCbase {
	public $pageinfo;
	/**
	 * @var Tx_StaticfilecacheMananger_Controller_CacheManagementController
	 */
	private $cacheManagementController;
	
	/**
	 * Initializes the Module
	 * @return	void
	 */
	public function init() {
		$this->cacheManagementController = t3lib_div::makeInstance ( 'Tx_StaticfilecacheMananger_Controller_CacheManagementController');
	}
	
	/**
	 * Main function of the module. Write the content to $this->content
	 * If you chose "web" as main module, you will need to consider the $this->id parameter which will contain the uid-number of the page clicked in the page tree
	 *
	 * @return	[type]		...
	 */
	public function main() {
		global $BE_USER, $LANG, $BACK_PATH, $TCA_DESCR, $TCA, $CLIENT, $TYPO3_CONF_VARS;
		
		// Access check!
		// The page will show only if there is a valid page and if this page may be viewed by the user
		$this->pageinfo = t3lib_BEfunc::readPageAccess ( $this->id, $this->perms_clause );
		$access = is_array ( $this->pageinfo ) ? 1 : 0;
		
		if (($this->id && $access) || ($BE_USER->user ['admin'] && ! $this->id)) {
			
			// Draw the header.
			$this->doc = t3lib_div::makeInstance ( 'mediumDoc' );
			$this->doc->backPath = $BACK_PATH;
			$this->doc->form = '<form action="" method="post" enctype="multipart/form-data">';
			
			$headerSection = $this->doc->getHeader ( 'pages', $this->pageinfo, $this->pageinfo ['_thePath'] ) . '<br />' . $LANG->sL ( 'LLL:EXT:lang/locallang_core.xml:labels.path' ) . ': ' . t3lib_div::fixed_lgd_pre ( $this->pageinfo ['_thePath'], 50 );
			
			$this->content .= $this->doc->startPage ( $LANG->getLL ( 'title' ) );
			$this->content .= $this->doc->header ( $LANG->getLL ( 'title' ) );
			$this->content .= $this->doc->spacer ( 5 );
			$this->content .= $this->doc->divider ( 5 );
			
			// Render content:
			$this->moduleContent ();
	
			
			$this->content .= $this->doc->spacer ( 10 );
		} else {
			// If no access or if ID == zero
			

			$this->doc = t3lib_div::makeInstance ( 'mediumDoc' );
			$this->doc->backPath = $BACK_PATH;
			
			$this->content .= $this->doc->startPage ( $LANG->getLL ( 'title' ) );
			$this->content .= $this->doc->header ( $LANG->getLL ( 'title' ) );
			$this->content .= $this->doc->spacer ( 5 );
			$this->content .= $this->doc->spacer ( 10 );
		}
	
	}
	
	/**
	 * Prints out the module HTML
	 *
	 * @return	void
	 */
	public function printContent() {
		$this->content .= $this->doc->endPage ();
		echo $this->content;
	}
	
	/**
	 * Generates the module content
	 *
	 * @return	void
	 */
	public function moduleContent() {
		$action = t3lib_div::_GP ( 'action' );
		if(empty($action)){
			$action = 'index';
		}
		$action = $action.'Action';
		$this->content .= call_user_method($action,$this->cacheManagementController);
	}

}

if (defined ( 'TYPO3_MODE' ) && $TYPO3_CONF_VARS [TYPO3_MODE] ['XCLASS'] ['ext/staticfilecache_mananger/mod1/index.php']) {
	include_once ($TYPO3_CONF_VARS [TYPO3_MODE] ['XCLASS'] ['ext/staticfilecache_mananger/mod1/index.php']);
}
// Make instance:
$SOBE = t3lib_div::makeInstance ( 'tx_staticfilecachemananger_module1' );
$SOBE->init ();

// Include files?
foreach ( $SOBE->include_once as $INC_FILE )
	include_once ($INC_FILE);

$SOBE->main ();
$SOBE->printContent ();
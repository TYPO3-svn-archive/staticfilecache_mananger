<p>Alle Dateien:</p>
<ul>
<?php 
foreach($GLOBALS['view_data']['allFiles'] as $file){
	?>
	<li><a href="?M=tools_txstaticfilecachemanangerM1&action=deleteFile&id=<?php echo $file->getIdentifier(); ?>">L&ouml;schen</a> <?php echo $file->getName(); ?> </li>
	<?php 
}
?>
</ul>
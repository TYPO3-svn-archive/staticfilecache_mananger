<p>Alle Dateien:</p>
<table border="0" cellspacing="1" class="lrPadding" width="100%">
	<tr class="bgColor5 tableheader">
		
		<th>Name</th>
		<th>Aktion</th>
	</tr>

<?php 
foreach($GLOBALS['view_data']['allFiles'] as $file){
	?>
	<tr class="bgColor4">
		<td><?php echo $file->getName(); ?></td>
		<td><a href="?action=deleteFile&id=<?php echo $file->getIdentifier(); ?>">L&ouml;schen</a></td>
		
	</tr>
	<?php 
}
?>
</table>
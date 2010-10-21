<h2>Alle Dateien:</h2>
<table border="0" cellspacing="1" class="lrPadding" width="100%">
	<tr class="bgColor5 tableheader">
		<th>tstamp</th>
		<th>crdate</th>
		<th>cache_timeout</th>
		<th>explanation</th>
		<th>pid</th>
		<th>host</th>
		<th>file</th>
		<th>uri</th>
		<th>isdirty</th>
	</tr>

<?php 
foreach($GLOBALS['view_data']['allDatabaseEntrys'] as $databaseEntry){
	?>
	<tr class="bgColor4">
		<td><?php echo date('d.m.Y H:i:s',$databaseEntry->getTstamp()); ?></td>
		<td><?php echo date('d.m.Y H:i:s',$databaseEntry->getCrdate()); ?></td>
		<td><?php echo date('d.m.Y H:i:s',$databaseEntry->getCache_timeout()); ?></td>
		<td><?php echo $databaseEntry->getExplanation(); ?></td>
		<td><?php echo $databaseEntry->getPid(); ?></td>
		<td><?php echo $databaseEntry->getHost(); ?></td>
		<td><?php echo $databaseEntry->getFile(); ?></td>
		<td><?php echo $databaseEntry->getUri(); ?></td>
		<td><?php echo $databaseEntry->getIsdirty(); ?></td>
	</tr>
	<?php 
}
?>
</table>
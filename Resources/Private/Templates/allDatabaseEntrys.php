<style type="text/css">
<!--
	table td.nowrap		{ white-space:nowrap; }
	table.lrPadding td	{ padding-left: 5px; padding-right: 5px; }
-->
</style>


<h2>Alle Datenbankeinträge:</h2>
<table border="0" cellspacing="1" class="lrPadding" width="100%">
	<tr class="bgColor5 tableheader">
		<th>tstamp</th>
		<th>crdate</th>
		<th>cache_timeout</th>
		<th>explanation</th>
		<th>pid</th>
		<th>host</th>
		<th>uri</th>
		<th>file</th>
		<th>isdirty</th>
	</tr>

<?php 
foreach($GLOBALS['view_data']['allDatabaseEntrys'] as $databaseEntry){
	?>
	<tr class="bgColor4">
		<td class="nowrap"><?php echo date('d.m.Y H:i:s',$databaseEntry->getTstamp()); ?></td>
		<td class="nowrap"><?php echo date('d.m.Y H:i:s',$databaseEntry->getCrdate()); ?></td>
		<td class="nowrap"><?php echo date('d.m.Y H:i:s',$databaseEntry->getCache_timeout()); ?></td>
		<td class="nowrap"><?php echo $databaseEntry->getExplanation(); ?></td>
		<td class="nowrap"><?php echo $databaseEntry->getPid(); ?></td>
		<td class="nowrap"><?php echo $databaseEntry->getHost(); ?></td>
		<td class="nowrap"><?php echo $databaseEntry->getUri(); ?></td>
		<td class="nowrap"><?php echo $databaseEntry->getFile(); ?></td>
		<td class="nowrap"><?php echo $databaseEntry->getIsdirty(); ?></td>
	</tr>
	<?php 
}
?>
</table>
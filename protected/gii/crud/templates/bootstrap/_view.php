<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<tr class="view">

<?php
$count=0;

//var_dump($this);

foreach($this->tableSchema->columns as $column)
{
	if($column->isPrimaryKey)
		continue;
	if(++$count==7)
		echo "\t<?php /*\n";
	echo "\t <td><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:\n";
	echo "\t <?php echo CHtml::encode(\$data->{$column->name}); ?>\n\t </td>\n\n";
}
if($count>=7)
	echo "\t*/ ?>\n";
?>

</tr>
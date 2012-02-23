<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>

<h1><?php echo $label; ?></h1>

<table>
    <tr>
    <?php 
        echo "<?php "; ?>
        
        $user = function() {
        
        } 
        $dataProvider->getData();
        
        
        if ( count($user) > 0 ) {
            $columnlabels = $user[0]->attributeLabels();
            foreach( $columnlabels as $columnlabel ) {
                echo "<th>$columnlabel</th>";
            }
        }
        ?>
    </tr>

    <?php echo "<?php"; ?> $this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProvider,
    	'itemView'=>'_view',
    )); ?>

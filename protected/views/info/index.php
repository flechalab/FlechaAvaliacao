<?php
$this->breadcrumbs=array(
	'Infos',
);

$this->menu=array(
	array('label'=>'Create Info', 'url'=>array('create')),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>Infos</h1>

<table>
    <tr>
    <?php         
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

    <?php $this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProvider,
    	'itemView'=>'_view',
    )); ?>

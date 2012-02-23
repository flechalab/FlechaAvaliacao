<?php
$this->breadcrumbs=array(
	'Socials',
);

$this->menu=array(
	array('label'=>'Create Social', 'url'=>array('create')),
	array('label'=>'Manage Social', 'url'=>array('admin')),
);
?>

<h1>Socials</h1>

<div class="items">
    <table>
        <tr>
        <?php
            $user = $dataProvider->getData();
            if ( count($user) > 0 ) {
                $columnlabels = $user[0]->attributeLabels();
                foreach( $columnlabels as $columnlabel ) {
                    echo "<th>$columnlabel</th>";
                }
            }
            ?>
        </tr>

        <?php 
        $this->widget('zii.widgets.CListView', array(
	        'dataProvider'=>$dataProvider,
        	'itemView'=>'_view',
        )); 
        ?>
        </tr>
    </table>
</div>

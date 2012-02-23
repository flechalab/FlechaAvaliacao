<?php

class ToolsController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow admin to perform 'index'
				'actions'=>array('index'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex()
	{
	    $fileName   = __DIR__ . '/../../docs/bancos.csv';
	    $fileHandle = fopen($fileName, 'r');
	    
        while ( ($line = fgets($fileHandle)) !== false ) {
            $fields   = explode(',', $line);
            $fields   = array_map( function($field) { 
                                       return str_replace('"','', $field); 
                                   }, $fields );

            $condition = '(info_id=:infoId AND value=:code)';
            $params    = array( ':infoId' => Info::ID_CODIGO,
                                ':code'   => $fields[0] );
            $findBank  = StuffInfo::model()->find($condition, $params);
            
            if ( $findBank ) {
                continue;
            }
            $stuff                = new Stuff;
            $stuff->name          = $fields[1];
            $stuff->save();
            $this->_saveInfo($stuff, $fields);
        }
	    fclose($fileHandle);
	    echo 'Finished';
	}
	
	protected function _saveInfo($stuff, $fields)
	{        
        $stuffInfo            = new StuffInfo;
        $stuffInfo->stuff_id  = $stuff->id;
        $stuffInfo->info_id   = Info::ID_CODIGO;
        $stuffInfo->value     = $fields[0];
        $stuffInfo->save();
        unset($stuffInfo);
        $stuffInfo            = new StuffInfo;
        $stuffInfo->stuff_id  = $stuff->id;
        $stuffInfo->info_id   = Info::ID_SITE;
        $stuffInfo->value     = $fields[2];
        $stuffInfo->save();
        unset($stuffInfo);
	}
}
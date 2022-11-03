<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

class GridController extends Controller
{

    public function actionIndex1()
    {
    $data=[
        ['id'=>1,'name'=>'name1'],
        ['id'=>2,'name'=>'name2'],
        ['id'=>3,'name'=>'name3'],
        ['id'=>4,'name'=>'name4'],
        
    ];
    $provider=new ArrayDataProvider([
        'allModels'=>$data,
        
    ]);

    
return $this->render('index1',['provider1'=>$provider]);
    }
}
    

    
<?php
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\helpers\Html;

?>
<?php $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
            'id',
            'name',
             ];
        ?>
 <?= ExportMenu::widget([
    'dataProvider' =>$provider1,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'name',
     ],
]); ?>

// You can choose to render your own GridView separately
 <?= GridView::widget([
    'dataProvider' => $provider1,
    'columns' => $gridColumns,
    'pjax' => true,
    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="fas fa-book"></i> Library</h3>',
    ],
     //set a label for default menu
        'export' => [
     'label' => 'export',
  ],
   'exportContainer' => [
       'class' => 'btn-group mr-2 me-2'
   ],
     //your toolbar can include the additional full export menu
        'toolbar' => [
      '{export}',
       '{toggleData}',
       [
        'content' => Html::a('<i class="fa fa-print btn btn-default btn-lg">print</i>','a',['id' => 'userprint'])
       ],
  ],
    
      // $fullExportMenu,

          // 'columns' => $gridColumns,
     ]);
?>
<?php
$this->registerJs(
 '$("#userprint").on("click", function() {
        window.open("http://localhost:8080/index.php?r=grid%2Findex1","_blank");
    });'
);
?>





            
            
             

        

            

                
                
                 
                

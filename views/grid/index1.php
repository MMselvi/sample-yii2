<?php
use yii\grid\GridView;
?>

<?=GridView::widget([
'dataProvider' => $provider1,
'columns' => [
    ['class' => 'yii\grid\SerialColumn'],
    'id',
    'name',
],
]);

/** @var yii\web\View $this */
$this->title = 'My Yii Application';
?>
<script>
    window.print()
    </script>
                

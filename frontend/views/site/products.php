<?php

use kartik\widgets\Select2;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>

<?php
$column = Select2::widget([
    'name' => 'color',
    'value' => ['green', 'redани'], // initial value
    'data' => ['green' => 'green', 'red' => 'red'],
    'maintainOrder' => true,
    'options' => ['placeholder' => 'Select a color ...', 'multiple' => true],
    'pluginOptions' => [
        'tags' => true,
        'maximumInputLength' => 10
    ],
]);
?>

<?php Pjax::begin([
    'timeout' => 100000,
    'id'=>'pjax-container-table',
]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'title',
            'filter' => $column,
        ],
    ],
]) ?>

<?php Pjax::end(); ?>

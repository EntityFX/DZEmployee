<?php
/* @var $this yii\web\View */
use app\models\EmployeeHelper;
use yii\grid\GridView;
use yii\helpers\Html;
?>
<section class="list">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">List of Employee</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row list-panel">
                            <div class="col-sm-12">
                                <?= Html::a(
                                    '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add Employee',
                                    ['site/add'],
                                    [
                                        'title' => "Add an new employee",
                                        'class' => "btn btn-primary btn-lg"
                                    ]
                                ) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= GridView::widget([
                                    'dataProvider' => $model,
                                    'columns' => [
                                        [
                                            'label' => 'ID',
                                            'format' => 'raw',
                                            'value' => function ($item) {
                                                return Html::a(
                                                    $item->id,
                                                    ['site/edit', 'id' => $item->id],
                                                    ['title' => "Edit employee {$item->id}"]);
                                            }
                                        ],
                                        'name',
                                        'age',
                                        'email',
                                        [
                                            'label' => 'Gender',
                                            'format' => 'raw',
                                            'value' => function ($item) {
                                                return EmployeeHelper::genderString($item->gender);
                                            }
                                        ],
                                        [
                                            'label' => 'Rate',
                                            'format' => 'raw',
                                            'value' => function ($item) use ($rates) {
                                                return EmployeeHelper::rate($rates, $item->rate);
                                            }
                                        ],
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header'=>'Action',
                                            'headerOptions' => ['width' => '80'],
                                            'template' => '{delete}',
                                        ],
                                    ],
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
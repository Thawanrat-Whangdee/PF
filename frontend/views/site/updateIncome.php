<?php

use app\models\Typeincome;
use app\models\Types;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Incomes */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .bg-register-image {
        background: url("https://img.freepik.com/premium-vector/vector-cartoon-business-finance-management-icon-comic-style-time-is-money-concept-illustration-pictogram-financial-strategy-business-splash-effect-concept_157943-5361.jpg?w=2000");
        background-position: center;
        background-size: cover;
    }
    .bg-register-color {
        background-image: url('https://webgradients.com/public/webgradients_png/010%20Winter%20Neva.png');
        background-size: cover;
    }
    .typeBlock {
        border-radius: 2rem;
        
    }
    .bg-color {
        background-color: #0B0B45;
        color:#ececec;
    }

</style>

<body style="background-color: #41DBC6;background-size: cover;background-position: center;">
    <div class="">
        <div class="site-signup">

            <div class="card o-hidden border-0 my-5 shadow typeBlock">
                <div class="">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Update Income</h1>
                                </div>
                                </br>
                                <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-auto">
                                        <img src="https://cdn-icons-png.flaticon.com/512/5778/5778825.png" width="50px">
                                    </div>
                                    <div class="col">
                                    <?php $form = ActiveForm::begin([
                                    'id' => 'form-signup',
                                    'options' => ['class' => 'user']
                                    ]); ?>
                                    <?php  $income_type = ArrayHelper::map(Typeincome::find()->all(), 'type_name','type_name'); ?>
                                    <?= $form->field($model, 'income_type', [
                                        'inputOptions' => [
                                            'class' => 'form-control btn btn-light dropdown-toggle typeBlock rounded-pill',
                                        ]
                                    ])->dropDownList($income_type,['prompt'=>'Select Types',]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card o-hidden border-0 my-5 shadow typeBlock">
                <div class="">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-auto">
                                        <img src="https://cdn-icons-png.flaticon.com/512/2189/2189503.png" width="50px">
                                    </div>
                                    <div class="col">
                                    <?= $form->field($model, 'amount', [
                                        'inputOptions' => [
                                            'class' => 'form-control form-control-user rounded-pill',
                                        ]
                                    ])->textInput(['autofocus' => true]) ?>
                                    <span>THB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card o-hidden border-0 my-5 shadow typeBlock">
                <div class="">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-auto">
                                        <img src="https://cdn-icons-png.flaticon.com/128/6853/6853146.png" width="50px">
                                    </div>
                                    <div class="col">
                                        <?= $form->field($model, 'create_date')->widget(
                                                DatePicker::className(), [
                                                    'options' => ['class' => 'form-control rounded-pill'],
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'yyyy MM dd',
                                                        'todayBtn' => true,
                                                        'todayHighlight' => true,
                                                        'showClear' => true,
                                                        'clearBtn' => true,
                                                        'language' => 'en', 
                                                    ],
                                                    
                                                ]
                                        ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $form->field($model, 'create_by')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false) ?>
            <?= Html::submitButton('Update', ['class' => 'btn btn-success btn-user btn-block rounded-pill shadow-lg']) ?>
            <?php ActiveForm::end() ?>                        
                                    
                                    
                                    
                                
                            
        </div>
    </div>
</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

<?php

/** @var yii\web\View $this */

use app\models\Expenses;
use app\models\Limit;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

$this->title = 'Limit';
?>

<!DOCTYPE html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Hind+Siliguri:wght@300&family=Nunito&family=Open+Sans&family=Sarabun:wght@200&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Balsamiq Sans', cursive;
        }

        .card {
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            width: 40%;
            margin: 2rem auto;
            height: 560;
            border-radius: 30px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .containerB {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .cartTotal {
            width: 150px;
            height: 560;
            border-radius: 10px;
            text-align: center;
        }

        p {
            margin-top: 0;
            margin-bottom: 0rem;
        }

        .border {
            border-radius: 10rem;
        }
    </style>
    <script src="https://kit.fontawesome.com/c3c7a2a31a.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #f8f9fa; font-size: 14px;">
    <div class="site-index">
        <h3 style="margin-top: 10px; margin-bottom: 20px;">Username</h3>
        <div class="card" style="width:100%">
            <div style="margin-top:10px; margin-bottom:10px;">
                <center>
                    <table style="border:1; width:80%; text-align:center;">
                        <tr>
                            <th>
                                <?= Html::a('<i class="fa-solid fa-house" style="color:#0B0B45; font-size: 1.4em; "></i>', ['/site/overview']); ?>
                            </th>
                            <th>
                                <?= Html::a('<i class="fa-regular fa-calendar" style="color:red; font-size: 2em;"></i>', ['/site/calendar']); ?>
                            </th>
                            <th>
                                <?= Html::a('<i class="fa-solid fa-money-check" style="color:blue; font-size: 2em;"></i>', ['/site/limit']); ?>
                            </th>
                            <th>
                                <?= Html::a('<i class="fa-solid fa-chart-simple" style="color:orange; font-size: 2em;"></i>', ['/site/bar']); ?>
                            </th>
                        </tr>
                        <tr>
                            <td>Overview</td>
                            <td>Calendar</td>
                            <td>Limits</td>
                            <td>Analyze</td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
        <center>
        <?php 

            // $model = Limit::findOne(['_id' => isset($_id) ? $_id : null]);
            // if ($model === null) {
            //     throw new NotFoundHttpException('The requested page does not exist.');
            // }

            $total_expense = 0;
            $expense = Expenses::find()->where(["create_by"=>(String)Yii::$app->user->identity->id])->all();
            $exlist = [];
            $type_e = [];
            foreach ($expense as $e) {
                $exlist[] = $e->amount;
                $type_e[] = $e->expense_type;
            }
            $total_expense = array_sum($exlist);

            $lilist = 0;
            $_id = 0;
            $limit = Limit::find()->where(["create_by"=>(String)Yii::$app->user->identity->id])->all();
            foreach ($limit as $l) {
                $lilist = $l->amount;
                $_id = $l->_id;
            }
             

        ?>
            <div class="card" style="width: 100%; ">
                <div class="containerB">
                    <p style="margin-right: 200px;">Rest Limit (baht)</p>
                    <h4 style="margin-bottom: 20px;"><b><?php echo (int)$lilist-(int)$total_expense ?></b></h4>
                    <table>
                        <tr>
                            <th>
                                <div class="cartTotal" style="background-color: #020035; color:white; ">
                                    <p>Limit</p>
                                    <p>
                                        <?php 
                                            echo $lilist;
                                        ?>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div style="margin-left: 5px;">
                                    <div class="cartTotal" style="background-color: #020035; color:white;">
                                        <p>Amount Expense</p>
                                        <p> 
                                            <?php 
                                            echo $total_expense;
                                            ?> 
                                        </p>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </table>

                </div>
            </div>
            <?php 
                if ($_id !== 0 && $_id !== null) {
                    echo Html::a('Edit', ['/site/update-limit', '_id' => (string)$_id], ['class' => 'btn btn-primary rounded-pill shadow-lg']);
                    echo Html::a('Delete', ['/site/delete-limit', '_id' => (string)$_id], ['class' => 'btn btn-danger rounded-pill shadow-lg']); 
                }
            ?>
        </center>
    </div>
</body>

</html>
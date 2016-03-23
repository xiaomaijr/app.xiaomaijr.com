<?php
/**
 * Created by PhpStorm.
 * User: zhangxiao-pc
 * Date: 2016/3/21
 * Time: 17:44
 */

namespace api\controllers;


use common\models\ApiBaseException;
use common\models\ApiErrorDescs;
use common\models\ApiUtils;
use yii\web\Controller;
use yii\web\Response;

class NoticeController extends Controller
{
    public function behaviors()
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        return parent::behaviors(); // TODO: Change the autogenerated stub
    }
    /**
     * 注册绑定回跳接口
     */
    public function actionBindReturn(){
        try{
            $request = $_REQUEST;
            $resultCode = htmlspecialchars(ApiUtils::getIntParam('ResultCode', $request));
            if($resultCode == 88){
                $result = [
                    'code' => ApiErrorDescs::SUCCESS,
                    'message' => 'success',
                ];
            }else{
                $result = [
                    'code' => ApiErrorDescs::SUCCESS,
                    'message' => 'success',
                    'result' => $resultCode
                ];
            }
        }catch(ApiBaseException $e){
            $result = [
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ];
        }
        echo $result;
    }
}
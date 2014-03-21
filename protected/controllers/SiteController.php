<?php

class SiteController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionShortenUrl() {
        $model = new Urls;
        $model->attributes = array(
            'url' => $_POST['url']
        );
        
        if ($model->save()) {
            $host = Yii::app()->getRequest()->getHostInfo();
            
            $shortUrl = $host.'/'.base_convert($model->id, 10, 36);
        }
        
        header('Content-type: application/json');
        echo json_encode(['shortUrl' => $shortUrl]);
    }
    
    public function actionRedirect($id) {
        $id = base_convert($id, 36, 10);
        $url = Yii::app()->db->createCommand("SELECT url FROM urls WHERE id=:id")->queryScalar(['id' => $id]);
        if ($url) {
            $this->redirect($url);
        }
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}

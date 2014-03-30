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
            header('Content-type: application/json');
            echo json_encode(['shortUrl' => $model->getShortUrl()]);
        }
    }
    
    public function actionRedirect($id) {
        $url = Urls::getUrl($id);
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

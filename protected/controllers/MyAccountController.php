<?php

/**
 * Class MyAccountController
 * @author Demi 992392919@qq.com
 */
class MyAccountController extends BaseController
{
    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
        $this->session = Yii::app()->session;

        //管理员模拟用户登陆
        $customer_id = (int)Yii::app()->request->getParam('customer_id');
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == Yii::app()->params['admin'] && $customer_id > 0) {
            unset($_SESSION['admin']);
            $customer = Customer::model()->findByPk($customer_id);
            $identify = new CustomerIdentity();
            $identify->assignCustomer($customer);
            Yii::app()->user->login($identify);
        }
        if (Yii::app()->user->isGuest) Yii::app()->user->loginRequired();
        $this->layout = 'sign_layout';
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/account.css');
    }

    public function actionIndex()
    {
        Yii::app()->session['subtime'];
        $customer_id = Yii::app()->user->id;
        $userInfo = Customer::model()->findByPk($customer_id);
        $this->render('index', array('userInfo' => $userInfo));
    }

    public function actionGold()
    {
        $this->render('gold');
    }

    public function actionModify()
    {
        $this->render('modifyAccount');
    }

    public function actionmydata()
    {
        $this->render('index');
    }

    public function actionmypassword()
    {
        $this->render('mypassword');
    }

    public function actionEditInfo()
    {
        $customer_id = Yii::app()->request->getParam('customer_id');
        $customer = Customer::model()->findByPk($customer_id);
        $customer->email = Yii::app()->request->getParam('email');
        $customer->user_name = Yii::app()->request->getParam('user_name');
        $customer->nick_name = Yii::app()->request->getParam('nick_name');
        $customer->gender = Yii::app()->request->getParam('gender');
        if ($customer->save()) {
            echo CJSON::encode(array('ok' => true));
            Yii::app()->end();
        } else {
            echo CJSON::encode(array('ok' => true, 'message' => '保持失败，请联系管理员'));
            Yii::app()->end();
        }

    }
}
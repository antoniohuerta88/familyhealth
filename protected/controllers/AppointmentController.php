<?php

class AppointmentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'roles'=>array('Paciente','Doctor','Admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array('@','Paciente','Admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','update','DownloadReport'),
				'roles'=>array('Doctor','Admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Appointment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Appointment']))
		{
            $model->attributes=$_POST['Appointment'];
            $date = new DateTime($model->appointmentdate); 
            
            $dayofweek = date('w', strtotime($model->appointmentdate));
            
            if(in_array($dayofweek,array(1,2,3,4,5)))
            {

                if(strtotime($date->format('H:i:s')) == strtotime('19:50:00') )
                {
                    $newDate = $date->add(new DateInterval( $dayofweek == 5 ? 'PT3610M' : 'PT730M'));
                    $model->appointmentdate = $newDate->format('Y-m-d H:i:s'); 
                }
                
                $criteria=new CDbCriteria;
                
                $criteria->condition = 'patientuserid = :patientuserid && appointmentdate = :appointmentdate';
                $criteria->params = array(":patientuserid" => Yii::app()->user->id, ":appointmentdate" => $model->appointmentdate);

                $appointmentAlreadyExists = Appointment::model()->find($criteria);
                
                if($appointmentAlreadyExists===null)
                {
                    
                    $list= Yii::app()->db->createCommand('
                    SELECT (SELECT COUNT(*) FROM tbl_user as b inner join authassignment as c on c.userid = b.id and c.itemname = \'Doctor\') -
                    (SELECT COUNT(*) FROM tbl_appointment WHERE appointmentdate = :appointmentdate ) as doctorsavailable ')->bindValue(':appointmentdate',$model->appointmentdate)->queryAll();
                    
                    $rsDoctorsAvailabe=array();
                    foreach($list as $item){
                        $rsDoctorsAvailabe[]=$item['doctorsavailable'];
                    }
                    
                    if($rsDoctorsAvailabe[0] > 0){
                        
                        $list= Yii::app()->db->createCommand('
                        SELECT b.id
                        FROM tbl_appointment as a       
                        RIGHT join tbl_user as b on a.doctorUserid = b.id AND a.completed = 0
                        inner join authassignment as c on c.userid = b.id and c.itemname = \'Doctor\'
                        GROUP BY a.doctorUserId
                        ORDER BY COUNT(a.id) ASC
                        ')->queryAll();

                        $rs=array();
                        foreach($list as $item){
                            $rs[]=$item['id'];
                        }
                        
                        $model->doctoruserid = $rs[0];
                        $model->patientuserid = Yii::app()->user->id;
                        
                        if($model->save())
                            $this->redirect(array('view','id'=>$model->id));
                        
                    }
                    else{
                        Yii::app()->user->setFlash('error', "No hay doctores disponibles para esa hora!");
                    }
                }
                else{
                    Yii::app()->user->setFlash('error', "Ya tienes una cita registrada a esa hora!");
                }
            }
            else{
                Yii::app()->user->setFlash('error', "Selecciona un dia de lunes a viernes!");
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Appointment']))
		{
			$model->attributes=$_POST['Appointment'];
            $model->completed = 1;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Appointment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Appointment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Appointment']))
			$model->attributes=$_GET['Appointment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Appointment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Appointment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Appointment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='appointment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    public function actionDownloadReport() {
        //$fields = array('appointmentdate', 'dfirstName', 'dlastName','firstName', 'lastName');
        Yii::import('ext.ECSVExport.ECSVExport');
        //$criteria = new CDbCriteria();
        //$criteria->select = $fields;
        //$criteria->condition = "firstName = 'John'";
        //$criteria->order = 'lastName';
        $appointments = Appointment::model()->searchbydocumentdetails(Yii::app()->user->id);
    
        $csv = new ECSVExport($appointments);
        $output = $csv->toCSV();
        $filename="file.csv";
        Yii::app()->getRequest()->sendFile($filename, $output, "text/csv", false);
        
    }
}

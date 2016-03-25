<?php

/**
 * This is the model class for table "tbl_appointment".
 *
 * The followings are the available columns in table 'tbl_appointment':
 * @property integer $id
 * @property string $diagnostic
 * @property string $treatment
 * @property string $appointmentDate
 * @property integer $completed
 * @property integer $patientUserid
 * @property integer $doctorUserid
 */
class Appointment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_appointment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patientuserid, doctoruserid,appointmentdate', 'required'),
			array('completed, patientuserid, doctoruserid', 'numerical', 'integerOnly'=>true),
			array('diagnostic, treatment', 'length', 'max'=>2000),
			array('appointmentdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, diagnostic, treatment, appointmentdate, completed, patientuserid, doctoruserid', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            //'patient'=>array(self::HAS_ONE, 'User', 'id'),
            //'doctor'=>array(self::HAS_ONE, 'User', 'id'),
            'patient' => array(self::BELONGS_TO, 'User', 'patientuserid'),
			'doctor' => array(self::BELONGS_TO, 'User', 'doctoruserid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'diagnostic' => 'Diagnostico',
			'treatment' => 'Tratamiento',
			'appointmentdate' => 'Fecha de cita',
			'completed' => 'Completada',
			'patientuserid' => 'Patient Userid',
			'doctoruserid' => 'Doctor Userid',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('diagnostic',$this->diagnostic,true);
		$criteria->compare('treatment',$this->treatment,true);
		$criteria->compare('appointmendate',$this->appointmentdate,true);
		$criteria->compare('completed',$this->completed);
		$criteria->compare('patientuserid',$this->patientuserid);
		$criteria->compare('doctoruserid',$this->doctoruserid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Appointment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function searchbydocumentdetails(){
        $count=Yii::app()->db->createCommand('
        SELECT COUNT(*) FROM tbl_appointment a 
                INNER JOIN tbl_user b ON a.doctoruserid = b.id
                INNER JOIN tbl_profile c ON b.profileid = c.id
                INNER JOIN tbl_user d ON a.patientuserid = d.id
                INNER JOIN tbl_profile e ON d.profileid = e.id ')->queryScalar();
        
        
        $query="SELECT a.appointmentdate,c.firstname as dfirstname,c.lastname as dlastname,e.firstname,e.lastname FROM tbl_appointment a 
                INNER JOIN tbl_user b ON a.doctoruserid = b.id
                INNER JOIN tbl_profile c ON b.profileid = c.id
                INNER JOIN tbl_user d ON a.patientuserid = d.id
                INNER JOIN tbl_profile e ON d.profileid = e.id ";
            return new CSqlDataProvider($query,
                array(
                    'totalItemCount'=>$count,
                    'pagination'=>array(
                        'pageSize'=>10,
                    ),
                )
            );
    }
}

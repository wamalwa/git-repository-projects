<?php

/**
 * This is the model class for table "tbuserapps".
 *
 * The followings are the available columns in table 'tbuserapps':
 * @property integer $id
 * @property integer $userid
 * @property string $appname
 * @property string $appdescription
 * @property string $createdon
 * @property integer $createdby
 */
class Userapps extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbuserapps';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userid, appname', 'required'),
            array('userid, createdby', 'numerical', 'integerOnly' => true),
            array('appname', 'length', 'max' => 50),
            array('appdescription', 'length', 'max' => 500),
            array('createdon', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, userid, appname, appdescription, createdon, createdby', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'userid' => 'Userid',
            'appname' => 'Appname',
            'appdescription' => 'Appdescription',
            'createdon' => 'Createdon',
            'createdby' => 'Createdby',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('userid', $this->userid);
        $criteria->compare('appname', $this->appname, true);
        $criteria->compare('appdescription', $this->appdescription, true);
        $criteria->compare('createdon', $this->createdon, true);
        $criteria->compare('createdby', $this->createdby);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return userapps the static model class
     */
    public function searchApps() {
        $this->userid = Yii::app()->user->getState('userid');
        $users = array();
        if (!empty($this->userid)) {
            $query = 'SELECT `appname`  FROM `tbuserapps` WHERE `userid`=' . $this->userid;
            $users = Yii::app()->db->createCommand($query)->queryColumn();
        }
        return $users;
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

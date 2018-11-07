<?php

namespace pantera\contactMe\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "contact_me".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $created_at
 * @property string $referrer
 */
class ContactMe extends ActiveRecord
{
    const EVENT_AFTER_PROCESS = 'eventAfterProcess';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contact_me}}';
    }

    public function beforeSave($insert)
    {
        $this->referrer = Yii::$app->request->referrer;
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email'], 'required'],
            [['created_at'], 'safe'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
            [['referrer'], 'string'],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'created_at' => 'Дата создания',
            'referrer' => 'Referrer',
        ];
    }
}

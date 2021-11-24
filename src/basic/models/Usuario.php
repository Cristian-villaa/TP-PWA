<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $username
 * @property string $nombre
 * @property string $apellido
 * @property int $password
 * @property int $accessToken
 * @property int $authkey
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'nombre', 'apellido', 'password'], 'required'],
            [['password', 'accessToken', 'authkey'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['nombre', 'apellido'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'password' => 'Password',
            'accessToken' => 'Access Token',
            'authkey' => 'Authkey',
        ];
    }
    //Nuevos metodos implementados 
    public static function findIdentity($id){
        return self::findOne($id);
    } 

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['accessToken'=>$token]);
    } 

    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }

    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        return $this->authkey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    public function validatePassword($password){

        return password_verify($password, $this->password);    
    }
}

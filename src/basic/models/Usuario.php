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
class Usuario extends \yii\db\ActiveRecord
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
            [['nombre', 'password', 'accessToken', 'authkey'], 'required'],
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
            'accessToken' => 'AccessToken',
            'authkey' => 'Authkey',
        ];
    }
}

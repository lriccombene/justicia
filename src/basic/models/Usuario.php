<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property string $username
 * @property string $name
 * @property string|null $password
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property int $id
 * @property int $id_rol
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    public static function tableName()
    {
        return 'usuario';
    }
    public function rules()
    {
        return [
            [['username', 'name'], 'required'],
            [['username', 'name','id_rol'], 'string', 'max' => 80],
            [['password'], 'string', 'max' => 255],
        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Nombre de usuaruio',
            'name' => 'Nombre',
            'password' => 'Clave',
            'id' => 'Identificador',
            'id_rol' => 'Rol',
        ];
    }
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['accessToken'=>$token]);
    }
    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        return $this->authKey;
    }
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return password_verify($password,$this->password);
    }

    public function getId_rol()
    {
        return $this->id_rol;
    }
}

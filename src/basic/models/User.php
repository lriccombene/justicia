<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property string|null $unconfirmed_email
 * @property string|null $registration_ip
 * @property int $flags
 * @property int|null $confirmed_at
 * @property int|null $blocked_at
 * @property int $updated_at
 * @property int $created_at
 * @property int|null $last_login_at
 * @property string|null $auth_tf_key
 * @property bool|null $auth_tf_enabled
 * @property int|null $password_changed_at
 * @property string|null $last_login_ip
 * @property bool|null $gdpr_consent
 * @property int|null $gdpr_consent_date
 * @property bool|null $gdpr_deleted
 *
 * @property Ordendetalle[] $ordendetalles
 * @property Ordentrabajo[] $ordentrabajos
 * @property Profile $profile
 * @property Responsable[] $responsables
 * @property SocialAccount[] $socialAccounts
 * @property Token[] $tokens
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'auth_key', 'updated_at', 'created_at'], 'required'],
            [['flags', 'confirmed_at', 'blocked_at', 'updated_at', 'created_at', 'last_login_at', 'password_changed_at', 'gdpr_consent_date'], 'default', 'value' => null],
            [['flags', 'confirmed_at', 'blocked_at', 'updated_at', 'created_at', 'last_login_at', 'password_changed_at', 'gdpr_consent_date'], 'integer'],
            [['auth_tf_enabled', 'gdpr_consent', 'gdpr_deleted'], 'boolean'],
            [['username', 'email', 'unconfirmed_email'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['auth_key'], 'string', 'max' => 32],
            [['registration_ip', 'last_login_ip'], 'string', 'max' => 45],
            [['auth_tf_key'], 'string', 'max' => 16],
            [['email'], 'unique'],
            [['username'], 'unique'],
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
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'unconfirmed_email' => 'Unconfirmed Email',
            'registration_ip' => 'Registration Ip',
            'flags' => 'Flags',
            'confirmed_at' => 'Confirmed At',
            'blocked_at' => 'Blocked At',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'last_login_at' => 'Last Login At',
            'auth_tf_key' => 'Auth Tf Key',
            'auth_tf_enabled' => 'Auth Tf Enabled',
            'password_changed_at' => 'Password Changed At',
            'last_login_ip' => 'Last Login Ip',
            'gdpr_consent' => 'Gdpr Consent',
            'gdpr_consent_date' => 'Gdpr Consent Date',
            'gdpr_deleted' => 'Gdpr Deleted',
        ];
    }

    /**
     * Gets query for [[Ordendetalles]].
     *
     * @return \yii\db\ActiveQuery|OrdendetalleQuery
     */
    public function getOrdendetalles()
    {
        return $this->hasMany(Ordendetalle::className(), ['id_usuario' => 'id']);
    }

    /**
     * Gets query for [[Ordentrabajos]].
     *
     * @return \yii\db\ActiveQuery|OrdentrabajoQuery
     */
    public function getOrdentrabajos()
    {
        return $this->hasMany(Ordentrabajo::className(), ['id_supervisor' => 'id']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery|ProfileQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Responsables]].
     *
     * @return \yii\db\ActiveQuery|ResponsableQuery
     */
    public function getResponsables()
    {
        return $this->hasMany(Responsable::className(), ['id_usuario' => 'id']);
    }

    /**
     * Gets query for [[SocialAccounts]].
     *
     * @return \yii\db\ActiveQuery|SocialAccountQuery
     */
    public function getSocialAccounts()
    {
        return $this->hasMany(SocialAccount::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Tokens]].
     *
     * @return \yii\db\ActiveQuery|TokenQuery
     */
    public function getTokens()
    {
        return $this->hasMany(Token::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}

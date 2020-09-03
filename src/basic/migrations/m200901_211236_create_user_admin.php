<?php

use yii\db\Migration;

/**
 * Class m200901_211236_create_user_admin
 */
class m200901_211236_create_user_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // Crear el Rol Administrador
        $administratorRole = $auth->createRole('administrador');
        $administratorRole->description = 'Administrador';
        $auth->add($administratorRole);


        // Crear el usuario admin/administrador
        $user = new \Da\User\Model\User([
            'scenario' => 'create',
            'email' => "email@example.com",
            'username' => "admin",
            'password' => "administrador"
        ]);
        $user->confirmed_at = time();
        $user->save();

        // Asignar el Rol Adminsitrador al Usuario admin
        $auth->assign($administratorRole, $user->id);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //Instancia AuthManager
        $auth = Yii::$app->authManager;

        // Eliminar el rol administrador y el usuario admin
        $administratorRole = $auth->getRole("administrador");
        $user = \Da\User\Model\User::findOne(['name'=>"admin"]);
        $auth->revoke($administratorRole, $user->id);
        $user->delete();
        $auth->remove($administratorRole);
    }

}

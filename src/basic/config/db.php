<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host='.$_ENV['DB_HOST'].';port=5432;dbname='.$_ENV['DB_DATABASE'],
    'username' => 'postgres',
    'password' => $_ENV['DB_PASSWORD'],
  //  'charset' => '',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

sudo bin/yii.sh migrate/create create_ordentrabajo_table --fields="nro:string:notNull,id_supervisor:integer:notNull:foreignKey(usuario),id_inmueble:integer:notNull:foreignKey(inmueble),id_tarea:integer:notNull:foreignKey(tarea),fecinicio:date,descripcion:string,archivo:string,id_ordendetalle:integer:notNull:foreignKey(ordendetalle)"

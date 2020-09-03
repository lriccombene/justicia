sudo bin/yii.sh migrate/create create_dictamentecnico_table --fields="fec:date,nro:integer:notNull,id_categoria:integer:notNull:foreignKey(categoria),id_empresa:integer:notNull:foreignKey(empresa),id_area:integer:notNull:foreignKey(area),id_yacimiento:integer:notNull:foreignKey(yacimiento),id_tipodictamen:integer:notNull:foreignKey(tipodictamen),id_tipotrabajo:integer:notNull:foreignKey(tipotrabajo),detalle:text,longitud:integer,latitud:integer"


,,id_tipotarbajo:integer:notNull:foreignKey(tipotrabajo),
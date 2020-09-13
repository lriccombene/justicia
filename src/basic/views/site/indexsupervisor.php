
<div class="site-index">

    <div class="jumbotron">
        <h1>Ordenes Trabajo</h1>

    </div>

    <div class="body-content">

<div class="row">
    <div class="col-md-12">

        <table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Fec Creacion
                    </th>
                    <th>
                        NRo
                    </th>
                    <th>
                        Descripcion
                    </th>
                    <th>
                        Tarea
                    </th>
                    <th>
                        Inmueble
                    </th>
                    <th>
                      Tomada Por
                    </th>
                    <th>
                      Fec Inicio
                    </th>
                    <th>
                      Hora Inicio
                    </th>
                    <th>
                      Fec Final
                    </th>
                    <th>
                      Hora Final
                    </th>
                    <th>
                        Estado
                    </th>

                </tr>
            </thead>
            <tbody>

            <?php
            use app\models\User;
            $municipio='';

            if ($model<>''){
                foreach ($model as $nombre ) {
                  $estado='';
                  $tomado='';
                  $fecfinal='';
                  $horafinal='';
                  $fecinicio='';
                  $horainicio='';

                  $a='';
                  if($nombre->ordendetalle<>NULL){
                    //var_dump($nombre->ordendetalle[0]->id_usuario);
                    $estado=Yii::$app->db->createCommand("SELECT nombre FROM tipoestado WHERE id = ".$nombre->ordendetalle[0]->id_tipoestado)->queryScalar();
                    $tomado=   User::find()->where(['id' =>$nombre->ordendetalle[0]->id_usuario])->one();
                    $tomado=$tomado->username;
                    $fecinicio=$nombre->ordendetalle[0]->fecinicio;
                    $horainicio=$nombre->ordendetalle[0]->horainicio;
                    $fecfinal=$nombre->ordendetalle[0]->fecfinal;
                    $horafinal=$nombre->ordendetalle[0]->horafinal;
                    //$a= User::find()->All()
                  }
                  //  var_dump($tomado);
//->where(['tipoestado.id' => $nombre->ordendetalle[0]->id_tipoestado]);
                          //  $estado=Yii::$app->db->createCommand("SELECT nombre FROM tipoestado WHERE id = ".$nombre->ordendetalle[0]->id_tipoestado)->queryScalar();

                            echo "<tr >";
                            echo "<td >";print_r( $nombre->id);"</td>";
                            echo "<td >";print_r( $nombre->fecinicio);"</td>";
                            echo "<td>";print_r( $nombre->nro);"</td>";
                            echo "<td>";print_r( $nombre->descripcion);"</td>";
                            echo "<td>";print_r( $nombre->tarea->nombre);"</td>";
                            echo "<td>";print_r( $nombre->inmueble->nombre);"</td>";
                            echo "<td>";print_r($tomado);"</td>";
                            echo "<td>";print_r($fecinicio);"</td>";
                            echo "<td>";print_r($horainicio);"</td>";
                            echo "<td>";print_r($fecfinal);"</td>";
                            echo "<td>";print_r($horafinal);"</td>";
                            echo "<td>";print_r( $estado);"</td>";

                            echo "</tr>";
                            }
                        }?>


              </tbody>
          </table>
      </div>
  </div>
</div>



    </div>
</div>
<script type="text/javascript">
function funcOrdendetalle(id){

	window.location.href = "/ordendetalle/update?id="+id;
}
</script>

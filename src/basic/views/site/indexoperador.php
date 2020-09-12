
<div class="site-index">

    <div class="jumbotron">
        <h1>Ordenes Asignadas</h1>

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
                        Fecha Inicio
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
                        Estado
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>

            <?php
            $municipio='';

            if ($model<>''){
                foreach ($model as $nombre ) {
                  $estado='';
                  if($nombre->ordendetalle<>NULL){
                    //var_dump($nombre->ordendetalle[0]->id_tipoestado);
                    $estado=Yii::$app->db->createCommand("SELECT nombre FROM tipoestado WHERE id = ".$nombre->ordendetalle[0]->id_tipoestado)->queryScalar();

                  }

//->where(['tipoestado.id' => $nombre->ordendetalle[0]->id_tipoestado]);
                          //  $estado=Yii::$app->db->createCommand("SELECT nombre FROM tipoestado WHERE id = ".$nombre->ordendetalle[0]->id_tipoestado)->queryScalar();

                            echo "<tr >";
                            echo "<td >";print_r( $nombre->id);"</td>";
                            echo "<td >";print_r( $nombre->fecinicio);"</td>";
                            echo "<td>";print_r( $nombre->nro);"</td>";
                            echo "<td>";print_r( $nombre->descripcion);"</td>";
                            echo "<td>";print_r( $nombre->tarea->nombre);"</td>";
                            echo "<td>";print_r( $nombre->inmueble->nombre);"</td>";
                            echo "<td>";print_r( $estado);"</td>";
                            if($estado===''){
                                echo "<td><a id ='boton'  href='/ordendetalle/create?id_ordentrabajo=$nombre->id' type='button' class='btn btn-primary' >Tomar Orden</a></td>";
                            }else{
                              $id=$nombre->ordendetalle[0]->id_tipoestado;
                                echo "<td><a id ='boton' onclick='funcOrdendetalle($id);' type='button' class='btn btn-warning' >Actualizar Orden</a></td>";
                            }
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

<?php


use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Html;
$this->title = 'My Yii Application';
/* @var $this yii\web\View */

?>
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
                </tr>
            </thead>
            <tbody>

            <?php
            $municipio='';
            var_dump($model);
            if ($model<>''){
                foreach ($model as $nombre ) {

                            echo "<tr >";
                            echo "<td >";print_r( $nombre->id);"</td>";
                            echo "<td>";print_r( $nombre->nro);"</td>";
                            echo "<td>";print_r( $nombre->descripcion);"</td>";
                            echo "<td>";print_r( $nombre->tarea->nombre);"</td>";
                            echo "<td>";print_r( $nombre->inmueble->nombre);"</td>";
                          //  echo "<td>";print_r( $nombre->ordendetalle->estado);"</td>";
                            echo "<td><a id ='boton'  href='/ordendetalle/create' type='button' class='btn btn-primary' >Tomar Orden</a></td>";
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

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
Yii::$app->params['boostrap']=4;

$this->registerCssFile("//unpkg.com/bootstrap/dist/css/bootstrap.min.css",['position'=>$this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css",['position'=>$this::POS_HEAD]);
//$this->registerCssFile("//polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver",['position'=>$this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js",['position'=>$this::POS_HEAD]);
//$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);
?>

<div class="empresa-form " >

  <div id="app" class="container-fluid">
    <div class="form-group">
      <label for="nro">Numero :</label>
      <input v-bind:placeholder="nro_hint" class="form-control" id="nro" v-model="nro" type="text" name="nro" required >
      <span class="text-danger" v-if="errors.nro" >{{errors.nro}}</span>
	 </div>
  <div class="form-group">

    <label for="supervisor">Supervisor :</label>

    <select v-model="selected_supervisor" class="form-control" required >
        <option v-for="option in supervisores" v-bind:value="option.id">
                {{ option.username }}
        </option>
    </select>
    <span class="text-danger" v-if="errors.id_consultor" >{{errors.id_consultor}}</span>

  </div>
  <div class="form-group">

    <label for="inmueble">Inmueble :</label>

    <select v-model="selected_inmueble" class="form-control" required >
        <option v-for="option in inmuebles" v-bind:value="option.id">
                {{ option.nombre }}
        </option>
    </select>
    <span class="text-danger" v-if="errors.id_inmuebles" >{{errors.id_inmuebles}}</span>

  </div>
  <div class="form-group">

    <label for="tarea">Tarea :</label>

    <select v-model="selected_tarea" class="form-control" required >
        <option v-for="option in tareas" v-bind:value="option.id">
                {{ option.nombre }}
        </option>
    </select>
    <span class="text-danger" v-if="errors.id_tarea" >{{errors.id_tarea}}</span>

  </div>
  <div class="form-group">
          <label for="fecinicio">Fecha Inicio :</label>
          <input v-bind:placeholder="fecinicio_hint" class="form-control" id="fecinicio" v-model="fecinicio" type="date" name="fecinicio">
          <span class="text-danger" v-if="errors.fecinicio" >{{errors.fecinicio}}</span>
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion :</label>
    <input v-bind:placeholder="descripcion_hint" class="form-control" id="nro" v-model="descripcion" type="text" name="descrpcion" required >
    <span class="text-danger" v-if="errors.descripcion" >{{errors.descripcion}}</span>
  </div>

  <div class="form-group">
    <label for="archivo">Archivo :</label>
    <input v-bind:placeholder="archivo_hint" class="form-control" id="nro" v-model="archivo" type="file" name="archivo" required >
    <span class="text-danger" v-if="errors.archivo" >{{errors.archivo}}</span>
  </div>


    <div class="row">
		<div class="col-md-2">
            <button v-if="!id"  v-on:click="add()"  type ="button"  class="btn btn-success">Enviar</button>
            <button v-if="id" v-on:click ="edit(id)" type ="button" class="btn btn-warning" >Actualizar</button>
        </div>
    </div>
    </div>
</div>

<script>
  var app = new Vue({
                    el:'#app',
                    data:{
                        id:'<?php  echo ($model->id); ?>',
                        nro: '<?php  echo ($model->nro); ?>',
                        nro_hint: 'ingrese nro',
                        fecinicio:'<?php  echo ($model->fecinicio); ?>',
                        fecinicio_hint: 'ingrese fecha inicio',
                        descripcion:'<?php  echo ($model->descripcion); ?>',
                        descripcion: 'ingrese descripcion',
                        archivo:'<?php  //echo ($model->contacto); ?>',
                        archivo_hint: 'ingrese Archivo',
                    //    referente:'<?php // echo ($model->contacto); ?>',
                    //    referente_hint: 'ingrese Referente',
                        supervisores:[],
                        selected_supervisor: '<?php  echo ($model->id_supervisor); ?>',
                        inmuebles:[],
                        selected_inmueble: '<?php  echo ($model->id_inmueble); ?>',
                        tareas:[],
                        selected_tarea: '<?php  echo ($model->id_tarea); ?>',

                        errors: {}

                    },
                    mounted() {
                        this.getSupervisores();
                        this.getInmueble();
                        this.getTarea();
                        },
                    methods: {
                        normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
                        },
                        getSupervisores(){
                            var self = this;
                            axios.get('/apv1/user?sort=-username&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las user");
                                    // self.especialidades = response.data;
                                    self.supervisores = response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        getInmueble(){
                            var self = this;
                            axios.get('/apv1/inmueble?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las inmueble");
                                    // self.especialidades = response.data;
                                    self.inmuebles = response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        getTarea(){
                            var self = this;
                            axios.get('/apv1/tarea?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las tarea");
                                    // self.especialidades = response.data;
                                    self.tareas = response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        add:function(){
                           var self = this;
                           const params = new URLSearchParams();
                           params.append('nro', self.nro);
                           params.append('fecinicio', self.fecinicio);
                           params.append('descripcion', self.descripcion);
                           params.append('archivo', self.archivo);
                           params.append('id_tarea', self.selected_tarea);
                           params.append('id_inmueble', self.selected_inmueble);
                           params.append('id_supervisor', self.selected_supervisor);
                           axios.post('/apv1/ordentrabajo',params)
                              .then(function (response) {
                                  // handle success
                                  console.log(response.data);
                                  alert('Los datos fueron guardados');

                              })
                              .catch(function (error) {
                                  // handle error
                                  console.log(error.response.data);
                                  self.errors = self.normalizeErrors(error.response.data);
                              })
                              .then(function () {
                                  // always executed
                              });
                      },
                      edit:function(id){
                           var self = this;
                           const params = new URLSearchParams();
                           params.append('nro', self.nro);
                           params.append('fecinicio', self.fecinicio);
                           params.append('descripcion', self.descripcion);
                           params.append('archivo', self.archivo);
                           params.append('id_tarea', self.selected_tarea);
                           params.append('id_inmueble', self.selected_inmueble);
                           params.append('id_consultor', self.selected_consultor);
                          // alert(params);
                           axios.patch('/apv1/ordentrabajo'+'/'+id,params)
                              .then(function (response) {
                                  // handle success
                                  console.log(response.data);
                                  alert('Los datos fueron actualizados');

                              })
                              .catch(function (error) {
                                  // handle error
                                  console.log(error);

                              })
                              .then(function () {
                                  // always executed
                              });
                      }
                    }
                  })
</script>

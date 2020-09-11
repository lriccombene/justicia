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
            <label for="fecinicio">Fecha Inicio :</label>
            <input v-bind:placeholder="fecinicio_hint" class="form-control" id="fecinicio" v-model="fecinicio" type="date" name="fecinicio">
            <span class="text-danger" v-if="errors.fecinicio" >{{errors.fecinicio}}</span>
    </div>
    <div class="form-group">

      <label for="tipoestados">Estado :</label>

      <select v-model="selected_tipoestado" class="form-control" required >
          <option v-for="option in tipoestados" v-bind:value="option.id">
                  {{ option.nombre }}
          </option>
      </select>
      <span class="text-danger" v-if="errors.id_consultor" >{{errors.id_tipoestado}}</span>

    </div>
   <div class="form-group">

     <label for="usuario">usuario :</label>

     <select v-model="selected_usuario" class="form-control" required >
         <option v-for="option in usuarios" v-bind:value="option.id">
                 {{ option.username }}
         </option>
     </select>
     <span class="text-danger" v-if="errors.id_consultor" >{{errors.id_usuario}}</span>

   </div>


  <div class="form-group">
          <label for="fecfinal">Fecha Final :</label>
          <input v-bind:placeholder="fecfinal_hint" class="form-control" id="fecfinal" v-model="fecfinal" type="date" name="fecfinal">
          <span class="text-danger" v-if="errors.fecfinal" >{{errors.fecfinal}}</span>
  </div>
  <div id="app" class="container-fluid">
    <div class="form-group">
      <label for="observaciones">Observaciones :</label>
      <input v-bind:placeholder="observaciones_hint" class="form-control" id="observaciones" v-model="observaciones" type="text" name="observaciones" required >
      <span class="text-danger" v-if="errors.observaciones" >{{errors.observaciones}}</span>
   </div>
</div>
<div class="form-group">

  <label for="ordentrabajo">Orden Trabajo :</label>

  <select v-model="selected_ordentrabajo" class="form-control" required >
      <option v-for="option in ordentrabajos" v-bind:value="option.id">
              {{ option.nro }}
      </option>
  </select>
  <span class="text-danger" v-if="errors.id_consultor" >{{errors.id_ordentrabajo}}</span>

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

                        fecinicio:'<?php  echo ($model->fecinicio); ?>',
                        fecinicio_hint: 'ingrese fecha inicio',
                        fecfinal:'<?php  echo ($model->fecfinal); ?>',
                        fecfinal_hint: 'ingrese fecha inicio',
                        observaciones:'<?php  echo ($model->observaciones); ?>',
                        observaciones_hint: 'ingrese observaciones',

                    //    referente:'<?php // echo ($model->contacto); ?>',
                    //    referente_hint: 'ingrese Referente',
                        tipoestados:[],
                        selected_tipoestado: '<?php  echo ($model->id_tipoestado); ?>',
                        usuarios:[],
                        selected_usuario: '<?php  echo ($model->id_usuario); ?>',
                        ordentrabajos:[],
                        selected_ordentrabajo: '<?php  echo ($model->id_ordentrabajo); ?>',

                        errors: {}

                    },
                    mounted() {
                        this.getUsuarios();
                        this.getTipoestado();
                        this.getOrdentrabajo();
                        },
                    methods: {
                        normalizeErrors: function(errors){
                            var allErrors = {};
                            for(var i = 0 ; i < errors.length; i++ ){
                                allErrors[errors[i].field] = errors[i].message;
                            }
                            return allErrors;
                        },
                        getUsuarios(){
                            var self = this;
                            axios.get('/apv1/user?sort=-username&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las user");
                                    // self.especialidades = response.data;
                                    self.usuarios = response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        getTipoestado(){
                            var self = this;
                            axios.get('/apv1/tipoestado?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las estado");
                                    // self.especialidades = response.data;
                                    self.tipoestados = response.data;

                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .then(function () {
                                    // always executed
                                });
                        },
                        getOrdentrabajo(){
                            var self = this;
                            axios.get('/apv1/ordentrabajo?sort=-nombre&per-page=100')
                                .then(function (response) {
                                    // handle success
                                    console.log(response.data);
                                    console.log("trae todas las tarea");
                                    // self.especialidades = response.data;
                                    self.ordentrabajos = response.data;

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
                          // params.append('responsables', self.responsables);
                           axios.post('/apv1/ordentrabajo',params)
                              .then(function (response) {
                                  // handle success
                                  console.log(response.data);


                                  for ( var prop in self.responsables) {
                                      //item.id
                                      //alert(self.responsables[prop].id+ '----'+ response.data.id);
                                      const params2 = new URLSearchParams();
                                      params2.append('id_ordentrabajo', response.data.id);
                                      params2.append('id_usuario', self.responsables[prop].id);

                                    // alert(params2);
                                     // params.append('responsables', self.responsables);
                                      axios.post('/apv1/responsable',params2)
                                         .then(function (response2) {

                                        //  alert(response2.data.id);
                                         })
                                         .catch(function (error2) {
                                             // handle error
                                             //alert(error2.response.data);
                                             self.errors = self.normalizeErrors(error.response.data);
                                         })
                                         .then(function () {
                                             // always executed
                                         });
                                  }
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
                      addResponsable:function(idusu,idordentrabajo){

                         var self = this;
                         //alert(idusu+ '----'+ idordentrabajo);

                    },
                      agregarResponsable:function(){
                          //alert('holaaaaa');
                           var self = this;
                           self.responsables.push(self.selected_responsable);
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

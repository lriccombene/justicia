<?php
/* @var $this yii\web\View */
Yii::$app->params['boostrap']=4;

$this->registerCssFile("//unpkg.com/bootstrap/dist/css/bootstrap.min.css",['position'=>$this::POS_HEAD]);
$this->registerCssFile("//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css",['position'=>$this::POS_HEAD]);
//$this->registerCssFile("//polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver",['position'=>$this::POS_HEAD]);

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js",['position'=>$this::POS_HEAD]);
//$this->registerJsFile("https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js",['position'=>$this::POS_HEAD]);
$this->registerJsFile("https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js",['position'=>$this::POS_HEAD]);

echo $this->render('/components/ModelGrid2');
?>

<div 
    <h1>Ordenes de trabajo emitidas</h1>

</div>

<div id="app">
    <crud
            v-bind:model="model"
            v-bind:modelname="modelname"
            v-bind:fields="fields"
    ></crud>
</div>

<script>

    var app = new Vue({
        el: "#app",
        components:{
            crud: Crud,
        },
        data:{
            model: <?= json_encode($model->getAttributes()) ?>,
            //relates: <?//= json_encode($model->getRelationData()) ?>//,
            //rules: <?//= json_encode($model->rules()) ?>//,
            fields: ['id','nro','inmueble','tarea','fecinicio','descripcion','supervisor'] , //poner en un array los campos que queres
            modelname: <?= json_encode($model::tableName())?>,
        }
    })

</script>

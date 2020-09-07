<script type="text/x-template" id="crud-template">
    <div class="container">
         <!--<h1 class="text-capitalize">{{modelname}}</h1>-->
        <!-- Button trigger modal -->
        <p></p>
        <p></p>
        <p>
        <button v-on:click="NewModel()" type="button" class="btn btn-success">Nuevo</button>
         </p>


        <b-pagination
            v-model="currentPage"
            :total-rows="pagination.total"
            :per-page="pagination.perPage"
            aria-controls="my-table"
        ></b-pagination>


        <table class="table" id="my-table">
            <thead>
            <tr>
                <th>#</th>
                <th v-for="field in modelfields">{{field}}</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td></td>
                <td v-for="field in modelfields">
                    <input v-on:change="getModels()" class="form-control" v-model="filter[field]">
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(model,key) in models" v-bind:key="model[modelfields[0]]">
                <td>{{key+1}}</td>
                    <td v-for="field in modelfields">
                        <a v-if="model[field].nombre">{{model[field].nombre}}</a>
                        <a v-else-if="model[field].username">{{model[field].username}}</a>
                        <a v-else>{{model[field]}}</a>


                    </td>
                <td>
                    <button v-on:click="editModel(model[modelfields[0]])" type="button" class="btn btn-warning">Editar</button>
                </td>
                <td>
                    <button v-on:click="deleteModel(model[modelfields[0]])" type="button" class="btn btn-danger">Borrar</button>
                </td>
                <td>
                    <button v-on:click="archivoModel(model[modelfields[0]])" type="button" class="btn btn-info">Upload</button>
                </td>
            </tr>
            </tbody>
        </table>
        <b-pagination
            v-model="currentPage"
            :total-rows.number="pagination.total"
            :per-page.number="pagination.perPage"
            aria-controls="my-table"
        ></b-pagination>

    </div>
</script>
<script>

    const Crud = {
        name: 'crud',
        template: '#crud-template',
        components:{
            // bModal : bModal,
        },
        props: {
            modelname: String, //aqui guardamos en esta variable el modelo que utilizamos ejemplo : categoria, motivo, etc
            model : Object,// aqui tenemos el objeto del modelo
            fields: {
                type:Array,// aqui los campos que definimos mostrar
                // default: Object.keys(model),
            },
        },
        mounted() {
            this.getModels();
        },
        watch:{
            currentPage: function() {
                this.getModels();
            }
        },
        data : function(){
            return {
                modelfields: this.fields??Object.keys(this.model),
                currentPage: 1,
                pagination:{},
                filter:{},
                errors: {},
                models: [],
            }
        },
        methods: {
            normalizeErrors: function(errors){// en este metodo acomodamos los errrores para que figuren de una marenra
                                              //correcta junto al campo
                var allErrors = {};
                for(var i = 0 ; i < errors.length; i++ ){
                    allErrors[errors[i].field] = errors[i].message;
                }
                return allErrors;
            },
            getModels: function(){// en este metodo obtenemos los todos los registros de la tabla
                var self = this;
                self.errors = {};
                axios.get('/apv1/'+self.modelname+'?page='+self.currentPage,{params:self.filter})
                    .then(function (response) {
                        // handle success
                        // console.log(response.data);
                        //esta variable son utilizadas por el objeto paginacion
                        self.pagination.total = response.headers['x-pagination-total-count'];
                        self.pagination.totalPages = response.headers['x-pagination-page-count'];
                        self.pagination.perPage = response.headers['x-pagination-per-page'];
                        self.models = response.data;

                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            deleteModel: function(id){ //aqui borramos el registro de la tabla atravez del boton borrar
                var self = this;
                axios.delete('/apv1/'+self.modelname+'/'+id,{})
                    .then(function (response) {
                        // handle success
                        self.getModels();
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            editModel: function (key) { //nos redirecciona al archivo vista que esta la informacion de actualizar
                var self = this;
                window.location.href = '/'+self.modelname+'/update?id='+key;
            },
            NewModel: function () {
                var self = this; // nos re envia a la vista que crea obejeto del modelo
                window.location.href = '/'+self.modelname+'/create';
            },
            archivoModel: function (key) {
                var self = this; // nos re envia a la vista que crea obejeto del modelo
                window.location.href = '/'+self.modelname+'/archivo?id='+key;
            }


        }
    }
</script>

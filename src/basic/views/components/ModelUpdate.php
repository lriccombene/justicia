<script type="text/x-template" id="crud-template">
    <div class="container">
    <h1 class="text-capitalize">{{modelname}}</h1>
        <!-- Button trigger modal -->
            <div>
          
                <form action="">
                    <div v-if="i>0" v-for="(field,i) in modelfields" class="form-group">
                        <label :for="field">{{field}}</label>
                        <input v-model="activemodel[field]" type="text" :name="field" :id="field" class="form-control" :placeholder="'Ingrese el '+ field " aria-describedby="helpId">
                        <span class="text-danger" v-if="errors[field]" >{{errors[field]}}</span>
                    </div>
                </form>
            </div>
            <button  v-on:click ="editArea(ids)" type ="button" class="btn btn-warning" >Actualizar</button>

    </div>
</script>
<script>

    const Crud = {
        name: 'crud',
        template: '#crud-template',
        props: {
            modelname: String,
            model : Object,
            ids: String,
            fields: {
                type:Array,
                // default: Object.keys(model),
            },
        },
        mounted() {
            this.getModel();
        },
        data : function(){
            return {
                modelfields: this.fields??Object.keys(this.model),
                //ids:this.ids,
                filter:{},
                errors: {},
                models: [],
                activemodel:{},
            }
        },
        methods: {
            normalizeErrors: function(errors){
                var allErrors = {};
                for(var i = 0 ; i < errors.length; i++ ){
                    allErrors[errors[i].field] = errors[i].message;
                }
                return allErrors;
            }, getModel: function(){// en este metodo obtenemos los todos los registros de la tabla
                var self = this;
                self.errors = {};
                $a= '/apv1/'+self.modelname+'/'+self.ids;
               // console.log($a);
                axios.get('/apv1/'+self.modelname+'/'+self.ids)
                    .then(function (response) {
                        // handle success
                        // console.log(response.data);
                        self.model = response.data;
                        self.activemodel =Object.assign({},self.model);

                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            editArea:function(ids){
                        var self = this;
                        const params = new URLSearchParams();
                           console.log(self.activemodel);
                           axios.patch('/apv1/'+self.modelname+'/'+ids,self.activemodel)
                              .then(function (response) {
                                  // handle success
                                 // console.log(response.data);
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
    }
</script>
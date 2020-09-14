<script type="text/x-template" id="crud-template">
    <div class="container">

        <!-- Button trigger modal -->
            <div>
                <form action="">
                    <div v-if="i>0" v-for="(field,i) in modelfields" class="form-group">
                        <a v-if="model[field].nombre">{{model[field].nombre}}</a>
                            <label :for="field">{{field}}</label>
                            <select v-model="selected_area" class="form-control" required >
                                <option v-for="option in areas" v-bind:value="option.id">
                                    {{ option.nombre }}
                                </option>
                            </select>


                        <a v-else>{{model[field]}}</a>



                        <input v-model="activemodel[field]" type="text" :name="field" :id="field" class="form-control" :placeholder="'Ingrese el '+ field " aria-describedby="helpId">
                        <span class="text-danger" v-if="errors[field]" >{{errors[field]}}</span>
                    </div>
                </form>
            </div>
            <button v-if="isNewRecord"  @click="addModel()" type="button" class="btn btn-primary m-3">Crear</button>
    </div>
</script>
<script>

    const Crud = {
        name: 'crud',
        template: '#crud-template',
        props: {
            modelname: String,
            model : Object,
            fields: {
                type:Array,
                // default: Object.keys(model),
            },
        },
        data : function(){
            return {
                modalShow: false,
                modelfields: this.fields??Object.keys(this.model),
                currentPage: 1,
                pagination:{},
                filter:{},
                errors: {},
                models: [],
                activemodel:{},
                isNewRecord:'true',
            }
        },
        methods: {
            normalizeErrors: function(errors){
                var allErrors = {};
                for(var i = 0 ; i < errors.length; i++ ){
                    allErrors[errors[i].field] = errors[i].message;
                }
                return allErrors;
            },
            addModel: function(){
                var self = this;
                axios.post('/apv1/'+self.modelname,self.activemodel)
                    .then(function (response) {
                        // handle success
                        //console.log(response.data);
                        self.activemodel = {};
                        console.log(response.data);
                        alert('Los datos fueron guardados');
                    })
                    .catch(function (error) {
                        // var errors = error.response.data;
                        //console.log(error.response.data);
                        self.errors = self.normalizeErrors(error.response.data);
                        // handle error
                        console.log(self.errors);

                    })
                    .then(function () {
                        // always executed
                    });
            }

        }
    }
</script>

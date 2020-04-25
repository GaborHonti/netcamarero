@extends('template.layout')
@section('title', 'Home')
@section('content')

<div class="container">
    <div class="columns personal-menu text-center vertical-center margin0">
        <div class="column">
            Zona de pruebas
        </div>
    </div>
    <div class="columns margin0 tile">
        <div class="column is-2 line-der">
            <aside class="menu">
                <p class="menu-label">
                    Menu Principal (Clica sobre el elemento para manejar datos ... )
                </p>
                <ul class="menu-list">
                    <li @click="menu=0" class="hand-option"><a
                                :class="{'is-active' : menu==0 }">Dashboard</a></li>
                    <li @click="menu=1" class="hand-option"><a :class="{'is-active' : menu==1 }">Restaurantes</a>
                    </li>
                    <li @click="menu=2" class="hand-option"><a
                                :class="{'is-active' : menu==2 }">Cargos</a></li>
                    <li @click="menu=3" class="hand-option"><a
                                :class="{'is-active' : menu==3 }">Empleados</a></li>
                </ul>
            </aside>
        </div>
        <div class="column personal-content" v-if="menu==0">
            <div class="columns text-center">
                <div class="column">
                    <h3>Dashboard</h3>
                </div>
            </div>
            <div class="columns text-center">
                <div class="column">
                    <h1>Bienvenido</h1>
                </div>
            </div>
        </div>
        <div class="column" v-if="menu==1">
            <div class="columns">
                <div class="column text-center">
                    <h3>Restaurantes</h3>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNew">AÑADIR NUEVO RESTAURANTE</button>
            </div>
            <div class="columns">
                <div class="column">
                    <br>
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="th-sm">ID

                            </th>
                            <th class="th-sm">Nombre

                            </th>
                            <th class="th-sm">Localidad

                            </th>
                            <th class="th-sm">Categoria

                            </th>
                            <th class="th-sm">Foto

                            </th>
                            <th class="th-sm">Numero de Telefono

                            </th>
                            <th class="th-sm">Likes

                            </th>
                            <th class="th-sm">Description

                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr v-for="dato in datos ">
                                <td>@{{dato.id}}</td>
                                <td>@{{dato.name}}</td>
                                <td>@{{dato.city.name}}</td>
                                <td>@{{dato.category.name}}</td>
                                <td>@{{dato.photo}}</td>
                                <td>@{{dato.phonenumber}}</td>
                                <td>@{{dato.likes}}</td>
                                <td>@{{dato.description}}</td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalBorrar" @click="rellenaborra(dato.id)">Borrar</button></td>
                                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEditar" @click="rellenainput(dato.id)">Editar</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Restaurante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-between">
                                    ID:<input type="text" disabled :value="editRestaurant.id">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    Nombre:<input type="text" v-model="editRestaurant.name">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    Localidad:<input type="text" disabled v-model="editRestaurant.city.name">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    Categoría:<input type="text" disabled v-model="editRestaurant.category.name">
                                </div>


                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" @click="guardaCambios(editRestaurant.id,editRestaurant.name,editRestaurant.city.name,editRestaurant.category.name)">Guardar Cambios</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
                    <!-- Modal Borrar Restaurante -->
                    <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Borrar Restaurante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                ¿SEGURO QUE DESEA BORRAR EL RESTAURANTE?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" @click="borra(borraRestaurant.id)">Borrar Permanentemente</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End of Modal -->

                </div>
            </div>
        </div>
        <div class="column" v-if="menu==2">
            <div class="columns">
                <div class="column text-center">
                    <h3>Cargos</h3>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                   Tabla Cargos
                </div>
            </div>
        </div>
        <div class="column" v-if="menu==3">
            <div class="columns">
                <div class="column text-center">
                    <h3>Empleado</h3>
                </div>
                <div class="column">
                   Tabla Empleados
                </div>
            </div>
        </div>
    </div>
    <div class="columns margin0 text-center vertical-center personal-menu">
        <div class="column">Empleados 0</div>
        <div class="column">Restaurantes 0</div>
        <div class="column">Cargo 0</div>
    </div>
</div>
@endsection
@section('script')
<script>

    let elemento = new Vue({
        el: '.app',
        data: {
            menu:0,
            datos: [],
            respuestaBorrado: "",
            editRestaurant: [],
            borraRestaurant: [],
        },
        created: function(){
            this.cargaRestaurantes();
        }, methods:{
            cargaRestaurantes: function(){
                axios
                .get('api/restaurants')
                .then((response) => {
                    this.datos = response.data.data
                    this.editRestaurant = response.data.data[0];

                })
            },
            borra: function(id){
                console.log(id);
                axios
                .delete('api/restaurants/' + id)
                .then((response) => {
                    this.respuestaBorrado = response.data
                    alert(this.respuestaBorrado);
                    //this.cargaRestaurantes();
                    for(var i= 0; i < this.datos.length; i++){
                    if(id == this.datos[i].id){
                        this.datos.splice( i , 1);
                        break;
                    }
                }
                    $('#modalBorrar').modal('hide');
                })
            },
            rellenainput: function(id){
                for(var i= 0; i < this.datos.length; i++){
                    if(id == this.datos[i].id){
                        this.editRestaurant = this.datos[i];
                        break;
                    }
                }
                /*axios
                .get('api/restaurants/' + id)
                .then((response) => {
                    this.editRestaurant = response.data.data
                    //console.log(this.editRestaurant);
                    //this.cargaRestaurantes();
                })*/
            },
            rellenaborra: function(id){
                for(var i= 0; i < this.datos.length; i++){
                    if(id == this.datos[i].id){
                        this.borraRestaurant = this.datos[i];
                        break;
                    }
                }
            },
            guardaCambios: function(id, nombre, categoria, ciudad){
                for(var i= 0; i < this.datos.length; i++){
                    if(id == this.datos[i].id){
                        //alert("update");
                        this.datos[i].name = nombre;
                        //this.datos[i].category.name = categoria;
                        //this.datos[i].city.name = ciudad;
                        break;
                    }
                }
                        axios.put('api/restaurants/' + id, {
                            name: nombre,
                            //category: categoria,
                            //city: ciudad
                        })
                        .then(response => {
                            console.log(response);
                        })
                        .catch(error => {
                            console.log(error);
                        });


                $('#modalEditar').modal('hide');
            },
        }
    })

</script>
@endsection

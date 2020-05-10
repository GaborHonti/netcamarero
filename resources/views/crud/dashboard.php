<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NetCamarero: DASHBOARD</title>

    <!-- Scripts
    <script src="{{ asset('js/app.js') }}" defer></script>
    -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->

    <link href="css/dashboard.css" rel="stylesheet">

</head>
<body>


<div class="app">

    <div class="sidebar">
        <div class="bienvenida">
            <i class="fa fa-user fa-lg"></i>
            <p>¡Bienvenido, Admin!</p>
        </div>
        <a @click="menu=0" href="#">Home</a>
        <a @click="menu=1" href="#">Restaurantes</a>
        <a @click="menu=2" href="#">Ciudades</a>
        <a @click="menu=3" href="#">Categorías</a>
        <a @click="menu=4" href="#">Comentarios</a>
    </div>

    <div class="content">
        <div class="container-fluid mt-3">
            <div class="" v-if="menu==0">
                <h3>¡Bienvenido al DASHBOARD!</h3>
                <button class="btn btn-success" @click="sendData()">Render Chart</button>
                <br>
                <br>
                <div class="row">
                    <div class="col-12 col-md-3 cont1 mr-1 ml-1 ml-md-3 mb-1 d-flex justify-content-between">
                        <div>
                            <h6>Número de Categorías:</h6>
                            <span class="contador" id="cat">{{ categories.length }}</span>
                        </div>
                        <div>
                        <i class="fa fa-archive icon mt-2"></i>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 cont2 mr-1 ml-1 mb-1 d-flex justify-content-between">
                        <div>
                            <h6>Número de Restaurantes</h6>
                            <span class="contador" id="rest">{{ datos.length }}</span>
                        </div>
                        <div>
                            <i class="fa fa-cutlery icon mt-2"></i>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 cont3 mr-1 ml-1 mb-1 d-flex justify-content-between">
                    <div>
                            <h6>Número de localidades</h6>
                            <span class="contador" id="city">{{ cities.length }}</span>
                        </div>
                        <div>
                            <i class="fa fa-send icon mt-2"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <canvas id="myChart" width="400" height="350"></canvas>
                    </div>
                    <div class="col-12 col-md-6">
                        <canvas id="myChart2" width="400" height="340"></canvas>
                    </div>
                </div>

            </div>
            <div class="" v-if="menu==1">
                <div class="mb-3 d-flex justify-content-between">
                     <h3>Restaurantes</h3>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewRestaurant">AÑADIR NUEVO RESTAURANTE</button>
                </div>
                    <table id="miTabla" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="th-sm">ID

                            </th>
                            <th class="th-sm">Nombre

                            </th>
                            <th class="th-sm desaparece">Localidad

                            </th>
                            <th class="th-sm desaparece">Categoria

                            </th>
                            <th class="th-sm desaparece">Foto

                            </th>
                            <th class="th-sm desaparece">Numero de Telefono

                            </th>
                            <th class="th-sm desaparece">Likes

                            </th>
                            <th class="th-sm desaparece">Description

                            </th>
                            <th class="th-sm">Borrar

                            </th>
                            <th class="th-sm">Editar

                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr v-for="dato in datos ">
                                <td>{{dato.id}}</td>
                                <td>{{dato.name}}</td>
                                <td class="desaparece">{{dato.city.name}}</td>
                                <td class="desaparece">{{dato.category.name}}</td>
                                <td class="desaparece">{{dato.photo}}</td>
                                <td class="desaparece">{{dato.phonenumber}}</td>
                                <td class="desaparece">{{dato.likes}}</td>
                                <td class="desaparece">{{dato.description}}</td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalBorrar" @click="rellenaborra(dato.id)">Borrar</button></td>
                                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEditar" @click="rellenainput(dato.id)">Editar</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Modal Añadir Resturante -->
                    <div class="modal fade" id="modalNewRestaurant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Añadir Nuevo Restaurante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-between">
                                    Nombre:<input type="text" v-model="newName">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    Localidad:<input type="text" disabled  v-model="newCityName">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                <!--<img :src="previewImage" class="uploading-image" /> -->
                                <input type="file" accept="image/*" @change=uploadImage id="fileInput">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    ID Localidad: <input type="text" @keyup="buscav3()" v-model="newCity">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    Categoría:<input type="text" disabled  v-model="newCatName">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    ID Categoria: <input type="text" @keyup="buscav4()" v-model="newCat">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    Descripcion: <input type="text" v-model="newDesc">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    Teléfono: <input type="text" v-model="newTel">
                                </div>


                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" @click="createNew(newName,newCat,newCity,newDesc,newTel)">Añadir Restaurante</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
                    <!-- Modal Editar Resturante -->
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
                                    Localidad:<input type="text" disabled  v-model="editRestaurant.city.name">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    ID Localidad: <input type="text" @keyup="busca()" v-model="buscaIdCity">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    Categoría:<input type="text" disabled  v-model="editRestaurant.category.name">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    ID Categoria: <input type="text" @keyup="buscav2()" v-model="buscaIdCat">
                                </div>


                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" @click="guardaCambios(editRestaurant.id,editRestaurant.name,editRestaurant.category.id,editRestaurant.city.id)">Guardar Cambios</button>
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
            <!-- End of DIV -->
            <div class="" v-if="menu==2">
            <button class="btn btn-success" @click="sendDataCiudades()">Render Chart</button>
                <div class="mb-3 d-flex justify-content-between">
                <h3>Ciudades</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewCity">AÑADIR NUEVA CIUDAD</button>
                </div>
                    <table id="miTabla2" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="th-sm">ID

                            </th>
                            <th class="th-sm">Nombre

                            </th>
                            <th class="th-sm">Borrar

                            </th>
                            <th class="th-sm">Editar

                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr v-for="city in cities ">
                                <td>{{city.id}}</td>
                                <td>{{city.name}}</td>
                                <td><button type="button" class="btn btn-danger"
                                data-toggle="modal" data-target="#modalBorrarCity" @click="rellenaborraCity(city.id)">Borrar</button></td>
                                <td><button type="button" class="btn btn-success"
                                data-toggle="modal" data-target="#modalEditarCity" @click="rellenainputCity(city.id)">Editar</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                            <canvas id="myChartCity" width="400" height="350"></canvas>
                        </div>
                    </div>

                    <!-- Modal Añadir Ciudad -->
                    <div class="modal fade" id="modalNewCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Añadir Nueva Ciudad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <br>
                                <div class="d-flex justify-content-between">
                                    Nombre:<input type="text" v-model="newNameCity">
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" @click="createNewCity(newNameCity)">Añadir Ciudad</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
                    <!-- Modal Borrar Ciudad -->
                    <div class="modal fade" id="modalBorrarCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Borrar Ciudad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                ¿SEGURO QUE DESEA BORRAR LA CIUDAD?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" @click="borraCiudad(borraCity.id)">Borrar Permanentemente</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
                    <!-- Modal Editar Ciudad -->
                    <div class="modal fade" id="modalEditarCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Ciudad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-between">
                                    ID:<input type="text" disabled :value="editCity.id">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    Nombre:<input type="text" v-model="editCity.name">
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" @click="guardaCambiosCity(editCity.id,editCity.name)">Guardar Cambios</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
            </div>
            <!-- End of DIV -->
            <div class="column" v-if="menu==3">
            <button class="btn btn-success" @click="sendDataRestaurants()">Render Chart</button>
                <div class="mb-3 d-flex justify-content-between">
                <h3>Categorías</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewCat">AÑADIR NUEVA CATEGORÍA</button>
                </div>
                <table id="miTabla3" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="th-sm">ID

                            </th>
                            <th class="th-sm">Nombre

                            </th>
                            <th class="th-sm desaparece">Icon

                            </th>
                            <th class="th-sm">Borrar

                            </th>
                            <th class="th-sm">Editar

                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories">
                                <td>{{category.id}}</td>
                                <td>{{category.name}}</td>
                                <td class="desaparece">{{category.icon}}</td>
                                <td><button type="button" class="btn btn-danger"
                                data-toggle="modal" data-target="#modalBorrarCat" @click="rellenaborraCat(category.id)">Borrar</button></td>
                                <td><button type="button" class="btn btn-success"
                                data-toggle="modal" data-target="#modalEditarCat" @click="rellenainputCat(category.id)">Editar</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <canvas id="myChartRest" width="400" height="350"></canvas>
                    </div>
                    </div>
                     <!-- Modal Añadir Categoria -->
                     <div class="modal fade" id="modalNewCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Añadir Nueva Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <br>
                                <div class="d-flex justify-content-between">
                                    Nombre:<input type="text" v-model="newNameCat">
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" @click="createNewCat(newNameCat)">Añadir Categoría</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
                    <!-- Modal Borrar Categoria -->
                    <div class="modal fade" id="modalBorrarCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Borrar Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                ¿SEGURO QUE DESEA BORRAR LA CATEGORÍA?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" @click="borraCategoria(borraCat.id)">Borrar Permanentemente</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
                    <!-- Modal Editar Categoria -->
                    <div class="modal fade" id="modalEditarCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-between">
                                    ID:<input type="text" disabled :value="editCat.id">
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    Nombre:<input type="text" v-model="editCat.name">
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" @click="guardaCambiosCat(editCat.id,editCat.name)">Guardar Cambios</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
            </div>
            <!-- End of DIV -->
            <div class="column" v-if="menu==4">
                <h3>Comentarios</h3>
                <div class="row">
                <div class="col-12 col-md-3 cont1 mr-1 ml-1 ml-md-3 mb-1 d-flex justify-content-between">
                        <div>
                            <h6>Número de Comentarios:</h6>
                            <span class="contador" id="cat">{{ comments.length }}</span>
                        </div>
                        <div>
                        <i class="fa fa-comments icon mt-2"></i>
                        </div>
                    </div>
                </div>
                <br>
                    <table id="miTabla4" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="th-sm">ID

                            </th>
                            <th class="th-sm">Content

                            </th>
                            <th class="th-sm desaparece">Posted At

                            </th>
                            <th class="th-sm desaparece">Restaurant

                            </th>
                            <th class="th-sm">User

                            </th>
                            <th class="th-sm">Borrar

                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr v-for="comment in comments">
                                <td>{{comment.id}}</td>
                                <td>{{comment.content}}</td>
                                <td class="desaparece">{{comment.posted_at}}</td>
                                <td class="desaparece">{{comment.restaurant.name}}</td>
                                <td >{{comment.user.name}}</td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalBorrarComment" @click="rellenaborraComment(comment.id)">Borrar</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Modal Borrar Comentario -->
                    <div class="modal fade" id="modalBorrarComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Borrar Comentario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    ¿SEGURO QUE DESEA BORRAR EL COMENTARIO?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" @click="borraComment(borraComentario.id)">Borrar Permanentemente</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    <!-- End of Modal -->
            </div>
        </div>
<!-- End of CONTAINER-FLUID -->
    </div>
<!-- End of CONTENT -->

</div>
<!-- End of APP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/js/scriptCRUD.js"></script>
<script>
</script>
</body>
</html>

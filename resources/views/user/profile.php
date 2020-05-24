<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
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
    <link href="css/app.css" rel="stylesheet">

</head>
<body>
<div id="app">
<nav class="navbar navbar-expand-lg navbar-light bg-danger" id="prinNav">
<a class="navbar-brand titulo" href="/"> <img src="img/brand.png" class="netCB"> NetCamarero</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navi" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item" v-if="logged==0">
          <a class="nav-link" href="/login">Entrar</a>
        </li>
        <li class="nav-item" v-if="logged==0">
          <a class="nav-link" href="/registrar">Registrar</a>
        </li>
        <li class="nav-item" v-if="logged==1">
          <a class="nav-link" href="/profile">Perfil</a>
        </li>
        <li class="nav-item" v-if="logged==1">
          <a class="nav-link" href="#" @click="salir()">Salir</a>
        </li>
        <li class="nav-item" v-if="logged==1">
          <a class="nav-link" href="/dashboard">Dashboard</a>
        </li>
      </ul>
    </div>
</nav>


    <div class="usermenu generalFont">
        <div v-if="info=='sin acceso'">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="generalFont mtop5 wColor">¡Oops! Parece que no tienes permiso para ver esta página.... ¡Logueate!</h1>
                        <button style="cursor:pointer" class="btn btn-danger text-center generalFont" onclick="window.location='/';">Redireccioname</button>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="container">
                <div class="flexft mtop">
                    <img src="img/defaultuser.png" class="profilepic">
                    <h1 class="hello">Bienvenido {{info.name}}!</h1>
                </div>

                <p class="pG restaurantTitle">En estos menús encontrarás opciones útiles como ver tus restaurantes favoritos y cambiar tu nombre de usuario.</p>

                <ul class="nav nav-tabs menupoints">
                <li><a data-toggle="tab" href="#menu1" class="editP">Editar Perfil</a></li>
                <li><a data-toggle="tab" href="#menu2">Ver Favoritos</a></li>
                <!-- <li><a data-toggle="tab" href="#menu3">Ver Historial</a></li>-->
                </ul>

                <div class="tab-content">
                    <div id="menu1" class="tab-pane fade">
                        <br>
                    <!--
                    <br>
                    <button style="cursor:pointer" class="btn btn-danger text-center generalFont" onclick="window.location='/';">Redireccioname</button>
                     -->
                    <p class="pG wColor">Nombre de Usuario Actual: {{info.name}}</p>
                    <span class="wColor">Nuevo Nombre de Usuario: </span><input type="text" v-model="nombreNew"> <br> <br>
                    <button style="cursor:pointer" class="btn btn-danger text-center generalFont" @click="updateName()">Cambiar nombre</button>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div v-for="fav in favs">
                            <h1 class="restaurantTitle">{{fav.restaurant.name}}</h1>
                            <div class="flexbody">
                                <img :src="'http://netcamareroapi.test/' + fav.restaurant.photo" class="favImg">
                                <p class="desc wColor">{{fav.restaurant.description}} <br>
                                <button class="btn btn-danger"><a :href="'/restaurants/'+fav.restaurant.id" class="enlaceVer">Ver Restaurante</a></button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- End of APP -->
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/js/scriptUser.js"></script>
</body>
</html>


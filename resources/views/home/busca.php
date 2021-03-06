<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NetCamarero</title>

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
            <main class="contenedorAll">
                <div class="container generalFont marginT">
                    <h1 class="generalFont titleAll">Resultados de Búsqueda: {{queEs}}</h1>
                    <div class="row" v-if="rsdo != 'no'">
                        <div v-for="(item, index) in rsdo" class="col-12 col-md-4 mb-3 mt-3 centrar">
                        <h3 class="fuente">{{item.name}}</h3>
                        <img :src="item.photo" class="imgrest">
                        <button class="btn btn-danger mt-3" @click="moveURL(item.id)">Ver Restaurante</button>
                        </div>
                    </div>

                    <h1 class="generalFont titleAll2" v-else>lo sentimos, no mehos encontrado nada...</h1>

                    </div>
                </div>
            </main>
    </div>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/js/scriptFiltro.js"></script>
</body>

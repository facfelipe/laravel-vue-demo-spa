<template>
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <router-link class="nav-link" :to="{ name: 'home' }">Biblioteca virtual pessoal</router-link>
                    </div>
                    <nav>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name: 'author' }">Autores</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name: 'book' }">Livros</router-link>
                            </li>
                        </ul>
                    </nav>
                    <div class="card-body">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<template>
    <section>
        <a href="#form" @click="handleShowForm($event)" class="d-inline-block mb-2"> {{ showForm ? 'Ocultar' : 'Mostrar' }} formulário</a>

            <form v-if="showForm" @submit="handleForm" class="d-block mb-2">
                <input type="hidden" v-model="Author.id"/>

                <div class="row d-flex justify-content-start">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="first_name">Nome</label>
                            <input id="first_name" v-model="Author.first_name" class="form-control"/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="last_name">Sobrenome</label>
                            <input id="last_name" v-model="Author.last_name" class="form-control"/>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="submit" class="btn btn-info" v-if="null != Author.id" @click="handleNewForm">Novo</button>
            </form>

            <div class="row col-md-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:5px">#</th>
                            <th>Autor</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(author, key) in authors" :key="key">
                            <td>{{ author.id }}</td>
                            <td>{{ author.first_name }} {{ author.last_name }}</td>

                            <td class="d-flex justify-content-between">

                                <a :href="`/authors/${author.id}/edit`" @click="handleEdit(author, $event)">
                                    <b-icon icon="pencil"></b-icon>
                                </a>
                                <a :href="`/authors/${author.id}/delete`" @click="handleDelete(author, key, $event)">
                                    <b-icon icon="trash"></b-icon>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </section>
</template>

<script>
    import api from '../services/api';
    import { BIconPencil, BIconTrash, BIconBlockquoteLeft } from 'bootstrap-vue';
    import errorHandler from '../utils/errorHandler';

    export default {

        created () {
            this.fetchAuthors();
        },

        data () {
            return {
                authors: [],
                Author: {},
                showForm: false
            }
        },

        methods: {

            handleShowForm(e) {
                e.preventDefault();
                this.showForm = !this.showForm;
            },

            setShowForm(val) {
                this.showForm = val;
            },

            fetchAuthors() {

                api.get('authors')
                    .then(response => {
                        this.authors = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            handleNewForm() {
                this.Author = {};
            },

            handleForm(e) {
                e.preventDefault();

                let success = (message) => {
                    this.$toasted.show(message, {
                        type: 'info',
                        duration: 3000
                    });
                    this.fetchAuthors();
                };

                let error = (response) => {
                    errorHandler.handle(response);
                };

                errorHandler.clear();

                if(null == this.Author.id) {

                    api.post('authors', this.Author)
                        .then(response => {
                            success('Autor cadastrado com sucesso!')
                            this.handleNewForm();
                        })
                        .catch(errors => errorHandler.handle(errors));

                } else {

                    api.put(`authors/${this.Author.id}`, this.Author)
                        .then(response => success('Autor atualizado com sucesso!'))
                        .catch(response => error(response));
                }

            },

            handleEdit(author, e) {
                e.preventDefault();
                this.Author = author;
                this.setShowForm(true);
            },

            handleDelete(author, index, e) {
                e.preventDefault();

                if (confirm(`Você tem certeza que deseja excluir o livro "${author.name}"?`)) {

                    api.delete(`authors/${author.id}`)
                        .then(response => {
                            this.authors.splice(index, 1);
                            this.setShowForm(false);
                            this.handleNewForm();
                            this.$toasted.show('Autor excluído com sucesso!', {
                                type: 'info',
                                duration: 3000
                            });
                        })
                        .catch(response => {
                             this.$toasted.show('Erro ao deletar o autor, tente novamente, mais tarde.', {
                                type: 'error',
                                duration: 3000
                            });
                        });
                }
            },

        }
    }
</script>

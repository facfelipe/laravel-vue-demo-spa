<template>
    <section>
        <a href="#form" @click="handleShowForm($event)" class="d-inline-block mb-2"> {{ showForm ? 'Ocultar' : 'Mostrar' }} formulário</a>

        <form v-if="showForm" @submit="handleForm" class="d-block mb-2">
            <input type="hidden" v-model="Book.id"/>

            <div class="row d-flex justify-content-between">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="label" for="name">Nome</label>
                        <input id="name" v-model="Book.name" class="form-control"/>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="label" for="author_id">Autor</label>
                        <select v-model="Book.author_id" class="form-control" id="author_id">
                            <option v-for="author in authors" v-bind:key="author.id" v-bind:value="author.id">
                                {{ author.first_name }} {{ author.last_name }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="label" for="name">Ano de publiação</label>
                        <input id="year_published_at" v-model="Book.year_published_at" class="form-control"/>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label class="label" for="name">Sinopse</label>
                <input id="synopsis" v-model="Book.synopsis" class="form-control"/>
            </div>

            <div class="row d-flex justify-content-between">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="label" for="status">Status</label>
                        <select v-model="Book.status" class="form-control" id="status">
                            <option v-for="status in getBookStatus()" v-bind:key="status.id" v-bind:value="status.id">{{ status.name}}</option>
                        </select>
                    </div>
                </div>

              <div class="col-md-3">
                    <div class="form-group">
                        <label class="label" for="name">Total de páginas</label>
                        <input id="total_pages" v-model="Book.total_pages" class="form-control"/>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="label" for="name">Pagina atual</label>
                        <input id="readed_page_at" v-model="Book.readed_page_at" class="form-control"/>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="submit" class="btn btn-info" v-if="null != Book.id" @click="handleNewForm">Novo</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th style="width:5px">#</th>
                    <th>Nome</th>
                    <th>Autor</th>
                    <th>Ano</th>
                    <th>Progresso</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <template v-for="(book, key) in books">

                    <tr :key="key">
                        <td>{{ book.id }}</td>
                        <td>{{ book.name }}</td>
                        <td>
                            <span v-if="book.author">
                                {{ book.author.first_name }} {{ book.author.last_name }}
                            </span>
                            <span v-else class="badge badge-pill badge-danger">
                                Autor excluído
                            </span>
                        </td>
                        <td>{{ book.year_published_at }}</td>
                        <td>{{ calcProgress(book) }}% </td>
                        <td>
                            <span :class="`badge badge-pill badge-${getBookStatus(book.status).color}`">
                                {{ getBookStatus(book.status).name}}
                            </span>
                        </td>
                        <td class="d-flex justify-content-around">

                            <a :href="`/books/${book.id}/synopsis`" @click="collapseSynopsis(key, $event)">
                                <b-icon icon="blockquote-left"></b-icon>
                            </a>

                            <a :href="`/books/${book.id}/edit`" @click="handleEdit(book, $event)">
                                <b-icon icon="pencil"></b-icon>
                            </a>
                            <a :href="`/books/${book.id}/delete`" @click="handleDelete(book, key, $event)">
                                <b-icon icon="trash"></b-icon>
                            </a>
                        </td>
                    </tr>

                    <template v-if="synopsisCollapsed.includes(key)">
                        <tr v-on:click="collapseSynopsis(key)" :key="`synopsis-${book.id}`" class="synopsis">
                            <td colspan="7">
                                <p><b>Sinopse</b></p>
                                <p v-html="book.synopsis">{{ book.synopsis }}</p>
                            </td>
                        </tr>
                    </template>

                </template>
            </tbody>
        </table>
    </section>
</template>

<style scoped>
    .synopsis {
        background: #FFFAF0;
        padding: 10px;
    }
</style>

<script>
    import api from '../services/api';
    import { BIconPencil, BIconTrash, BIconBlockquoteLeft } from 'bootstrap-vue';
    import errorHandler from '../utils/errorHandler';

    export default {

        created () {
            this.fetchBooks();
            this.fetchAuthors();
        },

        data () {
            return {
                books : [],
                authors: [],
                Book: {},
                showForm: false,
                synopsisCollapsed: [],
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

            getBookStatus(id) {

                let status = [
                    {
                        id: 0,
                        name: 'Esperando',
                        color: 'light'
                    },
                    {
                        id: 1,
                        name: 'Lendo',
                        color: 'primary',
                    },
                    {
                        id: 2,
                        name: 'Lido',
                        color: 'success'
                    },
                    {
                        id: 3,
                        name: 'Relendo',
                        color: 'primary'
                    },
                    {
                        id: 4,
                        name: 'Abandonado',
                        color: 'default'
                    },
                ];

                return status[id] ? status[id] : status;
            },

            fetchBooks() {

                api.get('books')
                    .then(response => {
                        this.books = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
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
                this.Book = {};
            },

            handleForm(e) {
                e.preventDefault();

                let success = (message) => {
                    this.$toasted.show(message, {
                        type: 'success',
                        duration: 3000
                    });
                    this.fetchBooks();
                };

                let error = (response) => {
                    errorHandler.handle(response);
                };

                errorHandler.clear();

                if(null == this.Book.id) {

                    api.post('books', this.Book)
                        .then(response => {
                            success('Livro cadastrado com sucesso!')
                            this.handleNewForm();
                        })
                        .catch(errors => errorHandler.handle(errors));

                } else {

                    api.put(`books/${this.Book.id}`, this.Book)
                        .then(response => success('Livro atualizado com sucesso!'))
                        .catch(response => errorHandler.handle(response));
                }

            },

            handleEdit(book, e) {
                e.preventDefault();
                this.Book = book;
                this.setShowForm(true);
            },

            handleDelete(book, index, e) {
                e.preventDefault();

                if (confirm(`Você tem certeza que deseja excluir o livro "${book.name}"?`)) {

                    api.delete(`books/${book.id}`)
                        .then(response => {
                            this.books.splice(index, 1);
                            this.synopsisCollapsed.splice(index, 1);
                            this.setShowForm(false);
                            this.handleNewForm();
                            this.$toasted.show('Livro excluído com sucesso', {
                                type: 'info',
                                duration: 3000
                            });
                        })
                        .catch(response => {
                            this.$toasted.show('Erro ao deletar, tente novamente, mais tarde', {
                                type: 'info',
                                duration: 3000
                            });
                        });
                }
            },

            collapseSynopsis(key, e) {
                e.preventDefault();

                if(this.synopsisCollapsed.includes(key)) {
                    this.synopsisCollapsed = this.synopsisCollapsed.filter((value, i, arr) => {
                        return value !== key;
                    });
                } else {
                    this.synopsisCollapsed.push(key);
                }
            },

            calcProgress(book) {

                let progress = 0;

                if(book.total_pages && book.readed_page_at) {
                    progress = ((book.readed_page_at/ book.total_pages) * 100).toFixed(0);;
                }

                return progress;
            }
        }
    }
</script>

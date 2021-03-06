<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 8 CRUD Tutorial</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>

    <div class="container-fluid mt-5" x-data="bookCrud()">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-light bg-dark">
                        Book Table
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <template x-for="book in books" :key="index">
                                    <tr>
                                        <td x-text="book.id"></td>
                                        <td x-text="book.title"></td>
                                        <td x-text="book.author"></td>
                                        <td>
                                            <button @click="editData(book)" class="btn btn-info">Edit</button>
                                            <button @click="deleteData(book.id)" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-light bg-dark">
                        <span x-show="addMode">Create Book</span>
                        <span x-show="!addMode">Edit Book</span>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="addMode ? saveData : updateData">
                            <div class="form-group">
                                <label>Title</label>
                                <input x-model="data.title" type="text" class="form-control"
                                    placeholder="Enter Title">
                            </div>
                            <template x-if="errors.title">
                                <p class="text-danger" x-text="errors.title[0]"></p>
                            </template>
                            <div class="form-group mt-3">
                                <label>Author</label>
                                <input x-model="data.author" type="text" class="form-control"
                                    placeholder="Enter Author">
                            </div>
                            <template x-if="errors.author">
                                <p class="text-danger" x-text="errors.author[0]"></p>
                            </template>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary ml-2"
                                    x-text="addMode == true ? 'Create' : 'Update'"></button>
                                <button type="button" class="btn btn-danger" @click="cancelEdit">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function bookCrud() {
            return {
                addMode: true,
                data: {
                    title: "",
                    author: "",
                },
                books: [],
                errors: {
                    title: "",
                    author: "",
                },

                init() {
                    this.getData();
                },

                getData() {
                    axios.get('/api/book')
                        .then((response) => {
                            this.books = response.data;
                        });
                },

                resetData() {
                    this.data.id = '';
                    this.data.title = '';
                    this.data.author = '';
                },

                saveData() {
                    this.errors = {};
                    axios.post('/api/book', this.data)
                        .then((response) => {
                            this.getData();
                            this.resetData();
                        })
                        .catch(error => {
                            if (error.response) {
                                let errors = error.response.data.errors;
                                this.errors = errors
                            }
                        });
                },

                editData(book) {
                    this.addMode = false;
                    this.data.id = book.id;
                    this.data.title = book.title;
                    this.data.author = book.author;
                },

                updateData() {
                    this.errors = {};
                    axios.put(`/api/book/${this.data.id}`, this.data)
                        .then((response) => {
                            this.getData();
                            this.resetData();
                        }).catch(error => {
                            if (error.response) {
                                let errors = error.response.data.errors;
                                this.errors = errors
                            }
                        });
                },

                deleteData(id) {
                    if (confirm("Are you sure to delete this post ?")) {
                        axios.delete(`/api/book/${id}`)
                            .then((response) => {
                                this.getData();
                            })
                    }
                },

                cancelEdit() {
                    this.resetForm()
                },

                resetForm() {
                    this.addMode = true;
                    this.resetData();
                },
            }
        }
    </script>

</body>

</html>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ModalSong from '@/Components/ModalSong.vue';
import Swal from 'sweetalert2';
import { Head, useForm } from '@inertiajs/vue3';

//  Form and define props
const form = useForm({});
const props = defineProps({
    songs:{type:Object}
});

const deleteSong = (id, name) => {
    const swalWithBootstrapButtons = Swal.mixin({
        buttonStlyling: true
    })
    swalWithBootstrapButtons.fire({
        title: 'Are you sure you want to delete the song?'+name,
        text: 'The song will be deleted',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="fa-solid fa-check"></i> Yes! Delete it',
        cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel'
    }).then((result) => {
        if (result.isConfirmed){
            form.delete(route('song.destroy', id));
        }
    })
}

const openModal = (song) => {
    document.getElementById('id2').value = song.id;
    document.getElementById('title2').value = song.title;
    document.getElementById('autor2').value = song.autor;
    document.getElementById('album2').value = song.album;
}
</script>

<template>
    <Head title="Songs"></Head>
    <AuthenticatedLayout>
        <template #header>
            <div class="container-fluid mt-3 bg-white">
                <div class="row mt-3">
                    <div class="col-md-4 offset-md-4">
                        <div class="d-grid mx-auto">
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                <i class="fa-solid fa-circle-plus"> Add song</i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-10 offset-md-1">
                        <div class="table-responsive">
                            <table class="table table-stripeted table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Autor</th>
                                        <th>Album</th>
                                        <th></th><th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="song, i in songs" :key="song.id"><!--
                                        <td>{{ i+1 }}</td>
                                        <td>{{ ++i }}</td>-->
                                        <td>{{ song.id }}</td>
                                        <td>{{ song.title }}</td>
                                        <td>{{ song.autor }}</td>
                                        <td>{{ song.album }}</td>
                                        <td class="text-center" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                            <button class="btn btn-warning" @click="openModal(song)">
                                                <i class="fa-solid fa-edit"></i> Edit
                                            </button>
                                        </td>
                                        <td class="text-center" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                            <button class="btn btn-danger" @click="deleteSong(song.id,song.title)">
                                                <i class="fa-solid fa-trash"></i>  Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <ModalSong :modal="'modalCreate'" :title="'Add Song'" :op="'1'"></ModalSong>
            <ModalSong :modal="'modalEdit'" :title="'Edit Song'" :op="'2'"></ModalSong>
        </template>
    </AuthenticatedLayout>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    song:{type:Object,default:() => ({})},
    modal:String,title:String,op:String
});

const form = useForm({
    id:props.song.id,title:props.song.title,autor:props.song.autor,
    album:props.song.album
});

const saveSong = () => {
    form.post(route('song.store'), {
        onSuccess: ()=> closeModal()
    });
}

const updateSong = () => {
    var id = document.getElementById('id2').value;
    form.put(route('song.update', id), {
        onSuccess: ()=> closeModal()
    });
}

const closeModal = () => {
    form.reset();//Reset Form
    document.querySelector('#close'+props.op).click();
}
</script>

<template>
    <div class="modal fade" :id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label for="title" class="h5">{{ title }}</label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form @submit.prevent="(op === '1' ? saveSong() : updateSong())">
                        <TextInput type="hidden" name="id" :id="'id'+op" v-model="form.id" />
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-music"></i></span>
                            <TextInput :id="'title'+op" label="Title:" name="title" v-model="form.title" maxlength="120" placeholder="Song" type="text" class="form-control" required />
                        </div>
                        <div v-if="form.errors.title" class="text-sm text-danger">
                            {{ form.errors.title }}
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <TextInput :id="'autor'+op" label="Autor:" name="autor" v-model="form.autor" maxlength="100" placeholder="Autor" type="text" class="form-control" required />
                        </div>
                        <div v-if="form.errors.autor" class="text-sm text-danger">
                            {{ form.errors.autor }}
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-compact-disc"></i></span>
                            <TextInput :id="'album'+op" label="Album:" name="album" v-model="form.album" maxlength="120" placeholder="Album" type="text" class="form-control" required />
                        </div>
                        <div v-if="form.errors.album" class="text-sm text-danger">
                            {{ form.errors.album }}
                        </div>

                        <div class="d-grid mx-auto">
                            <button :disabled="form.processing" class="btn btn-success">
                                <i class="fa-solid fa-floppy-disk"></i> Save
                            </button>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" :id="'close'+op" data-bs-dismiss="modal" class="btn btn-dark">Close</button>
                </div>
            </div>
    </div>
</div>
</template>
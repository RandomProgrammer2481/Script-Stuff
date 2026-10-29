<template>
    <div v-for="review in reviews" :key="review.id" >
        <div v-if="editingId !== review.id">
            <h6>{{ review.score }} / 10</h6>
            <h6>{{review.username}}</h6>
            <p>{{ review.body }}</p>
            <p>
                <button @click="editingId = review.id">Bewerk</button>
                 | 
                <button @click="reviewStore(Number(props.bookId)).actions.delete(review.id)">Verwijder</button>
            </p>
        </div>
        <div v-else>
            <Edit 
                :book-id="props.bookId" 
                :review="review" 
                @submitted="onSubmitted">
            </Edit>
            <button @click="editingId = null">Cancel</button>
        </div>
        <br>
    </div>
</template>

<script setup lang="ts">
    import { onMounted, ref } from 'vue';
    import { reviewStore } from '../store';
    import Edit from '../components/Edit.vue';

    const props = defineProps({ bookId: Number })

    const reviewModule = reviewStore(Number(props.bookId));       
    const reviews = reviewModule.getters.all;


    const editingId = ref<number | null>(null);

    async function onSubmitted() {
        await reviewModule.actions.getAll();
        editingId.value = null;
    }
    
    onMounted(() => {
        reviewModule.actions.getAll();
    })
</script>
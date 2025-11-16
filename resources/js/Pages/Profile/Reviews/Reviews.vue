<script setup>

import {onMounted, ref} from "vue";

const items = ref({
    raining: String,
    reviews_count: null,
    reviews: Array,
    ref: String,
})

onMounted(async () => {
    const response = await fetch('/api/get-yandex-reviews')
    items.value = await response.json()
})
</script>

<template>
    <div class="ml-[25px] mt-[17px]">
        <a :href="items.ref">Яндекс карты</a>
    </div>
    <div class="reviews_grid_container ml-[25px]">
        <div>
            <div class="bg-white drop-shadow-[0_3px_6px_rgba(21,101,111,0.3)] my-4 pl-[15px] pb-[1px] pt-[13px] rounded-xl"
                 v-for="(value, key) in items.reviews"
                 :key="key">
                <div class="mb-[20px] h-[155] min-h-[100px] bg-[#F6F8FA] rounded-xl ">
                    <div>
                        {{ value.date }}
                    </div>
                    <div>
                        {{ value.author }}
                    </div>
                    <div class="">
                        {{ value.text }}
                    </div>
                    <div>
                        {{ value.rating }}
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                {{ items.rating }}
            </div>
            <div>
                Всего отзывов: {{ items.reviews_count }}
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

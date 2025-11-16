<script setup>

import {onMounted, ref} from "vue";

onMounted(async () => {
    try {
        const response = await fetch('/api/get-yandex-reviews')
        items.value = await response.json()
    } catch (error) {
        console.log(error)
        alert('У вас добавленных сылок ссылок или отключите VPN - Не грузит отзывы')
    }
})

const items = ref({
    raining: String,
    reviews_count: null,
    reviews: Array,
    ref: String,
})

const getStars = (rating) => {
    if (!rating) return [];

    rating = String(rating);

    let num = rating.match(/[\d.,]+/);
    num = num[0].replace(',', '.');
    const full = Math.floor(parseFloat(num));

    if (isNaN(full)) return [];

    return Array.from({ length: 5 }, (_, i) => i < full);
};

</script>

<template>
    <div class="ml-[25px] mt-[17px]"
    v-if="items.reviews_count !== null"
    >
        <a :href="items.ref" target="_blank">Яндекс карты</a>
    </div>
    <div class="reviews_grid_container ml-[25px]">
        <div>
            <div class="bg-white drop-shadow-[0_3px_6px_rgba(21,101,111,0.3)] my-4 pl-[15px] pb-[1px] pt-[13px] rounded-xl"
                 v-for="(value, key) in items.reviews"
                 :key="key">
                <div class="mb-[20px] h-[155] min-h-[100px] bg-[#F6F8FA] rounded-xl ">
                    <div class="review_author_flex">
                        <div>
                            {{ value.date }}
                        </div>
                        <div class="pr-[26px] pt-[9px]">
                            <span
                                v-for="(star, i) in getStars(value.rating)"
                                :key="i"
                                :class="{'text-yellow-400': star}"
                            >
                            ★
                            </span>
                        </div>
                    </div>
                    <div>
                        {{ value.author }}
                    </div>
                    <div class="">
                        {{ value.text }}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-[17px]">
            <div>
                {{ items.rating }}
                <span
                    v-for="(star, i) in getStars(items.rating)"
                    :key="i"
                    :class="{'text-yellow-400': star}"
                >
                            ★
                            </span>
            </div>
            <div v-if="items.reviews_count !== null">
                Всего отзывов: {{ items.reviews_count }}
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

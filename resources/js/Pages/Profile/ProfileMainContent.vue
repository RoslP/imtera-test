<script setup>
import Reviews from "@/Pages/Profile/Reviews/Reviews.vue";
import ReviewsSettings from "@/Pages/Profile/Reviews/ReviewsSettings.vue";

const props = defineProps({
    active: String
})
</script>

<template>
    <Reviews v-if="active === 'reviews'" />

    <ReviewsSettings v-if="active === 'settings'" />
</template>

<style scoped>

</style>

<script setup>

import {onMounted, ref} from "vue";

const items = ref([])

onMounted(async () => {
    const response = await fetch('/api/get-yandex-reviews')
    items.value = await response.json()
})
</script>

<template>

</template>

<style scoped>

</style>

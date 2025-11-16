<script setup>

const props = defineProps({
  active: String
})
const emit = defineEmits(['change-active'])
function goReviews() {
  emit('change-active', 'reviews')
}
function goSettings() {
  emit('change-active', 'settings')
}
</script>

<template>
    <div class="sidebar_section_item">
        <div class="reviews">
            <span>
                <img src="../../../../svg/settings.svg" alt="setting">
            </span>
            <span class="text-[16px] font-medium tracking-normal leading-none text-[#363740] pl-[12px]">
                Отзывы
            </span>
        </div>
        <div class="section_item">
            <div></div>
            <div class="text-[12px] font-medium tracking-normal text-[#363740] pl-[12px]">
              <span @click="goReviews">Отзывы</span>
            </div>
        </div>
        <div class="section_item">
            <div></div>
            <div class="text-[12px] font-medium tracking-normal text-[#363740] pl-[12px]">
                <span @click="goSettings">Настройка</span>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

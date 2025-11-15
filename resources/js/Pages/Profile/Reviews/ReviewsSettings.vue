<script setup>

import axios from 'axios'
import {ref} from "vue";

const yandexLink = ref('')

const saveLink = async () => {
    if (!yandexLink.value) {
        alert('Поле не может быть пустым')
        return
    }
    try {
        await axios.get('/sanctum/csrf-cookie')

        await axios.post('/api/settings', {
            link: yandexLink.value
        })
        alert('Успешно')
    } catch (error) {
        alert('Не корректная ссылка')
    }
}
</script>

<template>
    <div class="pl-[35px]">
        <div class="mt-[18px] font-semibold text-base leading-[20px] tracking-tight text-[#252733]">
            Подключить Яндекс
        </div>
        <div class="mt-[15px]">
            <span class="font-semibold text-xs leading-[20px] tracking-tight text-[#6C757D]">
                Укажите ссылку на Яндекс, пример
            </span>
            <a href="https://yandex.ru/maps/org/samoye_populyarnoye_kafe/1010501395/reviews/"
               target="_blank"
               class="pl-[8px] font-normal text-xs tracking-normal align-middle underline decoration-solid text-[#788397]"
               style="text-decoration-skip-ink: all"
            >
                https://yandex.ru/maps/org/samoye_populyarnoye_kafe/1010501395/reviews/
            </a>
        </div>
        <div class="mt-[9px]">
            <input placeholder="https://yandex.ru/maps/org/samoye_populyarnoye_kafe/1010501395/reviews/"
            class="text-xs w-[480px] px-[14px] py-[4px] text-gray-700 bg-white border border-gray-300 rounded-md underline focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder:text-gray-400 text-[#788397] decoration-gray-400"
            v-model="yandexLink"
            >
        </div>
        <div class="mt-[18px]">
            <button @click="saveLink"
                    class="bg-[#339AF0] font-semibold text-text-sm px-6 py-[1px] pt-[1px] text-[#FFFFFF] rounded-[5px] text-[14px]"
            >
                Сохранить
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>

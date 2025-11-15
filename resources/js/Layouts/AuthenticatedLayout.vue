<script setup>
import DropdownLink from '@/Components/DropdownLink.vue';
import ReviewsForm from '@/Pages/Profile/Reviews/ReviewsForm.vue'
import ProfileMainContent from "@/Pages/Profile/ProfileMainContent.vue";
import {ref} from "vue";

const props = defineProps({
    login: String
});
const active = ref("reviews");
</script>

<template>
    <div class="main_wrapper">
        <div class="container">
            <div class="content_section">
                <div class="sidebar_section">
                    <div class="head">
                        <div class="logo">
                            <img src="../../svg/logo.svg" alt="logo">
                        </div>
                    </div>
                    <div class="pl-[15px] text-[16px] font-bold leading-[20px] tracking-[0.2px] text-[#6C757D]">
                        Аккаунт: {{props.login}}
                    </div>
                    <div class="sidebar_sections">
                        <ReviewsForm :active="active" @change-active="active = $event" />
                    </div>
                </div>
                <div class="main_content_section">
                    <div class="head head_main_content">
                        <div>
                            <DropdownLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                <img class="logo_logout" src="../../svg/exit.svg" alt="exit">
                            </DropdownLink>
                        </div>
                    </div>
                    <div>
                        <ProfileMainContent :active="active"></ProfileMainContent>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

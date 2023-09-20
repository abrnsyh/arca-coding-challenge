<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <Link href="/" class="navbar-brand">Coding Challange</Link>
            <!-- <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
            <!-- <ul class="navbar-nav" v-for="link in links"> -->
            <!-- <NavbarLink v-bind="link" /> -->
            <!-- </ul> -->
            <!-- </div> -->
            <button
                class="btn btn-outline-danger ms-auto d-sm-none d-lg-flex"
                @click="logout"
            >
                Logout
            </button>
        </div>
    </nav>

    <div class="container mt-4">
        <slot />
    </div>
</template>

<script>
import { Link, router } from "@inertiajs/vue3";
import NavbarLink from "./NavbarLink.vue";

export default {
    data() {
        return {
            links: [
                {
                    href: "/",
                    title: "satu",
                    disabled: false,
                    active: this.$page.url === "/",
                },
                {
                    href: "/",
                    title: "dua",
                    disabled: false,
                    active: this.$page.url === "/tes",
                },
            ],
        };
    },
    components: { NavbarLink, NavbarLink, Link },
    methods: {
        logout() {
            router.post("/logout");
        },
    },
};
</script>

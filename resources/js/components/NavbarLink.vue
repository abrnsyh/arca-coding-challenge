<template>
    <li class="nav-item">
        <Link
            :href="href"
            :class="active ? 'nav-link active' : 'nav-link'"
            aria-disabled="true"
            >{{ title }}</Link
        >
    </li>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    props: {
        href: String,
        disabled: Boolean,
        title: String,
        active: Boolean,
    },
    components: { Link },
};
</script>

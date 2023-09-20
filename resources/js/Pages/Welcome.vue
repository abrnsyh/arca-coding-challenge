<template>
    <div class="d-flex justify-content-between">
        <h1>hallo</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </nav>
    </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue";

export default {
    layout: Navbar,
};
</script>

<template>
    <div class="container" style="margin-top: 20vh">
        <div class="row">
            <form
                class="card col-12 col-md-7 mx-auto p-4"
                @submit.prevent="submit"
                @input="form.clearErrors()"
            >
                <h2>Login</h2>
                <hr />
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                        >Email address</label
                    >
                    <input
                        v-model="form.email"
                        type="email"
                        :class="
                            form.errors.email
                                ? 'form-control is-invalid'
                                : 'form-control'
                        "
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        required
                    />
                    <div
                        v-if="form.errors.email"
                        id="exampleInputPassword1"
                        class="invalid-feedback"
                    >
                        {{ form.errors.email }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"
                        >Password</label
                    >
                    <input
                        v-model="form.password"
                        type="password"
                        :class="
                            form.errors.password
                                ? 'form-control is-invalid'
                                : 'form-control'
                        "
                        id="exampleInputPassword1"
                        required
                    />
                    <div
                        v-if="form.errors.password"
                        id="exampleInputPassword1"
                        class="invalid-feedback"
                    >
                        {{ form.errors.password }}
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input
                        v-model="form.remember"
                        type="checkbox"
                        class="form-check-input"
                        id="exampleCheck1"
                    />
                    <label class="form-check-label" for="exampleCheck1"
                        >Remember</label
                    >
                </div>
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="btn btn-primary w-100"
                >
                    Submit
                    <span
                        class="spinner-border spinner-border-sm"
                        aria-hidden="true"
                        v-if="form.processing"
                    ></span>
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/vue3";

export default {
    data() {
        return {
            form: useForm({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },
    methods: {
        submit() {
            console.log(this.form.errors);
            this.form.post("/login");
        },
    },
};
</script>

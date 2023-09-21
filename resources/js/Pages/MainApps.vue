<template>
    <div class="container">
        <div class="row g-4">
            <div class="col-12 d-flex justify-content-between">
                <h1>Persentase Bonus Penghasilan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li
                            class="breadcrumb-item active"
                            aria-current="page"
                        ></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-12 col-lg-9">
                <div class="card mb-3">
                    <form
                        class="card-body"
                        @input="calcSalary"
                        @submit.prevent="save"
                    >
                        <div class="mb-3 row">
                            <label
                                for="staticEmail"
                                class="col-sm-2 col-form-label"
                                >Pembayaran</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="staticEmail"
                                    v-model.number="form.pembayaran"
                                />
                            </div>
                        </div>
                        <div v-for="person in form.buruh">
                            <div class="mb-3 row">
                                <label
                                    for="inputPassword"
                                    class="col-sm-2 col-form-label"
                                    >{{ person.name }}</label
                                >
                                <div class="col-sm-7">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="inputPassword"
                                        v-model.number="person.percentage"
                                    />
                                </div>
                            </div>
                        </div>

                        <span
                            v-if="sumPercentage > 100"
                            class="text-danger mx-auto mt-5"
                            >The Percentage must be equal to 100</span
                        >
                        <button
                            class="btn btn-primary w-100 mt-3"
                            @click.prevent="addBuruh"
                        >
                            Add Buruh
                        </button>
                        <button
                            class="btn btn-primary w-100 mt-3"
                            :disabled="sumPercentage !== 100"
                        >
                            Save
                        </button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-body" v-for="person in form.buruh">
                        <div class="mb-3 row">
                            <label
                                for="staticEmail"
                                class="col-sm-2 col-form-label"
                                >{{ person.name }}</label
                            >
                            <span class="col-sm-1">Rp.</span>
                            <div class="col-sm-7">
                                <input
                                    type="text"
                                    readonly
                                    id="staticEmail"
                                    class="form-control-plaintext"
                                    v-model="person.salary"
                                />
                            </div>
                            <div class="col-sm-2" v-if="form.buruh.length > 3">
                                <button
                                    class="btn btn-danger"
                                    @click="removeBuru(person.name)"
                                >
                                    delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mb-3">
                <HistoryTable :allPembayaran="allPembayaran" />
            </div>
        </div>
    </div>
</template>

<script>
import HistoryTable from "@/components/HistoryTable.vue";
import Navbar from "@/components/Navbar.vue";
import { useForm } from "@inertiajs/vue3";

// TODO: 1. Create update functionality for pembayaran
//       2. Create register and implement the role
//       3. Refactor the code

export default {
    layout: Navbar,
    data() {
        return {
            form: useForm({
                pembayaran: 0,
                buruh: [
                    { name: "Buruh 1", percentage: 0, salary: 0 },
                    { name: "Buruh 2", percentage: 0, salary: 0 },
                    { name: "Buruh 3", percentage: 0, salary: 0 },
                ],
            }),
        };
    },
    methods: {
        calcSalary() {
            console.log(this.allPembayaran);
            if (this.sumPercentage <= 100) {
                return (this.form.buruh = this.form.buruh.map((v) => {
                    return {
                        name: v.name,
                        percentage: v.percentage,
                        salary: this.form.pembayaran * (v.percentage / 100),
                    };
                }));
            }
        },
        addBuruh() {
            this.form.buruh.push({
                name: `Buruh ${this.form.buruh.length + 1}`,
                percentage: 0,
                salary: 0,
            });
        },
        removeBuru(name) {
            this.form.buruh = this.form.buruh.filter((v) => v.name !== name);
        },
        save() {
            console.log(this.form.errors);
            this.form.post("/pembayaran", {
                onSuccess: () => alert("Data is saved :)"),
            });
        },
    },
    computed: {
        sumPercentage() {
            return this.form.buruh.reduce(
                (prev, curr) => prev + curr.percentage,
                0
            );
        },
    },
    props: {
        allPembayaran: Object,
    },
    components: { HistoryTable },
};
</script>

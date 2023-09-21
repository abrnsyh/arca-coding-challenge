<template>
    <h3 class="mb-3">Pembayaran History</h3>
    <div class="card">
        <div class="card-content">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Buruh Name</th>
                        <th scope="col">Buruh Percentage</th>
                        <th scope="col">Buruh Salary</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody v-for="details in allPembayaran.data">
                    <tr>
                        <td>Rp. {{ details.amount }}</td>
                        <td>{{ details.buruh_name }}</td>
                        <td>{{ details.percentage }}%</td>
                        <td>Rp. {{ details.buruh_salary }}</td>
                        <td>
                            <div class="">
                                <button
                                    class="btn btn-danger"
                                    @click="deleteHistory(details.id)"
                                >
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import { router } from "@inertiajs/vue3";

export default {
    props: {
        allPembayaran: Object,
    },
    methods: {
        deleteHistory(id) {
            router.delete(`/pembayaran/${id}`, {
                onSuccess: () => alert("Data deleted :("),
            });
        },
    },
};
</script>

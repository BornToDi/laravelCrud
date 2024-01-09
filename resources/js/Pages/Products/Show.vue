<template>
    <div>
        <Head :title="`Show Product - ${product.title}`" />
        <!-- <Head title="Show Product" /> -->

        <AppLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ product.title }}
                </h2>
            </template>

            <div class="py-12">
                <div class="mx-auto max-w-7xl">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!-- Display product details here -->
                            <p>Title: {{ product.title }}</p>
                            <p>Description: {{ product.description }}</p>
                            <p>Price: {{ product.price }}</p>
                            <!-- Add more details as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    </div>
</template>

<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";



const props = defineProps(["product"]);
const product = props.product;
// console.log(product);
</script>




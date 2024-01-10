<script setup>
// import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import CreatePart from '@/Components/CreatePart.vue';

import { defineProps, ref } from 'vue';
const props = defineProps({
    products: {
        type: Object,
        default: () => ({}),
    },
    users: {
        type: Array,
        default: () => [],
    },
});
const form = useForm({});

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route("products.destroy", id));
    }
}
//popup part
const showAddProductModal = ref(false);
const openAddProductModal = () => {
    showAddProductModal.value = true;
  };

  const closeAddProductModal = () => {
    showAddProductModal.value = false;
  };
  //popup part done
  //submit

</script>

<template>
    <Head title="Products" />

    <AppLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Products Index
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <!-- <Link :href="route('products.create')">
                            </Link> -->
                            <PrimaryButton @click="openAddProductModal">Add Product</PrimaryButton>
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Show
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Edit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="product in products" :key="product.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                       {{ product.id }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                       {{ product.title }}
            </th>

            <td class="px-6 py-4 ">
                <Link :href="route('products.show', product.id)">
                    <PrimaryButton class="">Show</PrimaryButton>
                </Link>
            </td>
            <td class="px-6 py-4 ">
                <Link :href="route('products.edit', product.id)">
                    <PrimaryButton class="">Edit</PrimaryButton>
                </Link>
            </td>
            <td class="px-6 py-4 ">
                <PrimaryButton class="" @click="destroy(product.id)">
                    Delete
                </PrimaryButton>
            </td>
        </tr>
              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal -->
    <div v-if="showAddProductModal" class="fixed inset-0 overflow-y-auto">
      <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal Content -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <!-- Add Product Form -->
          <!-- You can use the form from the previous response here -->

        <CreatePart :users="users"/>

          <button @click="closeAddProductModal" class="absolute top-0 right-0 p-2 m-4 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
            <!-- Close button icon (e.g., an "X") -->
            close
          </button>
        </div>
      </div>
    </div>
    </AppLayout>
</template>

<template>
    <div>
        <Head title="Edit Product" />

        <AppLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Edit Product
                </h2>
            </template>

            <div class="py-12">
                <div class="mx-auto max-w-7xl">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form @submit.prevent="update">
                                <div>
                                    <InputLabel for="title" value="Title" />

                                    <TextInput
                                        id="title"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.title"
                                        required
                                        autofocus
                                        autocomplete="title"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.title"
                                    />
                                </div>

                                <div class="my-6">
                                    <label
                                        for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                    >
                                        Description
                                    </label>
                                    <textarea
                                        type="text"
                                        v-model="form.description"
                                        name="description"
                                        id="description"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    ></textarea>

                                    <div
                                        v-if="form.errors.description"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.description }}
                                    </div>
                                </div>

                                <div>
                                    <InputLabel for="price" value="Price" />

                                    <TextInput
                                        id="price"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.price"
                                        required
                                        autofocus
                                        autocomplete="price"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.price"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="user_id" value="User Id" />

                                    <select v-model="form.user_id" id="user_id">
                                        <option
                                            v-for="user in users"
                                            :key="user.id"
                                            :value="user.id"
                                        >
                                            {{ user.name }}
                                        </option>
                                    </select>

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.user_id"
                                    />
                                </div>

                                <PrimaryButton
                                    type="submit"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Update
                                </PrimaryButton>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    </div>
</template>

<script setup>
import { Head, useForm } from "@inertiajs/vue3";
//import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import { ref, watchEffect } from 'vue';




const props = defineProps(["product", "users"]);

const form = useForm({
    title: props.product.title,
    description: props.product.description,
    price: props.product.price,
    user_id: props.product.user_id,
});

const update = () => {
    form.put(route("products.update", props.product.id), {
        onSuccess: () => {
            // Redirect or show success message
            // Example: on success, you can redirect to the product list page
            // You may use `inertia` for this, like `inertia.visit(route('products.index'))`;
        },
    });
};
</script>

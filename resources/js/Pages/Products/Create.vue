<script setup>
import { defineProps, ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from "@/Components/TextInput.vue";
import Secondary from "@/Components/Secondary.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { Head, useForm } from "@inertiajs/vue3";
import SecondaryButton from '@/Components/SecondaryButton.vue';

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

const form = useForm({
    title: "",
    description: "",
    price: "",
    user_id: "",
});

//const selectedUser = ref(null);

const submit = () => {
    form.post(route("products.store"));
};

</script>

<template>
    <Head title="Product Create" />

    <AppLayout>
      <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
          Product Create
        </h2>
      </template>

      <div class="py-12">
        <div class="mx-auto max-w-7xl">
          <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              <form @submit.prevent="submit">
                <div class="flex">
                    <div class="w-1/2 pr-6">
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

                    <InputError class="mt-2" :message="form.errors.title" />
                  </div>

                  <div class="my-6">
                    <InputLabel
                      for="price"
                      value="Price"
                    />

                    <TextInput
                      id="price"
                      type="number"
                      class="mt-1 block w-full"
                      v-model="form.price"
                      required
                      autofocus
                      autocomplete="price"
                    />

                    <InputError class="mt-2" :message="form.errors.price" />
                  </div>

                  <div>
                    <InputLabel
                      for="user_id"
                      value="User Id"
                    />

                    <select
                      v-model="form.user_id"
                      id="user_id"
                      class="w-full rounded mb-5"
                    >
                      <option
                        v-for="user in users"
                        :key="user.id"
                        :value="user.id"
                      >
                        {{ user.name }}
                      </option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.user_id" />
                  </div>
                </div>

                <div class="w-1/2 pl-6">
                  <div class="mb-6">
                    <label
                      for="description"
                      class="block text-sm font-medium text-gray-900"
                    >
                      Description
                    </label>
                    <textarea
                      type="text"
                      v-model="form.description"
                      name="description"
                      id="description"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-40"
                    ></textarea>

                    <div
                      v-if="form.errors.description"
                      class="text-sm text-red-600"
                    >
                      {{ form.errors.description }}
                    </div>
                  </div>
                </div>
                </div>


                <Secondary

                  type="submit"
                  :class="{ 'opacity-25': form.processing } "
                  :disabled="form.processing"
                  class="ml-auto pt-10"
                >
                  Submit
                </Secondary>

              </form>
            </div>
          </div>
        </div>
      </div>
    </AppLayout>
  </template>


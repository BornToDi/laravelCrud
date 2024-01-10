<template>
    <!-- Your existing template code -->

    <div class="mb-2">
      <PrimaryButton @click="openAddProductModal">Add Product</PrimaryButton>
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

          <div class="mt-5 sm:mt-6">
            <PrimaryButton
              type="submit"
              @click="submit"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Submit
            </PrimaryButton>
          </div>

          <button @click="closeAddProductModal" class="absolute top-0 right-0 p-2 m-4 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
            <!-- Close button icon (e.g., an "X") -->
          </button>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  // ... Your existing script code

  const showAddProductModal = ref(false);

  const openAddProductModal = () => {
    showAddProductModal.value = true;
  };

  const closeAddProductModal = () => {
    showAddProductModal.value = false;
  };
  </script>

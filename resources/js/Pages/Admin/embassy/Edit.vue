<script>
import Layout from "../Layout.vue";
import {Link, useForm} from "@inertiajs/inertia-vue3";
export default {
    name: "Edit",
    components: {Link},
    layout: Layout,

    props:{
        emb: Object,
    },
    setup(props){
        const formValues=useForm({
            id: props.emb.id,
            name: props.emb.name,
            email: props.emb.email,
        })

        return{
            formValues
        }
    }
}
</script>

<template>
    <div class="py-4">
            <span class="relative flex justify-center">
                  <div
                      class="absolute inset-x-0 top-1/2 h-px -translate-y-1/2 bg-transparent bg-gradient-to-r from-transparent via-gray-500 to-transparent opacity-75"
                  >
                  </div>

                  <span class="relative z-10 bg-gray-50 px-6">Намояндаи ҶТ дар хориҷи кишвар</span>
            </span>
    </div>
    <div class="w-full flex flex-col justify-center items-center">
        <form class="w-1/2 pt-16" @submit.prevent="formValues.put(route('emb.update', formValues.id))">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Номи намояндаги</label>
                <input
                    v-model.trim.lazy="formValues.name"
                    type="text"
                    id="name"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Почтаи электрони</label>
                <input
                    v-model.trim.lazy="formValues.email"
                    type="email"
                    id="email"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="itd@mfa.tj">
            </div>
            <div class="flex justify-end justify-start">
                <Link
                    as="button"
                    type="button"
                    :href="route('emb.list')"
                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                    Ба қафо
                </Link>
                <button
                    type="submit"
                    :disabled="formValues.processing"
                    class="text-white bg-blue-700 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Иловаи намояндаги
                </button>
            </div>
        </form>
    </div>
</template>

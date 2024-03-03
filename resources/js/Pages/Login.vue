<script>
import {Link, useForm} from '@inertiajs/inertia-vue3';

export default {
    name: "Login",
    components:{Link},

    setup(){
        const form = useForm ({
            email: null,
            password: null,
            _method: "POST"
        });

        return {form}
    }
}
</script>

<template>
    <div class="flex items-center justify-center h-screen px-6 bg-center bg-cover opacity-100"
         style="background-image: url('/image/bg1.jpg')"
    >

        <div class="w-full max-w-sm p-6 bg-gray-50 rounded-md shadow-md opacity-85">
            <div class="flex items-center justify-center gap-4 border-b-2 pb-4">
                <Link
                :href="route('main')"
                class="flex items-center justify-center gap-4"
                >
                    <img src="../img/logo.png" alt="Logo" class="h-14 w-14">
                    <span class="text-2xl font-semibold text-gray-700">Раёсати кадрҳо</span>
                </Link>
            </div>
            <div v-if="$page.props.flash.message" class="text-red-500 text-center text-xs mt-2">
                {{$page.props.flash.message}}
            </div>
            <form @submit.prevent="form.post(route('login.auth'))" class="mt-6">
                <label class="block">
                    <span class="text-sm text-gray-700">Почта</span>
                    <input
                        v-model="form.email"
                        type="email"
                        class="block w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                    >
                </label>

                <label class="block mt-3">
                    <span class="text-sm text-gray-700">Рамз</span>
                    <input
                        v-model="form.password"
                        type="password"
                        class="block w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                    >
                </label>
                <div class="mt-6">
                    <button
                        type="submit"
                        class="w-full px-4 py-2 text-sm text-center text-white bg-indigo-600 rounded-md focus:outline-none hover:bg-indigo-500"
                    >
                        Ворид шудан
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

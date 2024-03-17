<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "Layouts",
    components: {Link}
}
</script>

<template>
    <div>
        <div class="header sticky top-0 z-50">
            <header class="bg-slate-800 sticky top-0">
                <div class="flex justify-between max-w-full  px-2 sm:px-2 lg:px-2">
                    <div class="flex items-center w-full justify-between mx-4 py-2 sticky top-0">

                        <!-- Logo section  -->

                        <div class="flex md:flex md:items-center ">
                            <Link class="block text-teal-600 flex items-center"
                                  :href="route('main')">
                                <span class="sr-only">Home</span>
                                <img class="h-12 w-12" src="../../img/logo.png" alt="LOGO">
                                <span class="text-lg text-white font-semibold ml-2">
                                Раёсати кадрҳо
                            </span>
                            </Link>
                        </div>

                        <!-- Menu section  -->

                        <div class="md:flex md:items-center md:gap-12 text-white">
                            <nav aria-label="Global" class="hidden md:block">
                                <ul class="flex items-center gap-6 text-sm text-white">
                                    <li class="text-lg hover:text-blue-600">
                                        <Link
                                            :class="$page.component==='Mains/Main' && 'text-green-400'"
                                            class="text-gray-500 transition hover:text-blue-300 text-white"
                                              :href="route('main')">
                                            Асоси
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :class="$page.component==='Mains/Vazorat' && 'text-green-400'"
                                            class="text-gray-500 transition hover:text-blue-300 text-white"
                                              :href="route('vazorat')">
                                            Дастгоҳи марказӣ
                                        </Link>
                                    </li>

                                    <li>
                                        <Link
                                            :class="$page.component==='Mains/Embassy' && 'text-green-400'"
                                            class="text-gray-500 transition hover:text-blue-300 text-white"
                                              :href="route('embassy')">
                                            Намояндагиҳои дипломати
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :class="$page.component==='Mains/Dipservice' && 'text-green-400'"
                                            class="text-gray-500 transition hover:text-blue-300 text-white"
                                              :href="route('dipservice')">
                                            Дипсервис
                                        </Link>
                                    </li>
                                </ul>
                            </nav>

                            <div class="flex items-center gap-4">
                                <div class="sm:flex sm:gap-4">
                                    <Link
                                        class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                                        :href="route('login')"
                                    >
                                        Ворид шудан
                                    </Link>
                                </div>

                                <div class="block md:hidden">
                                    <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
        </div>
        <!-- Main content -->
        <div class="h-screen w-full bg-center bg-gray-700 mt-[-60px] relative"
             >
            <div class="h-full w-full pt-12 absolute opacity-100">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

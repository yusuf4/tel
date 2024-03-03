<script>
import {Link} from '@inertiajs/inertia-vue3'
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
export default {
    name: "Main",
    components: {Link},
    data(){
        return{

            search: ref(this.searchlist.search),
        }
    },
    props:{
        kor: Object,
        searchlist: Object,
    },
    watch:{
        search(value){
            Inertia.get('/', {search: value}, {
                preserveState: true
            });
        },
    }
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
                                <ul
                                    class="flex items-center gap-6 text-sm text-white">
                                    <li>
                                        <Link

                                            :class="$page.component==='Mains/Main' && 'text-green-400'"
                                            class="text-gray-500 transition hover:text-blue-300 text-white"
                                              :href="route('main')">
                                            Асоси
                                        </Link>
                                    </li>
                                    <li>
                                        <Link class="text-gray-500 transition hover:text-blue-300 text-white"
                                              :href="route('vazorat')">
                                            Дастгоҳи марказӣ
                                        </Link>
                                    </li>

                                    <li>
                                        <Link class="text-gray-500 transition hover:text-blue-300 text-white"
                                              :href="route('embassy')">
                                            Намояндагиҳои дипломати
                                        </Link>
                                    </li>
                                    <li>
                                        <Link class="text-gray-500 transition hover:text-blue-300 text-white"
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
       <div class="h-screen w-full bg-blue-300 bg-center bg-cover mt-[-60px] opacity-100"
            style="background-image: url('/image/bg2.jpg')">
            <div class="h-full w-full mt-12 flex justify-center">
                <div class="bg-gray-300 h-[340px] w-1/3  mt-32 rounded-lg opacity-40 px-8 overflow-y-auto">
                    <p class="text-2xl text-black text-center font-semibold my-4 opacity-100">Ҷустуҷуи шахс </p>
                    <div class="relative mt-4 sticky top-0">

                        <label for="Search" class="sr-only"> Search </label>
                        <input
                            v-model="search"
                            type="text"
                            id="Search"
                            placeholder="Search for..."
                            class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm"
                        />

                        <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                            <button type="button" class="text-gray-600 hover:text-gray-700">
                              <span class="sr-only">Search</span>
                              <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke-width="1.5"
                                  stroke="currentColor"
                                  class="h-4 w-4"
                              >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                />
                              </svg>
                            </button>
                        </span>
                    </div>
                    <table
                        v-if="search != null"
                        class="mt-4 w-full text-sm text-left rtl:text-right dark:text-gray-400">
                        <thead class="text-xs uppercase bg-gray-600  dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-1">
                                Ному насаб
                            </th>

                            <th scope="col" class="px-2 mr-4 py-1">
                                Сохтор
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="item in kor.data"
                            :key="item.id"
                            class="border-b hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                            <td class="px-2 py-2 font-medium dark:text-white whitespace-nowrap">
                                <Link
                                    :href="route('show.item', item.id)"
                                >
                                    {{ item.lastname }} {{item.name}}
                                </Link>
                            </td>
                            <td class="px-2 py-2 mr-4">
                                 <span
                                     v-if="item.dastgoh==3"
                                 >
                                            {{item.embassy.name}}
                                        </span>

                                <span
                                    v-if="item.dastgoh==1"
                                >
                                            {{item.department_d.name}}
                                        </span>
                                <span
                                    v-if="item.dastgoh==2"
                                >
                                            {{item.dipservices.name}}
                                        </span>
                            </td>

                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
       </div>
    </div>
</template>

<style scoped>

</style>

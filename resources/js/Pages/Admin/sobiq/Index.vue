<script>
import Layout from "../Layout.vue";
import {Head, Link} from "@inertiajs/inertia-vue3";
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import item from "../../Mains/Item.vue";
export default {
    name: "Index",
    layout: Layout,
    components:{Link, Head},
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
            Inertia.get('/sobiq/lists', {search: value}, {
                preserveState: true
            });
        },
    }
}
</script>

<template>
    <Head>
        <title>Кормандон</title>
    </Head>
    <div class="py-2 mb-8">
            <span class="relative flex justify-center">
                  <div
                      class="absolute inset-x-0 top-1/2 h-px -translate-y-1/2 bg-transparent bg-gradient-to-r from-transparent via-gray-500 to-transparent opacity-75"
                  >
                  </div>

                  <span class="relative z-10 bg-gray-50 px-6">Кормандон</span>
            </span>
    </div>
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-end">
                <div class="pb-4 dark:bg-gray-900">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input
                            type="text"
                            v-model="search"
                            id="table-search"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ҷустуҷӯ...">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Ном насаб
                </th>
                <th scope="col" class="px-6 py-3">
                    сохтор
                </th>
                <th scope="col" class="px-6 py-3">
                    Раёсат/Шуъба/Намояндаги
                </th>

                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="item in kor.data"
                :key="item.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{item.lastname}} {{item.name}}  {{item.nasab}}
                </th>
                <td
                    v-if="item.dastgoh=='1'"
                    class="px-6 py-4">
                    <p>Дастгоҳи маркази</p>
                </td>
                <td
                    v-show="item.dastgoh=='2'"
                    class="px-6 py-4">
                    <p>Дирсервис</p>
                </td>
                <td
                    v-if="item.dastgoh=='3'"
                    class="px-6 py-4">
                    <p>Муасисаи хориҷи</p>
                </td>
                <td class="px-6 py-4 ">
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
                    <span
                        v-if="item.dastgoh===3"
                    >
                        {{item.embassy.name}}
                        </span>
                </td>

                <td class="px-6 py-4 text-right flex items-center justify-end">
                    <Link
                        :href="route('sobiq.edit', item.id)"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-5 h-5">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </Link>
                    <Link
                        onclick="return confirm('Шумо дар ҳақиқат мехоҳед ин кормандро нест намоед?')"
                        method="delete"
                        as="button"
                        type="button"
                        :href="route('sobiq.delete', item.id)"
                        class="font-medium text-red-600 dark:text-blue-500 hover:underline">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor"
                            class="w-5 h-5">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </Link>
                </td>
            </tr>

            </tbody>
        </table>
        <div class="flex justify-center my-4">
            <Component
                :is="link.url ? 'Link' : 'span'"
                v-for="link in kor.links"
                :href="link.url"
                v-html="link.label"
                class="relative block rounded bg-transparent px-2 py-1.5 text-sm transition-all duration-300 dark:text-neutral-400"
                :class="{'text-gray-500': ! link.url, 'text-blue-600 font-medium': link.active }"
            />
        </div>
    </div>
</template>

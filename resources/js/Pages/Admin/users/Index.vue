<script>
import Layout from "../Layout.vue";
import {Head, Link} from "@inertiajs/inertia-vue3";
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import item from "../../Mains/Item.vue";
import VueMultiselect from 'vue-multiselect'
export default {
    name: "Index",
    computed: {
        item() {
            return item
        }
    },
    layout: Layout,
    components:{Link, Head, VueMultiselect},
    data(){
        return{
            filterblock: false,
            search: ref(this.searchlist.search),
            departfilter: '',
            dipservice:'',
            namoyandagi: '',

        }
    },
    props:{
        kor: Object,
        searchlist: Object,
        dip: Array,
        dep: Array,
        emb: Array,
    },
    methods: {
        FilterToggle(){
            this.filterblock=!this.filterblock;
            localStorage.setItem('filterblock',JSON.parse(this.filterblock));

        },
    },
    watch:{
        search(value){
            Inertia.get('/user/lists', {search: value}, {
                preserveState: true
            });
        },
        dipservice(value){
            Inertia.get('/user/lists', {dipservice: value}, {
                preserveState: true
            });
        },
        namoyandagi(value){
            Inertia.get('/user/lists', {namoyandagi: value}, {
                preserveState: true
            });
        },

        departfilter(value){
            Inertia.get('/user/lists',{departfilter:value},{
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
            <div class="flex items-center justify-between">
                <Link
                    :href="route('adduser')"
                    as="button"
                    type="button"
                    class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                    Иловаи корманд
                </Link>
                <div class="pb-4 dark:bg-gray-900">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1 flex items-center">
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
                        <div
                            @click="FilterToggle"
                            class="mx-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="2"
                                 stroke="currentColor"
                                 class="w-6 h-6 text-blue-600">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div
        v-show="filterblock"
        class="flex items-center justify-between space-x-2">
        <div
            class="w-1/3 block  text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <VueMultiselect
                v-model="dipservice"
                :options="dip"
                :searchable="true"
                :allow-empty="true"
                label="name"
                placeholder="Дипсервис"
                track-by="id">
            </VueMultiselect>
        </div>
        <div
            class="w-1/3 block  text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <VueMultiselect
                v-model="departfilter"
                :options="dep"
                :searchable="true"
                :allow-empty="true"
                label="name"
                placeholder="Дастгоҳи маркази"
                track-by="id">
            </VueMultiselect>
        </div>
        <div
            class="w-1/3 block  text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <VueMultiselect
                v-model="namoyandagi"
                :options="emb"
                :searchable="true"
                :allow-empty="true"
                label="name"
                placeholder="Намояндаги"
                track-by="id">
            </VueMultiselect>
        </div>
        <div>
            <Link
                :href="route('user.list')"
            >
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor"
                     class="w-6 h-6 text-green-400">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
            </Link>
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
                        :href="route('show.user', item.id)"
                        class="font-medium text-green-600 dark:text-blue-500 hover:underline mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor"
                             class="w-5 h-5">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path strokeLinecap="round" strokeLinejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </Link>
                    <Link
                        :href="route('user.edit', item.id)"
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
                        :href="route('user.delete', item.id)"
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
<style src="vue-multiselect/dist/vue-multiselect.css"></style>

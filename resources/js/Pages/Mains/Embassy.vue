<script>
import Layouts from "./Layouts.vue";
import {Head, Link} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {ref} from "vue";
import VueMultiselect from 'vue-multiselect'
export default {
    name: "Embassy",
    components: {Link, Head, VueMultiselect},
    layout: Layouts,
    data(){
        return{
            namoyandagi: '',
            search: ref(this.searchlist.search),
        }
    },
    props:{
        kor: Object,
        searchlist: Object,
        emb: Array,
    },
    watch:{
        search(value){
            Inertia.get('/main/embassy', {search: value}, {
                preserveState: true
            });
        },
        namoyandagi(value){
            Inertia.get('/main/embassy', {namoyandagi: value}, {
                preserveState: true
            });
        },
    }
}
</script>

<template>
    <div class="text-4xl text-white font-semibold mt-6 bg-gray-700">
        <p class="text-center text-xl mb-12 hover:text-blue-400">Намояндагиҳои дипломатии Тоҷикистон дар хориҷа</p>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex justify-between pb-4 mx-1 dark:bg-gray-900 flex justify-end items-center">

                <div
                    class="w-2/5 block  text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <VueMultiselect
                        v-model="namoyandagi"
                        :options="emb"
                        :searchable="true"
                        :allow-empty="true"
                        label="name"
                        placeholder="Интихоби намояндаги"
                        track-by="id">
                    </VueMultiselect>
                </div>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input
                        v-model="search"
                        type="text"
                        id="table-search"
                        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ҷустуҷуи корманд">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right dark:text-gray-400">
                <thead class="text-xs  uppercase bg-gray-600  dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">
                        Ному насаб
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Вазифа
                    </th>
                    <th scope="col" class="px-6 py-3">
                        намояндаги
                    </th>
                    <th scope="col" class="px-6 py-3">
                            телефони мобили
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telegram/WhatsApp
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
                </thead>
                <tbody>
                <tr
                    v-for="item in kor.data"
                    :key="item.id"
                    class="border-b hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium dark:text-white">
                        {{ item.lastname }} {{item.name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ item.vazifa }}
                    </td>
                    <td class="px-6 py-4">
                        {{ item.embassy.name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ item.mobili }}
                    </td>
                    <td class="px-6 py-4">
                        {{ item.teleg }}
                    </td>
                    <td class="px-6 py-4 text-right flex items-center justify-end">
                        <Link
                            :href="route('embassy.user', item.id)"
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
    </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>

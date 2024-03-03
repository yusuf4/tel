<script>
import Layouts from './Layouts.vue'
import {Head, Link} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import VueMultiselect from 'vue-multiselect'
import {ref} from "vue";
export default {
    name: "Vazorat",
    layout: Layouts,
    components:{Link, Head, VueMultiselect},
    data(){
        return{
            value: '',
            search: ref(this.searchlist.search),
            departfilter: '',
        }
    },
    props:{
        kor: Object,
        searchlist: Object,
        dep: Array,
    },
    watch:{
        search(value){
            Inertia.get('/vazorat', {search: value}, {
                preserveState: true
            });
        },

        departfilter(value){
            Inertia.get('/vazorat',{departfilter:value},{
                preserveState: true
            });
        },
    }
}
</script>

<template>
    <div class="text-4xl text-white font-semibold mt-12">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex justify-between mx-1 dark:bg-gray-900 flex justify-end items-center">
                <div
                    class="flex flex-col pb-6"
                >
                    <label for="underline_select" class="ml-2 text-sm text-white">
                        Интихоби раёсат
                    </label>
                    <select
                        v-model="departfilter"
                        id="underline_select" class="ml-2 block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected>Интихоби раёсат</option>
                        <option value="1">Роҳбарият</option>
                        <option value="2">Гурӯҳи сафирони супоришҳои махсус</option>
                        <option value="3">Сарраёсати консулӣ</option>
                        <option value="4">Раёсати кадрҳо</option>
                        <option value="5">Раёсати кишварҳои Аврупо ва Америка</option>
                        <option value="6">Раёсати кишварҳои Ховари Миёна ва Африқо</option>
                        <option value="7">Раёсати кишварҳои Осиё ва Уқёнуси Ором</option>
                        <option value="8">Раёсати кишварҳои Иттиҳоди Давлатҳои Мустақил</option>
                        <option value="9">Раёсати таҳқиқоти стратегӣ</option>
                        <option value="10">Раёсати созмонҳои байналмилалӣ</option>
                        <option value="11">Раёсати ҳамкориҳои иқтисодии хориҷӣ</option>
                        <option value="12">Раёсати шартномавӣ-ҳуқуқӣ</option>
                        <option value="13">Раёсати ташрифоти давлатӣ</option>
                        <option value="14">Раёсати иттилоот ва матбуот</option>
                        <option value="15">Раёсати иттилооти умумӣ ва алоқаи дипломатӣ</option>
                        <option value="16">Раёсати молиявӣ</option>
                        <option value="17">Раёсати корҳо</option>
                        <option value="18">Котибот</option>
                        <option value="19">Шуъбаи Комиссияи миллии ЮНЕСКО</option>
                        <option value="20">Шуъбаи ҳалли масъалаҳои ҳудудӣ ва сарҳадӣ</option>
                        <option value="21">Шуъбаи Созмони ҳамкории Шанхай</option>
                        <option value="22">Шуъбаи технологияҳои иттилоотӣ ва коммуникатсионӣ</option>
                        <option value="23">Шуъбаи тарҷума</option>
                        <option value="24">Шуъбаи сохтмон</option>
                        <option value="25">Маркази такмили ихтисос ва бозомӯзӣ</option>
                    </select>
                </div>
                <div class="relative">
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
                    <th scope="col" class="px-6 py-3 ">
                        Ному насаб
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Вазифа
                    </th>
                    <th scope="col" class="px-6 py-3">
                        телефони дохили
                    </th>
                    <th scope="col" class="px-6 py-3">
                        телефони шаҳри
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
                        {{ item.doxili }}
                    </td>
                    <td class="px-6 py-4">
                        {{ item.xizmati }}
                    </td>
                    <td class="px-6 py-4 text-right flex items-center justify-end">
                        <Link
                            :href="route('vazorat.user', item.id)"
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

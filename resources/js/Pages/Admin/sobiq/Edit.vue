<script>
import Layout from "../Layout.vue";
import {Link, useForm} from "@inertiajs/inertia-vue3";
import VueMultiselect from 'vue-multiselect'
import {ref} from "vue";

export default {
    name: "Edit",
    components: {Link, VueMultiselect},
    layout: Layout,
    data(){
        return {
            dipinput: false,
            depinput: false,
            embinput: false,
            shoxisinput: true,
            utoqinput: true,
            selected: '',
            doxili: true,
            email: false,
            teleg: false,
        }
    },
    props:{
        kor: Object,
        dep: Array,
        dip: Array,
        emb: Array,
        errors: Object,
    },
    methods:{
        SelectD(event){
            this.selected = event.target.value;
            if(this.selected==="2" || this.selected==="3" ){
                this.shoxisinput = false;
                this.utoqinput=false;
            }
        },
    },
    setup(props){
        const formValues=useForm({
            id: props.kor.id,
            dastgoh: props.kor.dastgoh,
            name: props.kor.name,
            lastname: props.kor.lastname,
            nasab: props.kor.nasab,
            vazifa: props.kor.vazifa,
            shoxis: props.kor.shoxis,
            utoq: props.kor.utoq,
            doxili: props.kor.doxili,
            xizmati: props.kor.xizmati,
            mobili: props.kor.mobili,
            email: props.kor.email,
            teleg: props.kor.teleg,
            sobiq: null,
            department: null,
        })

        return{
            formValues
        }
    },
    computed:{
        shoxisD(){
            if (this.kor.dastgoh==3 || this.kor.dastgoh==2 )
            {
                return this.shoxisinput=false;

            }else{
                return this.shoxisinput=true;
            }
        },
        enInputs(){
            if (this.formValues.dastgoh==='1'){
                this.utoqinput=true;
            }
        }
    }

}
</script>

<template>
    <div class="pt-4 px-2">
        <div class="my-2 pb-12">
            <span class="relative flex justify-center">
                  <div
                      class="absolute inset-x-0 top-1/2 h-px -translate-y-1/2 bg-transparent bg-gradient-to-r from-transparent via-gray-500 to-transparent opacity-75"
                  >
                  </div>
                  <span class="relative z-10 bg-gray-50 px-6">Тағийри маълумот</span>
            </span>
        </div>
        <!-- Intixob buttons -->

        <h3 class="my-4 font-semibold text-gray-900 dark:text-white">Сохтор</h3>

        <!-- Form -->
        <form class="pt-4" @submit.prevent="formValues.put(route('sobiq.update', formValues.id))">
            <div class="border-b-2 pb-4 border-green-500">
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div
                            @click="shoxisinput=true"
                            class="flex items-center ps-3">
                            <input id="horizontal-list-radio-license"
                                   type="radio"
                                   value="1"
                                   v-model="formValues.dastgoh"
                                   name="list-radio"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Дастгоҳи маркази
                            </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div
                            @change="SelectD($event)"
                            class="flex items-center ps-3">
                            <input
                                id="horizontal-list-radio-id"
                                type="radio"
                                v-model="formValues.dastgoh"
                                value="3"
                                name="list-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Намояндагиҳо
                            </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div
                            @change="SelectD($event)"
                            class="flex items-center ps-3">
                            <input id="horizontal-list-radio-military"
                                   type="radio"
                                   v-model="formValues.dastgoh"
                                   value="2"
                                   name="list-radio"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-military" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Дипсервис
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Vazorat -->
            <div class="flex justify-start mt-8">
                <div class="px-4 w-1/2">
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input
                                v-model.trim.lazy="formValues.name"
                                type="text"
                                name="floating_first_name"
                                id="floating_first_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-green-500 dark:text-green-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ном</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input
                                v-model.trim.lazy="formValues.lastname"
                                type="text"
                                name="floating_last_name"
                                id="floating_last_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-green-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Насаб</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input
                                v-model.trim.lazy="formValues.nasab"
                                type="text"
                                name="floating_third_name"
                                id="floating_third_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating_third_name" class="peer-focus:font-medium absolute text-sm text-green-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Номи Падар</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input
                                v-model.trim.lazy="formValues.vazifa"
                                type="text"
                                name="floating_vazifa_name"
                                id="floating_vazifa_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating_vazifa_name" class="peer-focus:font-medium absolute text-sm text-green-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Вазифа</label>
                        </div>
                        <div
                            v-show="shoxisD && shoxisinput"
                            class="relative z-0 w-full mb-5 group">
                            <input
                                v-model.trim.lazy="formValues.shoxis"
                                type="text"
                                name="floating_shoxis_name"
                                id="floating_shoxis_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating_shoxis_name" class="peer-focus:font-medium absolute text-sm text-green-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Шохис</label>
                        </div>
                        <div
                            v-show="shoxisD && shoxisinput"
                            class="relative z-0 w-full mb-5 group">
                            <input
                                v-model.trim.lazy="formValues.utoq"
                                type="text"
                                name="floating_utoq_name"
                                id="floating_utoq_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating_utoq_name" class="peer-focus:font-medium absolute text-sm text-green-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Утоқ</label>
                        </div>
                    </div>
                </div>
                <div class="w-1 h-60 bg-green-300 mx-4"></div>
                <div class="w-1/2">
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div
                            v-if="formValues.dastgoh==='3' || formValues.dastgoh==='2' ? doxili=false : doxili=true"
                            class="relative z-0 mb-5">
                            <span class="absolute start-0 bottom-3 text-gray-500 dark:text-gray-400">
                                <svg class="w-4 h-4 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                    <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                                </svg>
                            </span>
                            <input
                                v-model.trim.lazy="formValues.doxili"
                                type="text"
                                id="floating-doxili-number"
                                class="block py-2.5 ps-6 pe-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  placeholder=" " />
                            <label for="floating-doxili-number" class="absolute text-sm text-green-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:start-6 peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                Телефони дохили
                            </label>
                        </div>
                        <div class="relative z-0 mb-5">
                        <span class="absolute start-0 bottom-3 text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                            </svg>
                        </span>
                            <input
                                v-model.trim.lazy="formValues.xizmati"
                                type="text"
                                id="floating-xizmati-number"
                                class="block py-2.5 ps-6 pe-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating-xizmati-number" class="absolute text-sm text-green-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:start-6 peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                Телефони хизмати
                            </label>
                        </div>
                        <div class="relative z-0 mb-5">
                        <span class="absolute start-0 bottom-3 text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                            </svg>
                        </span>
                            <input
                                v-model.trim.lazy="formValues.mobili"
                                type="text"
                                id="floating-mobili-number"
                                class="block py-2.5 ps-6 pe-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating-mobili-number" class="absolute text-sm text-green-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:start-6 peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                Телефони мобили
                            </label>
                        </div>
                        <div
                            v-if="formValues.dastgoh==='3'  ? email===false : email===true"
                            class="relative z-0 mb-5">
                        <span class="absolute start-0 bottom-3 text-gray-500 dark:text-gray-400">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                            </svg>
                        </span>
                            <input
                                v-model.trim.lazy="formValues.email"
                                type="email"
                                id="floating-email-number"
                                class="block py-2.5 ps-6 pe-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating-email-number" class="absolute text-sm text-green-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:start-6 peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                Почтаи электрони
                            </label>
                        </div>
                        <div
                            v-if="formValues.dastgoh==='3'  ? teleg===false : teleg===true"
                            class="relative z-0 mb-5">
                        <span class="absolute start-0 bottom-3 text-gray-500 dark:text-gray-400">
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                            </svg>

                        </span>
                            <input
                                v-model.trim.lazy="formValues.teleg"
                                type="text"
                                id="floating-teleg-number"
                                class="block py-2.5 ps-6 pe-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating-teleg-number" class="absolute text-sm text-green-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:start-6 peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                WhatsApp, Telegram...
                            </label>
                        </div>
                    </div>
                    <div
                        v-if="formValues.dastgoh==1 ? dipinput===false : depinput===true"
                        class="my-8 flex flex-col justify-start items-start">
                        <p
                            v-if="kor.department_id!=null"
                            class="mb-2 text-xs ">
                            Раёсат/Шуъба қабли: <span class="text-sm text-green-600">{{kor.department_d.name}}</span>
                        </p>
                        <VueMultiselect
                            v-model="formValues.department"
                            :options="dep"
                            :searchable="true"
                            :allow-empty="true"
                            label="name"
                            placeholder='Тағийри раёсат'
                            track-by="name">
                        </VueMultiselect>
                        <div v-if="errors.department" class="text-xs mt-1 text-red-600">{{errors.department}}</div>
                    </div>
                    <div
                        v-if="formValues.dastgoh==2 ? depinput===false : dipinput===true"
                        class="my-8 flex flex-col justify-start items-start">
                        <p
                            v-if="kor.embassies_id!=null"
                            class="mb-2 text-xs ">
                            Намояндагии қабли: <span class="text-sm text-green-600">{{kor.dipservices.name}}</span>
                        </p>
                        <VueMultiselect
                            v-model="formValues.department"
                            :options="dip"
                            :searchable="true"
                            :allow-empty="true"
                            label="name"
                            placeholder='Тағийри раёсати Дипсервис'
                            track-by="name">
                        </VueMultiselect>
                        <div v-if="errors.department" class="text-xs mt-1 text-red-600">{{errors.department}}</div>
                    </div>
                    <div
                        v-if="formValues.dastgoh==3 ? embinput===false : embinput===true"
                        class="my-8 flex flex-col justify-start items-start">
                        <p
                            v-if="kor.embassies_id!=null"
                            class="mb-2 text-xs ">
                            Намояндагии қабли: <span class="text-sm text-green-600">{{kor.embassy.name}}</span>
                        </p>
                        <VueMultiselect
                            v-model="formValues.department"
                            :options="emb"
                            :searchable="true"
                            :allow-empty="true"
                            label="name"
                            placeholder='Тағийри намояндаги'
                            track-by="name">
                        </VueMultiselect>
                        <div v-if="errors.department" class="text-xs mt-1 text-red-600">{{errors.department}}</div>
                    </div>
                    <div>
                        <label class="inline-flex items-center cursor-pointer">
                            <input
                                v-model="formValues.sobiq"
                                type="checkbox"
                                value=null
                                true-value="null"
                                class="sr-only peer">
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Собиқ корманд</span>
                        </label>
                    </div>
                    <div class="flex justify-end justify-start">
                        <Link
                            as="button"
                            type="button"
                            :href="route('sobiq.index')"
                            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            Ба қафо
                        </Link>
                        <button
                            type="submit"
                            :disabled="formValues.processing"
                            class="text-white bg-blue-700 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Тағийри маълумот
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import Layouts from "./Layouts.vue";
export default {
    name: "Item",
    layout: Layouts,
    components:{Link},
    props:{
        kor: Object,
    }
}
</script>

<template>
    <div class="flex justify-center mt-12 opacity-100">
        <article class="rounded-xl w-1/3 border border-gray-700 bg-gray-800 p-4">
            <div class="flex items-center gap-4">
                <img
                    v-if="kor.id==1"
                    alt="Developer"
                    src="../../img/Yusuf.jpeg"
                    class="h-16 w-16 rounded-full object-cover"
                />
                <svg
                    v-else
                    xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor"
                     class="w-16 h-16 text-blue-500">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <div>
                    <h3 class="text-lg font-medium text-white">{{kor.lastname}} {{kor.name}} {{kor.nasab}}</h3>

                    <div class="flow-root">
                        <ul class="-m-1 flex flex-wrap">
                            <li class="p-1 leading-none">
                                <a
                                    v-if="kor.dastgoh==1"
                                    href="#" class="text-xs font-medium text-blue-500">
                                    {{ kor.department_d.email }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <ul class="mt-4 space-y-2">
                <li class="flex flex-col justify-start">
                    <a href="#" class="block h-full rounded-lg border border-gray-700 p-4 hover:border-pink-600">
                        <strong v-show="kor.dastgoh==1 || kor.dastgoh==2"
                                class="font-medium text-white">Раёсат/Шуъба
                        </strong>
                        <strong
                            v-show="kor.dastgoh==3"
                            class="font-medium text-white">
                            Намояндаги:
                        </strong>

                        <p
                            v-if="kor.dastgoh==1"
                            class="mt-1 text-sm font-medium text-gray-300">
                            {{kor.department_d.name}}
                        </p>
                        <p
                            v-if="kor.dastgoh==2"
                            class="mt-1 text-sm font-medium text-gray-300">
                            {{kor.dipservices.name}}
                        </p>
                        <div
                            v-if="kor.dastgoh==3"
                        >
                            <p
                                class="mt-1 text-sm font-medium text-gray-300">
                                {{kor.embassy.name}}
                            </p>
                            <p
                                class="mt-1 text-sm font-medium text-blue-500">
                                {{kor.embassy.email}}
                            </p>
                        </div>

                    </a>
                </li>

                <li>
                    <a href="#" class="block h-full rounded-lg border border-gray-700 p-4 hover:border-pink-600">
                        <strong class="font-medium text-white">Маълумоти иловаги</strong>
                        <p class="mt-1 text-sm font-medium text-gray-300">
                            Вазифа: {{kor.vazifa}}
                        </p>

                        <p class="mt-1 text-sm font-medium text-gray-300">
                            Телефон:
                        </p>
                        <div class="flow-root ml-8 mt-0.5">
                            <ul class="-m-1  flex-wrap">
                                <li
                                    v-show="kor.dastgoh==1"
                                    class="pr-1 leading-none mt-1">
                                    <a href="#" class="flex items-end text-sm font-medium text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1" stroke="currentColor"
                                             class="w-4 h-4 mr-1">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                        <span>
                                             дохили: {{kor.doxili}}
                                        </span>
                                    </a>
                                </li>

                                <li class="pr-1 leading-none mt-1">
                                    <a href="#" class="flex items-end text-sm font-medium text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1" stroke="currentColor"
                                             class="w-4 h-4 mr-1">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                        <span>
                                            Хизмати: {{ kor.xizmati}}
                                        </span>
                                    </a>
                                </li>
                                <li class="leading-none mt-1">
                                    <a href="#" class="flex items-end text-sm font-medium text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1" stroke="currentColor"
                                             class="w-5 h-5">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                        </svg>

                                        <span>Мобили: {{ kor.mobili}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <p
                            v-show="kor.dastgoh==1"
                            class="mt-1.5 text-sm font-medium text-gray-300">
                            Утоқи кори: {{kor.utoq}}
                        </p>
                        <p
                            v-show="kor.dastgoh==1"
                            class="mt-1.5 text-sm font-medium text-gray-300">
                            Шохис: {{kor.shoxis}}
                        </p>
                        <div v-show="kor.dastgoh==3">
                            <p
                                class="mt-1.5 text-sm font-medium text-gray-300">
                                Почтаи электронӣ: {{kor.email}}
                            </p>
                            <p class="mt-1.5 text-sm font-medium text-gray-300">
                                Telegram/WhatsApp: {{kor.teleg}}
                            </p>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="flex justify-end items-center mt-2">
                <Link
                    class="group relative inline-flex items-center overflow-hidden rounded bg-gray-600 px-6 py-2 text-white focus:outline-none focus:ring active:bg-indigo-500"
                    :href="route('main')"
                >
              <span class="absolute -end-full transition-all group-hover:end-4">
                <svg
                    class="size-5 rtl:rotate-180"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 8l4 4m0 0l-4 4m4-4H3"
                  />
                </svg>
              </span>

                    <span class="text-sm font-medium transition-all group-hover:me-4"> Ба қафо </span>
                </Link>
            </div>


        </article>
    </div>

</template>

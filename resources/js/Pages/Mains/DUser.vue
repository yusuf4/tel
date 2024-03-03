<script>
import Layouts from "./Layouts.vue";
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "DUser",
    layout: Layouts,
    components:{Link},
    props:{
        kor: Object,
    }
}
</script>

<template>
    <div class="flex justify-center mt-12 opacity-100">
        <article class="rounded-xl border border-gray-700 bg-gray-800 p-4">
            <div class="flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor"
                     class="w-16 h-16 text-blue-500">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>


                <div class="flex flex-col justify-start items-start">
                    <span class="text-lg font-medium text-white">{{kor.lastname}} {{kor.name}} {{kor.nasab}}</span>

                    <div class="flow-root">
                        <ul class="-m-1 flex flex-wrap">

                            <li class="p-1 leading-none">
                                <a href="#" class="text-xs font-medium text-blue-400">Хизмати: {{ kor.xizmati}}</a>
                            </li>
                            <li class="p-1 leading-none">
                                <a href="#" class="text-xs font-medium text-blue-400">Мобили: {{ kor.mobili}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <ul class="mt-4 space-y-2">
                <li class="flex flex-col justify-start">
                    <a href="#" class="block h-full rounded-lg border border-gray-700 p-4 hover:border-pink-600">
                        <strong class="font-medium text-white">Раёсат/Шуъба</strong>

                        <p class="mt-1 text-sm font-medium text-gray-300">
                            {{kor.dipservices.name}}
                        </p>

                    </a>
                </li>

                <li>
                    <a href="#" class="block h-full rounded-lg border border-gray-700 p-4 hover:border-pink-600">
                        <strong class="font-medium text-white">Маълумоти иловаги</strong>
                        <p class="mt-1 text-sm font-medium text-gray-300">
                            Вазифа: {{kor.vazifa}}
                        </p>
                        <p class="mt-1.5 text-sm font-medium text-gray-300">
                            Почтаи электронӣ: {{kor.email}}
                        </p>
                    </a>
                </li>
            </ul>
            <div class="flex justify-end items-center mt-2">
                <Link
                    class="group relative inline-flex items-center overflow-hidden rounded bg-gray-600 px-6 py-2 text-white focus:outline-none focus:ring active:bg-indigo-500"
                    :href="route('dipservice')"
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

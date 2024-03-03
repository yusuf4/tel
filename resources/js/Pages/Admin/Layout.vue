<script>
import {Link} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
export default {
    name: "Layout",
    components:{Link},

    setup(){
        function submit() {
            Inertia.post(route('logoute'));
        }
        return {submit};
    }
}
</script>

<template>
    <div class="flex">
        <div class="flex h-screen flex-col justify-between bg-gray-900 min-w-fit">
            <div class="px-4 py-6">
                <Link
                    :href="route('main')"
                    class="flex items-center inset-x-0 border-b bottom-0 pb-4 mb-4">
                    <img src="../../img/logo.png" alt="LOGO" class="w-10 h-10 mr-2">
                    <span class="mr-4 text-base text-gray-200">
                        Раёсати кадрҳо
                    </span>
                </Link>
                <ul class="mt-6 space-y-1 pr-8" >
                    <li>
                        <Link
                            :href="route('dashboard')"
                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-100">
                            Админпанел
                        </Link>
                    </li>

                    <li>
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                            >
                                <span class="text-sm font-medium"> Кормандон </span>

                                <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                      <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5"
                                          viewBox="0 0 20 20"
                                          fill="currentColor"
                                      >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                      </svg>
                                </span>
                            </summary>

                            <ul class="mt-2 space-y-1 px-4">
                                <li>
                                    <Link
                                        :open="$page.component==='Admin/users/Index'"
                                        :class="$page.component==='Admin/users/Index' && 'text-green-400'"
                                        :href="route('user.list')"
                                        class="адуч rounded-lg px-4 py-2 text-sm font-medium text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                        Руйхати кормандон
                                    </Link>
                                </li>

                                <li>
                                    <Link
                                        :class="$page.component==='Admin/users/Add' && 'text-green-400'"
                                        :href="route('adduser')"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                        Илова
                                    </Link>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                            >
                                <span class="text-sm font-medium"> Раёсатҳо </span>

                                <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                      <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5"
                                          viewBox="0 0 20 20"
                                          fill="currentColor"
                                      >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                      </svg>
                            </span>
                            </summary>

                            <ul class="mt-2 space-y-1 px-4">
                                <li>
                                    <Link

                                        :href="route('dep.list')"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                        Руйхати раёсатҳо
                                    </Link>
                                </li>

                                <li>
                                    <Link
                                        :href="route('depadd')"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                        Илова
                                    </Link>
                                </li>
                            </ul>
                        </details>
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                            >
                                <span class="text-sm font-medium pr-2"> Намояндагиҳои</span>

                                <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                      <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5"
                                          viewBox="0 0 20 20"
                                          fill="currentColor"
                                      >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                      </svg>
                            </span>
                            </summary>

                            <ul class="mt-2 space-y-1 px-4">
                                <li>
                                    <Link
                                        :class="$page.component==='Admin/embassy/Index' && 'text-green-400'"
                                        :href="route('emb.list')"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                        Руйхат
                                    </Link>
                                </li>

                                <li>
                                    <Link
                                        :class="$page.component==='Admin/embassy/Add' && 'text-green-400'"
                                        :href="route('embadd')"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                        Илова
                                    </Link>
                                </li>

                            </ul>
                        </details>
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                            >
                                <span class="text-sm font-medium"> Дипсервис </span>

                                <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                      <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5"
                                          viewBox="0 0 20 20"
                                          fill="currentColor"
                                      >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                      </svg>
                            </span>
                            </summary>

                            <ul class="mt-2 space-y-1 px-4">
                                <li>
                                    <Link
                                        :class="$page.component==='Admin/dipservice/Index' && 'text-green-400'"
                                        :href="route('dip.list')"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                        Руйхати раёсатҳо
                                    </Link>
                                </li>

                                <li>
                                    <Link
                                        :class="$page.component==='Admin/dipservice/Add' && 'text-green-400'"
                                        :href="route('dipadd')"
                                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                        Илова
                                    </Link>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <Link
                            :class="$page.component==='Admin/sobiq/Index' && 'text-green-400'"
                            :href="route('sobiq.index')"
                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-200 hover:bg-gray-100 hover:text-gray-700"
                        >
                            Собиқ кормандон
                        </Link>
                    </li>
                </ul>
            </div>

            <div class="sticky inset-x-0 bottom-0 border-t border-gray-100">
                <a href="#" class="flex items-center gap-2 bg-gray-900/50 p-4 hover:bg-gray-50">
                    <img
                        alt="Man"
                        src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                        class="h-10 w-10 rounded-full object-cover"
                    />

                    <div>
                        <p class="text-xs text-white hover:text-gray-800">
                            <strong class="block font-medium">Yusuf</strong>

                            <span> ysafarov8@gmail.com </span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="w-full h-full bg-gray-50">
            <div class="flex flex-col h-screen">
                <!-- Navbar -->
                <div class="flex justify-between items-center py-2 bg-gray-400/50 px-2">
                <span class="text-xl pl-4 font-semibold text-blue-700 hover:!text-blue-500">
                    Вазорати корҳи хориҷии Ҷумҳурии Тиҷикистон
                </span>
                    <div class="sticky inset-x-0">
                        <form method="POST" @submit.prevent="submit">
                            <button
                                type="submit"
                                class="group relative flex w-full justify-center items-center rounded-lg px-2 py-1.5 text-sm text-blue-500 hover:text-gray-700"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-10 w-10 "
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    />
                                </svg>

                                <span
                                    class="absolute end-full -translate-x-1/2 rounded bg-red-600 px-2 py-1 text-xs font-medium text-white invisible group-hover:visible"
                                >
                              Баромад
                            </span>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Slot section -->
                <div class="w-full px-2 items-end">
                    <slot></slot>
                </div>
                <!-- Footer -->
                <footer class="bg-neutral-200 text-center dark:bg-neutral-700 lg:text-left mt-auto">
                    <div class="p-4 text-center text-neutral-700 dark:text-neutral-200">
                        © 2023 Раёсати кадрҳo:
                        <a
                            class="text-neutral-800 dark:text-neutral-400"
                            href="https://tw-elements.com/"
                        >All Rights Reserved</a
                        >
                    </div>
                </footer>
            </div>

        </div>
    </div>

</template>

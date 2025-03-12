<div class="bg-white dark:bg-darklight dark:border-darkborder flex gap-4   items-center justify-between px-4 h-[60px] border-b border-slate-200 detached-topbar relative">
                <div class="flex items-center flex-1 gap-2 sm:gap-4 lg:z-0 z-11"   >
                    <button type="button" class="text-black dark:text-white/80" @click="$store.app.toggleSidebar()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                            <path d="M3 4H21V6H3V4ZM3 11H15V13H3V11ZM3 18H21V20H3V18Z" fill="currentColor"></path>
                        </svg>
                    </button>
                    <form class="flex-1 hidden min-[420px]:block">
                        <div class="relative max-w-[180px] md:max-w-[350px]">
                            <input type="text" id="search" class="block w-full h-10 text-sm text-black border-0 rounded dark:text-white/80 dark:placeholder:text-white/30 placeholder:text-black/50 ltr:pl-3 rtl:pr-3 ltr:pr-7 rtl:pl-7 focus:ring-0 focus:outline-0" placeholder="Search..." required="">
                            <button type="button" class="absolute inset-y-0 flex items-center text-black ltr:right-0 rtl:left-0 ltr:pr-2 rtl:pl-2 dark:text-white/80">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM11 18C14.8675 18 18 14.8675 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z" fill="currentColor"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="flex items-center gap-4  z-[9] ">
                    <div class="h-5" x-data="{ fullScreen: false }">
                        <button class="text-black dark:text-white/80" x-cloak x-bind:class="{ 'hidden': fullScreen, 'block': !fullScreen }" x-on:click="fullScreen = !fullScreen" @click="$store.app.toggleFullScreen()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M16 3H22V9H20V5H16V3ZM2 3H8V5H4V9H2V3ZM20 19V15H22V21H16V19H20ZM4 19H8V21H2V15H4V19Z" fill="currentColor"></path>
                            </svg>
                        </button>
                        <button class="text-black dark:text-white/80" x-cloak x-bind:class="{ 'block': fullScreen, 'hidden': !fullScreen }" x-on:click="fullScreen = !fullScreen" @click="$store.app.toggleFullScreen()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M18 7H22V9H16V3H18V7ZM8 9H2V7H6V3H8V9ZM18 17V21H16V15H22V17H18ZM8 15V21H6V17H2V15H8Z" fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>
                    <div>
                        <a href="javascript:;" class="text-black" x-cloak x-show="$store.app.mode === 'light'" @click="$store.app.toggleMode('dark')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M10 7C10 10.866 13.134 14 17 14C18.9584 14 20.729 13.1957 21.9995 11.8995C22 11.933 22 11.9665 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C12.0335 2 12.067 2 12.1005 2.00049C10.8043 3.27098 10 5.04157 10 7ZM4 12C4 16.4183 7.58172 20 12 20C15.0583 20 17.7158 18.2839 19.062 15.7621C18.3945 15.9187 17.7035 16 17 16C12.0294 16 8 11.9706 8 7C8 6.29648 8.08133 5.60547 8.2379 4.938C5.71611 6.28423 4 8.9417 4 12Z" fill="currentColor"></path>
                            </svg>
                        </a>
                        <a href="javascript:;" class="text-black dark:text-white/80" x-cloak x-show="$store.app.mode === 'dark'" @click="$store.app.toggleMode('light')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 15.3137 15.3137 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM11 1H13V4H11V1ZM11 20H13V23H11V20ZM3.51472 4.92893L4.92893 3.51472L7.05025 5.63604L5.63604 7.05025L3.51472 4.92893ZM16.9497 18.364L18.364 16.9497L20.4853 19.0711L19.0711 20.4853L16.9497 18.364ZM19.0711 3.51472L20.4853 4.92893L18.364 7.05025L16.9497 5.63604L19.0711 3.51472ZM5.63604 16.9497L7.05025 18.364L4.92893 20.4853L3.51472 19.0711L5.63604 16.9497ZM23 11V13H20V11H23ZM4 11V13H1V11H4Z" fill="currentColor"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="h-5">
                        <div x-data="modals">
                            <button class="text-black dark:text-white/80" @click="toggle()"  >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                            <div class="fixed inset-0 bg-black/80 hidden z-[12] overflow-y-auto dark:bg-dark/90" :class="open && '!block'">
                                <div class="flex items-start justify-center min-h-screen z-[12] px-4" @click.self="open = false">
                                    <div x-show="open"  x-transition x-transition.duration.300 class="relative w-full max-w-lg p-0 my-8 overflow-hidden bg-white border rounded-lg shadow-3xl border-slate-200 dark:bg-darklight dark:border-darkborder">
                                        <div class="flex items-center justify-between px-5 py-3 bg-white border-b border-slate-200 dark:bg-darklight dark:border-darkborder">
                                            <h5 class="text-lg font-semibold dark:text-white">Layout Settings</h5>
                                            <button type="button" class="text-muted hover:text-black dark:hover:text-white"  @click="toggle"  >
                                                <svg class="w-5 h-5" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M24.2929 6.29289L6.29289 24.2929C6.10536 24.4804 6 24.7348 6 25C6 25.2652 6.10536 25.5196 6.29289 25.7071C6.48043 25.8946 6.73478 26 7 26C7.26522 26 7.51957 25.8946 7.70711 25.7071L25.7071 7.70711C25.8946 7.51957 26 7.26522 26 7C26 6.73478 25.8946 6.48043 25.7071 6.29289C25.5196 6.10536 25.2652 6 25 6C24.7348 6 24.4804 6.10536 24.2929 6.29289Z" fill="currentcolor" />
                                                    <path d="M7.70711 6.29289C7.51957 6.10536 7.26522 6 7 6C6.73478 6 6.48043 6.10536 6.29289 6.29289C6.10536 6.48043 6 6.73478 6 7C6 7.26522 6.10536 7.51957 6.29289 7.70711L24.2929 25.7071C24.4804 25.8946 24.7348 26 25 26C25.2652 26 25.5196 25.8946 25.7071 25.7071C25.8946 25.5196 26 25.2652 26 25C26 24.7348 25.8946 24.4804 25.7071 24.2929L7.70711 6.29289Z" fill="currentcolor" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="p-5 space-y-4">
                                            <div class="text-black dark:text-muted">
                                                <h6 class="mb-4 text-base font-semibold capitalize text-slate-800 dark:text-slate-100">Sidebar Colors</h6>
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <label class="inline-flex cursor-pointer">
                                                        <input type="radio" name="sidebarColor" value="light" x-model="$store.app.sidebarMode" class="form-radio text-purple" />
                                                        <span>Light</span>
                                                    </label>
                                                    <label class="inline-flex cursor-pointer">
                                                        <input type="radio" name="sidebarColor" value="dark" x-model="$store.app.sidebarMode"  class="form-radio text-purple"/>
                                                        <span>Dark</span>
                                                    </label>
                                                    <label class="inline-flex cursor-pointer">
                                                        <input type="radio"  name="sidebarColor" value="brand" x-model="$store.app.sidebarMode" class="form-radio text-purple" />
                                                        <span>Brand</span>
                                                    </label>
                                                </div>
            
                                                <h6 class="mt-6 mb-4 text-base font-semibold capitalize text-slate-800 dark:text-slate-100">Select Layouts</h6>
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <label class="inline-flex cursor-pointer">
                                                        <input type="radio" name="layout" value="vertical" x-model="$store.app.layout" class="form-radio text-purple" />
                                                        <span>Vertical</span>
                                                    </label>
                                                    <label class="inline-flex cursor-pointer">
                                                        <input type="radio" name="layout" value="detached detached-simple" x-model="$store.app.layout" class="form-radio text-purple" />
                                                        <span>Detached</span>
                                                    </label>
                                                    <label class="inline-flex cursor-pointer">
                                                        <input type="radio" name="layout" value="detached" x-model="$store.app.layout" class="form-radio text-purple" />
                                                        <span>Detached Creative</span>
                                                    </label>
                                                </div>
            
                                                <h6 class="mt-6 mb-4 text-base font-semibold capitalize text-slate-800 dark:text-slate-100">Layout Modes</h6>
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <label class="inline-flex cursor-pointer">
                                                        <input type="radio"  name="mode" value="light" x-model="$store.app.mode" class="form-radio text-purple" checked />
                                                        <span>Light</span>
                                                    </label>
                                                    <label class="inline-flex cursor-pointer">
                                                        <input type="radio" name="mode" value="dark" x-model="$store.app.mode" class="form-radio text-purple" />
                                                        <span>Dark</span>
                                                    </label>
                                                </div>
            
                                                <h6 class="mt-6 mb-4 text-base font-semibold capitalize text-slate-800 dark:text-slate-100">Layout Direction</h6>
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <label class="inline-flex cursor-pointer">
                                                        <input type="radio" name="direction" value="ltr" x-model="$store.app.direction" class="form-radio text-purple" checked />
                                                        <span>LTR</span>
                                                    </label>
                                                    <label class="inline-flex cursor-pointer">
                                                        <input type="radio" name="direction" value="rtl" x-model="$store.app.direction" class="form-radio text-purple" />
                                                        <span>RTL</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end gap-4">
                                                <button type="reset" class="transition-all duration-300 border rounded-md btn text-danger border-danger hover:bg-danger hover:text-white"  @click="$store.app.resetLayout() , open = false">Reset Layout</button>
                                                <button type="button" class="transition-all duration-300 border rounded-md btn text-purple border-purple hover:bg-purple hover:text-white" @click="$store.app.setLayout() , open = false" >Set Layouts</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-data="{
                        open: false,
                        toggle() {
                            if (this.open) {
                                return this.close();
                            }
                    
                            this.$refs.button.focus();
                                    
                            this.open = true;
                            Alpine.store('app').showSettings = true;
                        },
                        close(focusAfter) {
                            if (!this.open) return;
                    
                            this.open = false;
                            Alpine.store('app').showSettings = false;
                            focusAfter && focusAfter.focus();
                        }
                    }" x-on:keydown.escape.prevent.stop="close($refs.button)" x-on:focusin.window="!$refs.panel.contains($event.target) && close()" x-id="['dropdown-button']" class="relative notification h-[60px] flex items-center justify-center">
                        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')" type="button" class="relative text-black dark:text-white/80">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto">
                                <path d="M5 18H19V11.0314C19 7.14806 15.866 4 12 4C8.13401 4 5 7.14806 5 11.0314V18ZM12 2C16.9706 2 21 6.04348 21 11.0314V20H3V11.0314C3 6.04348 7.02944 2 12 2ZM9.5 21H14.5C14.5 22.3807 13.3807 23.5 12 23.5C10.6193 23.5 9.5 22.3807 9.5 21Z" fill="currentColor"></path>
                            </svg>
                            <span class="absolute w-2 h-2 border border-white rounded-full -top-px ltr:right-px rtl:left-px bg-purple"></span>
                        </button>
            
                        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;" class="absolute z-10 rounded bg-white dark:bg-darklight dark:border-darkborder dark:text-white/80 ltr:right-0 rtl:left-0 text-black/60 border border-slate-200 min-w-[253px] top-full noti-area">
                            <div x-data="{ notifications: [
                                { id: 1, avatar: 'assets/images/avatar-1.png', message: 'Edited the details of Project', time: '1s ago', show: true },
                                { id: 2, avatar: 'assets/images/avatar-4.png', message: 'Released a new version', time: '2m ago', show: true },
                                { id: 3, avatar: 'assets/images/avatar-13.png', message: 'Submitted a bug', time: '10m ago', show: true },
                                { id: 4, avatar: 'assets/images/avatar-19.png', message: 'Modified A data in Page', time: '15m ago', show: true },
                                { id: 5, avatar: 'assets/images/avatar-24.png', message: 'Modified A data in Page', time: '30m ago', show: true },
                                { id: 6, avatar: 'assets/images/avatar-1.png', message: 'Edited the details of Project', time: '45m ago', show: true },
                                { id: 7, avatar: 'assets/images/avatar-4.png', message: 'Released a new version', time: '1h ago', show: true },
                                { id: 8, avatar: 'assets/images/avatar-13.png', message: 'Submitted a bug', time: '2h ago', show: true },
                            ]}">
                                <h4 class="text-black dark:text-white/80 px-2 py-2.5 border-b border-slate-200 flex items-center gap-2">
                                    Notification
                                    <span class="inline-block bg-purple/10 text-purple text-[10px] p-1 leading-none rounded" x-text="notifications.filter(notification => notification.show).length"></span>
                                </h4>
                                <ul class="overflow-y-auto max-h-56">
                                    <template x-for="notification in notifications" :key="notification.id">
                                        <li x-show="notification.show" x-transition.duration.300ms>
                                            <div class="flex items-center rounded px-2 py-2.5 hover:bg-black/5 hover:text-black gap-2 cursor-pointer group">
                                                <div class="flex-none overflow-hidden rounded-full h-9 w-9">
                                                    <img :src="notification.avatar" class="object-cover" alt="avatar" />
                                                </div>
                                                <div class="relative flex-1">
                                                    <p class="whitespace-nowrap overflow-hidden text-ellipsis w-[185px] text-black dark:text-white ltr:pr-4 rtl:pl-4" x-text="notification.message"></p>
                                                    <p class="text-xs text-black/40 dark:text-darkmuted" x-text="notification.time"></p>
                                                    <button type="button" @click="notification.show = false" class="absolute hidden transition-all duration-300 rotate-0 ltr:right-0 rtl:left-0 top-1 dark:text-white/80 group-hover:block hover:opacity-80 hover:rotate-180">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5">
                                                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    </template>
                                </ul>
                            </div>
            
                            <div class="px-2 py-2.5 border-t border-slate-200 dark:border-darkborder">
                                <a href="javascript:;" class="text-black duration-300 dark:text-white dark:hover:text-purple hover:text-purple">Read More
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 inline-block relative -top-[1px] rtl:rotate-180">
                                        <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z" fill="currentColor"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div x-data="{
                        open: false,
                        toggle() {
                            if (this.open) {
                                return this.close();
                            }
                    
                            this.$refs.button.focus();
                    
                            this.open = true;
                        },
                        close(focusAfter) {
                            if (!this.open) return;
                    
                            this.open = false;
                    
                            focusAfter && focusAfter.focus();
                        }
                    }" x-on:keydown.escape.prevent.stop="close($refs.button)" x-on:focusin.window="!$refs.panel.contains($event.target) && close()" x-id="['dropdown-button']" class="relative profile h-[60px] flex items-center justify-center">
                        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')" type="button" class="flex items-center gap-1.5 xl:gap-0 dark:text-white/80">
                            <img class="rounded-full h-7 w-7 ltr:xl:mr-2 rtl:xl:ml-2" src="assets/images/user.png" alt="Header Avatar" />
                            <span class="hidden fw-medium xl:block dark:text-white/80">Bazarin</span>
                            <svg :class="{ 'transform rotate-180': open }" class="text-gray-400 transition-transform duration-300 size-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
            
                        <ul x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;" class="absolute z-10 w-40 overflow-hidden bg-white border rounded top-full dark:text-darkmuted dark:border-darkborder dark:bg-darklight ltr:right-0 rtl:left-0 text-black/60 border-slate-200">
                            <li>
                                <a href="profile" class="flex items-center gap-2 px-2 py-2.5 dark:hover:bg-white/5 dark:hover:text-white hover:bg-black/5 hover:text-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                        <path d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" fill="currentColor"></path>
                                    </svg>
                                    Profile
                                </a>
                            </li>
                            <li class="block h-px my-1 bg-black/5 dark:bg-darkborder"></li>
                            <li>
                                <a href="login" class="flex items-center gap-2 px-2 py-2.5 dark:hover:bg-white/5 dark:hover:text-white hover:bg-black/5 hover:text-black text-black dark:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                                        <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.2713 2 18.1757 3.57078 20.0002 5.99923L17.2909 5.99931C15.8807 4.75499 14.0285 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.029 20 15.8816 19.2446 17.2919 17.9998L20.0009 17.9998C18.1765 20.4288 15.2717 22 12 22ZM19 16V13H11V11H19V8L24 12L19 16Z" fill="currentColor"></path>
                                    </svg>
                                    Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
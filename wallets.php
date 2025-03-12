<!DOCTYPE html>
<html lang="en"  :dir="$store.app.direction" x-data="{ direction: $store.app.direction || 'ltr' }" x-bind:dir="direction" class="group/item" :data-mode="$store.app.mode" :data-sidebar="$store.app.sidebarMode">


<!-- Mirrored from srbthemes.kcubeinfotech.com/sliced-pro/html/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Mar 2025 01:28:49 GMT -->
<head>

    <meta charset="utf-8">
    <title>Starter Page | Sliced Pro - Tailwind CSS Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Tailwind CSS Admin & Dashboard Template" name="description">
    <meta content="SRBThemes" name="author">
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- plugins CSS -->
    
    <!-- Icons CSS -->
    
    <!-- Tailwind CSS -->
    
    
    
    

  <script type="module" crossorigin src="assets/main-0ff05731.js"></script>
  <link rel="stylesheet" href="assets/css/main.css">
</head>

<body x-data="main" x-init="$store.app.hasCreative = window.location.href.includes('creative.html') , $store.app.hasdetached = window.location.href.includes('detached.html')" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '' , $store.app.hasCreative ? 'detached ' : '' , $store.app.hasdetached ? 'detached detached-simple ' : '' , $store.app.layout  ]" class="relative overflow-x-hidden text-[15px] antialiased font-normal text-black font-primary dark:text-white vertical " x-data="modals">

<!-- Start Layout -->
<div class="bg-slate-50 dark:bg-dark">

    <!-- Start detached bg -->
    <div class="bg-[url('../images/bg-main.png')] bg-slate-800 group-data-[sidebar=dark]/item:bg-darklight group-data-[sidebar=brand]/item:bg-sky-500 min-h-[220px] sm:min-h-[250px] bg-bottom fixed hidden w-full -z-50 detached-img"></div>
    <!-- End detached bg -->

    <!-- Start Menu Sidebar Olverlay -->
    <div x-cloak class="fixed inset-0 z-10 bg-black/60 dark:bg-dark/90 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>
    <!-- End Menu Sidebar Olverlay -->

    <!-- Start Main Content -->
    <div class="flex mx-auto main-container">

        <!-- Start Sidebar -->
        <?php require('includes/sidebar.php')?>
        <!-- End sidebar -->

        <!-- Start Content Area -->
        <div class="flex-1 main-content">

            <!-- Start Topbar -->
            <?php require('includes/topbar.php')?>
            <!-- End Topbar --> 

            <!-- Start Content -->
            <div class="h-[calc(100vh-60px)] relative overflow-y-auto overflow-x-hidden p-4 space-y-4 detached-content">
                <nav class="w-full">
                    <ul class="space-y-2 detached-breadcrumb">
                        <li class="text-xs dark:text-white/80">generals</li>
                        <li class="text-xl font-semibold text-slate-800 dark:text-slate-100">Wallets</li>
                    </ul>
                </nav>
                <!-- Start All Card -->
                <div class="flex flex-col gap-4 min-h-[calc(100vh-212px)]">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="card">
                        <h2 class="mb-4 text-base font-semibold capitalize text-slate-800 dark:text-slate-100">Wallet Records</h2>
                            <div class="overflow-auto" x-data="{ items: [
                                { id: 1, email: 'l@gmail.com', balance: '300,000.00', income: '500,000.00', downline: '50,000.00', withdrawals: '200,000.00', deposits: '150,000.00' },
                                { id: 2, email: 'l@gmail.com', balance: '300,000.00', income: '500,000.00', downline: '50,000.00', withdrawals: '200,000.00', deposits: '150,000.00' },
                                { id: 3, email: 'l@gmail.com', balance: '300,000.00', income: '500,000.00', downline: '50,000.00', withdrawals: '200,000.00', deposits: '150,000.00' },
                              ]
                            }">
                                <caption class="caption-top">
                                    <span class="text-muted">Double Click field To Edit Table.</span>
                                </caption>
                                <table class="min-w-[640px] w-full mt-4 table-hover">
                                    <thead>
                                        <tr class="ltr:text-left rtl:text-right">
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Balance</th>
                                            <th>Product Income</th>
                                            <th>Downline Income</th>
                                            <th>Withdrwals</th>
                                            <th>Deposits</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in items" :key="item.id">
                                            <tr x-show="showElement" x-data="{ showElement: true }">
                                                <td x-text="item.id"></td>
                                                <td>
                                                    <span x-text="item.email" x-on:dblclick="
                                                        item.editing = true;
                                                        $nextTick(() => $refs.email.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="text" class="form-input" x-ref="email" x-model="item.email" x-on:keydown.enter="item.editing = false" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <span x-text="item.balance" x-on:dblclick="
                                                        item.editing = true;
                                                        $nextTick(() => $refs.balance.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="text" class="form-input" x-ref="balance" x-model="item.balance" x-on:keydown.enter="item.editing = false" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <span x-text="item.income" x-on:dblclick="
                                                        item.editing = true;
                                                        $nextTick(() => $refs.income.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="text" class="form-input" x-ref="income" x-model="item.income" x-on:keydown.enter="item.editing = false" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <span x-text="item.downline" x-on:dblclick="
                                                        item.editing = true;
                                                        $nextTick(() => $refs.downline.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="text" class="form-input" x-ref="downline" x-model="item.downline" x-on:keydown.enter="item.editing = false" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <span x-text="item.withdrawals" x-on:dblclick="
                                                        item.editing = true;
                                                        $nextTick(() => $refs.withdrawals.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="text" class="form-input" x-ref="withdrawals" x-model="item.withdrawals" x-on:keydown.enter="item.editing = false" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <span x-text="item.deposits" x-on:dblclick="
                                                        item.editing = true;
                                                        $nextTick(() => $refs.deposits.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="text" class="form-input" x-ref="deposits" x-model="item.deposits" x-on:keydown.enter="item.editing = false" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <button class="text-danger ltr:ml-2 rtl:mr-2" x-on:click="showElement = false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="inline-block w-5 h-5">
                                                            <path fill="currentColor" d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                    
                                </table>
                                <ul class="inline-flex items-center gap-1 m-auto mb-4 float-right mt-5">
                                        <li>
                                            <button type="button" class="flex justify-center px-2 py-2 text-black transition border rounded-full hover:text-white hover:bg-purple border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto rtl:rotate-180">
                                                    <path d="M4.83594 12.0001L11.043 18.2072L12.4573 16.793L7.66436 12.0001L12.4573 7.20718L11.043 5.79297L4.83594 12.0001ZM10.4858 12.0001L16.6929 18.2072L18.1072 16.793L13.3143 12.0001L18.1072 7.20718L16.6929 5.79297L10.4858 12.0001Z" fill="currentColor"></path>
                                                </svg>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="flex justify-center px-2 py-2 text-black transition border rounded-full hover:text-white hover:bg-purple border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto rtl:rotate-180">
                                                    <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z" fill="currentColor"></path>
                                                </svg>
                                            </button>
                                        </li>
                                        <li><button type="button" class="flex justify-center px-3.5 py-2 rounded-full transition text-black hover:text-white hover:bg-purple border border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white">1</button></li>
                                        <li><button type="button" class="flex justify-center px-3.5 py-2 rounded-full transition text-white bg-purple border border-purple">2</button></li>
                                        <li><button type="button" class="flex justify-center px-3.5 py-2 rounded-full transition text-black hover:text-white hover:bg-purple border border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white">3</button></li>
                                        <li>
                                            <button type="button" class="flex justify-center px-2 py-2 text-black transition border rounded-full hover:text-white hover:bg-purple border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto rtl:rotate-180">
                                                    <path d="M13.1714 12.0007L8.22168 7.05093L9.63589 5.63672L15.9999 12.0007L9.63589 18.3646L8.22168 16.9504L13.1714 12.0007Z" fill="currentColor"></path>
                                                </svg>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="flex justify-center px-2 py-2 text-black transition border rounded-full hover:text-white hover:bg-purple border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto rtl:rotate-180">
                                                    <path d="M19.1643 12.0001L12.9572 5.79297L11.543 7.20718L16.3359 12.0001L11.543 16.793L12.9572 18.2072L19.1643 12.0001ZM13.5144 12.0001L7.30728 5.79297L5.89307 7.20718L10.686 12.0001L5.89307 16.793L7.30728 18.2072L13.5144 12.0001Z" fill="currentColor"></path>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End All Card -->

                <!-- Start Footer -->
                <?php require('includes/footer.php')?>
                <!-- End Footer -->  

                </div>
        </div>
    </div>
</div>

<script  src="assets/libs/%40alpinejs/persist/cdn.min.js"></script>
<script  src="assets/libs/%40alpinejs/collapse/cdn.min.js"></script>
<script  src="assets/libs/feather-icons/feather.min.js"></script>


</body>


<!-- Mirrored from srbthemes.kcubeinfotech.com/sliced-pro/html/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Mar 2025 01:28:49 GMT -->
</html>
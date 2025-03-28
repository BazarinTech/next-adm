<?php 
include 'includes/main.php';
$error = '';
$msg = '';
if (isset($_POST['submit'])) {
    $name= $_POST['name'];
    $price = $_POST['price'];
    $income = $_POST['income'];
    $description = $_POST['description'];
    $insert = $query->insert('products', ['name' => $name, 'price' => $price, 'income' => $income, 'description' => $description]);

    // File upload handling
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/svg+xml'];
        $imageType = $_FILES['image']['type'];
        $imageSize = $_FILES['image']['size'];
        $maxSize = 100 * 1024; // 100KB

        if (in_array($imageType, $allowedTypes) && $imageSize <= $maxSize) {
            $uploadDir = "uploads/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $imageName = time() . "_" . basename($_FILES['image']['name']);
            $imagePath = $uploadDir . $imageName;
            $tmpPath = $_FILES['image']['tmp_name'];

            // Create image resource from uploaded file
            $image = imagecreatefromstring(file_get_contents($tmpPath));
            if ($image !== false) {
                // Get original dimensions
                $origWidth = imagesx($image);
                $origHeight = imagesy($image);

                // Set new dimensions
                $newWidth = 800;
                $newHeight = 1000;

                // Create a new blank image with desired dimensions
                $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

                // Maintain transparency for PNG and GIF
                imagealphablending($resizedImage, false);
                imagesavealpha($resizedImage, true);

                // Copy and resize the original image into the new image
                imagecopyresampled(
                    $resizedImage,
                    $image,
                    0, 0, 0, 0,
                    $newWidth, $newHeight,
                    $origWidth, $origHeight
                );

                // Save the resized image
                imagejpeg($resizedImage, $imagePath, 90);

                // Free up memory
                imagedestroy($resizedImage);
                imagedestroy($image);

                echo "Product uploaded successfully!";
                // You can now insert into the database
            } else {
                echo "Error processing image.";
            }
        } else {
            echo "Invalid file type or size.";
        }
    } else {
        echo "No file uploaded.";
    }
}
?>
<!DOCTYPE html>
<html lang="en"  :dir="$store.app.direction" x-data="{ direction: $store.app.direction || 'ltr' }" x-bind:dir="direction" class="group/item" :data-mode="$store.app.mode" :data-sidebar="$store.app.sidebarMode">


<!-- Mirrored from srbthemes.kcubeinfotech.com/sliced-pro/html/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Mar 2025 01:28:49 GMT -->
<head>

    <meta charset="utf-8">
    <title>Products</title>
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
                <nav class="w-full flex justify-between items-center mb-4">
                    <ul class="space-y-2 detached-breadcrumb">
                        <li class="text-xs dark:text-white/80">commodities controll</li>
                        <li class="text-xl font-semibold text-slate-800 dark:text-slate-100">Products</li>
                    </ul>
                    <div x-data="modals">
                        <div class="flex items-center justify-center">
                            <button type="button" class="btn <?= $isAdd ? '' : 'hidden' ?> bg-purple border border-purple rounded-md text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]" @click="toggle">Add new</button>
                        </div>
                        <form action="products.php" method="POST" enctype="multipart/form-data" class="fixed inset-0 bg-black/80 z-[99999] hidden overflow-y-auto dark:bg-dark/90" :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300 class="relative w-full max-w-lg p-0 my-8 overflow-hidden bg-white border rounded-lg border-slate-200 dark:bg-darklight dark:border-darkborder">
                                    <div class="flex items-center justify-between px-5 py-3 bg-white border-b border-slate-200 dark:bg-darklight dark:border-darkborder">
                                        <h5 class="text-lg font-semibold text-slate-800 dark:text-slate-100">Add Products</h5>
                                        <button type="button" class="text-muted hover:text-black dark:hover:text-white" @click="toggle" x-on:click="open = false">
                                            ✖
                                        </button>
                                    </div>
                                    <div class="p-5 space-y-4">
                                        <div class="space-y-1">
                                            <label>Product Name</label>
                                            <input type="text" name="name" class="form-input h-14" placeholder="name" required>
                                        </div>
                                        <div class="space-y-1 my-4">
                                            <label>Product Price</label>
                                            <input name="price" type="number" class="form-input h-14" placeholder="price" required>
                                        </div>
                                        <div class="space-y-1 my-4">
                                            <label>Product Income</label>
                                            <input name="income" type="number" class="form-input h-14" placeholder="income" required>
                                        </div>
                                        <div class="space-y-1 my-4">
                                            <label>Product image</label>
                                            <input type="file" name="image" accept="image/*" required>
                                        </div>
                                        <div class="space-y-1 my-4">
                                            <label>Description</label>
                                            <textarea name="description" class="form-input h-14" placeholder="Describe here..." required></textarea>
                                        </div>
                                        <div class="flex items-center justify-end gap-4">
                                            <button type="button" class="btn text-danger border-danger hover:bg-danger hover:text-white" @click="toggle">Discard</button>
                                            <button type="submit" name="submit" class="btn text-purple border-purple hover:bg-purple hover:text-white">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
                
                <!-- Start All Card -->
                <div class="flex flex-col gap-4 min-h-[calc(100vh-212px)]">
                    <div class="grid grid-cols-1 gap-4">
                        
                        <div class="card">
                        <h2 class="mb-4 text-base font-semibold capitalize text-slate-800 dark:text-slate-100">Products Records</h2>
                        
                            <div class="overflow-auto" x-data="{ items: <?= htmlspecialchars(json_encode($products_records), ENT_QUOTES, 'UTF-8') ?>,
                                            searchTerm: '',
                            currentPage: 1,
                            itemsPerPage: 3,
                            
                            get filteredItems() {
                                if (!this.searchTerm) return this.items;
                                
                                const searchLower = this.searchTerm.toLowerCase();
                                return this.items.filter(item => 
                                    item.name.toLowerCase().includes(searchLower) || 
                                    item.price.toLowerCase().includes(searchLower) || 
                                    item.income.toLowerCase().includes(searchLower) || 
                                    item.grabs.toLowerCase().includes(searchLower) || 
                                    item.status.toLowerCase().includes(searchLower) 
                                );
                            },
                            
                            get totalPages() {
                                return Math.ceil(this.filteredItems.length / this.itemsPerPage);
                            },
                            
                            get paginatedItems() {
                                const startIndex = (this.currentPage - 1) * this.itemsPerPage;
                                const endIndex = startIndex + this.itemsPerPage;
                                return this.filteredItems.slice(startIndex, endIndex);
                            },
                            
                            nextPage() {
                                if (this.currentPage < this.totalPages) {
                                    this.currentPage++;
                                }
                            },
                            
                            prevPage() {
                                if (this.currentPage > 1) {
                                    this.currentPage--;
                                }
                            },
                            
                            goToPage(page) {
                                if (page >= 1 && page <= this.totalPages) {
                                    this.currentPage = page;
                                }
                            },
                            
                            goToFirstPage() {
                                this.currentPage = 1;
                            },
                            
                            goToLastPage() {
                                this.currentPage = this.totalPages;
                            }
                            }">
                            <input 
                                type="text" 
                                x-model="searchTerm" 
                                placeholder="Search..." 
                                class="form-input w-full md:w-64"
                                />
                                <caption class="caption-top">
                                    <span class="text-muted">Double Click field To Edit Table.</span>
                                </caption>
                                <table class="min-w-[640px] w-full mt-4 table-hover">
                                    <thead>
                                        <tr class="ltr:text-left rtl:text-right">
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Grabs</th>
                                            <th>Income</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in paginatedItems" :key="item.id">
                                            <tr x-show="showElement" x-data="{ showElement: true }">
                                                <td x-text="item.id"></td>
                                                <td>
                                                    <div  x-on:dblclick="
                                                        item.editing = <?= $isEdit ?>;
                                                        $nextTick(() => $refs.image.focus());
                                                    " x-show="!item.editing" class="flex items-center -space-x-1.5 rtl:space-x-reverse">
                                                        <img class="object-cover w-6 h-6 overflow-hidden rounded-full ring-2 ring-white dark:ring-darkborder" src="assets/images/avatar-12.png" alt="">
                                                    </div>
                                                    <input type="text" class="form-input" x-ref="image" x-model="item.image" x-on:keydown.enter="item.editing = false" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <span x-text="item.name" x-on:dblclick="
                                                        item.editing = <?= $isEdit ?>;
                                                        $nextTick(() => $refs.name.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="text" class="form-input" x-ref="name" x-model="item.name" x-on:keydown.enter="item.editing = false; updater(item.id, 'name', item.name);" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <span x-text="item.price" x-on:dblclick="
                                                        item.editing = <?= $isEdit ?>;
                                                        $nextTick(() => $refs.price.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="number" class="form-input" x-ref="price" x-model="item.price" x-on:keydown.enter="item.editing = false; updater(item.id, 'price', item.price);" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <span x-text="item.grabs" x-on:dblclick="
                                                        item.editing = <?= $isEdit ?>;
                                                        $nextTick(() => $refs.grabs.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="number" class="form-input" x-ref="grabs" x-model="item.grabs" x-on:keydown.enter="item.editing = false; updater(item.id, 'grabs', item.grabs);" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <span x-text="item.income" x-on:dblclick="
                                                        item.editing = <?= $isEdit ?>;
                                                        $nextTick(() => $refs.income.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="text" class="form-input" x-ref="income" x-model="item.income" x-on:keydown.enter="item.editing = false; updater(item.id, 'income', item.income);" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <span x-text="item.status" x-bind:class="item.status === 'Active' ? 'bg-success/20 text-success' : 'bg-danger/20 text-danger'" x-on:dblclick="
                                                            item.editing = <?= $isEdit ?>;
                                                            $nextTick(() => $refs.status.focus());
                                                        " x-show="!item.editing" class='px-2 rounded py-1'></span>
                                                    <select class="form-select" x-ref="status" x-model="item.status" x-on:keydown.enter="item.editing = false; updater(item.id, 'status', item.status);" x-show="item.editing">
                                                        <option value='Active'>Active</option>
                                                        <option value='Inactive'>Inactive</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <span x-text="item.time" x-on:dblclick="
                                                        item.editing = <?= $isEdit ?>;
                                                        $nextTick(() => $refs.time.focus());
                                                    " x-show="!item.editing"></span>
                                                    <input type="text" class="form-input" x-ref="time" x-model="item.time" x-on:keydown.enter="item.editing = false" x-show="item.editing">
                                                </td>
                                                <td>
                                                    <button class="text-danger ltr:ml-2 rtl:mr-2" x-on:click="showElement = false; deleteItem('products', item.id);">
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
                                    <button type="button" x-on:click="goToFirstPage()" class="flex justify-center px-2 py-2 text-black transition border rounded-full hover:text-white hover:bg-purple border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto rtl:rotate-180">
                                        <path d="M4.83594 12.0001L11.043 18.2072L12.4573 16.793L7.66436 12.0001L12.4573 7.20718L11.043 5.79297L4.83594 12.0001ZM10.4858 12.0001L16.6929 18.2072L18.1072 16.793L13.3143 12.0001L18.1072 7.20718L16.6929 5.79297L10.4858 12.0001Z" fill="currentColor"></path>
                                        </svg>
                                    </button>
                                    </li>
                                    <li>
                                    <button type="button" x-on:click="prevPage()" class="flex justify-center px-2 py-2 text-black transition border rounded-full hover:text-white hover:bg-purple border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto rtl:rotate-180">
                                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z" fill="currentColor"></path>
                                        </svg>
                                    </button>
                                    </li>
                                    <template x-for="page in totalPages" :key="page">
                                    <li>
                                        <button 
                                        type="button" 
                                        x-on:click="goToPage(page)" 
                                        x-bind:class="{'flex justify-center px-3.5 py-2 rounded-full transition text-white bg-purple border border-purple': currentPage === page, 'flex justify-center px-3.5 py-2 rounded-full transition text-black hover:text-white hover:bg-purple border border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white': currentPage !== page}"
                                        x-text="page"
                                        ></button>
                                    </li>
                                    </template>
                                    <li>
                                    <button type="button" x-on:click="nextPage()" class="flex justify-center px-2 py-2 text-black transition border rounded-full hover:text-white hover:bg-purple border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto rtl:rotate-180">
                                        <path d="M13.1714 12.0007L8.22168 7.05093L9.63589 5.63672L15.9999 12.0007L9.63589 18.3646L8.22168 16.9504L13.1714 12.0007Z" fill="currentColor"></path>
                                        </svg>
                                    </button>
                                    </li>
                                    <li>
                                    <button type="button" x-on:click="goToLastPage()" class="flex justify-center px-2 py-2 text-black transition border rounded-full hover:text-white hover:bg-purple border-light hover:border-purple bg-light/50 dark:bg-white/5 dark:border-darkborder dark:text-white dark:hover:bg-purple dark:hover:border-purple dark:hover:text-white">
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
<script>
function updater(id, field, value) {
    fetch('actions/update_products.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: id, field: field, value: value })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('User updated successfully');
        } else {
            console.error('Update failed:', data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}
function deleteItem(table, id) {
    fetch('actions/delete_record.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id, table })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Record deleted successfully');
        } else {
            console.error('Deletion failed:', data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>

</body>


<!-- Mirrored from srbthemes.kcubeinfotech.com/sliced-pro/html/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Mar 2025 01:28:49 GMT -->
</html>
@extends('layouts.app')

@push('css')
<style>
    .align-center {
        text-align: center;
    }
    .justify-center {
        justify-content: center;
    }
    .navigater:hover {    
    color: oklch(0.623 0.214 259.815);
    text-decoration-line: underline
     }
     .required{
        color: red;
     }
</style>
@endpush

@section('content')
 @include('componants.partials.preloader')
 <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
      <!-- ===== Sidebar Start ===== -->
      @include('componants.sidebar')
      <!-- ===== Sidebar End ===== -->
      <!-- ===== Content Area Start ===== -->
      <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
        <!-- ===== Header Start ===== -->        
        @include('componants.partials.header')
        <!-- ===== Header End ===== -->
        <!-- ===== Main Content Start ===== -->
        <main>              
          <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6"> 
            <div class="mb-6 flex items-center ">
               <a class="navigater" href="{{route('home')}}"><h5 class=" dark:text-white/90">หน้าหลัก</h5></a>&nbsp; > &nbsp;<u><h5 class="dark:text-white/90">จองอุปกรณ์</h5></u>
            </div>
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        จองอุปกรณ์
                    </h3>
                </div>
            <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <form class="w-full" method="POST" action="{{ route('store_borrow') }}"  enctype="multipart/form-data">  
                    @csrf           
                    <div class=" flex flex-wrap -mx-2.5 gap-y-8" >
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                <span class="required">*</span>ประเภทการใช้งาน
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select name="borrow_type" class=" dark:bg-dark-900 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" :class="isOptionSelected &amp;&amp; 'text-gray-500 dark:text-gray-400'" @change="isOptionSelected = true">
                                    <option value="" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" disabled selected>
                                        โปรดเลือกประเภทการใช้งาน
                                    </option>
                                    <option value="ประชุม" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                        ประชุม
                                    </option>
                                    <option value="อบรม" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                        อบรม
                                    </option>
                                    <option value="เพื่อการศึกษา" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                        เพื่อการศึกษา
                                    </option>
                                    <option value="ทำงาน" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                        ทำงาน
                                    </option>
                                </select>
                                <span class="absolute z-30 text-gray-500 -translate-y-1/2 right-4 top-1/2 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                              <span class="required">*</span>ชนิดอุปกรณ์
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select name="type_eq_borrow" class="dark:bg-dark-900 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" :class="isOptionSelected &amp;&amp; 'text-gray-500 dark:text-gray-400'" @change="isOptionSelected = true">
                                    <option value="" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" disabled selected>
                                        โปรดเลือกชนิดอุปกรณ์
                                    </option>
                                    <option value="โน๊ตบุ๊ค" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" >
                                        โน๊ตบุ๊ค
                                    </option>
                                    <option value="โปรเจคเตอร์" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" >
                                        โปรเจคเตอร์
                                    </option>
                                    <option value="อุปกรณ์เครือข่ายอินเทอร์เน็ต" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" >
                                        อุปกรณ์เครือข่ายอินเทอร์เน็ต
                                    </option>
                                </select>
                                <span class="absolute z-30 text-gray-500 -translate-y-1/2 right-4 top-1/2 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                <span class="required">*</span>ชื่องาน
                            </label>
                            <input type="text" name="job_of_use" placeholder="เช่น ชื่องานสัมนา หรือหัวข้อประชุม" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                <span class="required">*</span>สถานที่นำไปใช้
                            </label>
                            <input type="text" name="place_of_use" placeholder="เช่น ชื่อโรงแรม หรือสถานที่ทำงาน" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                    </div>   
                    <div class=" flex flex-wrap -mx-2.5 gap-y-8" >  
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                               <span class="required">*</span> จำนวนอุปกรณ์ที่ต้องการยืม
                            </label>
                            <input type="number" name="number_borrow" placeholder="เช่น 1" value="1" min="1" max="10" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>                      
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                <span class="required">*</span>วันที่ยืม
                            </label>
                            <div class="relative">                               
                                <input type="text" readonly id="thaiDateInput" name="borrow_date" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                <span class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z" fill=""/>
                                    </svg>
                                </span>
                            </div>
                        </div>            
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                               <span class="required">*</span> วันที่คืน
                            </label>
                            <div class="relative">                               
                                <input type="text"  id="thaiDateInput" name="return_date" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                <span class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z" fill=""/>
                                    </svg>
                                </span>
                            </div>
                        </div>             
                    </div>                                                        
                    <div class=" flex flex-warp -mx-2.5 gap-y-8  align-center justify-center" style="margin-top: .5rem">
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2.5 py-2.5">
                            <button type="submit" class="flex items-center justify-center w-full gap-2 p-3 text-sm font-medium text-white transition-colors rounded-lg bg-brand-500 hover:bg-brand-600">
                                Send Message
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.98481 2.44399C3.11333 1.57147 1.15325 3.46979 1.96543 5.36824L3.82086 9.70527C3.90146 9.89367 3.90146 10.1069 3.82086 10.2953L1.96543 14.6323C1.15326 16.5307 3.11332 18.4291 4.98481 17.5565L16.8184 12.0395C18.5508 11.2319 18.5508 8.76865 16.8184 7.961L4.98481 2.44399ZM3.34453 4.77824C3.0738 4.14543 3.72716 3.51266 4.35099 3.80349L16.1846 9.32051C16.762 9.58973 16.762 10.4108 16.1846 10.68L4.35098 16.197C3.72716 16.4879 3.0738 15.8551 3.34453 15.2223L5.19996 10.8853C5.21944 10.8397 5.23735 10.7937 5.2537 10.7473L9.11784 10.7473C9.53206 10.7473 9.86784 10.4115 9.86784 9.99726C9.86784 9.58304 9.53206 9.24726 9.11784 9.24726L5.25157 9.20287 5.19996 9.11528L3.34453 4.77824Z" fill=""></path>
                                </svg>
                            </button>
                        </div>
                    </div>                                                               
                </form >
            </div>
          </div>
        </main>
        <!-- ===== Main Content End ===== -->
      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
@endsection

@push('js')
<script>
 flatpickr("#thaiDateInput", {
    locale: "th",
    dateFormat: "d F Y",  // รูปแบบที่ผู้ใช้เห็น
    defaultDate: "today",
     allowInput: false,
    onChange: function(selectedDates, dateStr, instance) {
        // แปลงปี ค.ศ. → พ.ศ. เมื่อผู้ใช้เลือกวันที่
        const date = selectedDates[0];
        if (!date) return;

        const day = date.getDate();
        const monthNames = [
            "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
            "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
        ];
        const month = monthNames[date.getMonth()];
        const year = date.getFullYear() + 543;

        instance.input.value = `${day} ${month} ${year}`; // set value เป็น พ.ศ.
    },

    onReady: function(selectedDates, dateStr, instance) {
        // ตอนโหลดเริ่มต้น → set ปีเป็น พ.ศ.
        const date = selectedDates[0];
        if (!date) return;

        const day = date.getDate();
        const monthNames = [
            "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
            "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
        ];
        const month = monthNames[date.getMonth()];
        const year = date.getFullYear() + 543;

        instance.input.value = `${day} ${month} ${year}`;
        
        // ยังคงแสดงปี พ.ศ. ใน dropdown ปฏิทิน
        const yearElem = instance.currentYearElement;
        const currentYear = parseInt(yearElem.value);
        if (currentYear < 2500) {
            yearElem.value = currentYear + 543;
        }
    },

    onYearChange: function(selectedDates, dateStr, instance) {
        const yearElem = instance.currentYearElement;
        const currentYear = parseInt(yearElem.value);
        if (currentYear < 2500) {
            setTimeout(() => {
                yearElem.value = currentYear + 543;
            }, 1);
        }
    },

    onOpen: function(selectedDates, dateStr, instance) {
        const yearElem = instance.currentYearElement;
        const currentYear = parseInt(yearElem.value);
        if (currentYear < 2500) {
            setTimeout(() => {
                yearElem.value = currentYear + 543;
            }, 1);
        }
    }
});
</script>
@endpush
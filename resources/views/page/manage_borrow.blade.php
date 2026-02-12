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
  /* สำหรับโหมด Light */
    input[readonly] {
        background-color: #e2e8f0; /* ตัวอย่างสีเทาอ่อน (gray-200 ของ Tailwind) */
        cursor: not-allowed; /* เปลี่ยน cursor เพื่อบ่งชี้ว่าแก้ไขไม่ได้ */
    }

    /* สำหรับโหมด Dark (ถ้าคุณต้องการสีที่แตกต่างออกไปใน Dark mode) */
    .dark input[readonly] {
        background-color: #374151; /* ตัวอย่างสีเทาเข้ม (gray-700 ของ Tailwind) */
    }
    textarea[readonly]{
        background-color: #e2e8f0; /* ตัวอย่างสีเทาอ่อน (gray-200 ของ Tailwind) */
        cursor: not-allowed; /* เปลี่ยน cursor เพื่อบ่งชี้ว่าแก้ไขไม่ได้ */
    }
     .dark textarea[readonly] {
        background-color: #374151; /* ตัวอย่างสีเทาเข้ม (gray-700 ของ Tailwind) */
    }
     /* ------------------------------------- */
    /* Select2 Basic Styling (อิงจาก Tailwind / TailAdmin) */
    /* ------------------------------------- */

    /* สำหรับ input ที่แสดงค่าที่เลือก (ทั้ง single และ multiple) */
    .select2-container .select2-selection--single,
    .select2-container .select2-selection--multiple {
        /* ใช้คลาส Tailwind โดยตรงใน @apply หรือเขียน CSS ปกติ */
        @apply h-11 border border-gray-300 rounded-lg bg-transparent shadow-theme-xs;
        /* ถ้าใช้ @apply ต้องแน่ใจว่าไฟล์นี้ถูกประมวลผลด้วย Tailwind */
        /* หรือเขียน CSS ปกติ: */
        /*
        height: 44px;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        background-color: transparent;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        */
    }

    /* สำหรับโหมด Dark */
    .dark .select2-container .select2-selection--single,
    .dark .select2-container .select2-selection--multiple {
        @apply border-gray-700 bg-gray-900;
        /* border-color: #374151; */
        /* background-color: #111827; */
    }

    /* สำหรับ input ที่แสดงค่าที่เลือก - single select */
    .select2-container .select2-selection--single .select2-selection__rendered {
        @apply h-full flex items-center px-4 text-sm text-gray-800 placeholder:text-gray-400;
        /* height: 100%; */
        /* display: flex; */
        /* align-items: center; */
        /* padding-left: 1rem; */
        /* padding-right: 1rem; */
        /* font-size: 0.875rem; */
        /* color: #374151; */
    }
    .dark .select2-container .select2-selection--single .select2-selection__rendered {
        @apply text-white/90 placeholder:text-white/30;
        /* color: rgba(255, 255, 255, 0.9); */
    }

    /* สำหรับปุ่มลูกศร dropdown */
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        @apply h-full w-10 flex items-center justify-center;
        /* height: 100%; */
        /* width: 2.5rem; */
        /* display: flex; */
        /* align-items: center; */
        /* justify-content: center; */
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        @apply border-gray-500 dark:border-gray-400; /* เปลี่ยนสีลูกศร */
        /* border-color: #6b7280 transparent transparent transparent; */
    }

    /* ------------------------------------- */
    /* Select2 Dropdown Styling */
    /* ------------------------------------- */

    /* สำหรับ dropdown container ทั้งหมด */
    .select2-container--open .select2-dropdown {
        @apply rounded-lg border border-gray-300 shadow-lg dark:border-gray-700 dark:bg-gray-800;
        /* border-radius: 0.5rem; */
        /* border: 1px solid #d1d5db; */
        /* box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); */
    }

    /* สำหรับช่องค้นหาใน dropdown */
    .select2-container--default .select2-search--dropdown .select2-search__field {
        @apply border border-gray-300 rounded-md h-10 px-4 py-2 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90;
        /* height: 40px; */
        /* border-radius: 0.375rem; */
        /* border: 1px solid #d1d5db; */
        /* padding: 0.5rem 1rem; */
        /* font-size: 0.875rem; */
    }

    /* สำหรับ option ใน dropdown */
    .select2-container--default .select2-results__option {
        @apply px-4 py-2 text-sm text-gray-800 dark:text-white/90;
        /* padding: 0.5rem 1rem; */
        /* font-size: 0.875rem; */
    }

    /* สำหรับ option ที่ถูก Hover / Active */
    .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
        @apply bg-brand-100 text-brand-700 dark:bg-brand-900 dark:text-brand-300;
        /* background-color: #e0f2fe; */
        /* color: #0284c7; */
    }

    /* สำหรับ option ที่ถูกเลือกแล้ว (ใน multiple select) */
    .select2-container--default .select2-results__option[aria-selected=true] {
        @apply bg-gray-100 dark:bg-gray-700 dark:text-gray-200;
        /* background-color: #f3f4f6; */
        /* color: #374151; */
    }

    /* ------------------------------------- */
    /* Multiple Select Tags Styling */
    /* ------------------------------------- */

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        @apply bg-gray-200 text-gray-700 rounded-md text-xs px-2 py-1 mr-1 mb-1 flex items-center;
        /* background-color: #e5e7eb; */
        /* color: #4b5563; */
        /* border-radius: 0.375rem; */
        /* font-size: 0.75rem; */
        /* padding: 0.25rem 0.5rem; */
        /* margin-right: 0.25rem; */
    }

    .dark .select2-container--default .select2-selection--multiple .select2-selection__choice {
        @apply bg-gray-700 text-gray-200;
        /* background-color: #374151; */
        /* color: #e5e7eb; */
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        @apply text-gray-500 hover:text-gray-700 ml-1 cursor-pointer;
        /* color: #6b7280; */
        /* margin-left: 0.25rem; */
        /* cursor: pointer; */
    }
    .dark .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        @apply text-gray-400 hover:text-gray-200;
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
               <a class="navigater" href="{{route('home')}}"><h5 class=" dark:text-white/90">หน้าหลัก</h5></a>&nbsp; > &nbsp;<a  class="navigater" href="{{route('borrow_eq')}}"><h5 class=" dark:text-white/90">ข้อมูลการยืมอุปกรณ์</h5></a>&nbsp; > &nbsp;<u><h5 class="dark:text-white/90">จัดการการยืม</h5></u>
            </div>
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        ข้อมูลการยืม
                    </h3>
                </div>
                <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                    <form class="w-full" method="POST" action="{{ route('update_manage_borrow', $data->id) }}"  enctype="multipart/form-data">  
                        @csrf  
                        @method('PUT')   
                        <h1><i class="fa-regular fa-circle-user" style="padding-right:.25rem;color:rebeccapurple"></i>ข้อมูลผู้ยืมอุปกรณ์</h1>       
                        <div class=" flex flex-wrap -mx-2.5 gap-y-8" >
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    ผู้ยืม
                                </label>
                            <input type="text"  value="{{$data->customer_prefix}}{{$data->customer_name}} {{$data->customer_surname}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>
                            
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    สังกัด
                                </label>
                                <input type="text"  value="{{$data->customer_affiliation}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                กลุ่มงาน
                                </label>
                                <input type="text"  value="{{$data->customer_group}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    ตำแหน่ง
                                </label>
                                <input type="text" value="{{$data->customer_position}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>
                        </div>   
                        <div class=" flex flex-wrap -mx-2.5 gap-y-8" >  
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    เบอร์โทร
                                </label>
                                <input type="text" value="{{$data->customer_phone}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>                      
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    อีเมล
                                </label>
                                <input type="text" value="{{$data->customer_email}}" readonly placeholder="เช่น 10-67-7440-001-0001-00013" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>                        
                        </div>
                        <hr>
                        <h1 style="margin-top:1rem"><i class="fa-regular fa-file-lines" style="padding-right:.25rem;color:red"></i>รายละเอียดการยืมอุปกรณ์</h1> 
                        <div class=" flex flex-wrap -mx-2.5 gap-y-8" >
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    จุดประสงค์ในการยืม
                                </label>
                            <input type="text"  value="{{$data->borrow_type}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>
                            
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    งานที่ต้องเข้าร่วม
                                </label>
                                <input type="text"  value="{{$data->job_of_use}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                สถานที่ใช้งาน
                                </label>
                                <input type="text"  value="{{$data->place_of_use}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    อุปกรณ์ที่ต้องการยืมพร้อมจำนวน
                                </label>
                                <input type="text" value="{{$data->type_eq_borrow}} {{$data->number_borrow}} เครื่อง" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>
                        </div>  
                        <div class=" flex flex-warp -mx-2.5 gap-y-8 " style="margin-top: .5rem">
                            <div class="w-full px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">คำอธิบายเพิ่มเติม(ฝั่งผู้ยืม)</label>
                                    <textarea
                                        readonly                                                                       
                                        type="text"
                                        rows="2"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    >{{$data->user_note}}</textarea>
                            </div>
                        </div>
                        <div class=" flex flex-wrap -mx-2.5 gap-y-8" >
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    <i class="fa-regular fa-hourglass-half" style="padding-right:.25rem;color:green"></i>วันที่ยืม
                                </label>
                            <input type="text"  value="{{$data->borrow_date_th}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>
                            
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    <i class="fa-regular fa-hourglass" style="padding-right: .25rem;color:orangered"></i>วันที่คืน
                                </label>
                                <input type="text"  value="{{$data->return_date_th}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            </div>                       
                        </div>                      
                        <hr>
                        <h1 style="margin-top:1rem"><i class="fa-regular fa-pen-to-square" style="padding-right:.25rem;color:orangered"></i>บริหารจัดการ</h1> 
                        <div class=" flex flex-wrap -mx-2.5 gap-y-8" >                                               
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    สถานะ
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select name="stage_borrow" class="dark:bg-dark-900 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" :class="isOptionSelected &amp;&amp; 'text-gray-500 dark:text-gray-400'" @change="isOptionSelected = true">
                                        <option value="1" selected>อนุมัติ</option>
                                    <option value="99">ปฏิเสธ</option>                                   
                                    </select>
                                    <span class="absolute z-30 text-gray-500 -translate-y-1/2 right-4 top-1/2 dark:text-gray-400">
                                        <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="w-full sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    ข้อมูลอุปกรณ์
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select class="form-select-2 w-full mt-1" name="eq_id[]" id="categories" multiple="multiple">
                                        @foreach($device as $k)
                                        <option value="{{$k->id}}">{{$k->type_eq}} {{$k->brand}} {{$k->service_life}} No: {{$k->eq_no}} Serial: {{$k->eq_number}}</option>       
                                        @endforeach                             
                                    </select>
                                </div>
                            </div>                        
                        </div>
                        <div class=" flex flex-warp -mx-2.5 gap-y-8 " style="margin-top: .5rem">
                            <div class="w-full px-2.5 py-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">คำอธิบายเพิ่มเติม(ฝั่งผู้ดูแล)</label>
                                    <textarea                                                                      
                                        name="admin_note"
                                        type="text"
                                        rows="2"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    ></textarea>
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
    const TypeGroup = {
        "อุปกรณ์ทำงานสารสนเทศ": ["Computer", "Notebook", "Tablet", "Mobile Phone", "Printer"],
        "อุปกรณ์นำเสนอ": ["Projector", "HDMI", "Speaker", "Microphone", "Webcam"],
        "อุปกรณ์เครือข่าย": ["Switch", "Router", "Access Point"],
    };

    // เลือก element ของ select ทั้งสอง
    const TypeSelect = document.querySelector('select[name="type"]');
    const SubTypeSelect = document.querySelector('select[name="subtype"]');

    // ฟังก์ชันสำหรับอัปเดตตัวเลือกใน SubTypeSelect
    function updateSubTypeOptions() {
        const selectedType = TypeSelect.value; // ค่า type ที่ถูกเลือก
        // SubTypeSelect.innerHTML = '<option value="" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" disabled selected>โปรดเลือกชนิดอุปกรณ์</option>'; // ล้าง option เดิม

        // ถ้ามีการเลือก type ให้เพิ่ม option subtype ใหม่
        if (selectedType && TypeGroup[selectedType]) {
            TypeGroup[selectedType].forEach(subtype => {
                const option = document.createElement('option');
                option.value = subtype;
                option.textContent = subtype;
                option.classList.add('text-gray-500', 'dark:bg-gray-900', 'dark:text-gray-400'); // เพิ่ม class ให้ option
                SubTypeSelect.appendChild(option);
            });
        }
    }

    // เพิ่ม event listener เมื่อมีการเปลี่ยนแปลงการเลือก type
    TypeSelect.addEventListener('change', updateSubTypeOptions);

    // เรียกใช้งานฟังก์ชันครั้งแรกเผื่อในกรณีที่มีค่าเริ่มต้นถูกเลือกไว้
    updateSubTypeOptions();

    document.addEventListener('DOMContentLoaded', function() {
    // เลือก checkbox และ input file ที่ต้องการ
    const checkbox = document.querySelector('input[name="is_required"]');
    const fileInput = document.querySelector('input[name="images[]"]');

    // ตรวจสอบสถานะเริ่มต้นของ checkbox เพื่อตั้งค่า disabled ให้ input file
    // โดย default ให้ input file เริ่มต้นด้วยสถานะ disabled
    fileInput.disabled = true; 

    // เพิ่ม Event Listener เมื่อ checkbox มีการเปลี่ยนแปลง
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            // ถ้า checkbox ถูกติ๊ก (checked)
            fileInput.disabled = false; // เอา disabled ออก ทำให้ input file ใช้งานได้
            checkbox.value = '1'; // ตั้งค่า value ของ checkbox เป็น 1
        } else {
            // ถ้า checkbox ไม่ถูกติ๊ก (unchecked)
            fileInput.disabled = true;  // เพิ่ม disabled กลับเข้าไป ทำให้ input file ใช้งานไม่ได้
            fileInput.value = '';       // เคลียร์ไฟล์ที่เลือกไว้ (ถ้ามี)
            checkbox.value = '0'; // ตั้งค่า value ของ checkbox เป็น 0
        }
    });
});

</script>
<script>
    $(document).ready(function() {
    console.log('1')
    // สำหรับ Multiple Select
    $('.form-select-2').select2({
        placeholder: "Select an option", // เพิ่ม placeholder
        allowClear: true // อนุญาตให้ล้างค่าที่เลือก
    });

    // สำหรับ Single Select
    $('.form-select-2-single').select2({
        placeholder: "-- Please Select --",
        allowClear: true
    });
});
</script>
@endpush
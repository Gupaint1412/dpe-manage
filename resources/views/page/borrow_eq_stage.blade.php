@extends('layouts.app')
@push('css')
<style>
  .d-flex {
    display: flex;
  }
  .align-items-center {
    align-items: center;
  }
  .navigater:hover {    
    color: oklch(0.623 0.214 259.815);
    text-decoration-line: underline
  }
  .bg-computer {
    background: #6A057F;
  }  
  .bg-projector {
    background: #4A47A3;
  }  
  .bg-network { 
    background: #8D93ED;
  }
  .d-none{
    display: none;
  }
   .hover_bg-green:hover{
    background: green
  }
  #myTable thead th {
    text-align: center;
    }
    .text-center{
        text-align: center;
    }
   
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
</style>
@endpush

@section('content')
  @include('componants.partials.preloader')
  <div class="flex h-screen overflow-hidden">
    @include('componants.sidebar')
    <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
        @include('componants.partials.header')
        <main>
            <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">  
                <div class="mb-6 flex items-center ">
                    <a class="navigater" href="{{route('home')}}"><h5 class=" dark:text-white/90">หน้าหลัก</h5></a>&nbsp; > &nbsp;<a class="navigater" href="{{route('borrow_eq')}}"><h5 class="dark:text-white/90">ข้อมูลการยืมอุปกรณ์</h5></a>&nbsp; > &nbsp; <u><h5 class="dark:text-white/90">รายการที่ {{$data->id}}</h5></u>
                </div>
                <div class="grid grid-cols-12 gap-4 md:gap-6 mt-6">
                    <div class="col-span-12 space-y-6 xl:col-span-12">
                        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                            <div class="px-5 py-4 sm:px-6 sm:py-5" style="display: flex;align-items:center;justify-content:space-between">
                                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                                    ข้อมูลการยืม
                                </h3>
                                @if($data->stage_borrow == 3)
                                 <form  method="POST" action="{{ route('update_stage_user_4', $data->id) }}"  enctype="multipart/form-data">  
                                    @csrf  
                                    @method('PUT')                                          
                                        <button type="submit" class="flex items-center justify-center w-full gap-2 p-3 text-sm font-medium text-white transition-colors rounded-lg bg-success-500 hover_bg-green">
                                            ตรวจสอบอุปกรณ์เรียบร้อย
                                            <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.98481 2.44399C3.11333 1.57147 1.15325 3.46979 1.96543 5.36824L3.82086 9.70527C3.90146 9.89367 3.90146 10.1069 3.82086 10.2953L1.96543 14.6323C1.15326 16.5307 3.11332 18.4291 4.98481 17.5565L16.8184 12.0395C18.5508 11.2319 18.5508 8.76865 16.8184 7.961L4.98481 2.44399ZM3.34453 4.77824C3.0738 4.14543 3.72716 3.51266 4.35099 3.80349L16.1846 9.32051C16.762 9.58973 16.762 10.4108 16.1846 10.68L4.35098 16.197C3.72716 16.4879 3.0738 15.8551 3.34453 15.2223L5.19996 10.8853C5.21944 10.8397 5.23735 10.7937 5.2537 10.7473L9.11784 10.7473C9.53206 10.7473 9.86784 10.4115 9.86784 9.99726C9.86784 9.58304 9.53206 9.24726 9.11784 9.24726L5.25157 9.20287 5.19996 9.11528L3.34453 4.77824Z" fill=""></path>
                                            </svg>
                                        </button>
                                 </form >
                                 @endif
                               
                            </div>
                            <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                               
                                    <h1 style="margin:0"><i class="fa-regular fa-file-lines" style="padding-right:.25rem;color:red"></i>รายละเอียดการยืมอุปกรณ์</h1> 
                                    <div class="flex flex-warp -mx-2 5 gap-y-8">
                                        <div class="w-full sm:w-fullmd:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                                ผู้ยืม
                                            </label>
                                            <input type="text"  value="{{$data->customer_prefix}} {{$data->customer_name}} {{$data->customer_surname}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                        </div>
                                        <div class="w-full sm:w-fullmd:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                                สังกัด
                                            </label>
                                            <input type="text"  value="{{$data->customer_affiliation}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                        </div>
                                        <div class="w-full sm:w-fullmd:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                                กลุ่มงาน
                                            </label>
                                            <input type="text"  value="{{$data->customer_group}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                        </div>
                                        <div class="w-full sm:w-fullmd:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                                ตำแหน่ง
                                            </label>
                                            <input type="text"  value="{{$data->customer_position}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                        </div>
                                    </div>
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
                                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"><i class="fa-solid fa-user" style="padding-right:.25rem;color:green"></i>คำอธิบายเพิ่มเติม(ฝั่งผู้ยืม)</label>
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
                                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                                <i class="fa-regular fa-circle-check" style="color: green;padding-right:.25rem;"></i>สถานะ
                                            </label>
                                            @if($data->stage_borrow == 0)
                                            <input type="text"  value="ส่งแบบฟอร์ม" style="background-color: orangered;color:white;text-align:center" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                            @elseif($data->stage_borrow == 1)
                                            <input type="text"  value="อนุมัติ" style="background-color: rgb(0, 139, 19);color:white;text-align:center" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                            @elseif($data->stage_borrow == 2)
                                            <input type="text"  value="อยู่ระหว่างยืม" style="background-color: rgb(0, 32, 139);color:white;text-align:center" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                            @elseif($data->stage_borrow == 3)
                                            <input type="text"  value="ขอคืนอุปกรณ์" style="background-color: rgb(221, 70, 0);color:white;text-align:center" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                            @elseif($data->stage_borrow == 4)
                                            <input type="text"  value="คืนเรียบร้อย" style="background-color: rgb(28, 138, 0);color:white;text-align:center" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                            @elseif($data->stage_borrow == 99)
                                            <input type="text"  value="ปฏิเสธ" style="background-color: rgb(138, 0, 0);color:white;text-align:center" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                            @endif
                                        </div>    
                                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                                <i class="fa-regular fa-circle-user" style="color:teal;padding-right:.25rem"></i></i>ผู้อนุมัติ
                                            </label>
                                            @if($data->admin_prefix && $data->admin_name && $data->admin_surname != null || $data->admin_prefix && $data->admin_name && $data->admin_surname != "")
                                            <input type="text"  value="{{$data->admin_prefix}}{{$data->admin_name}} {{$data->admin_surname}}" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                            @else
                                            <input type="text"  value="-" style="text-align: center;" readonly class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                            @endif
                                        </div>                                                       
                                    </div>
                                    <div class=" flex flex-warp -mx-2.5 gap-y-8 " style="margin-top: .5rem">
                                        <div class="w-full px-2.5 py-2.5">
                                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"><i class="fa-solid fa-user" style="padding-right:.25rem;color:#6A057F"></i>คำอธิบายเพิ่มเติม(ฝั่งผู้ดูแล)</label>
                                                <textarea
                                                    readonly                                                                       
                                                    type="text"
                                                    rows="2"
                                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                                >{{$data->admin_note}}</textarea>
                                        </div>
                                    </div>  
                                    <hr>                                     
                                    <div class="w-full">
                                        <h3>รายการครุภัณฑ์ที่ถูกใช้งาน</h3>
                                        <table class="min-w-full" id="myTable">
                                            <thead>
                                                <tr class="border-gray-100 border-y dark:border-gray-800">
                                                    <th class="py-3">
                                                        <div class="flex items-center" style="align-items: center">
                                                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                            รายการ
                                                        </p>
                                                        </div>
                                                    </th>                                            
                                                    <th class="py-3">
                                                        <div class="flex items-center" style="align-items: center">
                                                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                            ประเภท
                                                        </p>
                                                        </div>
                                                    </th> 
                                                     <th class="py-3">
                                                        <div class="flex items-center" style="align-items: center">
                                                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                            สถานะ
                                                        </p>
                                                        </div>
                                                    </th>                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($data->related_devices->isNotEmpty())                                                    
                                                    @foreach ($data->related_devices as $j)
                                                <tr>
                                                    <td class="py-3">
                                                        <div class="flex items-center">
                                                        <div class="flex items-center gap-3">
                                                            <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                                                            @if($j->model == "245-G9")
                                                                <img src="{{asset('Device_model/HP-245-G9.png')}}" alt="Product" />
                                                            @elseif($j->model == "348-G3") 
                                                                <img src="{{asset('Device_model/HP-348-G3.png')}}" alt="Product" />                                 
                                                            @elseif($j->model == "Vostro 14 3000 Series") 
                                                                <img src="{{asset('Device_model/Dell-Vostro14-3000-Series.png')}}" alt="Product" />
                                                                @else
                                                            {{-- ถ้าไม่มีรูปภาพโมเดลเฉพาะ ให้แสดงรูปภาพแรกจาก path_img ถ้ามี --}}
                                                            @if($j->path_img && is_array($j->path_img) && count($j->path_img) > 0)
                                                                <img src="{{asset($j->path_img[0])}}" alt="Device Image" class="w-full h-full object-cover"/>
                                                            @else
                                                                {{-- รูปภาพ placeholder ถ้าไม่มีทั้งรูปโมเดลเฉพาะและรูปที่อัปโหลด --}}
                                                                <img src="https://placehold.co/50x50/cccccc/333333?text=No+Image" alt="No Image" />
                                                            @endif
                                                            @endif
                                                            </div>
                                                            <div>
                                                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                            {{$j->brand}}-{{$j->model}} หมายเลข &nbsp;{{$j->eq_no}}
                                                            </p>
                                                            <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                                                                เลขครุภัณฑ์: {{$j->eq_number}}                                   
                                                            </span>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </td>                          
                          
                                                    <td class="py-3">
                                                        <div class="flex items-center" style="justify-content: center">
                                                        {{-- <p class="text-gray-500 text-theme-sm dark:text-gray-400">                                 --}}
                                                            @if($j->type == "อุปกรณ์ทำงานสารสนเทศ" && $j->type_eq == "Notebook")
                                                                <p class="rounded-full bg-computer px-2 py-0.5 text-theme-xs font-medium text-white/90 dark:bg-computer dark:text-white/90" style="color: #ffffff">
                                                                <span><i class="fa-solid fa-laptop text-white/90"></i></span><span class="lg:d-none"style="padding-left:.25rem">{{$j->type_eq}}</span>
                                                                </p>
                                                            @endif
                                                        {{-- </p> --}}
                                                        </div>
                                                    </td>
                                                    <td class="py-3">
                                                        <div class="flex items-center" style="justify-content: center">
                                                        @if($j->status == 0)
                                                            <p class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                                                            พร้อมใช้งาน
                                                            </p>
                                                        @elseif($j->status == 1)
                                                            <p class="rounded-full bg-warning-50 px-2 py-0.5 text-theme-xs font-medium text-warning-600 dark:bg-warning-500/15 dark:text-warning-500">
                                                            อยู่ระหว่างยืม
                                                            </p>
                                                        @elseif($j->status == 2)
                                                            <p class="rounded-full bg-error-50 px-2 py-0.5 text-theme-xs font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
                                                            เกินกำหนดการยืม
                                                            </p>
                                                        @elseif($j->status == 3)
                                                            <p class="rounded-full bg-gray-50 px-2 py-0.5 text-theme-xs font-medium text-gray-600 dark:bg-gray-500/15 dark:text-gray-500">
                                                            ไม่พร้อมใช้งาน
                                                            </p>
                                                        @else
                                                            <p class="rounded-full bg-gray-50 px-2 py-0.5 text-theme-xs font-medium text-gray-600 dark:bg-gray-500/15 dark:text-gray-500">
                                                            ไม่ทราบสถานะ
                                                            </p>  
                                                        @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                     @endforeach                                                 
                                                @else
                                                    <p>ไม่มีอุปกรณ์ที่ระบุในการยืมนี้</p>
                                                @endif    
                                            </tbody>
                                        </table>
                                         {{-- @if ($data->related_devices->isNotEmpty())
                                            <h3>รายการอุปกรณ์ที่ยืม:</h3>
                                            <ul>
                                                @foreach ($data->related_devices as $device)
                                                    <li>{{ $device->name }} (ID: {{ $device->id }})</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>ไม่มีอุปกรณ์ที่ระบุในการยืมนี้</p>
                                        @endif     --}}
                                    </div>                                                                                                                                                                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
  </div>
@endsection

@push('js')
<script>
    var table = new DataTable('#myTable', {
    responsive: true,
    lengthChange: false,
    searching: false,
    language: {
        url: '{{ asset('datatable/th.json') }}',
    },
});
</script>
@endpush
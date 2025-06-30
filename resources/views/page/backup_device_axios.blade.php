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
  [x-cloak] {
  display: none !important;
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
              <a class="navigater" href="{{route('home')}}"><h5 class=" dark:text-white/90">หน้าหลัก</h5></a>&nbsp; > &nbsp;<u><h5 class="dark:text-white/90">อุปกรณ์ทั้งหมด</h5></u>
            </div>         
            <div class="grid grid-cols-12 gap-4 md:gap-6 mt-6">
              <div class="col-span-12 space-y-6 xl:col-span-12">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
                  <!-- Metric Item Start -->
                  <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="d-flex" style="justify-content: center;align-items:center;">
                      <i class="fa-regular fa-circle-dot text-sm text-theme-purple-500 dark:text-theme-purple-500" style="padding-right:.25rem"></i> 
                      <h4 style="text-align: center;margin:0" class="text-sm text-gray-500 dark:text-gray-400">สัดส่วนอุปกรณ์ทั้งหมด</h4>
                    </div>
                     <div style="padding-top:.25rem"><hr></div>
                      <div style="max-height: 350px;overflow: hidden;display: flex;justify-content: center;align-items: center;">
                        <canvas id="myChart"></canvas>             
                      </div>
                  </div>
                  <!-- Metric Item End -->

                  <!-- Metric Item Start -->
                  <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="d-flex" style="justify-content: center;align-items:center;">
                      <i class="fa-regular fa-circle-dot text-sm text-success-500 dark:text-success-500" style="padding-right:.25rem"></i> 
                      <h4 style="text-align: center;margin:0" class="text-sm text-gray-500 dark:text-gray-400">ประเภทอุปกรณ์</h4>
                    </div>
                    <div style="padding-top:.25rem"><hr></div>
                    <div class="d-flex mt-3" style="justify-content: space-between">
                      <div class="d-flex">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl " style="background: #6A057F">
                          <i class="fa-solid fa-computer" style="width:24px;height:24px;color:#ffffff"></i>                         
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 d-flex align-items-center" style="padding-left: 1rem">Computer</span>
                      </div>
                      <span class=" d-flex align-items-center font-medium  gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm  text-success-600 dark:bg-success-500/15 dark:text-success-500" >                        
                        {{$computer}}  เครื่อง
                      </span>
                    </div>
                    <div class="d-flex mt-3" style="justify-content: space-between">
                      <div class="d-flex">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl " style="background: #6A057F">
                          <i class="fa-solid fa-laptop" style="width:24px;height:24px;color:#ffffff"></i>                        
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 d-flex align-items-center" style="padding-left: 1rem">Notebook</span>
                      </div>
                      <span class=" d-flex align-items-center font-medium  gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm  text-success-600 dark:bg-success-500/15 dark:text-success-500" >                        
                        {{$notebook}}  เครื่อง
                      </span>
                    </div>
                    <div class="d-flex mt-3" style="justify-content: space-between">
                      <div class="d-flex">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl" style="background: #6A057F">
                          <i class="fa-solid fa-tablet-screen-button" style="width:24px;height:24px;color:#ffffff"></i>                       
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 d-flex align-items-center" style="padding-left: 1rem">Tablet</span>
                      </div>
                      <span class=" d-flex align-items-center font-medium  gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm  text-success-600 dark:bg-success-500/15 dark:text-success-500" >                        
                        {{$tablet}}  เครื่อง
                      </span>
                    </div>
                    <div class="d-flex mt-3" style="justify-content: space-between">
                      <div class="d-flex">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl " style="background: #4A47A3">                                              
                          <svg  height="24" width="24" fill="none" class="fill-white dark:fill-white/90" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 363.09 363.09" xml:space="preserve">
                              <g>
                                <g>
                                  <g>
                                    <path d="M325.59,82.067H37.5c-20.678,0-37.5,16.822-37.5,37.5v94.205c0,19.713,15.293,35.909,34.635,37.38v22.37
                                      c0,4.143,3.357,7.5,7.5,7.5h57.352c4.143,0,7.5-3.357,7.5-7.5v-22.25h149.117v22.25c0,4.143,3.357,7.5,7.5,7.5h57.352
                                      c4.143,0,7.5-3.357,7.5-7.5v-22.37c19.344-1.471,34.635-17.667,34.635-37.38v-94.205C363.09,98.89,346.268,82.067,325.59,82.067z
                                      M91.986,266.022H49.635v-14.75h42.352V266.022z M271.104,266.022v-14.75h42.352v14.75H271.104z M348.09,213.772
                                      c0,12.406-10.094,22.5-22.5,22.5H37.5c-12.406,0-22.5-10.094-22.5-22.5v-94.205c0-12.406,10.094-22.5,22.5-22.5h288.09
                                      c12.406,0,22.5,10.094,22.5,22.5V213.772z"/>
                                    <g>
                                      <g>
                                        <path d="M266.57,222.813c-30.957,0-56.143-25.187-56.143-56.145c0-30.957,25.186-56.143,56.143-56.143
                                          c30.959,0,56.145,25.186,56.145,56.143C322.715,197.627,297.529,222.813,266.57,222.813z M266.57,125.526
                                          c-22.686,0-41.143,18.456-41.143,41.143c0,22.688,18.457,41.145,41.143,41.145c22.688,0,41.145-18.457,41.145-41.145
                                          C307.715,143.982,289.258,125.526,266.57,125.526z"/>
                                      </g>
                                      <g>
                                        <path d="M241.611,174.169c-4.143,0-7.5-3.357-7.5-7.5c0-17.898,14.563-32.459,32.459-32.459c4.143,0,7.5,3.357,7.5,7.5
                                          c0,4.143-3.357,7.5-7.5,7.5c-9.627,0-17.459,7.832-17.459,17.459C249.111,170.812,245.754,174.169,241.611,174.169z"/>
                                      </g>
                                    </g>
                                  </g>
                                  <g>
                                    <g>
                                      <path d="M133.105,144.028H39.168c-4.143,0-7.5-3.358-7.5-7.5c0-4.143,3.357-7.5,7.5-7.5h93.937c4.143,0,7.5,3.357,7.5,7.5
                                        C140.605,140.671,137.248,144.028,133.105,144.028z"/>
                                    </g>
                                    <g>
                                      <path d="M133.105,174.169H39.168c-4.143,0-7.5-3.357-7.5-7.5s3.357-7.5,7.5-7.5h93.937c4.143,0,7.5,3.357,7.5,7.5
                                        S137.248,174.169,133.105,174.169z"/>
                                    </g>
                                    <g>
                                      <path d="M133.105,204.31H39.168c-4.143,0-7.5-3.357-7.5-7.5c0-4.143,3.357-7.5,7.5-7.5h93.937c4.143,0,7.5,3.357,7.5,7.5
                                        C140.605,200.952,137.248,204.31,133.105,204.31z"/>
                                    </g>
                                  </g>
                                </g>
                              </g>
                          </svg>
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 d-flex align-items-center" style="padding-left: 1rem">Projectors</span>
                      </div>
                      <span class=" d-flex align-items-center font-medium  gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm  text-success-600 dark:bg-success-500/15 dark:text-success-500" >                        
                        {{$projector}}  เครื่อง
                      </span>
                    </div>
                    <div class="d-flex mt-3" style="justify-content: space-between">
                      <div class="d-flex">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl "style="background: #4A47A3">
                         <i class="fa-solid fa-print" style="width: 24px;height:24px;color:#ffffff"></i>                      
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 d-flex align-items-center" style="padding-left: 1rem">Printer&Sacnner</span>
                      </div>
                      <span class=" d-flex align-items-center font-medium  gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm  text-success-600 dark:bg-success-500/15 dark:text-success-500" >                        
                        {{$printer}}  เครื่อง
                      </span>
                    </div>
                    <div class="d-flex mt-3" style="justify-content: space-between">
                      <div class="d-flex">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl " style="background: #8D93ED">
                            <i class="fa-solid fa-server" style="width: 24px;height:24px;color:#ffffff"></i>                   
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 d-flex align-items-center" style="padding-left: 1rem">Network</span>
                      </div>
                      <span class=" d-flex align-items-center font-medium  gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm  text-success-600 dark:bg-success-500/15 dark:text-success-500" >                        
                        {{$network}}  เครื่อง
                      </span>
                    </div>
                    
                  </div>
                  <!-- Metric Item End -->                 
                  <!-- Metric Item End -->        
                                   
                </div>
              </div> 
              <div class="col-span-12 xl:col-span-12">
                <!-- ====== Table One Start -->
                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
                  <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                      <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                        รายการครุภัณฑ์ทั้งหมด
                      </h3>
                    </div>

                    <div class="flex items-center gap-3">                     
                      <a href="{{route('add_device')}}" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                        <i class="fa-regular fa-square-plus text-success-500 dark:text-success-500"></i> เพิ่มรายการ
                      </a>
                    </div>
                  </div>

                  <div class="w-full overflow-x-auto">
                    <table class="min-w-full" id="myTable">
                      <!-- table header start -->
                      <thead >
                        <tr class="border-gray-100 border-y dark:border-gray-800">
                          <th class="py-3">
                            <div class="flex items-center">
                              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                รายการ
                              </p>
                            </div>
                          </th>                                            
                          <th class="py-3">
                            <div class="flex items-center">
                              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                ประเภท
                              </p>
                            </div>
                          </th>
                          <th class="py-3">
                            <div class="flex items-center">
                              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                อายุการใช้งาน
                              </p>
                            </div>
                          </th>
                          <th class="py-3">
                            <div class="flex items-center col-span-2">
                              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                สถานะ
                              </p>
                            </div>
                          </th>
                          <th class="py-3">
                            <div class="flex items-center col-span-2">
                              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                 Action
                              </p>
                            </div>
                          </th>
                        </tr>
                      </thead>
                      <!-- table header end -->

                      <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                      @foreach($device as $j)
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
                                   {{$j->brand}}-{{$j->model}} No.{{$j->eq_no}}
                                  </p>
                                  <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                                    เลขครุภัณฑ์: {{$j->eq_number}}                                   
                                  </span>
                                </div>
                              </div>
                            </div>
                          </td>                          
                          
                          <td class="py-3">
                            <div class="flex items-center">
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
                            <div class="flex items-center">
                              <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                              {{$currentYear - $j->service_life}} ปี
                              </p>
                            </div>
                          </td>
                          <td class="py-3">
                            <div class="flex items-center">
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
                          <td class="py-3">
                            <div x-data="{
                                isModalOpen: false,
                                deviceData: null,
                                loading: false,
                                error: null,
                                loadDeviceData: async function(deviceId) {
                                    this.loading = true;
                                    this.error = null;
                                    try {
                                        const response = await axios.get(`/dpe-manage/public/api/device/${deviceId}`); // ใช้ Axios เรียก API
                                        this.deviceData = response.data;
                                        this.isModalOpen = true; // เปิด Modal หลังจากโหลดข้อมูลสำเร็จ
                                    } catch (e) {
                                        console.error('Error loading device data:', e);
                                        this.error = 'ไม่สามารถโหลดข้อมูลอุปกรณ์ได้';
                                        this.deviceData = null;
                                        this.isModalOpen = true; // อาจจะยังคงเปิด Modal เพื่อแสดงข้อผิดพลาด
                                    } finally {
                                        this.loading = false;
                                    }
                                }
                            }">
                                {{-- ปุ่มเปิด Modal --}}
                                {{-- สมมติว่าคุณมี $j->id สำหรับแต่ละปุ่มเพื่อส่ง ID ของอุปกรณ์ --}}
                                <button
                                    class="px-3 py-2 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600"
                                    @click="loadDeviceData({{ $j->id }})" {{-- ส่ง ID ของอุปกรณ์ไปยังฟังก์ชัน loadDeviceData --}}
                                >
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                {{-- <a href="{{route('edit_device',$j->id)}}">edit</a> --}}
                                {{-- Modal --}}
                                <div x-show="isModalOpen" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999">
                                    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
                                    <div @click.outside="isModalOpen = false" class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
                                        {{-- close btn --}}
                                        <button @click="isModalOpen = false" class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
                                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z" fill=""></path>
                                            </svg>
                                        </button>

                                        <div x-show="loading" class="text-center text-gray-500 dark:text-gray-400">กำลังโหลดข้อมูล...</div>
                                        <div x-show="error" class="text-center text-red-500 dark:text-red-400" x-text="error"></div>

                                        <template x-if="deviceData && !loading">
                                            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03]">
                                                <div class="grid grid-cols-12 gap-4 md:gap-6 mt-6">
                                                    <div class="col-span-12 space-y-6 xl:col-span-12">
                                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3">

                                                            {{-- ตรวจสอบว่า deviceData.path_img มีอยู่และเป็น Array --}}
                                                            <template x-if="deviceData.path_img && Array.isArray(deviceData.path_img) && deviceData.path_img.length > 0">
                                                                <template x-for="imagePath in deviceData.path_img" :key="imagePath">
                                                                    <div class="mb-5 overflow-hidden rounded-lg">
                                                                        <img :src="`{{ asset('') }}${imagePath}`" style="max-height: 250px; width: auto;" alt="Device Image" class="rounded-lg object-cover">
                                                                    </div>
                                                                </template>
                                                            </template>
                                                            <template x-if="!deviceData.path_img || deviceData.path_img.length === 0">
                                                                <div class="col-span-full text-center text-gray-500 dark:text-gray-400">
                                                                    ไม่มีรูปภาพสำหรับอุปกรณ์นี้
                                                                </div>
                                                            </template>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mb-1 text-theme-xl font-medium text-gray-800 dark:text-white/90">
                                                        <span x-text="`${deviceData.brand}-${deviceData.model} No.${deviceData.eq_no}`"></span>
                                                    </h4>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                                        <span x-text="deviceData.description || 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto aspernatur cum et ipsum'"></span>
                                                    </p>
                                                    <a :href="`/dpe-manage/public/edit_device/${deviceData.id}`" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-brand-500 px-4 py-3 text-sm font-medium text-white shadow-theme-xs hover:bg-brand-600">
                                                        Read more
                                                    </a>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                          </td>
                        </tr> 
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- ====== Table One End -->
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
 var table = new DataTable('#myTable', {
  
    language: {
        url: '{{ asset('datatable/th.json') }}',
    },
});
document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut', // **ตรงนี้ที่เปลี่ยนเป็น 'doughnut'**
                data: {
                    labels: ['อุปกรณ์ทำงานสารสนเทศ', 'อุปกรณ์นำเสนอ', 'อุปกรณ์เครือข่าย'], // ชื่อของแต่ละส่วน
                    datasets: [{
                        label: 'My First Dataset',
                        data: [300, 50, 100], // ค่าของแต่ละส่วน
                        backgroundColor: [
                            'rgb(106, 5, 127)', // สีของแต่ละส่วน
                            'rgb(74, 71, 163)',
                            'rgb(141, 147, 237)'
                        ],
                        hoverOffset: 4 // เมื่อชี้เมาส์ไปจะเด้งออกมานิดหน่อย
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top', // ตำแหน่งของ legend
                        },
                        title: {
                            display: false,
                            text: 'My Awesome Doughnut Chart' // ชื่อ Chart
                        }
                    }
                }
            });
        });
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
</script>

@endpush
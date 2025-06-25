@extends('layouts.app')

@push('css')
<style>
    .align-center {
        text-align: center;
    }
    .justify-center {
        justify-content: center;
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
              <a href="{{route('device')}}"><u><h5 class=" dark:text-white/90">อุปกรณ์ทั้งหมด</h5></u></a>&nbsp; > &nbsp;<h5 class="dark:text-white/90">เพิ่มอุปกรณ์</h5>
            </div>
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        เพิ่มข้อมูลอุปกรณ์
                    </h3>
                </div>
            <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <form class="w-full" method="POST" action="{{ route('store_device') }}"  enctype="multipart/form-data">  
                    @csrf           
                    <div class=" flex flex-wrap -mx-2.5 gap-y-8" >
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                ประเภทกลุ่มอุปกรณ์
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select name="type" class=" dark:bg-dark-900 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" :class="isOptionSelected &amp;&amp; 'text-gray-500 dark:text-gray-400'" @change="isOptionSelected = true">
                                    <option value="" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" disabled selected>
                                        โปรดเลือกกลุ่มอุปกรณ์
                                    </option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->type_eq}}" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                            {{$type->type_eq}}
                                        </option>
                                    @endforeach
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
                                ชนิดอุปกรณ์
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select name="subtype" class="dark:bg-dark-900 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" :class="isOptionSelected &amp;&amp; 'text-gray-500 dark:text-gray-400'" @change="isOptionSelected = true">
                                    <option value="" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" disabled selected>
                                        โปรดเลือกชนิดอุปกรณ์
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
                                ยี่ห้อ
                            </label>
                            <input type="text" name="brand" placeholder="เช่น Acer" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                รุ่น
                            </label>
                            <input type="text" name="model" placeholder="เช่น Nitro 5" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                    </div>   
                    <div class=" flex flex-wrap -mx-2.5 gap-y-8" >  
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                เลขเครื่อง
                            </label>
                            <input type="text" name="eq_no" placeholder="เช่น 8" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>                      
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                เลขครุภัณฑ์
                            </label>
                            <input type="text" name="eq_number" placeholder="เช่น 10677440001000100013" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                เลขคุมครุภัณฑ์
                            </label>
                            <input type="text" name="eq_number_it" placeholder="เช่น 110000002230" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                    </div>
                    
                    <div class=" flex flex-wrap -mx-2.5 gap-y-8" >                        
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                ปีที่ซื้อ (ปี พ.ศ.)
                            </label>
                            <input type="text" name="service_life" maxlength="4" placeholder="เช่น 2567" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                ระบบปฏิบัติการ
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select name="os" class="dark:bg-dark-900 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" :class="isOptionSelected &amp;&amp; 'text-gray-500 dark:text-gray-400'" @change="isOptionSelected = true">
                                    <option value="" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" disabled selected>
                                        โปรดเลือกระบบปฏิบัติการ
                                    </option>
                                   <option value="Windows 10">Windows 10</option>
                                   <option value="Windows 11">Windows 11</option>
                                   <option value="Ubuntu">Ubuntu</option>
                                   <option value="Android">Android</option>
                                   <option value="IOS">IOS</option>
                                </select>
                                <span class="absolute z-30 text-gray-500 -translate-y-1/2 right-4 top-1/2 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3 px-2.5 py-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                ภาพถ่ายอุปกรณ์
                            </label>
                            <input name="path_img" type="file" accept="image/*" class="focus:border-ring-brand-300 shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:text-white/90 dark:file:border-gray-800 dark:file:bg-white/[0.03] dark:file:text-gray-400 dark:placeholder:text-gray-400"/>
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
        SubTypeSelect.innerHTML = '<option value="" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400" disabled selected>โปรดเลือกชนิดอุปกรณ์</option>'; // ล้าง option เดิม

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

    
</script>
@endpush
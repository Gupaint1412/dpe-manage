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
  #myTable thead th {
    text-align: center;
}
.text-center{
  text-align: center;
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
                    <a class="navigater" href="{{route('home')}}"><h5 class=" dark:text-white/90">หน้าหลัก</h5></a>&nbsp; > &nbsp;<u><h5 class="dark:text-white/90">จัดการผู้ใช้งาน</h5></u>
                </div>
                <div class="grid grid-cols-12 gap-4 md:gap-6 mt-6">
                    <div class="col-span-12 space-y-6 xl:col-span-12">
                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                              ข้อมูลผู้ใช้งานทั้งหมด
                            </h3>
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        {{-- <th>สังกัด</th> --}}
                                        <th>กลุ่มงาน</th>
                                        <th>Role</th>
                                        <th>Stutus</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>                                   
                                    @php
                                        $i = 1;    
                                    @endphp
                                    @foreach ($users as $user)
                                    <tr>
                                        <td style="text-align: center">{{$i++}}</td>
                                        <td>{{$user->name}}&nbsp;{{$user->surname}}</td>
                                        {{-- <td>{{$user->affiliation}}</td> --}}
                                        <td>{{$user->job_group}}</td>
                                        <td class="text-center">
                                          @if($user->role == 1)
                                            <i class="fa-solid fa-user-secret"></i>
                                          @elseif($user->role == 0)
                                            <i class="fa-solid fa-user-tie"></i>
                                          @endif
                                         
                                        </td>
                                        <td class="text-center">
                                          @if($user->status == 1)
                                            <i class="fa-regular fa-circle-check" style="color:green"></i>
                                          @else
                                            <i class="fa-solid fa-lock" style="color:red"></i>
                                          @endif
                                        </td>
                                        <td>
                                           {{-- เพิ่ม x-data ที่นี่ เพื่อให้แต่ละ modal มีสถานะของตัวเอง --}}
                                            <div x-data="{ isModalOpen: false }">
                                                <button class="px-3 py-2 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600" @click="isModalOpen = !isModalOpen">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                                {{-- Modal --}}
                                                <div x-show="isModalOpen" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" style="display: none;">
                                                    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]" @click="isModalOpen = false"></div>
                                                    <div @click.outside="isModalOpen = false" class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
                                                        {{-- close btn --}}
                                                        <button @click="isModalOpen = false" class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
                                                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z" fill=""></path>
                                                            </svg>
                                                        </button>
                                                      <form action="{{route('update_user',$user->id)}}" method="POST"> 
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03]">
                                                            <div class="d-flex align-items-center" style="justify-content:center">
                                                              <h1 class="mb-1 text-theme-xl font-medium text-gray-800 dark:text-white/90" style="margin: 0;">
                                                                เปิดการใช้งาน
                                                              </h1>
                                                            </div>
                                                            <div class="grid grid-cols-12 gap-4 md:gap-6 " style="padding-top: 1rem">
                                                              <div class="col-span-12 space-y-6 xl:col-span-12">
                                                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                                                                  <div class="mb-5 overflow-hidden rounded-lg">
                                                                      <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                                                        คำนำหน้าชื่อ
                                                                      </label>
                                                                      <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                                                          <select name="prefix" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                                                            :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                                                            @change="isOptionSelected = true">
                                                                            @if($user->prefix != null || $user->prefix != "")
                                                                            <option value="{{$user->prefix}}"class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" selected>
                                                                              {{$user->prefix}}
                                                                            </option>
                                                                            @endif
                                                                             <option value="นาง"class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" >
                                                                              นาง
                                                                            </option>
                                                                             <option value="นางสาว"class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" >
                                                                              นางสาว
                                                                            </option>
                                                                             <option value="นาย"class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" >
                                                                              นาย
                                                                            </option>
                                                                            
                                                                          </select>
                                                                          <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                                                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                              <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            </svg>
                                                                          </span>
                                                                      </div>
                                                                  </div>
                                                                  <div class="mb-5 overflow-hidden rounded-lg">
                                                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">ชื่อ</label>
                                                                    <input type="text" name="name" value="{{$user->name}}" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                                                  </div>
                                                                  <div class="mb-5 overflow-hidden rounded-lg">
                                                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">นามสกุล</label>
                                                                    <input type="text" name="surname" value="{{$user->surname}}" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                                                  </div>
                                                                  <div class="mb-5 overflow-hidden rounded-lg">
                                                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">สังกัด</label>
                                                                    <input type="text" name="affiliation" value="{{$user->affiliation}}" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                                                  </div>
                                                                  <div class="mb-5 overflow-hidden rounded-lg">
                                                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">กลุ่ม</label>
                                                                    <input type="text" name="job_group" value="{{$user->job_group}}" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                                                  </div>
                                                                   <div class="mb-5 overflow-hidden rounded-lg">
                                                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">อีเมล</label>
                                                                    <input type="text" name="email" value="{{$user->email}}" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                                                  </div>
                                                                  <div class="mb-5 overflow-hidden rounded-lg">
                                                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">พาสเวิร์ด</label>
                                                                    <input type="text" name="password" value="{{$user->view_pass}}" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                                                  </div>
                                                                  <div class="mb-5 overflow-hidden rounded-lg">
                                                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                                                        เปิดการใช้งาน
                                                                      </label>
                                                                      <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                                                          <select name="status" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                                                            :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                                                            @change="isOptionSelected = true">
                                                                            <option value="1"class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" selected>
                                                                              เปิดการใช้งาน
                                                                            </option>
                                                                            <option value="0"class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" >
                                                                              ปิดการใช้งาน
                                                                            </option>
                                                                          </select>
                                                                          <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                                                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                              <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            </svg>
                                                                          </span>
                                                                      </div>
                                                                  </div>
                                                                  <div class="mb-5 overflow-hidden rounded-lg">
                                                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                                                        สิทธิ์การใช้งาน
                                                                      </label>
                                                                      <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                                                          <select name="role" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                                                            :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                                                            @change="isOptionSelected = true">
                                                                            <option value="0"class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" selected>
                                                                              ผู้ใช้งานทั่วไป
                                                                            </option>
                                                                            <option value="1"class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" >
                                                                              ผู้ดูแลระบบ
                                                                            </option>
                                                                          </select>
                                                                          <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                                                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                              <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            </svg>
                                                                          </span>
                                                                      </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="d-flex align-items-center" style="justify-content:center">
                                                              <button class="px-3 py-2 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600" type="submit">บันทึก</button>
                                                            </div>
                                                        </div>
                                                      </form> 
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
    language: {
        url: '{{ asset('datatable/th.json') }}',
    },
});
</script>
@endpush
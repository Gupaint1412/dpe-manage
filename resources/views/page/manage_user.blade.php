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
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>สังกัด</th>
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
                                        <td>{{$i++}}</td>
                                        <td>{{$user->name}}&nbsp;{{$user->surname}}</td>
                                        <td>{{$user->affiliation}}</td>
                                        <td>{{$user->job_group}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>Edit</td>
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
  
    language: {
        url: '{{ asset('datatable/th.json') }}',
    },
});
</script>
@endpush
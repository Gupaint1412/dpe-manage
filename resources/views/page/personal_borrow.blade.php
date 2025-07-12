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
</style>
@endpush

@section('content')
@include('componants.partials.preloader')
<div class="flex h-screen overflow-hidden">
     @include('componants.sidebar')
     <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
         @include('componants.partials.header')
         <main>  
         </main>
     </div>
</div>
@endsection

@push('js')

@endpush
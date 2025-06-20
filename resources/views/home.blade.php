@extends('layouts.app')

@push('css')

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
            <div class="grid grid-cols-12 gap-4 md:gap-6">
              <div class="col-span-12 space-y-6 xl:col-span-7">
                <!-- Metric Group One -->               
                @include('componants.partials.metric-group.metric-group-01')
                <!-- Metric Group One -->
                <!-- ====== Chart One Start -->               
                @include('componants.partials.chart.chart-01')
                <!-- ====== Chart One End -->
              </div>
              <div class="col-span-12 xl:col-span-5">
                <!-- ====== Chart Two Start -->
                @include('componants.partials.chart.chart-02')
                <!-- ====== Chart Two End -->
              </div>
              <div class="col-span-12">                
              </div>
              <div class="col-span-12 xl:col-span-5">                
              </div>
              <div class="col-span-12 xl:col-span-7">                
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

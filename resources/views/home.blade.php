@extends('layouts.app')

@push('css')
<style>
  .d-flex {
    display: flex;
  }
  .align-items-center {
    align-items: center;
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
            <div class="grid grid-cols-12 gap-4 md:gap-6 mt-6">
              <div class="col-span-12 space-y-6 xl:col-span-12">
                <div class="grid grid-cols-1 gap-4">
                  <!-- Metric Item Start -->
                  <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="d-flex" style="justify-content: center;align-items:center;"> 
                      <i class="fa-regular fa-circle-check text-sm text-success-500 dark:text-success-500" style="padding-right:.25rem"></i> 
                      <h4 style="text-align: center;margin:0" class="text-sm text-gray-500 dark:text-gray-400">รายการเครื่องว่าง</h4>
                    </div>
                    <div style="padding-top:.25rem"><hr></div>
                    <div class="d-flex mt-3" style="justify-content: space-between">
                      <div class="d-flex">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                          <svg xmlns="http://www.w3.org/2000/svg"class="fill-gray-800 dark:fill-white/90" width="24" height="24"  fill="none" viewBox="0 0 640 512">                          
                            <path d="M128 32C92.7 32 64 60.7 64 96l0 256 64 0 0-256 384 0 0 256 64 0 0-256c0-35.3-28.7-64-64-64L128 32zM19.2 384C8.6 384 0 392.6 0 403.2C0 445.6 34.4 480 76.8 480l486.4 0c42.4 0 76.8-34.4 76.8-76.8c0-10.6-8.6-19.2-19.2-19.2L19.2 384z"/>
                          </svg>                        
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 d-flex align-items-center" style="padding-left: 1rem">Laptops</span>
                      </div>
                      <span class=" d-flex align-items-center font-medium  gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm  text-success-600 dark:bg-success-500/15 dark:text-success-500" >                        
                        12  เครื่อง
                      </span>
                    </div>
                    <div class="d-flex mt-3" style="justify-content: space-between">
                      <div class="d-flex">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                          {{-- <svg xmlns="http://www.w3.org/2000/svg"class="fill-gray-800 dark:fill-white/90" width="24" height="24"  fill="none" viewBox="0 0 640 512">                          
                            <path d="M128 32C92.7 32 64 60.7 64 96l0 256 64 0 0-256 384 0 0 256 64 0 0-256c0-35.3-28.7-64-64-64L128 32zM19.2 384C8.6 384 0 392.6 0 403.2C0 445.6 34.4 480 76.8 480l486.4 0c42.4 0 76.8-34.4 76.8-76.8c0-10.6-8.6-19.2-19.2-19.2L19.2 384z"/>
                          </svg>                         --}}
                          <svg  height="24" width="24" fill="none" class="fill-gray-800 dark:fill-white/90" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 363.09 363.09" xml:space="preserve">
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
                        9  เครื่อง
                      </span>
                    </div>
                    <div class="d-flex mt-3" style="justify-content: space-between">
                      <div class="d-flex">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                          <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-800 dark:fill-white/90" width="24" height="24"  fill="none" viewBox="0 0 512 512">
                            <path d="M64 32C28.7 32 0 60.7 0 96l0 64c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-64c0-35.3-28.7-64-64-64L64 32zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm48 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM64 288c-35.3 0-64 28.7-64 64l0 64c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-64c0-35.3-28.7-64-64-64L64 288zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm56 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/>
                          </svg>                         
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 d-flex align-items-center" style="padding-left: 1rem">Network</span>
                      </div>
                      <span class=" d-flex align-items-center font-medium  gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm  text-success-600 dark:bg-success-500/15 dark:text-success-500" >                        
                        12  เครื่อง
                      </span>
                    </div>
                  </div>
                  <!-- Metric Item End -->                                                           
                </div>
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


<aside
  :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
  class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 duration-300 ease-linear dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0"
  @click.outside="sidebarToggle = false"
>
  <!-- SIDEBAR HEADER -->
  <div
    :class="sidebarToggle ? 'justify-center' : 'justify-between'"
    class="sidebar-header flex items-center gap-2 pb-7 pt-8"
  >
    <a href="{{route('home')}}" class="d-flex">
      <span class="logo " :class="sidebarToggle ? 'hidden' : ''">
        <div class="d-flex" style="align-items:center;">
          <img class="dark:hidden" src="{{asset('Logo/DPE1.png')}}" alt="Logo" style="width: 44px;height:44px" />
          <h3 class="dark:hidden" style="padding-left:.5rem">DPE DeviceOps</h3>       
        </div>
        <div class="d-flex" style="align-items:center">
          <img class="hidden dark:block" src="{{asset('Logo/DPE1.png')}}" alt="Logo" style="width: 44px;height:44px"/>
          <h3 class="hidden dark:block dark:text-gray-400" style="padding-left: .5rem">DPE DeviceOps</h3>       
        </div>
      </span>
      
      <img class="logo-icon " :class="sidebarToggle ? 'lg:block' : 'hidden'" src="{{asset('Logo/DPE1.png')}}" alt="Logo" style="width: 44px;height:44px"/>
    </a>
  </div>
  <!-- SIDEBAR HEADER -->

  <div
    class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear"
  >
    <!-- Sidebar Menu -->
    <nav x-data="{selected: $persist('Dashboard')}">
      <!-- Menu Group -->
      <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
          <span
            class="menu-group-title"
            :class="sidebarToggle ? 'lg:hidden' : ''"
          >
            MENU
          </span>

          <svg
            :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
            class="menu-group-icon mx-auto fill-current"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
              fill=""
            />
          </svg>
        </h3>

        <ul class="mb-6 flex flex-col gap-4">
          <!-- Menu Item Dashboard -->
          <li>
            <a
              href="#"
              @click.prevent="selected = (selected === 'Dashboard' ? '':'Dashboard')"
              class="menu-item group {{ request()->is('home') ? 'menu-item-active' : '' }}"              
            >
              <svg
                :class="(selected === 'Dashboard') || (page === 'ecommerce' || page === 'analytics' || page === 'marketing' || page === 'crm' || page === 'stocks') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                class="menu-item-icon"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                  fill=""
                />
              </svg>

              <span
                class="menu-item-text dark:text-gray-400"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Dashboard
              </span>

              <svg
                class="menu-item-arrow {{ request()->is('home') ? 'menu-item-arrow-active' : '' }}"
                :class="[(selected === 'Dashboard') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]"
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585"
                  stroke=""
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>

            <!-- Dropdown Menu Start -->
            <div
              class="translate transform overflow-hidden "
              :class="(selected === 'Dashboard') ? 'block' :'hidden'"
            >
              <ul
                :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                class="menu-dropdown mt-2 flex flex-col gap-1 pl-9"
              >
                <li>
                  <a href="{{route('home')}}" class="menu-dropdown-item group curser_hover dark:text-gray-400 {{ request()->is('home') ? 'menu-dropdown-item-active' : '' }} {{request()->is('form_borrow_eq') ? 'menu-dropdown-item-active' : ''}} {{request()->is('personal_borrow/*') ? 'menu-dropdown-item-active' : ''}} ">
                    หน้าหลัก
                  </a>
                </li>
              </ul>
            </div>
            <!-- Dropdown Menu End -->
          </li>
          <!-- Menu Item Dashboard -->

          <!-- Menu Item Calendar -->
          <li>
            <a
              href="{{route('device')}}" class="menu-item group curser_hover {{ request()->is('device') ? 'menu-item-active' : '' }}  {{request()->is('add_device') ? 'menu-item-active' : ''}} {{ request()->is('edit_device/*') ? 'menu-item-active' : '' }}">
              <i class="fa-solid fa-laptop  {{ request()->is('device') ? 'menu-item-icon-active' : ''}} {{request()->is('add_device') ? 'menu-item-active' : ''}} dark:text-gray-400" style="width: 20px;height:20px"></i>              
              <span
                class="menu-item-text dark:text-gray-400"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                 อุปกรณ์ทั้งหมด
              </span>
            </a>
          </li>
          <!-- Menu Item Calendar -->
           <!-- Menu Item Calendar -->
          @if(Auth::user()->role == 1)
          <li>
            <a
              href="{{route('borrow_eq')}}" class="menu-item group curser_hover {{ request()->is('borrow_eq') ? 'menu-item-active' : '' }} {{ request()->is('manage_borrow/*') ? 'menu-item-active' : '' }} {{ request()->is('borrow_eq_stage/*') ? 'menu-item-active' : '' }}">
              <i class="fa-regular fa-file-lines {{ request()->is('borrow_eq') ? 'menu-item-icon-active' : ''}}  dark:text-gray-400" style="width: 20px;height:20px"></i>              
              <span
                class="menu-item-text dark:text-gray-400"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                 ข้อมูลการยืมอุปกรณ์
              </span>
            </a>
          </li>
          
          <li>
            <a
              href="{{route('manage_user')}}" class="menu-item group curser_hover {{ request()->is('manage_user') ? 'menu-item-active' : '' }}">            
            <i class="fa-regular fa-circle-user {{ request()->is('manage_user') ? 'menu-item-icon-active' : ''}}  dark:text-gray-400" style="width: 20px;height:20px"></i>
              <span
                class="menu-item-text dark:text-gray-400"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                จัดการผู้ใช้งาน
              </span>
            </a>
          </li>
           @endif  
          <li>
            <a
              href="https://forms.gle/Ct9icJzSgBL5Z9oC8" class="menu-item group curser_hover " target="_blank">            
            <i class="fa-regular fa-rectangle-list  dark:text-gray-400" style="width: 20px;height:20px"></i>
              <span
                class="menu-item-text dark:text-gray-400"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                แบบประเมินความพึงพอใจ
              </span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Sidebar Menu -->
  </div>
</aside>

<div class="fixed top-0 left-0 bottom-0 w-[280px] border-r">
  <div class="mt-[8%] ml-[4%]">
      <x-logo />
  </div>
  <div style="{{ $active === 1 ? 'background-color: rgba(201, 214, 223, 0.4)' : '' }}"
      class="mt-8 py-2 p-1 {{ $active === 1 ? 'mx-[4%] text-black2 border-l-4 pl-2 rounded-lg border-r-0 border-t-0 border-b-0 border-4 border-black2' : 'ml-[6%] ' }} hover:mx-[4%] hover:text-black2 hover:border-l-4 hover:pl-2 hover:rounded-lg hover:border-r-0 hover:border-t-0 hover:border-b-0 hover:border-4 hover:border-black2 transition-all duration-200">
      <a href="/dashboardE">
          <div class="flex items-center">
              <div class="mr-2 text-[17px]"><i class="fa-solid fa-chart-line"></i></div>
              <div class="font-semibold text-[18px]">Dashboard</div>
          </div>
      </a>
  </div>
  <div style="{{ $active === 2 ? 'background-color: rgba(201, 214, 223, 0.4)' : '' }}"
      class="mt-4 py-2 p-1 {{ $active === 2 ? 'mx-[4%] text-black2 border-l-4 pl-2 rounded-lg border-r-0 border-t-0 border-b-0 border-4 border-black2' : 'ml-[6%] ' }} hover:mx-[4%] hover:text-black2 hover:border-l-4 hover:pl-2 hover:rounded-lg hover:border-r-0 hover:border-t-0 hover:border-b-0 hover:border-4 hover:border-black2 transition-all duration-200">
      <a href="/profileE">
          <div class="flex items-center">
              <div class="mr-2 text-[17px]"><i class="fa-solid fa-chalkboard-user"></i></div>
              <div class="font-semibold text-[18px]">Profile</div>
          </div>
      </a>
  </div>
  <div style="{{ $active === 3 ? 'background-color: rgba(201, 214, 223, 0.4)' : '' }}"
      class="mt-4 py-2 p-1 {{ $active === 3 ? 'mx-[4%] text-black2 border-l-4 pl-2 rounded-lg border-r-0 border-t-0 border-b-0 border-4 border-black2' : 'ml-[6%] ' }} hover:mx-[4%] hover:text-black2 hover:border-l-4 hover:pl-2 hover:rounded-lg hover:border-r-0 hover:border-t-0 hover:border-b-0 hover:border-4 hover:border-black2 transition-all duration-200">
      <a href="/opinions">
          <div class="flex items-center">
              <div class="mr-2 text-[17px]"><i class="fa-regular fa-comments"></i></div>
              <div class="font-semibold text-[18px]">Opinions</div>
          </div>
      </a>
  </div>
  <div style="{{ $active === 4 ? 'background-color: rgba(201, 214, 223, 0.4)' : '' }}"
      class="mt-4 py-2 p-1 {{ $active === 4 ? 'mx-[4%] text-black2 border-l-4 pl-2 rounded-lg border-r-0 border-t-0 border-b-0 border-4 border-black2' : 'ml-[6%] ' }} hover:mx-[4%] hover:text-black2 hover:border-l-4 hover:pl-2 hover:rounded-lg hover:border-r-0 hover:border-t-0 hover:border-b-0 hover:border-4 hover:border-black2 transition-all duration-200">
      <a href="/history">
          <div class="flex items-center">
              <div class="mr-2 text-[17px]"><i class="fa-solid fa-clock-rotate-left"></i></div>
              <div class="font-semibold text-[18px]">Historique</div>
          </div>
      </a>
  </div>
</div>
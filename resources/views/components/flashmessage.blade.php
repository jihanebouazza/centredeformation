@if(session()->has('message'))
<div x-data="{ show:true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-2 left-1/3 text-md transform -translate-x-1/2 bg-white font-bold border-2 border-black1 text-black rounded-lg px-6 py-4 flex items-center animate__animated animate__bounceInDown">
  <div class="mr-2"><i class="fa-solid fa-info fa-lg"></i></div>
  <div>{{ session('message') }}</div>
</div>
@endif

@if(session()->has('error'))
<div x-data="{ show:true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-2 left-1/3 text-md transform -translate-x-1/2 bg-white font-bold border-2 border-[#ff0000] text-black rounded-lg px-6 py-4 flex items-center animate__animated animate__bounceInDown">
  <div class="mr-2"><i class="fa-solid fa-triangle-exclamation fa-lg" style="color: red;"></i></div>
  <div>{{ session('error') }}</div>
</div>
@endif

@if(session()->has('success'))
<div x-data="{ show:true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-2 left-1/3 text-md transform -translate-x-1/2 bg-white font-bold border-2 border-[#008000] text-black rounded-lg px-6 py-4 flex items-center animate__animated animate__bounceInDown">
  <div class="mr-2"><i class="fa-solid fa-circle-check fa-lg text-green" style="color: green;"></i></div>
  <div>{{ session('success') }}</div>
</div>
@endif

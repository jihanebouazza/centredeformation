@extends('layout')

@section('content')
<div id="header" class="sticky top-0 left-0 right-0 flex items-center justify-between bg-black1 py-8 px-6 z-50">
  <div>
      <x-logo id="logo" class="text-white" />
  </div>
</div>
    <div class="font-semibold text-center text-xl mt-4">
        Paiement réussi
    </div>
    <div class="flex justify-center items-center">
        <div>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_ynz5xr.json" background="transparent"
                speed="1" style="width: 500px; height: 500px;" loop autoplay></lottie-player>
        </div>

    </div>
@endsection

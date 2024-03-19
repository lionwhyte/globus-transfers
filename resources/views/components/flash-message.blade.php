@if (isset($success_message))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" aria-live="assertive" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white w-3/4 lg:w-1/2 text-center p-8"> {{-- alpine js metode su koristene za brisanje elementa nakon timeouta--}}
    <p>
        <i class="fa-solid fa-check"></i> {{ $success_message }}
    </p>
</div>
@elseif (isset($failed_message)) 
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" aria-live="assertive" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-amber-500 text-white w-3/4 lg:w-1/2 text-center p-8"> {{-- alpine js metode su koristene za brisanje elementa nakon timeouta--}}
    <p>
        <i class="fa-solid fa-triangle-exclamation"></i> {{ $failed_message }}
    </p>
</div>
@endif
@if (isset($breadcrumbs) && count($breadcrumbs))
    <nav aria-label="Breadcrumb" class="h-fit">
        <ol class="flex flex-wrap text-sm">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!$loop->last)
                    <li class="breadcrumb-item"><a class="p-1" href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
                    <span class="delimiter mx-2">/</span>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['title'] }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
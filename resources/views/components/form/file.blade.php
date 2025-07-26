@props(['name' => '', 'value' => '', 'label' => ''])

<div class="mx-3 px-3 my-1 w-100">
    <label for="{{ $name }}" class="my-1">{{ $label }}</label>
    <input type="file" id="{{ $name }}" style="visibility: hidden" name="{{ $name }}"
        value="{{ old($name, $value) }}" {{ $attributes }} onchange="showImage(event)"
        class="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-9 w-2/5 min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm">
    @if ($value)
        <label for="{{ $name }}">
            <img src="{{ $value }}" id="prevImage" width="150px" height="150px" class="rounded-xl"
                alt="{{ $name }}" />
        </label>
    @else
        <label for="{{ $name }}">
            <img src="{{ asset('images/uploadImage.png') }}" id="prevImage" width="350px" height="350px"
                class="rounded-xl" alt="{{ $name }}" />
        </label>
    @endif
</div>

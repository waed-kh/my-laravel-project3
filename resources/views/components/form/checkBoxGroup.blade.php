@props(['name' => '', 'items' => []])

<div class="mx-3 px-3 my-1 w-100">
    @foreach ($items as $item)
        <div class="flex items-center">
            <label for="{{ $name }}" class="my-1 mx-2">{{ $item->name }}</label>
            <input type="checkbox" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}"
                {{ $attributes }}
                class="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-4 w-4 min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm">
        </div>
    @endforeach
    @error($name)
        <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>

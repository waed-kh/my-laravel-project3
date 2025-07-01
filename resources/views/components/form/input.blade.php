@props(['name' => '', 'value' => '', 'hint' => '', 'label' => '', 'type' => 'text'])

<div class="mx-3 px-3 my-1 w-100">
    <label for="{{ $name }}" class="my-1">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }}" placeholder="{{ $hint }}" name="{{ $name }}"
        value="{{ old($name, $value) }}" {{ $attributes }}
        class="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-9 w-2/5 min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm">

    @error($name)
        <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>

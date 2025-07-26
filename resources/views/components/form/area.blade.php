@props(['name' => '', 'value' => '', 'hint' => '', 'label' => ''])

<div class="mx-3 px-3 my-1 w-100">
    <label for="{{ $name }}" class="my-1">{{ $label }}</label>
    <textarea id="{{ $name }}" placeholder="{{ $hint }}" name="{{ $name }}" {{ $attributes }}
        rows="5"
        class="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex w-2/5 min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm">{{ old($name, $value) }}</textarea>

    @error($name)
        <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>

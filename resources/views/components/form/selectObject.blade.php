@props(['name' => '', 'value' => '', 'items' => [], 'hint' => '', 'label' => '', 'type' => 'text'])

<div class="mx-3 px-3 my-1 w-100">
    <label for="{{ $name }}" class="my-1">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}"
        class="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-9 w-2/5 min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm">
        <option value="">{{ $hint }}</option>
        @foreach ($items as $item)
            <option value="{{ $item->id }}" @selected($value == $item->id || old($name) == $item->id)>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
</div>

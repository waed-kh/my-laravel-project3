@php
    $itemsDays = ['saturday', 'sunday', 'monday', 'tuesday', 'Wednesday', 'thursday', 'friday'];
    $itemsSlots = ['morning', 'afternoon', 'evening', 'all_day'];
@endphp

<x-form.select name="day" hint="اختر يوم العمل" label="اختر يوم العمل" :items='@$itemsDays' :value='@$workday->day' />
    @error('day')
    <small class=" text-red-600 mt-1">{{ $message }}</small>
@enderror
<x-form.select name="time_slot" hint=" اختر فترة توقيت العمل" label="اختر  توقيت العمل" :items='@$itemsSlots' :value='@$workday->time_slot' />
@error('time_slot')
    <small class=" text-red-600 ">{{ $message }}</small>
@enderror

<x-form.input type="time" name="from_time" hint="اختر بداية وقت العمل" label="Select From Time"
    value="{{ @$workday->from_time?->format('H:i') }}" />
<x-form.input type="time" name="to_time" hint=" اختر نهاية وقت العمل" label="Select To Time"
    value="{{ @$workday->to_time?->format('H:i') }}" />

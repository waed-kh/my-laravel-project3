@php
    $itemsDays = ['saturday', 'sunday', 'monday', 'tuesday', 'Wednesday', 'thursday', 'friday'];
    $itemsSlots = ['morning', 'afternoon', 'evening', 'all_day'];
@endphp

<x-form.select name="day" hint="Select Day Work" label="Select Day Work" :items='@$itemsDays' :value='@$workday->day' />
<x-form.select name="time_slot" hint="Select Time Slot" label="Select Time Slot" :items='@$itemsSlots' :value='@$workday->time_slot' />

<x-form.input type="time" name="from_time" hint="Enter From Time" label="Select From Time"
    value="{{ @$workday->from_time?->format('H:i') }}" />
<x-form.input type="time" name="to_time" hint="Enter To Time" label="Select To Time"
    value="{{ @$workday->to_time?->format('H:i') }}" />

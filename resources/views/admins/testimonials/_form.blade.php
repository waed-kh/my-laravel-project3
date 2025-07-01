<select id="project-category" name="user_id"
    class="w-2/5 px-4 mx-6 my-1 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 appearance-none pr-8"
    required>
    <option value="" disabled selected>
        اختر مستخدم
    </option>
    @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
</select>


<x-form.input name="rate" min="0" max="5" type="number" hint="Enter Testimonial Rate"
    label="Enter Testimonial Rate" :value='@$testimonial->rate' />
<x-form.area name="content" hint="Enter Testimonial Content" label="Enter Testimonial Content" :value='@$testimonial->name' />

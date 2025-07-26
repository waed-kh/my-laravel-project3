{{-- حقل المستخدم --}}
<div class="mb-4">
    <label for="project-category" class="block mb-1 text-sm font-medium text-gray-700" style="position: relative;right:30px; bettom:-30px; font-size:14px">
        اختر المستخدم
    </label>
    <select id="project-category" name="user_id"
        class="w-2/5 px-4 py-3 bg-gray-50 border {{ $errors->has('user_id') ? 'border-red-500' : 'border-gray-200' }} rounded text-gray-800 appearance-none pr-8 mx-6 my-1">
        <option value="" disabled {{ old('user_id', @$testimonial->user_id) ? '' : 'selected' }}>
           المستخدم
        </option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id', @$testimonial->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    @error('user_id')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- التقييم --}}
<x-form.input 
    name="rate" 
    type="number" 
    min="1" 
    max="5" 
    hint="ادخل التقييم من 1 إلى 5" 
    label="ادخل التقييم" 
    :value="old('rate', @$testimonial->rate)" 
/>

{{-- المحتوى --}}
<x-form.area 
    name="content" 
    hint="ادخل محتوى الرأي" 
    label="ادخل الرأي" 
    :value="old('content', @$testimonial->content)" 
/>

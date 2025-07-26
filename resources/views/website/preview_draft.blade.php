<div class="preview-container">
    <h2 class="preview-title">معاينة المسودة</h2>

    <ul class="preview-list">
        <li><span class="label">الاسم:</span> {{ $data['title'] }}</li>
        <li><span class="label">الوصف:</span> {{ $data['description'] }}</li>
        <li><span class="label">السعر:</span> ₪{{ $data['min_price'] }} - ₪{{ $data['max_price'] }}</li>
        <li><span class="label">الهاتف:</span> {{ $data['phone'] }}</li>
        <li><span class="label">البريد:</span> {{ $data['email'] }}</li>
        <li><span class="label">الموقع:</span> {{ $data['location'] }}</li>
    </ul>

    <form method="POST" action="{{ route('project.downloadDraftPDF') }}">
        @csrf
        @foreach ($data as $key => $value)
            @if(is_array($value))
                @foreach ($value as $item)
                    <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach

        <input type="hidden" name="download_pdf" value="1">

        <button type="submit" class="btn-submit">تأكيد وحفظ PDF</button>
    </form>
</div>

<style>
.preview-container {
    max-width: 600px;
    margin: 40px auto;
    padding: 30px 25px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    direction: rtl;
    color: #333;
}

.preview-title {
    text-align: center;
    margin-bottom: 30px;
    font-size: 28px;
    font-weight: 700;
}

.preview-list {
    list-style: none;
    padding: 0;
    margin-bottom: 30px;
}

.preview-list li {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    font-size: 17px;
}

.preview-list li:last-child {
    border-bottom: none;
}

.label {
    font-weight: 600;
    color: #555;
    min-width: 110px;
}

.btn-submit {
    width: 100%;
    padding: 12px 0;
    background-color: #0069d9;
    border: none;
    color: white;
    font-size: 18px;
    font-weight: 600;
    border-radius: 7px;
    cursor: pointer;
    transition: background-color 0.25s ease-in-out;
}

.btn-submit:hover {
    background-color: #0053ba;
}
</style>

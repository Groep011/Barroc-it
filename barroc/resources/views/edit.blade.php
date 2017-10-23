<form action="">
    <select name="" id="">
            @foreach($custormers as $custormer)
            <option value="{{ $custormer->credible }}">{{ $custormer->credible }}</option>
            @endforeach
    </select>
</form>
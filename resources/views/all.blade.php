@foreach($all_students as $item)
    {{ $item->student_name}}<br>
    {{ $item->student_email}}<br>
    @foreach($item->rPhone as $phone)
       {{ $phone->phone}}<br>
    @endforeach
@endforeach

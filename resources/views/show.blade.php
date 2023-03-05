@foreach($all_info as $item)
   Name: {{ $item->student_name }}<br>
   Mail: {{ $item->student_email }}<br>
@endforeach
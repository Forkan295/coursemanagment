@foreach ($students as $item)
<tr role="row" class="odd">
<td>{{ $item->student_id }}</td>
<td class="sorting_1">{{ $item->name }}</td>
<td>{{ $item->phone }}</td>
<td>{{ $item->course->course_name }}</td>
<td>{{ $item->batch->batch }}</td>
<td>{{ $item->paid }} TK</td>
<td>{{ $item->course->course_fees - $item->paid }} TK</td>
<td>
    <a class="btn btn-info btn-sm" href="{{ route('detailes.student', $item->id) }}">
        <i class="fa fa-eye"></i>
    </a>
</td>
</tr>
@endforeach
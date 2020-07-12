<label>Course</label>
<select class="form-control" name="course_id">
    <option selected disabled>Select course</option>
    @foreach ( $batch->courses as $item )
      <option value="{{ $item->id }}">{{ $item->course_name }}</option>
    @endforeach
</select>
<ul class="list-group text-center">
    <li class="list-group-item">
        <a class=" {{ setActive(['student.profile'],'text-info') }}" href="{{ route('student.profile') }}">
            Profile
        </a>
    </li>
    <li class="list-group-item">
        <a class=" {{ setActive(['recent.course'],'text-info') }}" href="{{ route('recent.course') }}">
            Recent Course
        </a>
    </li>
    <li class="list-group-item">
        <a class=" {{ setActive([''],'text-info') }}" href="#">Update profile info</a>
    </li>
    <li class="list-group-item">
        <a class=" {{ setActive([''],'text-info') }}" href="#">Change Password</a>
    </li>
    <li class="list-group-item">
        <a class=" {{ setActive([''],'text-info') }}" href="#">Sign Out</a>
    </li>
</ul>
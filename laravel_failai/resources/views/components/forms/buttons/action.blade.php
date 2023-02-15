<a href="{{route($mainRoute . '.edit', $model->id)}}" class="btn blue darken-4 me-5">Edit/Update</a>
<form action="{{route($mainRoute . '.destroy', $model->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn blue darken-4 mr-1">Delete</button>
</form>

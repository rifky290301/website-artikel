<form action="{{ $url }}" method="post" >
  @csrf
  @method('delete')
  <button type="submit" class="btn btn-danger btn-circle ml-2">
    <i class="fas fa-trash"></i>
  </button>
</form>
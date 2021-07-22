

<form action=" {{ route('admin.restaurants.destroy', $restaurant->id) }} " method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Cancella" class="btn btn-danger">
</form>
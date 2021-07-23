

<form action=" {{ route('admin.restaurants.destroy', $restaurant->id) }} " method="post" class="delete_form">
        @csrf
        @method('DELETE')
        <input type="submit" value="Cancella" class="btn btn-danger spacing">
</form>
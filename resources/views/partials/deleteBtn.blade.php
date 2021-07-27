<form action=" {{ route('admin.restaurants.destroy', $restaurant->id) }} " method="post" class="delete_form">
        @csrf
        @method('DELETE')
        <input type="submit" value="Cancella" class="btn btn-danger mg-top-bot-10">
</form>
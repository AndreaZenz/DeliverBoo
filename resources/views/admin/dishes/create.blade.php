@section('content')
<div class="container">
    <form action=" {{ route('admin.dish.store') }} " method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Dish name</label>
        <input type="text" name="name" id="name">
        <label for="description">description</label>
        <input type="text" name="description" id="description">
        <div class="form-group">
            <label>Aggiungi l'immagine del piatto</label>
            <input type="file" name="img_url" accept=".jpg,.png" class="form-control-file">
        </div>
        
        <input type="submit" value="invia">
        
    </form>
</div>
@endsection
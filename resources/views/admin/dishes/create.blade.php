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

        <label for="ingredient_list">Lista degli ingredienti</label>
        <input type="text" name="ingredient_list" id="ingredient_list">

        <label for="price">price</label>
        <input type="text" name="price" id="price">

        <input type="checkbox" name="visible" id="visible">

        <input type="submit" value="invia">
        
    </form>
</div>
@endsection
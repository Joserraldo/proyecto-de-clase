@extends ('layout.app')
@section('title', 'Crear nuevo producto')
@section ('content')
    <div class="container">
        <div class="form-card">
            <h2 align="center">Crear Nuevo Producto</h2>
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <label>Nombre del Producto</label><br>
                <input type="text" name="nombre" style="width:100%; margin-bottom:15px;" required>

                <label>Precio</label><br>
                <input type="number" step="0.01" name="precio" style="width:100%; margin-bottom:15px;" required>

                <label>Descripción</label><br>
                <textarea name="descripcion" rows="4" style="width:100%; margin-bottom:15px;"></textarea>

                <label>URL de la Imagen</label><br>
                <input type="file" id = "imagen "name="imagen" accept="image/*" style="width:100%; margin-bottom:15px;">

                <label>Categoria</label><br>
                <select id = "categoria" name="categoria" style="width:100%; margin-bottom:20px;">
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn-amazon">Agregar a la tienda</button>
            </form>
        </div>
    </div>
@endsection
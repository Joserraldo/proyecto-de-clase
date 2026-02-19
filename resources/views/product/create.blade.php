@extends ('layout.app')
@section('title', 'Crear nuevo producto')
@section ('content')
    <div class="container">
        <div class="form-card">
            <h2 align="center">Crear Nuevo Producto</h2>
            <form action="#" method="POST">
                @csrf
                <label>Nombre del Producto</label><br>
                <input type="text" name="nombre" style="width:100%; margin-bottom:15px;" required>

                <label>Precio</label><br>
                <input type="number" step="0.01" name="precio" style="width:100%; margin-bottom:15px;" required>

                <label>Descripción</label><br>
                <textarea name="descripcion" rows="4" style="width:100%; margin-bottom:15px;"></textarea>

                <label>URL de la Imagen</label><br>
                <input type="text" name="imagen" placeholder="https://..." style="width:100%; margin-bottom:15px;">

                <label>Estado</label><br>
                <select name="estado" style="width:100%; margin-bottom:20px;">
                    <option value="Disponible">Disponible</option>
                    <option value="Agotado">Agotado</option>
                </select>

                <button type="submit" class="btn-amazon">Agregar a la tienda</button>
            </form>
        </div>
    </div>
@endsection
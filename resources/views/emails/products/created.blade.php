<!DOCTYPE html>
<html>
<body>
<h1>Producto Creado</h1>
<div>
    Nombre: {{ $product->name }}
</div><div>
    Estado: {{ $product->status === 1? 'Activo' : 'Inactivo'  }}
</div>

</body>
</html>

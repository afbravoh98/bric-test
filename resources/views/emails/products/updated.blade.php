<!DOCTYPE html>
<html>
<body>
<h1>Producto Atualizado!</h1>
<div>
    Nombre: {{ $product->name }}
</div>
<div>
    Estado: {{ $product->status === 1? 'Activo' : 'Inactivo'  }}
</div>
<div>
    Fecha de actualización: {{ $product->updated_at  }}
</div>
</body>
</html>

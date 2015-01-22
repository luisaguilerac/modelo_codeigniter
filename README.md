# modelo_codeigniter
Modelo genérico para CodeIgniter con funcionalidades principales en el manejo de la base de datos

Modelo que se encarga de hacer las consultas principales a la base de datos, teniendo un manejo fácil y rápido de este.


Primera función: Listado
Permite listar los datos de una tabla de una base de datos.

Parámetros:
$tabla : nombre de la tabla de la base de datos (Ejemplo: usuario)
$strAtributos: atributos y columnas que se requieren obtener (Ejemplo: * , nombre,apellido)
$strInner : Inner join para mezclar una o más tablas (Ejemplo: inner join cuenta on cuenta.IdUsuario = usuario.IdCuenta)
$strConsulta: La consulta que se desea obtener (Ejemplo: and nombre = "Luis")

Estructura:
function listado($tabla, $strAtributos, $strInner, $strConsulta) {
        $query = $this->db->query("select " . $strAtributos . " from " . $tabla . " " . $strInner . " where 1=1 " . $strConsulta);
        return $query->result_array();
}



Segunda función: Actualizar
Permite actualiza un dato de un registro de una base de datos.

Parámetros:
$tabla : nombre de la tabla de la base de datos (Ejemplo: usuario)
$strId: nombre del campo primaryKey (Ejemplo: rut)
$id : valor del Id (Ejemplo: 134231-4)
$data: Arreglo del los datos modificados (Ejemplo: $data['nombre'] = "Luis")

Estructura:
 function actualizar($tabla, $strId, $id, $data) {
        $this->db->where($strId, $id);
        $this->db->update($tabla, $data);
 }
 
 
Tercera función: Ingresar
Permite Ingresar un dato de un registro de una base de datos.

Parámetros:
$tabla : nombre de la tabla de la base de datos (Ejemplo: usuario)
$data: Arreglo del los datos ingresados (Ejemplo: $data['nombre'] = "Luis")

Estructura:
 function ingreso($tabla, $data) {
        $this->db->insert($tabla, $data);
    }
 
 
 // Existen más funciones genéricas para el uso de la base de datos, como eliminar, listar bases de datos, etc...

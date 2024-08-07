<?php
$id = $_GET['txtID']; 

// Conecta a la base de datos y ejecuta la consulta SQL
include("./administrador/configuracion/bd.php"); 

$query = "SELECT distancia_recorrido, precio_km FROM rec_turisticos WHERE id = $id";
$resultado = mysqli_query($conn, $query);

// Verifica si la consulta fue exitosa
if ($resultado) {
    // Obtiene los datos del resultado de la consulta
    $fila = mysqli_fetch_assoc($resultado);

    // Extrae la distancia recorrida y el precio por kilómetro
    $distancia_recorrida = $fila['distancia_recorrido'];
    $precio_km = $fila['precio_km'];

    // Calcula el monto total del viaje
    $monto_total = $distancia_recorrida * $precio_km;
} else {
    // Maneja el caso en que la consulta falle
    $monto_total = 0; 
}

if (isset($_GET['txtID'])) {
    $txtID = $_GET['txtID'];
    echo "ID del destino turístico: " . $txtID;
} else {
    echo "No se recibió el ID del destino turístico.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Pagos</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        #paypal-button-container {
            width: 300px; 
            height: 100px; 
        }
    </style>
</head>
<body>
    
    <h1> ¡Medios de pago!</h1>
    <br>
    
    <script src="https://www.paypal.com/sdk/js?client-id=AX1L_uDZqsObkzFH3I39hElDNtJ6s6XUOXzRmdsXW9WxKC0V_ykh-yRU90EeEzB6GOVlRWeMQzPbfTE2&currency=USD"></script>


 
    <div id="paypal-button-container"></div>
    <br>
    <br>
    <br>
    <a href="index.php" class="btn" style="background-color: black; color: white;">Volver</a>

    <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $monto_total; ?>' 
                
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
           
            alert('Pago completado por ' + details.payer.name.given_name);
          });
        }
      }).render('#paypal-button-container');
    </script>

</body>
</html>
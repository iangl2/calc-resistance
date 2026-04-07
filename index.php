<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Primera Página con PHP</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        header { background: #333; color: white; padding: 10px; text-align: center; }
        .container { margin-top: 20px; border: 1px solid #ddd; padding: 15px; }
        #resistance { display: flex; justify-content: space-evenly; align-items: center; margin-bottom: 20px; background-color: bisque ;height: 100px; width: 400px;}
       
    </style>
</head>
<body>

    <header>
        <?php 
            $titulo = "Calculadora de Resistencias";
            echo "<h1>$titulo</h1>"; 
        ?>
    </header>

    <main class="container">
        <section>
            <h2>Calculadora de Resistencias Eléctricas</h2>
            <p>Esta calculadora te permite calcular el valor de una resistencia basada en sus bandas de colores. Selecciona los colores de las bandas y obtén el valor en ohmios.</p>
            
            <div style="text-align: center;  width:100dvw; display: flex; align-items: center; justify-content: center;">
                <div id="resistance">
                    <div id="banda1" style="width: 30px; height: 100%; background-color: #000;"></div>

                    <div id="banda2" style="width: 30px; height: 100%; background-color: #8B4513;">
                        </div>
                    <div id="banda3" style="width: 30px; height: 100%; background-color: #FF0000;">
                </div>
                        
                    <div id="banda4" style="width: 30px; height: 100%; background-color: #808080;">
                </div>
                    </div>

                </div>
            
            <form method="post" action="">
                <label for="banda1">Primera banda (dígito 1):</label>
                <select name="banda1" id="banda1_select">
                    <option value="0" data-color="#000000">Negro (0)</option>
                    <option value="1" data-color="#8B4513">Marrón (1)</option>
                    <option value="2" data-color="#FF0000">Rojo (2)</option>
                    <option value="3" data-color="#FFA500">Naranja (3)</option>
                    <option value="4" data-color="#FFFF00">Amarillo (4)</option>
                    <option value="5" data-color="#008000">Verde (5)</option>
                    <option value="6" data-color="#0000FF">Azul (6)</option>
                    <option value="7" data-color="#800080">Violeta (7)</option>
                    <option value="8" data-color="#808080">Gris (8)</option>
                    <option value="9" data-color="#FFFFFF">Blanco (9)</option>
                </select><br><br>
                
                <label for="banda2">Segunda banda (dígito 2):</label>
                <select name="banda2" id="banda2_select">
                    <option value="0" data-color="#000000">Negro (0)</option>
                    <option value="1" data-color="#8B4513">Marrón (1)</option>
                    <option value="2" data-color="#FF0000">Rojo (2)</option>
                    <option value="3" data-color="#FFA500">Naranja (3)</option>
                    <option value="4" data-color="#FFFF00">Amarillo (4)</option>
                    <option value="5" data-color="#008000">Verde (5)</option>
                    <option value="6" data-color="#0000FF">Azul (6)</option>
                    <option value="7" data-color="#800080">Violeta (7)</option>
                    <option value="8" data-color="#808080">Gris (8)</option>
                    <option value="9" data-color="#FFFFFF">Blanco (9)</option>
                </select><br><br>
                
                <label for="banda3">Tercera banda (multiplicador):</label>
                <select name="banda3" id="banda3_select">
                    <option value="1" data-color="#000000">Negro (×1)</option>
                    <option value="10" data-color="#8B4513">Marrón (×10)</option>
                    <option value="100" data-color="#FF0000">Rojo (×100)</option>
                    <option value="1000" data-color="#FFA500">Naranja (×1K)</option>
                    <option value="10000" data-color="#FFFF00">Amarillo (×10K)</option>
                    <option value="100000" data-color="#008000">Verde (×100K)</option>
                    <option value="1000000" data-color="#0000FF">Azul (×1M)</option>
                    <option value="10000000" data-color="#800080">Violeta (×10M)</option>
                    <option value="0.1" data-color="#FFD700">Dorado (×0.1)</option>
                    <option value="0.01" data-color="#C0C0C0">Plateado (×0.01)</option>
                </select><br><br>
                
                <label for="banda4">Cuarta banda (tolerancia):</label>
                <select name="banda4" id="banda4_select">
                    <option value="0.05" data-color="#8B4513">Marrón (±1%)</option>
                    <option value="0.1" data-color="#FF0000">Rojo (±2%)</option>
                    <option value="0.05" data-color="#008000">Verde (±0.5%)</option>
                    <option value="0.05" data-color="#0000FF">Azul (±0.25%)</option>
                    <option value="0.05" data-color="#800080">Violeta (±0.1%)</option>
                    <option value="0.05" data-color="#808080">Gris (±0.05%)</option>
                    <option value="0.1" data-color="#FFD700">Dorado (±5%)</option>
                    <option value="0.2" data-color="#C0C0C0">Plateado (±10%)</option>
                </select><br><br>
                
                <input type="submit" value="Calcular">
            </form>
            
            <div id="resultado" style="margin-top: 20px; padding: 10px; border: 1px solid #ddd;">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $digito1 = intval($_POST['banda1']);
                    $digito2 = intval($_POST['banda2']);
                    $multiplicador = floatval($_POST['banda3']);
                    $tolerancia = floatval($_POST['banda4']);
                    
                    $valor = ($digito1 * 10 + $digito2) * $multiplicador;
                    
                    echo "<h3>Resultado:</h3>";
                    echo "<p>Valor de la resistencia: " . number_format($valor, 2) . " Ω</p>";
                    echo "<p>Tolerancia: ±" . ($tolerancia * 100) . "%</p>";
                } else {
                    echo "<p>Selecciona los colores y calcula el valor.</p>";
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> - Ian Lee & Javier Sánchez</p>
    </footer>

    <script>
        // Función para actualizar el color de las bandas en el SVG
        function updateBandas() {
            const banda1Color = document.getElementById('banda1_select').selectedOptions[0].getAttribute('data-color');
            const banda2Color = document.getElementById('banda2_select').selectedOptions[0].getAttribute('data-color');
            const banda3Color = document.getElementById('banda3_select').selectedOptions[0].getAttribute('data-color');
            const banda4Color = document.getElementById('banda4_select').selectedOptions[0].getAttribute('data-color');
            
            document.getElementById('banda1').style.backgroundColor = banda1Color;
            document.getElementById('banda2').style.backgroundColor = banda2Color;
            document.getElementById('banda3').style.backgroundColor = banda3Color;
            document.getElementById('banda4').style.backgroundColor = banda4Color;
        }
        
        // Agregar event listeners a los selects
        document.getElementById('banda1_select').addEventListener('change', updateBandas);
        document.getElementById('banda2_select').addEventListener('change', updateBandas);
        document.getElementById('banda3_select').addEventListener('change', updateBandas);
        document.getElementById('banda4_select').addEventListener('change', updateBandas);
        
        // Inicializar colores
        updateBandas();
    </script>

</body>
</html>
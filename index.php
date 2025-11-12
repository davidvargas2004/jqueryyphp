<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concesionario - Gestión de Vehículos</title>
    
    <!-- jQuery Mobile CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    
    <!-- jQuery y jQuery Mobile JS -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    <style>
        /* Paleta de colores: Negro, Gris, Azul */
        * {
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d3436 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .ui-page {
            background: transparent !important;
        }
        
        .ui-header {
            background: linear-gradient(135deg, #0984e3 0%, #0652DD 100%) !important;
            border: none !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        
        .ui-header h1 {
            color: #ffffff !important;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-weight: bold;
            font-size: 1.2em;
        }
        
        .ui-content {
            background: rgba(45, 52, 54, 0.95) !important;
            border-radius: 15px;
            margin: 10px;
            padding: 15px !important;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
        }
        
        .ui-btn {
            background: linear-gradient(135deg, #0984e3 0%, #0652DD 100%) !important;
            border: none !important;
            color: #ffffff !important;
            text-shadow: none !important;
            font-weight: bold;
            border-radius: 8px !important;
            box-shadow: 0 4px 8px rgba(9, 132, 227, 0.3);
            transition: all 0.3s ease;
            padding: 10px 16px !important;
        }
        
        .ui-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(9, 132, 227, 0.5);
        }
        
        .ui-btn-delete {
            background: linear-gradient(135deg, #d63031 0%, #c0392b 100%) !important;
        }
        
        .ui-btn-edit {
            background: linear-gradient(135deg, #fdcb6e 0%, #f39c12 100%) !important;
        }
        
        label {
            color: #dfe6e9 !important;
            font-weight: 600;
            margin-top: 10px;
            display: block;
        }
        
        input, select, textarea {
            background: #2d3436 !important;
            color: #ffffff !important;
            border: 2px solid #636e72 !important;
            border-radius: 8px !important;
            padding: 12px !important;
            width: 100%;
            font-size: 16px;
        }
        
        input:focus, select:focus, textarea:focus {
            border-color: #0984e3 !important;
            box-shadow: 0 0 10px rgba(9, 132, 227, 0.5);
            outline: none;
        }
        
        small {
            color: #b2bec3;
            font-size: 0.85em;
            display: block;
            margin-top: 5px;
        }
        
        .vehicle-card {
            background: linear-gradient(135deg, #2d3436 0%, #34495e 100%);
            border-radius: 15px;
            padding: 15px;
            margin: 15px 0;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            border-left: 5px solid #0984e3;
            transition: all 0.3s ease;
        }
        
        .vehicle-card:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 16px rgba(9, 132, 227, 0.3);
        }
        
        .vehicle-card h3 {
            color: #74b9ff;
            margin: 0 0 10px 0;
            font-size: 1.3em;
        }
        
        .vehicle-card p {
            color: #dfe6e9;
            margin: 8px 0;
            font-size: 0.95em;
        }
        
        .vehicle-card strong {
            color: #0984e3;
        }
        
        .vehicle-image {
            width: 100%;
            height: auto;
            max-height: 250px;
            object-fit: cover;
            border-radius: 10px;
            margin: 0 0 15px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border: 3px solid #636e72;
        }
        
        .stats-container {
            background: linear-gradient(135deg, #0984e3 0%, #0652DD 100%);
            border-radius: 10px;
            padding: 20px;
            margin: 0 0 20px 0;
            text-align: center;
            box-shadow: 0 4px 8px rgba(9, 132, 227, 0.4);
        }
        
        .stats-container h2 {
            color: #ffffff;
            margin: 0;
            font-size: 2.5em;
        }
        
        .stats-container p {
            color: #dfe6e9;
            margin: 5px 0 0 0;
            font-size: 1.1em;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #b2bec3;
        }
        
        .empty-state img {
            width: 150px;
            opacity: 0.5;
            margin-bottom: 20px;
        }
        
        .empty-state h3 {
            color: #b2bec3;
            margin: 15px 0;
        }
        
        .empty-state p {
            color: #636e72;
        }
        
        .ui-listview > li {
            background: transparent !important;
            border: none !important;
        }
        
        .precio-tag {
            background: linear-gradient(135deg, #00b894 0%, #00cec9 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            display: inline-block;
            font-weight: bold;
            font-size: 1.1em;
            box-shadow: 0 3px 6px rgba(0, 184, 148, 0.4);
        }
        
        .badge {
            background: #636e72;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.85em;
            margin-left: 5px;
        }

        /* Grid responsive para vehículos */
        #vehiculos-lista ul {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        /* Botones del formulario - full width en móvil */
        #form-vehiculo .ui-btn {
            width: 100%;
            margin-bottom: 10px;
        }

        /* Contenedor de acciones dentro de cada card */
        .actions {
            margin-top: 15px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        
        .actions .ui-btn {
            flex: 1 1 auto;
            min-width: 120px;
        }

        /* Tablet: 2 columnas y layout horizontal de cards */
        @media (min-width: 600px) {
            .ui-header h1 {
                font-size: 1.5em;
            }
            
            .ui-content {
                padding: 20px !important;
            }
            
            #vehiculos-lista ul {
                grid-template-columns: repeat(2, 1fr);
            }

            .vehicle-card {
                display: flex;
                flex-direction: row;
                align-items: flex-start;
                gap: 16px;
            }
            
            .vehicle-card-image-container {
                flex: 0 0 45%;
            }

            .vehicle-image {
                width: 100%;
                max-height: 220px;
                margin: 0;
            }
            
            .vehicle-card-content {
                flex: 1;
            }

            .vehicle-card h3 {
                font-size: 1.2em;
                margin-top: 0;
            }

            /* Botones del form en línea */
            #form-vehiculo .ui-btn {
                width: auto;
                display: inline-block;
                margin-right: 10px;
                margin-bottom: 0;
            }
            
            .stats-container h2 {
                font-size: 3em;
            }
        }

        /* Desktop: 3 columnas */
        @media (min-width: 1000px) {
            #vehiculos-lista ul {
                grid-template-columns: repeat(3, 1fr);
            }

            .vehicle-image {
                max-height: 200px;
            }
            
            .ui-content {
                max-width: 1400px;
                margin: 10px auto;
            }
        }
        
        /* Ajustes para pantallas muy pequeñas */
        @media (max-width: 380px) {
            .ui-header h1 {
                font-size: 1em;
            }
            
            .actions .ui-btn {
                font-size: 0.85em;
                padding: 8px 12px !important;
                min-width: 100px;
            }
            
            .stats-container h2 {
                font-size: 2em;
            }
            
            .vehicle-card h3 {
                font-size: 1.1em;
            }
        }
    </style>
</head>
<body>

<!-- Página Principal - Lista de Vehículos -->
<div data-role="page" id="home">
    <div data-role="header" data-position="fixed">
        <h1>🚗 Concesionario Virtual</h1>
        <a href="#create" data-icon="plus" class="ui-btn-right">Agregar</a>
    </div>
    
    <div role="main" class="ui-content">
        <div class="stats-container">
            <h2 id="total-vehiculos">0</h2>
            <p>Vehículos Registrados</p>
        </div>
        
        <div id="vehiculos-lista"></div>
    </div>
</div>

<!-- Página de Creación de Vehículo -->
<div data-role="page" id="create">
    <div data-role="header" data-position="fixed">
        <a href="#home" data-icon="back">Volver</a>
        <h1>Nuevo Vehículo</h1>
    </div>
    
    <div role="main" class="ui-content">
        <form id="form-vehiculo">
            <input type="hidden" id="vehiculo-id">
            
            <label for="nombre">Nombre del Vehículo:</label>
            <input type="text" id="nombre" name="nombre" required placeholder="Ej: Mustang GT">
            
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required placeholder="Ej: 2024">
            
            <label for="fabricante">Fabricante:</label>
            <select id="fabricante" name="fabricante" required>
                <option value="">Seleccione...</option>
                <option value="Ford">Ford</option>
                <option value="Chevrolet">Chevrolet</option>
                <option value="Toyota">Toyota</option>
                <option value="Honda">Honda</option>
                <option value="BMW">BMW</option>
                <option value="Mercedes-Benz">Mercedes-Benz</option>
                <option value="Audi">Audi</option>
                <option value="Nissan">Nissan</option>
                <option value="Mazda">Mazda</option>
                <option value="Volkswagen">Volkswagen</option>
            </select>
            
            <label for="pais">País de Origen:</label>
            <select id="pais" name="pais" required>
                <option value="">Seleccione...</option>
                <option value="Estados Unidos">Estados Unidos</option>
                <option value="Japón">Japón</option>
                <option value="Alemania">Alemania</option>
                <option value="Corea del Sur">Corea del Sur</option>
                <option value="Italia">Italia</option>
                <option value="Francia">Francia</option>
                <option value="Reino Unido">Reino Unido</option>
            </select>
            
            <label for="precio">Precio (USD):</label>
            <input type="number" id="precio" name="precio" required placeholder="Ej: 45000" min="0" step="100">
            
            <label for="imagen">URL de la Imagen:</label>
            <input type="url" id="imagen" name="imagen" required placeholder="https://ejemplo.com/imagen.jpg">
            <small>Puede usar imágenes de ejemplo de sitios como: unsplash.com, pexels.com</small>
            
            <div style="margin-top: 20px;">
                <button type="submit" class="ui-btn ui-corner-all" id="btn-submit">Guardar Vehículo</button>
                <button type="button" class="ui-btn ui-corner-all ui-btn-delete" id="btn-cancelar">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<!-- Página de Detalle del Vehículo -->
<div data-role="page" id="detalle">
    <div data-role="header" data-position="fixed">
        <a href="#home" data-icon="back">Volver</a>
        <h1>Detalle del Vehículo</h1>
    </div>
    
    <div role="main" class="ui-content">
        <div id="detalle-contenido"></div>
    </div>
</div>

<script>
// Clase Vehicle - Modelo
class Vehicle {
    constructor(nombre, modelo, fabricante, pais, precio, imagen) {
        this.id = Date.now().toString() + Math.random().toString(36).substr(2, 9);
        this.nombre = nombre;
        this.modelo = modelo;
        this.fabricante = fabricante;
        this.pais = pais;
        this.precio = parseFloat(precio);
        this.imagen = imagen;
        this.fechaCreacion = new Date().toISOString();
    }
}

// VehicleController - Controlador
class VehicleController {
    constructor() {
        this.storageKey = 'concesionario_vehiculos';
        this.init();
    }
    
    init() {
        this.cargarVehiculos();
        this.setupEventListeners();
    }
    
    // Obtener todos los vehículos del localStorage
    getVehiculos() {
        try {
            const data = localStorage.getItem(this.storageKey);
            return data ? JSON.parse(data) : [];
        } catch (error) {
            console.error('Error al leer localStorage:', error);
            return [];
        }
    }
    
    // Guardar vehículos en localStorage
    saveVehiculos(vehiculos) {
        try {
            localStorage.setItem(this.storageKey, JSON.stringify(vehiculos));
            return true;
        } catch (error) {
            console.error('Error al guardar en localStorage:', error);
            alert('Error al guardar los datos. Por favor, intente nuevamente.');
            return false;
        }
    }
    
    // Crear nuevo vehículo
    createVehiculo(vehiculoData) {
        const vehiculos = this.getVehiculos();
        const nuevoVehiculo = new Vehicle(
            vehiculoData.nombre,
            vehiculoData.modelo,
            vehiculoData.fabricante,
            vehiculoData.pais,
            vehiculoData.precio,
            vehiculoData.imagen
        );
        vehiculos.push(nuevoVehiculo);
        this.saveVehiculos(vehiculos);
        return nuevoVehiculo;
    }
    
    // Leer un vehículo por ID
    readVehiculo(id) {
        const vehiculos = this.getVehiculos();
        return vehiculos.find(v => v.id === id);
    }
    
    // Actualizar vehículo
    updateVehiculo(id, vehiculoData) {
        const vehiculos = this.getVehiculos();
        const index = vehiculos.findIndex(v => v.id === id);
        if (index !== -1) {
            vehiculos[index] = {
                ...vehiculos[index],
                nombre: vehiculoData.nombre,
                modelo: vehiculoData.modelo,
                fabricante: vehiculoData.fabricante,
                pais: vehiculoData.pais,
                precio: parseFloat(vehiculoData.precio),
                imagen: vehiculoData.imagen
            };
            this.saveVehiculos(vehiculos);
            return vehiculos[index];
        }
        return null;
    }
    
    // Eliminar vehículo
    deleteVehiculo(id) {
        let vehiculos = this.getVehiculos();
        vehiculos = vehiculos.filter(v => v.id !== id);
        this.saveVehiculos(vehiculos);
    }
    
    // Cargar y mostrar vehículos
    cargarVehiculos() {
        const vehiculos = this.getVehiculos();
        const lista = $('#vehiculos-lista');
        const total = $('#total-vehiculos');
        
        total.text(vehiculos.length);
        
        if (vehiculos.length === 0) {
            lista.html(`
                <div class="empty-state">
                    <img src="https://cdn-icons-png.flaticon.com/512/3774/3774278.png" alt="Sin vehículos">
                    <h3>No hay vehículos registrados</h3>
                    <p>Agrega tu primer vehículo usando el botón "Agregar"</p>
                </div>
            `);
            return;
        }
        
        let html = '<ul data-role="listview" data-inset="true">';
        vehiculos.forEach(vehiculo => {
            html += `
                <li class="vehicle-card">
                    <div class="vehicle-card-image-container">
                        <img src="${vehiculo.imagen}" alt="${vehiculo.nombre}" class="vehicle-image" 
                             onerror="this.src='https://via.placeholder.com/400x250/2d3436/ffffff?text=Sin+Imagen'">
                    </div>
                    <div class="vehicle-card-content">
                        <h3>🚗 ${vehiculo.nombre}</h3>
                        <p><strong>Modelo:</strong> <span class="badge">${vehiculo.modelo}</span></p>
                        <p><strong>Fabricante:</strong> ${vehiculo.fabricante}</p>
                        <p><strong>País:</strong> ${vehiculo.pais}</p>
                        <p><strong>Precio:</strong> <span class="precio-tag">$${vehiculo.precio.toLocaleString('es-CO')}</span></p>
                        <div class="actions">
                            <button class="ui-btn ui-btn-inline btn-ver" data-id="${vehiculo.id}">Ver Detalle</button>
                            <button class="ui-btn ui-btn-inline ui-btn-edit btn-editar" data-id="${vehiculo.id}">Editar</button>
                            <button class="ui-btn ui-btn-inline ui-btn-delete btn-eliminar" data-id="${vehiculo.id}">Eliminar</button>
                        </div>
                    </div>
                </li>
            `;
        });
        html += '</ul>';
        
        lista.html(html);
        
        try {
            lista.find('ul').listview();
        } catch (e) {
            // jQuery Mobile puede no estar completamente listo
        }
        
        // Eventos de botones
        $('.btn-ver').off('click').on('click', function() {
            const id = $(this).data('id');
            controller.verDetalle(id);
        });
        
        $('.btn-editar').off('click').on('click', function() {
            const id = $(this).data('id');
            controller.editarVehiculo(id);
        });
        
        $('.btn-eliminar').off('click').on('click', function() {
            const id = $(this).data('id');
            controller.eliminarVehiculo(id);
        });
    }
    
    // Ver detalle del vehículo
    verDetalle(id) {
        const vehiculo = this.readVehiculo(id);
        if (vehiculo) {
            const detalle = $('#detalle-contenido');
            detalle.html(`
                <div class="vehicle-card" style="text-align: center;">
                    <img src="${vehiculo.imagen}" alt="${vehiculo.nombre}" class="vehicle-image" 
                         onerror="this.src='https://via.placeholder.com/400x250/2d3436/ffffff?text=Sin+Imagen'"
                         style="max-width: 600px; margin: 0 auto 20px auto;">
                    <h2 style="color: #74b9ff; margin: 20px 0;">${vehiculo.nombre}</h2>
                    <div style="text-align: left; margin: 20px 0;">
                        <p><strong>🏭 Fabricante:</strong> ${vehiculo.fabricante}</p>
                        <p><strong>📅 Modelo:</strong> ${vehiculo.modelo}</p>
                        <p><strong>🌍 País de Origen:</strong> ${vehiculo.pais}</p>
                        <p><strong>💰 Precio:</strong> <span class="precio-tag">$${vehiculo.precio.toLocaleString('es-CO')} USD</span></p>
                        <p><strong>📆 Fecha de Registro:</strong> ${new Date(vehiculo.fechaCreacion).toLocaleDateString('es-CO')}</p>
                    </div>
                    <div class="actions" style="justify-content: center; margin-top: 20px;">
                        <button class="ui-btn ui-btn-edit" onclick="controller.editarVehiculo('${vehiculo.id}')">Editar Vehículo</button>
                        <button class="ui-btn ui-btn-delete" onclick="controller.eliminarVehiculo('${vehiculo.id}')">Eliminar Vehículo</button>
                    </div>
                </div>
            `);
            $.mobile.changePage('#detalle');
        }
    }
    
    // Editar vehículo
    editarVehiculo(id) {
        const vehiculo = this.readVehiculo(id);
        if (vehiculo) {
            $('#vehiculo-id').val(vehiculo.id);
            $('#nombre').val(vehiculo.nombre);
            $('#modelo').val(vehiculo.modelo);
            $('#fabricante').val(vehiculo.fabricante);
            $('#pais').val(vehiculo.pais);
            $('#precio').val(vehiculo.precio);
            $('#imagen').val(vehiculo.imagen);
            $('#btn-submit').text('Actualizar Vehículo');
            $.mobile.changePage('#create');
        }
    }
    
    // Eliminar vehículo
    eliminarVehiculo(id) {
        if (confirm('¿Estás seguro de que deseas eliminar este vehículo?')) {
            this.deleteVehiculo(id);
            this.cargarVehiculos();
            $.mobile.changePage('#home');
        }
    }
    
    // Setup event listeners
    setupEventListeners() {
        const self = this;
        
        // Submit del formulario
        $('#form-vehiculo').off('submit').on('submit', function(e) {
            e.preventDefault();
            
            const id = $('#vehiculo-id').val();
            const vehiculoData = {
                nombre: $('#nombre').val().trim(),
                modelo: $('#modelo').val().trim(),
                fabricante: $('#fabricante').val(),
                pais: $('#pais').val(),
                precio: $('#precio').val(),
                imagen: $('#imagen').val().trim()
            };
            
            // Validación básica
            if (!vehiculoData.nombre || !vehiculoData.modelo || !vehiculoData.fabricante || 
                !vehiculoData.pais || !vehiculoData.precio || !vehiculoData.imagen) {
                alert('Por favor, completa todos los campos');
                return;
            }
            
            if (id) {
                // Actualizar
                self.updateVehiculo(id, vehiculoData);
                alert('¡Vehículo actualizado exitosamente!');
            } else {
                // Crear
                self.createVehiculo(vehiculoData);
                alert('¡Vehículo registrado exitosamente!');
            }
            
            self.limpiarFormulario();
            self.cargarVehiculos();
            $.mobile.changePage('#home');
        });
        
        // Botón cancelar
        $('#btn-cancelar').off('click').on('click', function() {
            self.limpiarFormulario();
            $.mobile.changePage('#home');
        });
        
        // Al cambiar a la página home, recargar vehículos
        $(document).on('pagebeforeshow', '#home', function() {
            self.cargarVehiculos();
        });
        
        // Al cambiar a la página create, verificar si es nuevo
        $(document).on('pagebeforeshow', '#create', function() {
            if (!$('#vehiculo-id').val()) {
                self.limpiarFormulario();
            }
        });
    }
    
    // Limpiar formulario
    limpiarFormulario() {
        $('#form-vehiculo')[0].reset();
        $('#vehiculo-id').val('');
        $('#btn-submit').text('Guardar Vehículo');
    }
}

// Inicializar la aplicación
let controller;
$(document).ready(function() {
    controller = new VehicleController();
    
    // Datos de ejemplo si no hay vehículos
    if (controller.getVehiculos().length === 0) {
        // Agregar vehículos de ejemplo
        controller.createVehiculo({
            nombre: 'Mustang GT',
            modelo: '2024',
            fabricante: 'Ford',
            pais: 'Estados Unidos',
            precio: 55000,
            imagen: 'https://images.unsplash.com/photo-1584345604476-8ec5f5d3f77e?w=400'
        });
        
        controller.createVehiculo({
            nombre: 'Civic Type R',
            modelo: '2023',
            fabricante: 'Honda',
            pais: 'Japón',
            precio: 45000,
            imagen: 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=400'
        });
        
        controller.createVehiculo({
            nombre: 'M3 Competition',
            modelo: '2024',
            fabricante: 'BMW',
            pais: 'Alemania',
            precio: 75000,
            imagen: 'https://images.unsplash.com/photo-1555215695-3004980ad54e?w=400'
        });
        
        controller.cargarVehiculos();
    }
});
</script>

</body>
</html>
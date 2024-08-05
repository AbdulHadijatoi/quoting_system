<div class="row d-flex align-items-start">
    <div class="col-md-6">
        <div class="mb-2">
            <label for="unidad_de_medida_teu" class="form-label">Unidad de medida TEU</label>
            <select class="form-control" id="unidad_de_medida_teu" name="unidad_de_medida_teu" required>
                <option value="20">20 ST</option>
                <option value="40">40 ST/HQ</option>
                <option value="40">40 NOR</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="precio_factura" class="form-label">Precio de la factura (USD):</label>
            <input type="text" class="form-control" id="precio_factura" name="precio_factura" required>
        </div>
        <div class="mb-2">
            <label for="primera_importacion" class="form-label">Primera importación</label>
            <select class="form-control" id="primera_importacion" name="primera_importacion" required>
                <option value="SI">SI</option>
                <option value="NO">NO</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="incoterm" class="form-label">Incoterm</label>
            <select class="form-control" id="incoterm" name="incoterm" required>
                <option value="FOB">FOB</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">

        <div class="mb-2">
            <label for="tipo_mercancia" class="form-label">Tipo de mercancía:</label>
            <select class="form-control" id="tipo_mercancia" name="tipo_mercancia" required>
                <optgroup label="Maquinaria">
                    <option value="Maquinaria">Tractores agricolas</option>
                    <option value="Maquinaria">Maquinaria de linea amarilla</option>
                    <option value="Maquinaria">Maquina cnc láser</option>
                    <option value="Maquinaria">Maquina de construccion</option>
                    <option value="Maquinaria">Bordadora computarizada</option>
                    <option value="Maquinaria">Tornos</option>
                    <option value="Maquinaria">Plataforma elevadora autopropulsada</option>
                    <option value="Maquinaria">Demas maquina metalmecánica</option>
                    <option value="Maquinaria">Demas maquinas agricolas</option>
                    <option value="Maquinaria">Martillo hidraulico</option>
                    <option value="Maquinaria">Maquinas tejedoras</option>
                    <option value="Maquinaria">Maquina sopladora de botella</option>
                    <option value="Maquinaria">Maquina de inyección</option>
                    <option value="Maquinaria">Maquina Paletizadora</option>
                    <option value="Maquinaria">Montacarga</option>
                    <option value="Maquinaria">Maquinas para melamina</option>
                    <option value="Maquinaria">Maquinas para mineria</option>
                </optgroup>
                <optgroup label="Productos textiles">
                    <option value="Productos textiles">Medias y ropa interior</option>
                    <option value="Productos textiles">Sabanas</option>
                    <option value="Productos textiles">Telas</option>
                    <option value="Productos textiles">ropa en general</option>
                    <option value="Productos textiles">zapatillas de capellada textil</option>
                    <option value="Productos textiles">Edredones</option>
                    <option value="Productos textiles">Otros textiles</option>
                </optgroup>
                <optgroup label="Mercancia general">
                    <option value="Mercancia general">Articulos plasticos y su manufacturas</option>
                    <option value="Mercancia general">Moldes de silicona</option>
                    <option value="Mercancia general">Articulos de vidrio y su manufacturas</option>
                    <option value="Mercancia general">papeleria</option>
                    <option value="Mercancia general">manualidades y derivados </option>
                    <option value="Mercancia general">cera de soya</option>
                    <option value="Mercancia general">Hilos</option>
                    <option value="Mercancia general">Maquina de coser</option>
                    <option value="Mercancia general">pantallas Led</option>
                    <option value="Mercancia general">Tv.</option>
                    <option value="Mercancia general">Llantas</option>
                    <option value="Mercancia general">Porcelanato</option>
                    <option value="Mercancia general">Cuchillas para cortar</option>
                    <option value="Mercancia general">accesorios para celular</option>
                    <option value="Mercancia general">Tuberias de gas y accesorios</option>
                    <option value="Mercancia general">Cerraduras</option>
                    <option value="Mercancia general">Articulos de librería</option>
                    <option value="Mercancia general">accesorios para coches</option>
                    <option value="Mercancia general">Maquina de produccion de hielo</option>
                    <option value="Mercancia general">Repuestos de maquinaria , coches , motos</option>
                    <option value="Mercancia general">Rodajes</option>
                    <option value="Mercancia general">manufacturas de metales </option>
                    <option value="Mercancia general">Demas auriculares</option>
                    <option value="Mercancia general">electrodos de soldadura</option>
                    <option value="Mercancia general">Imanes</option>
                    <option value="Mercancia general">Perfiles</option>
                    <option value="Mercancia general">Articulos deportivos</option>
                    <option value="Mercancia general">Maquinas de soldadura</option>
                    <option value="Mercancia general">carritos a bateria</option>
                    <option value="Mercancia general">Motocicletas</option>
                    <option value="Mercancia general">Cuatrimotos</option>
                    <option value="Mercancia general">Maquina cnc chorro plasma</option>
                    <option value="Mercancia general">otros productos en general</option>
                </optgroup>
            </select>
        </div>
        
        <div class="mb-2">
            <label for="puerto_origen" class="form-label">Puerto de origen (POL)</label>
            <select class="form-control" id="puerto_origen" name="puerto_origen" required>
                <option value="QINGDAO">Qingdao - (QINGDAO)</option>
                <option value="SHENZHEN">Shenzhen - (SHENZHEN)</option>
                <option value="SHANGHAI">Shanghai - (SHANGHAI)</option>
                <option value="NINGBO">Ningbo - (NINGBO)</option>
            </select>
        </div>
        
        
        
        <div class="mb-2">
            <label for="ubicacion_destino" class="form-label">Ubicación en Perú</label>
            <select class="form-control" id="ubicacion_destino" name="ubicacion_destino" required>
                <optgroup label="ZONA 1">
                    <option value="zone1">Callao</option>
                    <option value="zone1">Carmen de La Legua</option>
                    <option value="zone1">San Miguel</option>
                    <option value="zone1">La Perla</option>
                    <option value="zone1">Bellavista</option>
                    <option value="zone1">La Punta</option>
                </optgroup>
                <optgroup label="ZONA 2">
                    <option value="zone2">Magdalena</option>
                    <option value="zone2">Pueblo Libre</option>
                    <option value="zone2">Lince</option>
                    <option value="zone2">Cercado de Lima</option>
                    <option value="zone2">Breña</option>
                    <option value="zone2">Jesús María</option>
                    <option value="zone2">La Victoria</option>
                    <option value="zone2">San Martin de Porres</option>
                    <option value="zone2">Independencia</option>
                    <option value="zone2">Rímac</option>
                    <option value="zone2">Los Olivos</option>
                    <option value="zone2">Pro</option>
                </optgroup>
                <optgroup label="ZONA 3">
                    <option value="zone3">Ventanilla</option>
                    <option value="zone3">San Isidro</option>
                    <option value="zone3">San Borja</option>
                    <option value="zone3">San Luis</option>
                    <option value="zone3">Miraflores</option>
                    <option value="zone3">Surquillo</option>
                    <option value="zone3">Barranco</option>
                    <option value="zone3">Surco</option>
                    <option value="zone3">Ate</option>
                    <option value="zone3">Sta. Clara</option>
                    <option value="zone3">Comas</option>
                    <option value="zone3">Puente Piedra</option>
                    <option value="zone3">El Agustino</option>
                    <option value="zone3">Santa Anita</option>
                    <option value="zone3">San Juan de Lurigancho</option>
                </optgroup>
                <optgroup label="ZONA 4">
                    <option value="zone4">Ancón</option>
                    <option value="zone4">Chorrillos</option>
                    <option value="zone4">Villa El Salvador</option>
                    <option value="zone4">Villa Maria del Triunfo</option>
                    <option value="zone4">San Juan de Miraflores</option>
                    <option value="zone4">Carabayllo</option>
                    <option value="zone4">La Molina</option>
                    <option value="zone4">Cajamarquilla</option>
                </optgroup>
                <optgroup label="ZONA 5">
                    <option value="zone5">Lurín</option>
                    <option value="zone5">Pachacamac</option>
                    <option value="zone5">Chosica</option>
                    <option value="zone5">Huarochiri</option>
                    <option value="zone5">Huachipa</option>
                </optgroup>
            </select>
        </div>
    </div>
</div>
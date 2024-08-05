<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PDF Document</title>
    <style>
        .container{
            padding: 30px 55px;
        }

        *{
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
            font-family: Arial, sans-serif;
        }

        .float-left{
            float: left;
        }
        
        .float-right{
            float: right;
        }

        .bg-grey{
            background-color: rgba(0,0,0,0.07);
        }

        .w-10{
            width: 10%;
        }
        .w-20{
            width: 20%;
        }
        .w-21{
            width: 21%;
        }
        .w-22{
            width: 22%;
        }
        .w-23{
            width: 23%;
        }
        .w-24{
            width: 24%;
        }
        .w-25{
            width: 25%;
        }
        .w-30{
            width: 30%;
        }
        .w-35{
            width: 35%;
        }
        .w-40{
            width: 40%;
        }
        .w-40{
            width: 40%;
        }
        .w-41{
            width: 41%;
        }
        .w-42{
            width: 42%;
        }
        .w-43{
            width: 43%;
        }
        .w-44{
            width: 44%;
        }
        .w-45{
            width: 45%;
        }
        .w-46{
            width: 46%;
        }
        .w-47{
            width: 47%;
        }
        .w-48{
            width: 48%;
        }
        .w-49{
            width: 49%;
        }
        .w-50{
            width: 50%;
        }
        .w-55{
            width: 55%;
        }
        .w-56{
            width: 56%;
        }
        .w-57{
            width: 57%;
        }
        .w-58{
            width: 58%;
        }
        .w-59{
            width: 59%;
        }
        .w-60{
            width: 60%;
        }
        .w-65{
            width: 65%;
        }
        .w-70{
            width: 70%;
        }
        .w-75{
            width: 75%;
        }
        .w-76{
            width: 76%;
        }
        .w-77{
            width: 77%;
        }
        .w-78{
            width: 78%;
        }
        .w-79{
            width: 79%;
        }
        .w-80{
            width: 80%;
        }
        .w-90{
            width: 90%;
        }
        .w-91{
            width: 91%;
        }
        .w-92{
            width: 92%;
        }
        .w-93{
            width: 93%;
        }
        .w-94{
            width: 94%;
        }
        .w-95{
            width: 95%;
        }
        .w-96{
            width: 96%;
        }
        .w-97{
            width: 97%;
        }
        .w-98{
            width: 98%;
        }
        .w-99{
            width: 99%;
        }
        
        .w-100{
            width: 100%;
        }

        .text-right {
            text-align: right;
        }
        
        .text-left {
            text-align: left;
        }

        .text-justify{
            text-align: right;
            line-height: 1.5;
        }
        
        .text-center {
            text-align: center;
        }
        
        .br-red{
            border: 1px solid red;
        }
        .br-green{
            border: 1px solid green;
        }
        .br-blue{
            border: 1px solid blue;
        }
        
        .br-black{
            border: 1.5px solid black;
        }
        
        .br-black-1px{
            border: 1px solid black;
        }

        .color-heading{
            color: #2575f4;
        }
        
        h1{
            font-size: 24px;
            font-weight: bold; 
            margin-bottom: 5px;
        }
        
        h2{
            font-size: 18px;
            font-weight: bold; 
            margin-bottom: 4px;
        }

        .fs-20{
            font-size: 20px;
        }

        .d-block{
            display: block;
        }
        
        .d-inline-block{
            display: inline-block;
        }

        .text-bold{
            font-weight: bold;
        }

        .text-large{
            font-size: 16px;
            
        }

        .text-medium{
            font-size: 14px;
        }
        
        .text-small{
            font-size: 12px;
        }
        
        .text-smaller{
            font-size: 11px;
        }

        .text-red{
            color: red
        }

        .mb-1{
            margin-bottom: 1px;
        }
        .mb-2{
            margin-bottom: 2px;
        }
        .mb-3{
            margin-bottom: 3px;
        }
        .mb-4{
            margin-bottom: 4px;
        }
        .mb-5{
            margin-bottom: 5px;
        }
        .mb-6{
            margin-bottom: 6px;
        }
        .mb-7{
            margin-bottom: 7px;
        }
        .mb-8{
            margin-bottom: 8px;
        }
        .mb-9{
            margin-bottom: 9px;
        }
        .mb-10{
            margin-bottom: 10px;
        }
        
        .mt-1{
            margin-top: 1px;
        }
        .mt-2{
            margin-top: 2px;
        }
        .mt-3{
            margin-top: 3px;
        }
        .mt-4{
            margin-top: 4px;
        }
        .mt-5{
            margin-top: 5px;
        }
        .mt-6{
            margin-top: 6px;
        }
        .mt-7{
            margin-top: 7px;
        }
        .mt-8{
            margin-top: 8px;
        }
        .mt-9{
            margin-top: 9px;
        }
        .mt-10{
            margin-top: 10px;
        }
        .mr-1{
            margin-right: 1px;
        }
        .mr-2{
            margin-right: 2px;
        }
        .mr-3{
            margin-right: 3px;
        }
        .mr-4{
            margin-right: 4px;
        }
        .mr-5{
            margin-right: 5px;
        }
        .mr-6{
            margin-right: 6px;
        }
        .mr-7{
            margin-right: 7px;
        }
        .mr-8{
            margin-right: 8px;
        }
        .mr-9{
            margin-right: 9px;
        }
        .mr-10{
            margin-right: 10px;
        }
       
        .ml-1{
            margin-left: 1px;
        }
        .ml-2{
            margin-left: 2px;
        }
        .ml-3{
            margin-left: 3px;
        }
        .ml-4{
            margin-left: 4px;
        }
        .ml-5{
            margin-left: 5px;
        }
        .ml-6{
            margin-left: 6px;
        }
        .ml-7{
            margin-left: 7px;
        }
        .ml-8{
            margin-left: 8px;
        }
        .ml-9{
            margin-left: 9px;
        }
        .ml-10{
            margin-left: 10px;
        }
        
        .pl-1{
            padding-left: 1px;
        }
        .pl-2{
            padding-left: 2px;
        }
        .pl-3{
            padding-left: 3px;
        }
        .pl-4{
            padding-left: 4px;
        }
        .pl-5{
            padding-left: 5px;
        }
        .pl-6{
            padding-left: 6px;
        }
        .pl-7{
            padding-left: 7px;
        }
        .pl-8{
            padding-left: 8px;
        }
        .pl-9{
            padding-left: 9px;
        }
        .pl-10{
            padding-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table class="w-100">
            <tbody class="w-100">
                <tr>
                    <td class="w-65">
                        <h1 class="color-heading">PROFORMA CGP-0750</h1>
                        <p class="text-medium">Av. Próceres de la Independencia No. 3437 3 piso Oficina A-</p>
                        <p class="text-medium">Distrito San Juan de Lurigancho</p>
                        <p class="text-medium">Ruc: 20610081887</p>
                        <br>
                        <div class="text-medium text-bold w-100 mb-5"><div class="br-blue float-left" style="width: 20px; height: 20px;"></div> <div class="float-right w-93">980-983-483</div></div><br>
                        <div class="text-medium text-bold w-100 mb-5"><div class="br-blue float-left" style="width: 20px; height: 20px;"></div> <div class="float-right w-93">Booking@cargaglobalperu.com</div></div><br>
                        <div class="text-medium text-bold w-100 mb-5"><div class="br-blue float-left" style="width: 20px; height: 20px;"></div> <div class="float-right w-93">www.cargaglobalperu.com</div></div><br>
                    </td>
                    <td class="w-35">
                        <div class="float-right br-red" style="width: 160px; height: 160px;">
                            <img src="{{ asset('assets/images/logo.jpg') }}" style="width: 100%;" alt="logo">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div class="br-black w-100 mt-7 mb-7"></div>

        <table class="w-100">
            <tbody class="w-100">
                <tr>
                    <td class="w-60">
                        <h2 class="color-heading">CONSIGNATARIO</h2>
                        
                        <div class="text-medium w-100">
                            <div class="text-bold float-left w-20">Cliente:</div> 
                            <div class="float-right text-small w-80">KODISEO EIRL</div>
                        </div>
                        <br>
                        <div class="text-medium w-100">
                            <div class="text-bold float-left w-20">Ruc:</div> 
                            <div class="float-right text-small w-80">2050887645</div>
                        </div>
                        <br>
                        <div class="text-medium w-100">
                            <div class="text-bold float-left w-20">Direccion:</div> 
                            <div class="float-right text-small w-80">AV. UNIVERSITARIA 3466 COMAS</div>
                        </div>
                        <br>
                        <div class="text-medium w-100">
                            <div class="text-bold float-left w-20">E-mail:</div> 
                            <div class="float-right text-small w-80">sergen@gmail.com</div>
                        </div>
                        <br>
                        <div class="text-medium w-100">
                            <div class="text-bold float-left w-20">Telefono:</div> 
                            <div class="float-right text-small w-80">987655433</div>
                        </div>
                    </td>
                    <td>
                       

                            

                        <div class="float-left w-100 text-justify">
                            <div class="br-red float-right" style="width: 65px; height: 65px; margin-right: 200px;"></div>
                            <div class="text-bold w-100 fs-20">
                                <div class="float-left text-left" style="margin-left: 90px">
                                    <div>Fecha</div>
                                    <div class="text-red">Validez</div>
                                </div>
                                <div class="float-right">
                                    <div>02/05/2025</div>
                                    <div class="text-red">15/05/2025</div>
                                </div>
                            </div>
                        </div>
            
                    </td>
                </tr>
            </tbody>
        </table>

       <br>
       <div class="mt-3 w-100">
            <h2 class="color-heading">DETALLE DE LA OPERACION</h2>
            <div class="text-medium w-50">
                <div class="float-left w-50">
                    <span class="text-bold">Incoterm</span><br>
                    <span class="text-bold">Modalidad</span><br>
                    <span class="text-bold">Puerto de origen</span><br>
                    <span class="text-bold">Tipo de carga</span><br>
                    <span class="text-bold">Primera importación </span>
                </div>
                <div class="float-right w-50">
                    <span class="text-small">FOB</span><br>
                    <span class="text-small">LCL</span><br>
                    <span class="text-small">Shanghai</span><br>
                    <span class="text-small">Maquinaria pesada</span><br>
                    <span class="text-small">SI</span>
                </div>
            </div>
            
            <div class="text-medium w-50" style="margin-left: 300px;">
                <div class="float-left w-50">
                    <span class="text-bold">Volumen</span><br>
                    <span class="text-bold">Peso</span><br>
                    <span class="text-bold">Distrito</span><br>
                    <span class="text-bold">Direccion de entrega</span><br>
                    <span class="text-bold">Valor de factura</span>
                </div>
                <div class="float-right w-50">
                    <span class="text-small">12 cbm</span><br>
                    <span class="text-small">5000 kg.</span><br>
                    <span class="text-small">Callao</span><br>
                    <span class="text-small">Av. tomas Valle 2367</span><br>
                    <span class="text-small">$30,000.00</span>
                </div>
            </div>
       </div>
        
        
        
        <br>
       <div class="br-black w-100 mt-10 mb-7" style="clear: both"></div>

        <div class="mt-3 w-100">
            <div class="text-small text-bold w-50">
                <div class="float-left w-50">
                    <span class="text-bold">Valor FOB</span><br>
                    <span class="text-bold">Flete</span><br>
                    <span class="text-bold">Seguro</span><br>

                </div>
                <div class="float-right w-50">
                    <span>$ 30,000.00</span><br>
                    <span>$ 4,500.00</span><br>
                    <span>$ 197.88</span><br>
                </div>
            </div>
       </div>
       <div class="w-100 mt-10 mb-7" style="clear: both"></div>
        <div class="mt-3 w-100">
            <div class="text-medium w-50">
                <div class="float-left w-50">
                    <span class="text-bold">Base Imponible</span><br>
                </div>
                <div class="float-right w-50">
                    <span class="text-bold">$34,697.88</span><br>
                </div>
            </div>
            
            <div class="w-50" style="margin-left: 260px;">
                <div class="float-left w-100">
                    <span class="text-small text-bold text-red">*Formula para calcular sus impuestos*</span><br>
                </div>
            </div>
       </div>

        <div class="w-100 mt-10 mb-7" style="clear: both"></div>

        <div>
            <div class="w-48 float-left">
                <table class="w-100">
                    <tbody class="w-100">
                        <tr>
                            <td>
                                <h2 class="color-heading">SERVICIOS DE CARGA Y ADUANA</h2>
                                
                                <div class="br-black-1px w-100 mt-7 mb-10"></div>
                                
                                <div class="text-bold text-small">
                                    <span class="w-50 d-inline-block text-center">Costos de origen</span>
                                    <span class="w-20 d-inline-block text-right">Item</span>
                                    <span class="w-25 d-inline-block text-right">Gastos USD</span>
                                </div>
                                
                                <div class="br-black-1px w-100 mt-7 mb-7"></div>

                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Flete Internacional x tn/m3</span>
                                    <span class="w-25 d-inline-block text-center">$4,500.00</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Pick Up</span>
                                    <span class="w-25 d-inline-block text-center">$197.88</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Costos FCA</span>
                                    <span class="w-25 d-inline-block text-center">$65.00</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Licencia de Export.</span>
                                    <span class="w-25 d-inline-block text-center">$600.00</span>
                                </div>
                                
                                <div class="text-small mb-5">
                                    <span class="w-40 d-inline-block text-bold text-right">Sub total</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-55 d-inline-block text-bold text-right">Costos en Destino Perú</span>
                                </div>

                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Asesoria en seguro</span>
                                    <span class="w-25 d-inline-block text-center">$0</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Handling</span>
                                    <span class="w-25 d-inline-block text-center">$0</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Descarga x tn.</span>
                                    <span class="w-25 d-inline-block text-center">$0</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Visto Bueno</span>
                                    <span class="w-25 d-inline-block text-center">$120.00</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Transporte interno</span>
                                    <span class="w-25 d-inline-block text-center">$180.00</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Declaracion de aduana</span>
                                    <span class="w-25 d-inline-block text-center">$50.00</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-70 d-inline-block">Gasto operativo</span>
                                    <span class="w-25 d-inline-block text-center">$350.00</span>
                                </div>
                                <div class="text-small">
                                    <span class="w-70 d-inline-block">Almacenaje aprox. canal verde</span>
                                    <span class="w-25 d-inline-block text-center">$330.00</span>
                                </div>

                                <div class="text-right w-90">
                                    <div class="br-black-1px w-77 mt-2" style="margin-left: auto"></div>
                                </div>
                                <div class="text-right w-90">
                                    <div class="w-100 mt-5 mb-4 text-large text-bold" style="margin-left: auto">Total Costos inc. igv $11,070.00</div>
                                </div>
                                <div class="br-black-1px w-100 mt-10 mb-3"></div>
                                <div class="text-center text-small text-red w-100">
                                    *Los costos son referenciales*
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="w-48 float-right">
                <table class="w-100">
                    <tbody class="w-100">
                        <tr>
                            <td>
                                <h2 class="color-heading text-center">IMPUESTOS DE ADUANA</h2>
                                <div class="br-black-1px w-100 mt-7 mb-10"></div>
                                <div class="text-bold text-small">
                                    <span class="w-50 d-inline-block text-center">Descripción</span>
                                    <span class="w-20 d-inline-block text-right">Porcentaje</span>
                                    <span class="w-25 d-inline-block text-right">Gastos USD</span>
                                </div>
                                <div class="br-black-1px w-100 mt-7 mb-7"></div>
                                
                                <div class="text-small mb-5">
                                    <span class="w-50 d-inline-block">Advalorem</span>
                                    <span class="w-20 d-inline-block text-center">6%</span>
                                    <span class="w-25 d-inline-block text-right">$1,230.00</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-50 d-inline-block">IGV.</span>
                                    <span class="w-20 d-inline-block text-center">16%</span>
                                    <span class="w-25 d-inline-block text-right">$1,230.00</span>
                                </div>
                                <div class="text-small mb-5">
                                    <span class="w-50 d-inline-block">IPM</span>
                                    <span class="w-20 d-inline-block text-center">2%</span>
                                    <span class="w-25 d-inline-block text-right">$1,230.00</span>
                                </div>
                                <div class="text-small">
                                    <span class="w-50 d-inline-block">Percepción</span>
                                    <span class="w-20 d-inline-block text-center">3.5%</span>
                                    <span class="w-25 d-inline-block text-right">$1,230.00</span>
                                </div>
                                
                                
                                <div class="br-black-1px w-100 mb-10"></div>


                                <div class="text-large text-bold mt-10">
                                    <span class="w-60 d-inline-block text-center">Total Impuestos</span>
                                    <span class="w-35 d-inline-block text-center">$11,070.00</span>
                                </div>
                                
                                <div class="text-small text-red mb-10">
                                    <span class="w-70 d-inline-block text-center">*Valor de arancel referencial*</span>
                                </div>
                    
                                {{-- GREY SECTION --}}
                                <div class="bg-grey" style="padding: 10px 0px;">
                                    <h2 class="mb-10 color-heading text-center">RESUMEN DE COSTOS</h2>

                                    <div class="text-smaller mb-5 text-center">
                                        <span class="w-30 d-inline-block text-left">Valor de factura</span>
                                        <span class="w-30 d-inline-block text-right">$ 30,000.00</span>
                                    </div>
                                    <div class="text-smaller mb-5 text-center">
                                        <span class="w-30 d-inline-block text-left">Impuestos Aduana</span>
                                        <span class="w-30 d-inline-block text-right">$ 11,070.00</span>
                                    </div>
                                    <div class="text-smaller mb-3 text-center">
                                        <span class="w-30 d-inline-block text-left">Costos logisticos</span>
                                        <span class="w-30 d-inline-block text-right">$ 11,070.00</span>
                                    </div>


                                    <div class="br-black-1px w-70 mb-7" style='margin: auto'></div>
 
                                    <div class="text-medium text-bold mt-10 text-center">
                                        <span class="w-35 d-inline-block text-left">Inversión Total</span>
                                        <span class="w-35 d-inline-block text-right">$11,070.00</span>
                                    </div>

                                    <div class="w-100 text-center mb-10">
                                        <span class="text-smaller text-bold text-red text-center mb-10">*El importador debe contar con esta inversion aproximada</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-100" style="clear: both"></div>
    </div>

    <div class="br-red w-100" style="height: 111px">
        {{-- FOOTER IMAGE HERE --}}
    </div>

    <div class="w-100" style="clear: both"></div>
    {{-- SECOND PAGE --}}
    <div class="container mt-10">
        <div class="br-black w-100 mt-10 mb-7" style="clear: both"></div>
        <h1 class="mb-10 color-heading">¡Gracias por embarcar con Carga Global!</h1>
        
        <div class="w-100 mt-10 text-large text-bold">
            Información de cuentas bancarias
        </div>
        <div class="w-100 mt-10 text-large text-bold">
            Corriente dolares Interbank:
        </div>
        <div class="w-100 text-large">
            200-3004504779 CCI 003-200-003004504779-39
        </div>
        <div class="w-100 text-large text-bold">
            Corriente soles Interbank:
        </div>
        <div class="w-100 text-large">
            200-3004504761 CCI 003-200-003004504761-37
        </div>
        <div class="w-100 text-large text-bold">
            Cta Cte. en dólares BBVA Continental:
        </div>
        <div class="w-100 text-large">
            001108320200531993 CCI:01183200020053199330
        </div>
        <div class="w-100 text-large text-bold">
            Cta Cte. en Soles BBVA Continental:
        </div>
        <div class="w-100 text-large mb-10">
            Soles: 001108320200563275 CCI:01183200020056327533
        </div>
        
        <h1 class="mb-10 mt-10">Términos y condiciones</h1>
        
        <div class="w-100 text-large mt-10">
            1-<span class="text-red">Tarifas sujetas a disponibilidad de espacio y equipo.</span><br>
            2-<span class="text-red">Aplica para carga general, apilable, no sobredimensionada.</span><br>
            3-<span class="text-red">De existir alguna variación en los detalles de la carga (peso y/o volumen) se revisarán
            los costos.</span><br>
            4-<span class="text-red">El transporte interno, no incluye estiba o desestiba, tampoco custodia.</span><br>
            5-<span class="text-red">El monto de los impuestos debe ser abonado a la cuenta de la agencia de aduana en
            soles al t.c. del dia de sunat.</span><br>
            6-<span class="text-red">Debido a la coyuntura actual en el Transporte Marítimo Internacional, los tránsitos
            directos pueden estar sujetos a cambios y hacer conexión en puertos intermedios sin
            previo aviso.</span><br>
            7-<span class="text-red">Verificar siempre la validez de la cotización brindada, ya que se actualiza terminado la validez</span>
        </div>
    </div>
</body>
</html>

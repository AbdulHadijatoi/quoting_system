<?php

namespace App\Services;

class QuoteService {

    public function applyLCLFormula($data) { 
        $volume = isset($data['volume']) ? floatval($data['volume']) : 0;
        $total_weight = isset($data['total_weight']) ? floatval($data['total_weight']) : 0;
        $invoice_price = isset($data['invoice_price']) ? floatval($data['invoice_price']) : 0;
        $type_of_merchandise = isset($data['type_of_merchandise']) ? $data['type_of_merchandise'] : '';
        $first_import = isset($data['first_import']) ? $data['first_import'] : '';
        $origin_port = isset($data['origin_port']) ? $data['origin_port'] : '';
        $incoterm = isset($data['incoterm']) ? $data['incoterm'] : '';
        $destination_location = isset($data['destination_location']) ? $data['destination_location'] : '';

        $rates = [
            1 => [80.00, 85.00, 90.00, 95.00, 100.00, 115.00, 120.00, 125.00, 130.00, 140.00, 145.00, 150.00, 165.00, 170.00],
            2 => [85.00, 90.00, 95.00, 100.00, 110.00, 120.00, 125.00, 130.00, 135.00, 146.00, 150.00, 160.00, 168.00, 175.00],
            3 => [90.00, 100.00, 105.00, 110.00, 110.00, 125.00, 130.00, 135.00, 140.00, 150.00, 155.00, 165.00, 170.00, 180.00],
            4 => [95.00, 110.00, 115.00, 120.00, 125.00, 130.00, 135.00, 135.00, 145.00, 150.00, 160.00, 165.00, 175.00, 185.00],
            5 => [110.00, 115.00, 120.00, 125.00, 125.00, 135.00, 150.00, 150.00, 160.00, 170.00, 175.00, 180.00, 185.00, 210.00],
        ];

        $peso__ranges = [100, 300, 500, 700, 1000, 1500, 2000, 2500, 3000, 4000, 5000, 6000, 7000, 8000];
        $shipping_amount = 0.00;

        foreach ($peso__ranges as $index => $range) {
            if ($total_weight <= $range) {
                $shipping_amount = $rates[$destination_location][$index];
                break;
            }
        }

        if ($volume && $total_weight && $invoice_price && $type_of_merchandise && $first_import && $origin_port && $incoterm && $destination_location) {
            $envio = $volume * 140;
            
            if ($invoice_price <= 13000) {
                $seguro = 50;
            } else {
                $seguro = ($invoice_price + $envio) * 0.0045;
            }

            $total = $invoice_price + $envio + $seguro;

            switch ($type_of_merchandise) {
                case 1:
                    $advalorem = 0;
                    break;
                case 2:
                    $advalorem = $invoice_price * 0.11;
                    break;
                case 3:
                    $advalorem = 0;
                    break;
                default:
                    $advalorem = 0;
            }
            
            $igv = ($total + $advalorem) * 0.16;
            $ipm = ($total + $advalorem) * 0.02;

            if ($type_of_merchandise == 1) {
                $percepcion = 0;
            } else {
                if ($first_import == 1) {
                    $percepcion = ($total + $advalorem + $igv + $ipm) * 0.10;
                } else {
                    $percepcion = ($total + $advalorem + $igv + $ipm) * 0.035;
                }
            }
            
            $impuesto_total_aduanas = $advalorem + $igv + $ipm + $percepcion;
            $descarga_tn = 40 * ($total_weight / 1000);
            $flete_internacional = $envio;
            $seguro_carga = $seguro;
            $handling = 65;
            $visto_bueno = 150;
            $transporte = 120;
            $declaracion_aduanera = 150;
            $almacenaje = 320;
            $gasto_operativo = 50; 

            if($total && $total > 32000){
                $remaining = ($total - 32000)*0.004;
                $declaracion_aduanera += $remaining;
            }
            
            $montos_con_igv = $seguro_carga + $handling + $descarga_tn + $visto_bueno + $transporte + $declaracion_aduanera + $almacenaje + $gasto_operativo;

            $gate_in = 230.00;
            $puerto = 160.00;
            
            $igv_logistico = $montos_con_igv * 0.18;
            $total_logistico_sin_igv = $montos_con_igv;
            $total_logistico_con_igv = $total_logistico_sin_igv + $igv_logistico;
            $total_final = $total_logistico_con_igv + $flete_internacional;

            // Resumen de Costos
            $invoice_price = $invoice_price;
            $envio = $envio;
            $seguro = $seguro;
            $total = $total;
            // Impuesto de Aduana
            $advalorem = $advalorem;
            $igv = $igv;
            $ipm = $ipm;
            $percepcion = $percepcion;
            $impuesto_total_aduanas = $impuesto_total_aduanas;
            // Costos Logísticos
            $flete_internacional = $flete_internacional;
            $seguro_carga = $seguro_carga;
            $handling = $handling;
            $descarga_tn = $descarga_tn;
            $visto_bueno = $visto_bueno;
            $shipping_amount = $shipping_amount;
            $declaracion_aduanera = $declaracion_aduanera;
            $almacenaje = $almacenaje;
            $gasto_operativo = $gasto_operativo;
            $total_final = $total_final;

        }

        $invoice_price_1 = 0;
        $invoice_price_2 = 0;
        $invoice_price_3 = 0;

        if ($volume && $total_weight && $invoice_price && $type_of_merchandise && $first_import && $origin_port && $incoterm && $destination_location) {

            $advalorem = $advalorem;
            $igv = $igv;
            $ipm = $ipm;
            $percepcion = $percepcion;

            // Calculate the total with two decimal precision
            $impuesto_total_aduanas = $advalorem + $igv + $ipm + $percepcion;
            
            // Resumen de Gastos
            $invoice_price_1 = $invoice_price;
            $invoice_price_2 = $impuesto_total_aduanas + $total_final;
            $invoice_price_3 = $invoice_price + $impuesto_total_aduanas + $total_final;
        
        }

        return [
            // Resumen de Costos
            "invoice_price" => $invoice_price,
            "envio" => $envio,
            "seguro" => $seguro,
            "total" => $total,
            // Impuesto de Aduana
            "advalorem" => $advalorem,
            "igv" => $igv,
            "ipm" => $ipm,
            "percepcion" => $percepcion,
            "impuesto_total_aduanas" => $impuesto_total_aduanas,
            // Costos Logísticos
            "flete_internacional" => $flete_internacional,
            "seguro_carga" => $seguro_carga,
            "handling" => $handling,
            "descarga_tn" => $descarga_tn,
            "visto_bueno" => $visto_bueno,
            "shipping_amount" => $shipping_amount,
            "declaracion_aduanera" => $declaracion_aduanera,
            "almacenaje" => $almacenaje,
            "gasto_operativo" => $gasto_operativo,
            "total_final" => $total_final,

            // Resumen de Gastos
            "invoice_price_1" => $invoice_price_1,
            "invoice_price_2" => $invoice_price_2,
            "invoice_price_3" => $invoice_price_3,
            "invoice_price_4" => $invoice_price_1 + $invoice_price_2 + $invoice_price_3,

            'form_tab' => $data['form_tab'],
            'name' => $data['guest_name'],
            'email' => $data['guest_email'],
            'phone' => $data['guest_phone'],
            'address' => $data['guest_address'],
            'dni_ruc_option' => $data['dni_ruc_option'],
            'dni_ruc_value' => $data['dni_or_ruc_value'],
            'validity' => $data['validity'],

            'type_of_merchandise' => $data['type_of_merchandise_name'],
            'origin_port' => $data['origin_port_name'],
            'incoterm' => $data['incoterm_name'],
            'destination_location' => $data['destination_location_name'],

            'volume' => $volume,
            'total_weight' => $total_weight,
            'invoice_price' => $invoice_price,
            'first_import' => $first_import,
        ];
    }
    
    public function applyFCLFormula($data){
  
        $volume = isset($data['volume']) ? floatval($data['volume']) : 0;
        $measurement_unit = isset($data['measurement_unit']) ? $data['measurement_unit'] : '';
        $total_weight = isset($data['total_weight']) ? floatval($data['total_weight']) : 0;
        $invoice_price = isset($data['invoice_price']) ? floatval($data['invoice_price']) : 0;
        $type_of_merchandise = isset($data['type_of_merchandise']) ? $data['type_of_merchandise'] : '';
        $first_import = isset($data['first_import']) ? $data['first_import'] : '';
        $origin_port = isset($data['origin_port']) ? $data['origin_port'] : '';
        $incoterm = isset($data['incoterm']) ? $data['incoterm'] : '';
        $destination_location = isset($data['destination_location']) ? $data['destination_location'] : '';
        $unit_of_measurement = isset($data['unit_of_measurement']) ? $data['unit_of_measurement'] : '';
        
        $precio_almacenaje = 0;
        
        switch ($measurement_unit) {
            case '20':
                $precio_almacenaje = 550; 
                break;
            case '40':
                $precio_almacenaje = 650; 
                break;
            default:
                $precio_almacenaje = 0; 
                break;
        }
        
        
        $flete_internacional = $volume * 140;
        if ($measurement_unit && $invoice_price && $type_of_merchandise && $first_import && $origin_port && $incoterm && $destination_location) {
            $precios = [
                'QINGDAO' => [
                    '20' => 6484.00,
                    '40' => 7394.00,
                    '40NOR' => 6640.00
                ],
                'SHENZHEN' => [
                    '20' => 6500.00,
                    '40' => 7300.00,
                    '40NOR' => 6640.00
                ],
                'SHANGHAI' => [
                    '20' => 6574.00,
                    '40' => 7400.00,
                    '40NOR' => 6640.00
                ],
                'NINGBO' => [
                    '20' => 6400.00,
                    '40' => 7400.00,
                    '40NOR' => 6640.00
                ]
            ];
            
            $shipping_amount = isset($precios[$origin_port][$measurement_unit]) ? $precios[$origin_port][$measurement_unit] : 0;
            
            if ($invoice_price <= 13000) {
                $seguro = 50;
            } else {
                $seguro = ($invoice_price + $shipping_amount) * 0.0045;
            }
            
            $rates = [
                1 => [180.00, 240.00],
                2 => [185.00, 245.00],
                3 => [190.00, 250.00],
                4 => [200.00, 260.00],
                5 => [230.00, 270.00],
            ];
            
            $ranges = [20, 40];
            
            $shipping_amount2 = 0.00;
            
            foreach ($ranges as $index => $range) {
                if ($measurement_unit == $range) {
                    $shipping_amount2 = $rates[$destination_location][$index];
                    break;
                }
            }
            
            $total = $invoice_price + $shipping_amount + $seguro;
            
            switch ($type_of_merchandise) {
                case 1:
                    $advalorem = 0;
                    break;
                case 2:
                    $advalorem = $invoice_price * 0.11;
                    break;
                case 3:
                    $advalorem = 0;
                    break;
                default:
                    $advalorem = 0;
            }
            
            $igv = ($total + $advalorem) * 0.16;
            $ipm = ($total + $advalorem) * 0.02;

            if ($type_of_merchandise == 1) {
                $percepcion = 0;
            } else {
                if ($first_import == 1) {
                    $percepcion = ($total + $advalorem + $igv + $ipm) * 0.10;
                } else {
                    $percepcion = ($total + $advalorem + $igv + $ipm) * 0.035;
                }
            }
            
            $impuesto_total_aduanas = $advalorem + $igv + $ipm + $percepcion;
            
            if ($total <= 32000) {
                $declaracion_aduanera = 150;
            } else {
                $declaracion_aduanera = $total * 0.0045;
            }
            
            $gate_in = 230.00;
            $puerto = 160.00;
            $handling = 50;
            $visto_bueno = 280;
            $transporte = $shipping_amount2;
            $almacenaje = 320;
            $gasto_operativo = 50;
            
            $montos_con_igv = $seguro + $handling + $visto_bueno + $transporte + $declaracion_aduanera + $almacenaje + $gasto_operativo;
            $igv_logistico = $montos_con_igv * 0.18;
            $total_logistico_sin_igv = $montos_con_igv + $gate_in + $puerto;
            $total_logistico_con_igv = $total_logistico_sin_igv + $igv_logistico + $shipping_amount;
            
            $total_final = $total_logistico_con_igv + $flete_internacional;
            
            // Resumen de Costos - Containers (FCL)
            $invoice_price = $invoice_price;
            // $shipping_amount = $shipping_amount;
            $seguro = $seguro;
            $total = $total;
            
            // Impuesto de Aduana
            $advalorem = $advalorem;
            $igv = $igv;
            $ipm = $ipm;
            $percepcion = $percepcion;
            $impuesto_total_aduanas = $impuesto_total_aduanas;
            
            // Costos Logísticos
            $shipping_amount = $shipping_amount;
            $seguro = $seguro;
            $gate_in = $gate_in;
            $puerto = $puerto;
            $handling = $handling;
            $visto_bueno = $visto_bueno;
            $shipping_amount2 = $shipping_amount2;
            $declaracion_aduanera = $declaracion_aduanera;
            $precio_almacenaje = $precio_almacenaje;
            $gasto_operativo = $gasto_operativo;
            $vat = (($seguro + $gate_in + $puerto + $handling + $visto_bueno + $shipping_amount2 + $declaracion_aduanera + $precio_almacenaje + $gasto_operativo)*0.18);
            $grand_total = $shipping_amount + $seguro + $gate_in + $puerto + $handling + $visto_bueno + $shipping_amount2 + $declaracion_aduanera + $precio_almacenaje + $gasto_operativo;
            $grand_total = $grand_total + $vat;

        }   

        $invoice_price_1 = 0;
        $invoice_price_2 = 0;
        $invoice_price_3 = 0;
        
        if (($volume || $unit_of_measurement) && $total_weight && $invoice_price && $type_of_merchandise && $first_import && $origin_port && $incoterm && $destination_location) {
            $impuesto_total_aduanas = $advalorem + $igv + $ipm + $percepcion;

            // Resumen de Gastos
            $invoice_price_1 = $invoice_price;
            $invoice_price_2 = $impuesto_total_aduanas + $total_final;
            $invoice_price_3 = $invoice_price + $impuesto_total_aduanas + $total_final;
        }

        return [
            // Resumen de Costos - Containers (FCL)
            "invoice_price" => $invoice_price,
            "shipping_amount" => $shipping_amount,
            "seguro" => $seguro,
            "total" => $total,
            // Impuesto de Aduana
            "advalorem" => $advalorem,
            "igv" => $igv,
            "ipm" => $ipm,
            "percepcion" => $percepcion,
            "impuesto_total_aduanas" => $impuesto_total_aduanas,
            // Costos Logísticos
            "shipping_amount" => $shipping_amount,
            "seguro_carga" => $seguro,
            "descarga_tn" => $gate_in,
            "puerto" => $puerto,
            "handling" => $handling,
            "visto_bueno" => $visto_bueno,
            "shipping_amount" => $shipping_amount2,
            "declaracion_aduanera" => $declaracion_aduanera,
            "almacenaje" => $precio_almacenaje,
            "gasto_operativo" => $gasto_operativo,
            "total_final" => $grand_total,

            // Resumen de Gastos
            "invoice_price_1" => $invoice_price_1,
            "invoice_price_2" => $invoice_price_2,
            "invoice_price_3" => $invoice_price_3,
            "invoice_price_4" => $invoice_price_1 + $invoice_price_2 + $invoice_price_3,

            'form_tab' => $data['form_tab'],
            'name' => $data['guest_name'],
            'email' => $data['guest_email'],
            'phone' => $data['guest_phone'],
            'address' => $data['guest_address'],
            'dni_ruc_option' => $data['dni_ruc_option'],
            'dni_ruc_value' => $data['dni_or_ruc_value'],
            'validity' => $data['validity'],

            'volume' => 0,
            'total_weight' => 0,
            'measurement_unit' => $data['measurement_unit_name'],
            'destination_location' => $data['destination_location_name'],
            'incoterm' => $data['incoterm_name'],
            'origin_port' => $data['origin_port_name'],
            'type_of_merchandise' => $data['type_of_merchandise_name'],
            'first_import' => $first_import,
            'invoice_price' => $invoice_price,

        ];
    }
}

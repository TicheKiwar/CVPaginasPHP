<?php

require __DIR__.'/phpjasperxml-master/vendor/autoload.php';
use simitsdk\phpjasperxml\PHPJasperXML;

if (isset($_GET["cedula"])) {
    $cedula = $_GET["cedula"];
    $filename = __DIR__.'/ReporteEstudianteCedula.jrxml'; // Ruta al archivo .jrxml

    // Configuración de la conexión a la base de datos
    
    $config= [
        'driver' => 'mysql', // Tipo de base de datos
        'host' => 'localhost',
        'user' => 'root',
        'pass' => 'root',
        'name' => 'universidad'
    ];
    
    $report = new PHPJasperXML(); // Establecer la conexión a la base de datos
    $report->load_xml_file($filename)
        ->setParameter(['reporttitle'=>'Database Report With Driver : '.$config['driver'],'ced'=> ''.$cedula])
        ->setDataSource($config)
        ->export('Pdf');
    
        print $report;
    

}else{
    
    $filename = __DIR__.'/ReporteEstudiante.jrxml'; // Ruta al archivo .jrxml

    // Configuración de la conexión a la base de datos
    
    $config= [
        'driver' => 'mysql', // Tipo de base de datos
        'host' => 'localhost',
        'user' => 'root',
        'pass' => 'root',
        'name' => 'universidad'
    ];
    
    $report = new PHPJasperXML(); // Establecer la conexión a la base de datos
    $report->load_xml_file($filename)
        ->setParameter(['reporttitle'=>'Database Report With Driver : '.$config['driver']])
        ->setDataSource($config)
        ->export('Pdf');
    
        print $report;
    
}
?>

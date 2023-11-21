<?php
require('fpdf/fpdf.php'); // Asegúrate de tener el archivo fpdf2.php en la ubicación correcta

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Gráficas', 0, 1, 'C');
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear un objeto PDF
$pdf = new PDF();
$pdf->AddPage();

// Generar datos para la gráfica
$data = array(
    array('Task', 'Hours per Day'),
    array('Work', 11),
    array('Eat', 2),
    array('Commute', 2),
    array('Watch TV', 5),
    array('Sleep', 8)
);

// Convertir datos a formato JSON
$jsonData = json_encode($data);

// Agregar el contenedor para la gráfica al PDF
$pdf->Write(10, 'Gráfico de barras:');
$pdf->Ln(10);

// En lugar de ejecutar JavaScript, puedes generar una imagen de la gráfica y agregarla al PDF
// Supongamos que ya tienes una imagen generada en formato PNG llamada 'chart.png'
$pdf->Image('chart.png', $pdf->GetX(), $pdf->GetY(), 0, 0, 'PNG');
$pdf->Ln(60); // Ajusta la posición según sea necesario
$pdf->Cell(0, 10, '', 0, 1); // Salto de línea

// Finalizar y mostrar el PDF
$pdf->Output();

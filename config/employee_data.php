<?php
require_once('tcpdf/tcpdf.php');

require 'db.php';

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

// Create a new PDF instance
$pdf = new TCPDF();

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Cake Shop - Employee Data');
$pdf->SetHeaderData('', '', 'Cake Shop - Employee Data', '');


$pdf->AddPage();


// Create a table
$html = '<table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>' . $row['employee_name'] . '</td>
                    <td>' . $row['employee_email'] . '</td>
                </tr>';
    }
    $html .= '</table>';
} else {
    $html .= '<tr><td colspan="2">No data found.</td></tr></table>';
}

$conn->close();

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('employee_data.pdf', 'D');
?>

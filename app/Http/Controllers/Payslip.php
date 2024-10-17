<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class Payslip extends Controller
{
    public static function print(Request $request) {
        $fpdf = new Fpdf('P', 'mm', 'A4');  

        $left_margin = 5;
        $right_margin = 5;
        $top_margin = 5;

        $fpdf->SetMargins($left_margin, $top_margin, $right_margin);
        $fpdf->AddPage();

        $fpdf->SetFillColor(169, 169, 169); 
        $fpdf->Rect(0, 0, 210, 297, 'F');

        $fpdf->Image('C:\Users\rowel\Downloads\PrintPDF\syntax-logo_4x.png', 145, 20, 50);

        $fpdf->SetFillColor(128, 128, 128);
        $fpdf->Rect(0, 0, 210, $top_margin, 'F');
        $fpdf->Rect(0, 297 - $top_margin, 210, $top_margin, 'F');
        $fpdf->Rect(0, $top_margin, $left_margin, 297 - 2 * $top_margin, 'F');
        $fpdf->Rect(210 - $right_margin, $top_margin, $right_margin, 297 - 2 * $top_margin, 'F');

        $fpdf->SetFont('Arial', 'B', 20);
        $fpdf->Cell(65, 8, '', 0, 0, 'C');
        $fpdf->Cell(55, 8, 'Syntax Systems', 0, 0, 'C');
        $fpdf->Cell(65, 8, '', 0, 0, 'C');

        $fpdf->Ln(8.5);
        $fpdf->SetLineWidth(0.5);
        $fpdf->Line(60, $fpdf->GetY(), 140, $fpdf->GetY());

        $fpdf->Ln(1);
        $fpdf->Line(65, $fpdf->GetY(), 135, $fpdf->GetY());

        $fpdf->Ln(1);
        $fpdf->Line(70, $fpdf->GetY(), 130, $fpdf->GetY());

        $fpdf->Ln(1);
        $fpdf->SetFont('Courier', 'BI', 20);
        $fpdf->Cell(65, 50, '', 0, 0, 'C');
        $fpdf->Cell(55, 8, 'Pay Slip', 0, 0, 'C');
        $fpdf->Cell(65, 8, '', 0, 0, 'C');

        $fpdf->Ln(1); 
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(10, 8, '', 0, 0, 'L');
        $fpdf->Cell(55, 8, 'Company Address', 0, 1, 'L');

        $fpdf->Ln(1); 
        $fpdf->SetFont('Times', 'B', 11); 
        $fpdf->Cell(10, 8, '', 0, 0, 'L'); 
        $fpdf->Cell(17, 8, 'Mobile:', 0, 0, 'L'); 
        $fpdf->SetFont('Times', 'U', 12); 
        $fpdf->Cell(1, 8, '09942261186', 0, 1, 'L'); 

        $fpdf->Ln(1); 
        $fpdf->SetFont('Times', 'B', 11); 
        $fpdf->Cell(10, 8, '', 0, 0, 'L'); 
        $fpdf->Cell(10, 8, 'Fax:', 0, 0, 'L'); 
        $fpdf->SetFont('Times', 'U', 12); 
        $fpdf->Cell(1, 8, '123-456-49165955', 0, 1, 'L'); 

        $fpdf->Ln(1); 
        $fpdf->SetFont('Times', 'B', 11); 
        $fpdf->Cell(10, 8, '', 0, 0, 'L'); 
        $fpdf->Cell(17, 8, 'Website:', 0, 0, 'L'); 
        $fpdf->SetFont('Times', 'U', 12); 
        $fpdf->Cell(1, 8, 'www.syntaxsystems.com', 0, 1, 'L');

        $fpdf->Ln(1); 
        $fpdf->SetFont('Times', 'B', 11); 
        $fpdf->Cell(10, 8, '', 0, 0, 'L'); 
        $fpdf->Cell(17, 8, 'Email:', 0, 0, 'L'); 
        $fpdf->SetFont('Times', 'U', 12); 
        $fpdf->Cell(1, 8, 'roseannpadin4@gmail.com', 0, 1, 'L');

        $fpdf->Ln(5); 
        $fpdf->SetFont('Times', 'B', 11); 
        $fpdf->Cell(10, 8, '', 0, 0, 'L'); 
        $fpdf->Cell(50, 8, 'Name of the Employee:', 0, 0, 'L'); 
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(1, 8, '________________________________', 0, 1, 'L');

        $fpdf->Ln(1); 
        $fpdf->SetFont('Times', 'B', 11); 
        $fpdf->Cell(10, 8, '', 0, 0, 'L'); 
        $fpdf->Cell(50, 8, 'Period of Payment:', 0, 0, 'L'); 
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(1, 8, '________________________________', 0, 1, 'L');


        $fpdf->Ln(5); 
        $fpdf->SetFont('Times', 'B', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->SetFillColor(128, 128, 128); 
        $fpdf->Cell($left_padding, 11, '', 0, 0, 'L');   
        $fpdf->Cell($total_width, 11, 'Scale of Payment:', 1, 1, 'L', true); 
        $fpdf->Cell($right_padding, 7, '', 0, 1, 'L');
    
        $fpdf->Ln(-7);
        $fpdf->SetFont('Times', 'B', 12); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(67, 11, 'Description', 1, 0, 'C');
        $fpdf->Cell(20, 11, 'Days', 1, 0, 'C');
        $fpdf->Cell(67, 11, 'Description', 1, 0, 'C');
        $fpdf->Cell(30, 11, 'Amount($)', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L'); 

        

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(67, 11, 'Standard Working Days in a Month', 1, 0, 'C');
        $fpdf->Cell(20, 11, '-----', 1, 0, 'C');
        $fpdf->Cell(67, 11, 'Basic Pay for a Month', 1, 0, 'C');
        $fpdf->Cell(30, 11, '000000.00', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(67, 11, 'Standard Working Hours in a Daily Basis', 1, 0, 'C');
        $fpdf->Cell(20, 11, '-----', 1, 0, 'C');
        $fpdf->Cell(67, 11, 'Daily Pay Rate', 1, 0, 'C');
        $fpdf->Cell(30, 11, '0000.00', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(67, 11, 'Training Rate', 1, 0, 'C');
        $fpdf->Cell(20, 11, '-----', 1, 0, 'C');
        $fpdf->Cell(67, 11, 'Pay Rent Per Hour', 1, 0, 'C');
        $fpdf->Cell(30, 11, '000.00', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3); 
        $fpdf->SetFont('Times', 'B', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->SetFillColor(128, 128, 128); 
        $fpdf->Cell($left_padding, 11, '', 0, 0, 'L');   
        $fpdf->Cell($total_width, 11, 'Computation of Gross Salary to be Paid for this month:', 1, 1, 'L', true); 
        $fpdf->Cell($right_padding, 7, '', 0, 1, 'L');

        $fpdf->Ln(-7);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(67, 11, 'Hours worked by employee & holidays', 1, 0, 'C');
        $fpdf->Cell(20, 11, '-----', 1, 0, 'C');
        $fpdf->Cell(67, 11, 'Salary to be paid on daily basis', 1, 0, 'C');
        $fpdf->Cell(30, 11, '0000.000', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(67, 11, 'Hours of overtime', 1, 0, 'C');
        $fpdf->Cell(20, 11, '-----', 1, 0, 'C');
        $fpdf->Cell(67, 11, 'Salary of overtime working', 1, 0, 'C');
        $fpdf->Cell(30, 11, '000.00', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(67, 11, 'Overtime in holidays', 1, 0, 'C');
        $fpdf->Cell(20, 11, '-----', 1, 0, 'C');
        $fpdf->Cell(67, 11, 'Salary for holiday overtime', 1, 0, 'C');
        $fpdf->Cell(30, 11, '000.00', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(67, 11, 'Hours of total night shifts', 1, 0, 'C');
        $fpdf->Cell(20, 11, '-----', 1, 0, 'C');
        $fpdf->Cell(67, 11, 'Pay for total night hours', 1, 0, 'C');
        $fpdf->Cell(30, 11, '000.00', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(67, 11, 'Total paid leaves', 1, 0, 'C');
        $fpdf->Cell(20, 11, '-----', 1, 0, 'C');
        $fpdf->Cell(67, 11, 'Salary for all paid leaves', 1, 0, 'C');
        $fpdf->Cell(30, 11, '000.00', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(67, 11, '', 1, 0, 'C');
        $fpdf->Cell(20, 11, '', 1, 0, 'C');
        $fpdf->Cell(67, 11, 'Total of Gross Salary', 1, 0, 'C');
        $fpdf->Cell(30, 11, '0000000.00', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3); 
        $fpdf->SetFont('Times', 'B', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->SetFillColor(128, 128, 128); 
        $fpdf->Cell($left_padding, 11, '', 0, 0, 'L');   
        $fpdf->Cell($total_width, 11, 'Break Up of Deduction for the Month:', 1, 1, 'L', true); 
        $fpdf->Cell($right_padding, 7, '', 0, 1, 'L');

        $fpdf->Ln(-7);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(154, 11, 'Contribution for social security', 1, 0, 'R');
        $fpdf->Cell(30, 11, '', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(154, 11, 'Contribution for health insurance', 1, 0, 'R');
        $fpdf->Cell(30, 11, '', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(154, 11, 'Contribution for housing insurance', 1, 0, 'R');
        $fpdf->Cell(30, 11, '', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');

        $fpdf->Ln(3);
        $fpdf->SetFont('Times', '', 11); 
        $left_padding = 8;
        $right_padding = 8;
        $total_width = 200 - ($left_padding + $right_padding);
        $fpdf->Cell($left_padding, 8, '', 0, 0, 'C'); 
        $fpdf->Cell(154, 11, 'Amount of withholding tax', 1, 0, 'R');
        $fpdf->Cell(30, 11, '', 1, 0, 'C');
        $fpdf->Cell($right_padding, 8, '', 0, 1, 'L');




        $fpdf->Output();
        exit;
    }
}

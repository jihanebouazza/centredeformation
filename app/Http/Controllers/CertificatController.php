<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;

use Dompdf\Options;
use App\Models\Inscription;
use Illuminate\Http\Request;

class CertificatController extends Controller
{

public function generateCertificate($id)
{
    $inscription = Inscription::findOrFail($id);
    $user = $inscription->etudiant;
    $formation = $inscription->groupe->formation;
    $groupe = $inscription->groupe;

    // Generate the certificate HTML content
    $html = view('etudiant.inscription.certificate', compact('user', 'formation', 'groupe'))->render();

    // Setup Dompdf options
    $options = new Options();
    $options->setIsRemoteEnabled(true); // Enable fetching remote stylesheets/images
    $options->set('defaultFont', 'Arial'); // Set the default font

    // Instantiate Dompdf with the options
    $dompdf = new Dompdf($options);

    // Load the HTML content
    $dompdf->loadHtml($html);

    // (Optional) Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML to PDF
    $dompdf->render();

    // Output the generated PDF to the browser (inline display)
    $dompdf->stream('certificate.pdf', ['Attachment' => false]);
}

}

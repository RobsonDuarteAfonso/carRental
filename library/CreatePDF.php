<?php

use Dompdf\Dompdf;

class CreatePDF {

    static public function create($data) {

        $dompdf = new Dompdf();

        $dompdf->loadHtml($data);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();

    }
}

?>
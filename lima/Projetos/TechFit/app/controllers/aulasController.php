<?php 

    function aulasController()
    {
        $modalidade = $_GET["modalidade"] ?? '';
        $aulas = Aulas::getAulas($modalidade);
        $data = [
            "titulo" => "Aulas",
            "aulas" => $aulas,
        ];
        render("aulasView", $data["titulo"], $data);
    
    }
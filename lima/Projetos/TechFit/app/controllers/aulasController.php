<?php 

    function aulasController()
    {
        $modalidadeSelecionada = $_GET["modalidade"] ?? '';
        $aulas = Aulas::getAulas($modalidadeSelecionada);
        $data = [
            "modalidadeSelecionada" => $modalidadeSelecionada,
            "titulo" => "Aulas",
            "aulas" => $aulas,
            "modalidades" => Modalidades::getModalidades(),
        ];
        render("aulasView", $data["titulo"], $data);
    
    }
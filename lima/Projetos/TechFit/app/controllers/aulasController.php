<?php 

    function aulasController()
    {
        $uri = rtrim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/');
        $modalidadeSelecionada = $_GET["modalidade"] ?? 'todas';
        if($_SERVER['REQUEST_METHOD'] === "POST" && ($uri === '/aulas/agendar' || $uri === '/aulas')){
            agendarAula($_POST['id_aula']);
            return;
        }
        $aulas = Aulas::getAulas($modalidadeSelecionada);
        $data = [
            "modalidadeSelecionada" => $modalidadeSelecionada,
            "titulo" => "Aulas",
            "aulas" => $aulas,
            "modalidades" => Modalidades::getModalidades(),
        ];
        render("aulasView", $data["titulo"], $data);
    
    }

    function agendarAula($id){
        Aulas::agendarAula($id, $_SESSION["user_id"]);

    }
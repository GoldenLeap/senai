<?php
function comunicadoController()
{
    $tipoLabels = [
    'Comunicado'      => 'Comunicado',
    'Promocao'        => 'Promoção',
    'Evento'          => 'Evento',
    'Manutencao'      => 'Manutenção',
    'MudancaHorario'  => 'Mudança de Horário',
    'Novidade'        => 'Novidade',
    'DicaSaude'       => 'Dicas de Saúde',
    'AvisoSeguranca'  => 'Aviso de Segurança',
    ];


    $data = [
        "nomeTipo" => $tipoLabels,
        "avisoTipos" => Aviso::getTipos(),
    ];
    render("admin/comunicadoView", "Criar comunicado", $data);
}

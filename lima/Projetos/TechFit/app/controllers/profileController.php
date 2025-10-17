<?php
function profileController(){
    $data = [
        'user_pfp' => "https://static.vecteezy.com/system/resources/previews/036/594/092/non_2x/man-empty-avatar-photo-placeholder-for-social-networks-resumes-forums-and-dating-sites-male-and-female-no-photo-images-for-unfilled-user-profile-free-vector.jpg",
        'nome' => 'Cleitinho',
        'tipo' => 'Aluno',
        'headExtras' => <<<HTML
    <link rel="stylesheet" href="./assets/css/profile.css" />
    <link rel="stylesheet" href="./assets/css/utility.css"/>
HTML
    ];
    render('profileView', 'Perfil', $data, );
}
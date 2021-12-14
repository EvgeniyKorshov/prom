<?php 
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

$content = [
    'title' => 'geekbrains',
    'h2'=>'Галерея изображений',
    'img'=>array(
        'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.OAvMsD-_RhInBdfq6p_hagHaEK%26pid%3DApi&f=1',
        'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.9RnSABsDijy8QXsJPgLdtAHaD7%26pid%3DApi&f=1',
        'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.explicit.bing.net%2Fth%3Fid%3DOIP.qRwe1slZ3upxSl1gizou_QHaEJ%26pid%3DApi&f=1',
        'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.YRr98v0fUTruVFWXXqTYyAHaEK%26pid%3DApi&f=1',
        'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.PdER9d74mOR8UFpDrqrNbwHaEK%26pid%3DApi&f=1',
    ),
    
];
echo $twig->render('index.html.twig',$content );
echo $twig->render('index2.html.twig');

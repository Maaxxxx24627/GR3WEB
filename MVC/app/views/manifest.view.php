<?php
header('Content-Type: application/json');

echo json_encode([
    "short_name" => "Douv",
    "name" => "Douvinaigrette",
    "icons" => [
        [
            "src" => "https://assets.douvinaigrette.sbihel.fr/Max_96px.png",
            "sizes" => "96x96",
            "type" => "image/png",
            "purpose" => "any"
        ],
        [
            "src" => "https://assets.douvinaigrette.sbihel.fr/Max_128px.png",
            "sizes" => "128x128",
            "type" => "image/png",
            "purpose" => "any"
        ],
        [
            "src" => "https://assets.douvinaigrette.sbihel.fr/Max_144px.png",
            "sizes" => "144x144",
            "type" => "image/png",
            "purpose" => "any"
        ],
        [
            "src" => "https://assets.douvinaigrette.sbihel.fr/Max_152px.png",
            "sizes" => "152x152",
            "type" => "image/png",
            "purpose" => "any"
        ],
        [
            "src" => "https://assets.douvinaigrette.sbihel.fr/Max_192px.png",
            "sizes" => "192x192",
            "type" => "image/png",
            "purpose" => "maskable"
        ],
        [
            "src" => "https://assets.douvinaigrette.sbihel.fr/Max_384px.png",
            "sizes" => "384x384",
            "type" => "image/png",
            "purpose" => "any"
        ],
        [
            "src" => "https://assets.douvinaigrette.sbihel.fr/Max_512px.png",
            "sizes" => "512x512",
            "type" => "image/png",
            "purpose" => "any"
        ]
    ],
    "screenshots" => [
        [
            "src" => "https://assets.douvinaigrette.sbihel.fr/Max_480px.png",
            "sizes" => "640x480",
            "type" => "image/png",
            "purpose" => "any"
        ],
        [
            "src" => "https://assets.douvinaigrette.sbihel.fr/Max_1334px.png",
            "sizes" => "750x1334",
            "type" => "image/png",
            "purpose" => "any"
        ],
        [
            "src" => "https://assets.douvinaigrette.sbihel.fr/Max_1920px.png",
            "sizes" => "1920x1080",
            "type" => "image/png",
            "purpose" => "any"
        ],
   
    ], // La virgule manquante a été ajoutée ici
    "start_url" => "/Home",
    "background_color" => "#FFFFFF",
    "display" => "standalone",
    "theme_color" => "#455A64",
    "orientation" => "portrait-primary",
    "lang" => "fr",
    "description" => "Un site web pour la recherche de stages.",
    "categories" => ["education", "jobs"],
    "dir" => "ltr",
    "prefer_related_applications" => false
]);
?>
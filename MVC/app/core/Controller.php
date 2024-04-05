<?php 


Trait Controller
{

	public function view($name)
	{
		$filename = "../app/views/".$name.".view.php";
		if(file_exists($filename))
		{
			require $filename;
		}else{

			$filename = "../app/views/404.view.php";
			require $filename;
		}
	}
}

// <?php

// trait Controller
// {s

//     public function view($name, $data = [])
//     {
//         // S'assurer que le chemin est correct en utilisant le répertoire de template déjà configuré
//         // /$template = $this->$smarty->$template_dir . '/' . $name . '.tpl';
//         $template = $this->smarty->template_dir . '/' . $name . '.tpl';


//         echo "ATTENTION";
//         // if (file_exists($templates))
//         // {
//         //     // Assigner des données au template Smarty
//         //     foreach ($data as $key => $value) {
//         //         $this->smarty->assign($key, $value);
//         //     }

//         //     // Afficher le template
//         //     $this->smarty->display($name . '.tpl');
//         // }
//         // else
//         // {
//         //     // Afficher une page d'erreur si le template n'existe pas
//         //     $this->smarty->display('404.tpl');
//         // }
//     }
// }
<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/rg/myappupdate/index.php?target=";
        $data = [
            array('text' => 'Home', 'link' => $base . 'home'),
            array('text' => 'krk', 'link' => $base . 'krk'),
            array('text' => 'Petaru', 'link' => $base . 'Petaru'),
            array('text' => 'Masyarakat', 'link' => $base . 'Masyarakat')
        ];
        return $data;
    }
}

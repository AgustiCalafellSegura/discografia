<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class','nav navbar-nav');

        $menu->addChild('Homepage', array('route' => 'app_homepage_viewhomepage', 'label' => 'Inici',));
        $menu->addChild('Artists', array('route' => 'app_artist_list', 'label' => 'Artistes',));
        $menu->addChild('Albums', array('route' => 'app_albums_listing', 'label' => 'Àlbums'));
        $menu->addChild('Songs', array('route' => 'app_songs_listing', 'label' => 'Cançons'));
        $menu->addChild('Contact', array('route' => 'app_contact_contactform', 'label' => 'Contacte'));

        return $menu;
    }
}
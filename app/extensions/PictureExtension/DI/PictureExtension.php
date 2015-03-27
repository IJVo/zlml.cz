<?php

use Nette\Application\Routers\Route;
use Nette\DI;
use Nette\PhpGenerator\PhpLiteral;

class PictureExtension extends Nette\DI\CompilerExtension {

	//TODO: instalace do databáze

	public function beforeCompile() {
		$builder = $this->getContainerBuilder();
		$router = $builder->getDefinition('router'); //TODO: route prepend
		$router->addSetup('offsetSet', array(new PhpLiteral('NULL'), new Route('newadmin/pictures[/<id>]', 'App:Pictures:default')));
		$builder->getDefinition('nette.presenterFactory')->addSetup('setMapping', array(array('App' => 'App\\*Module\\*Presenter')));
		//Admin Menu:
		$priorityQueue = new \SplPriorityQueue();
		$menuItem = new MenuItem();
		$menuItem->setHeading(_('Nahrát nový obrázek'));
		$menuItem->setText(_('Zde nahrajte obrázky'));
		$menuItem->setLink(':Admin:pictures');
		$priorityQueue->insert($menuItem, 10);
		$adminMenuFactory = $builder->getDefinition('adminMenuFactory');
		foreach ($priorityQueue as $entry) {
			$adminMenuFactory->addSetup('addContributor', [$entry]);
		}
	}

}

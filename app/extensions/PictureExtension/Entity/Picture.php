<?php

namespace Ext;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine;

/**
 * @ORM\Entity
 * @ORM\Table(name="pictures_ext")
 */
class Picture extends Doctrine\Entities\BaseEntity {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id;

	/** @ORM\Column(type="string", length=40) */
	protected $uuid;

	/** @ORM\Column(type="string", length=255) */
	protected $name;

	/** @ORM\Column(type="datetime") */
	protected $created;

}

<?php declare(strict_types = 1);

namespace App\Tests\AdminModule\Presenters;

use App\Users\Users;

require __DIR__ . '/../../bootstrap.php';

/**
 * @testCase
 * TODO: spojit s AdminPresenterTest
 */
class AdminPresenterDemoTest extends \Tester\TestCase
{

	use \Testbench\TCompiledContainer;
	use \Testbench\TPresenter;

	/** @var Users */
	private $users;

	private $action;

	public function setUp()
	{
		$this->users = $this->getService(Users::class);
		$this->logIn(1, 'demo');
	}

	public function testRenderDefault()
	{
		$this->checkAction($this->action = 'Admin:Admin:default');
	}

	public function testRenderDefaultEdit()
	{
		$article = $this->users->findOneBy([]);
		$this->checkAction($this->action = 'Admin:Admin:default', [$article->getId()]);
	}

	public function testRenderPictures()
	{
		$this->checkAction($this->action = 'Admin:Admin:pictures');
	}

	public function testRenderPrehled()
	{
		$this->checkAction($this->action = 'Admin:Admin:prehled');
	}

	public function testRenderTags()
	{
		$this->checkAction($this->action = 'Admin:Admin:tags');
	}

	public function testRenderUsers()
	{
		$this->checkAction($this->action = 'Admin:Admin:users');
	}

	public function testRenderUserEdit()
	{
		$user = $this->users->findOneBy([]);
		$this->checkAction($this->action = 'Admin:Admin:userEdit', [$user->getId()]);
	}

	public function tearDown()
	{
		$this->logOut();
		$this->checkRedirect($this->action, '/auth/sign/in');
	}

}

(new AdminPresenterDemoTest)->run();

<?php
class Controller_Login extends Controller_Template{

	public function action_index()
	{
		$data['logins'] = Model_Login::find('all');
		$this->template->title = "Logins";
		$this->template->content = View::forge('login/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('login');

		if ( ! $data['login'] = Model_Login::find($id))
		{
			Session::set_flash('error', 'Could not find login #'.$id);
			Response::redirect('login');
		}

		$this->template->title = "Login";
		$this->template->content = View::forge('login/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Login::validate('create');
			
			if ($val->run())
			{
				$login = Model_Login::forge(array(
					'username' => Input::post('username'),
					'password' => Input::post('password'),
				));

				if ($login and $login->save())
				{
					Session::set_flash('success', 'Added login #'.$login->id.'.');

					Response::redirect('login');
				}

				else
				{
					Session::set_flash('error', 'Could not save login.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Logins";
		$this->template->content = View::forge('login/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('login');

		if ( ! $login = Model_Login::find($id))
		{
			Session::set_flash('error', 'Could not find login #'.$id);
			Response::redirect('login');
		}

		$val = Model_Login::validate('edit');

		if ($val->run())
		{
			$login->username = Input::post('username');
			$login->password = Input::post('password');

			if ($login->save())
			{
				Session::set_flash('success', 'Updated login #' . $id);

				Response::redirect('login');
			}

			else
			{
				Session::set_flash('error', 'Could not update login #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$login->username = $val->validated('username');
				$login->password = $val->validated('password');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('login', $login, false);
		}

		$this->template->title = "Logins";
		$this->template->content = View::forge('login/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('login');

		if ($login = Model_Login::find($id))
		{
			$login->delete();

			Session::set_flash('success', 'Deleted login #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete login #'.$id);
		}

		Response::redirect('login');

	}


}

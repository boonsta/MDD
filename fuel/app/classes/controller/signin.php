<?php
class Controller_Signin extends Controller_Template{

	public function action_index()
	{
		$data['signins'] = Model_Signin::find('all');
		$this->template->title = "Signins";
		$this->template->content = View::forge('signin/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('signin');

		if ( ! $data['signin'] = Model_Signin::find($id))
		{
			Session::set_flash('error', 'Could not find signin #'.$id);
			Response::redirect('signin');
		}

		$this->template->title = "Signin";
		$this->template->content = View::forge('signin/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Signin::validate('create');
			
			if ($val->run())
			{
				$signin = Model_Signin::forge(array(
					'name' => Input::post('name'),
					'username' => Input::post('username'),
					'password' => Input::post('password'),
					'email' => Input::post('email'),
				));

				if ($signin and $signin->save())
				{
					Session::set_flash('success', 'Added signin #'.$signin->id.'.');

					Response::redirect('signin');
				}

				else
				{
					Session::set_flash('error', 'Could not save signin.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Signins";
		$this->template->content = View::forge('signin/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('signin');

		if ( ! $signin = Model_Signin::find($id))
		{
			Session::set_flash('error', 'Could not find signin #'.$id);
			Response::redirect('signin');
		}

		$val = Model_Signin::validate('edit');

		if ($val->run())
		{
			$signin->name = Input::post('name');
			$signin->username = Input::post('username');
			$signin->password = Input::post('password');
			$signin->email = Input::post('email');

			if ($signin->save())
			{
				Session::set_flash('success', 'Updated signin #' . $id);

				Response::redirect('signin');
			}

			else
			{
				Session::set_flash('error', 'Could not update signin #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$signin->name = $val->validated('name');
				$signin->username = $val->validated('username');
				$signin->password = $val->validated('password');
				$signin->email = $val->validated('email');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('signin', $signin, false);
		}

		$this->template->title = "Signins";
		$this->template->content = View::forge('signin/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('signin');

		if ($signin = Model_Signin::find($id))
		{
			$signin->delete();

			Session::set_flash('success', 'Deleted signin #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete signin #'.$id);
		}

		Response::redirect('signin');

	}


}

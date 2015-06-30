<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller{

	private $user_info;
	private $user_login;
	private $model_name;
	private $module_name;
	private $current_url;
	protected $data;
	private $title;
	protected $template = 'template/application_template';
	
	protected $limit = 10;
	
	function __construct($model_name)
	{
		parent::__construct();
		$this->load->library('uri');
		/**
		if (!$this->is_authenticated()) {
			$this->session->set_flashdata('warn','Silahkan Loggin');
			redirect('loggedin');
		}**/
		
		
		//$this->module_name = $model_name;
		//$this->model_name = "{$model_name}_model";
		$this->load->model(array($this->model_name, 'menu_group_model', 'menu_model', 'setting_model'));
		$this->data['menu_group'] = $this->menu_group_model->get_records();
		
		$settings = $this->setting_model->get_records();
		foreach ($settings as $row){}
		$this->data['nama_app'] = $row->NAMA_APP;
		$this->data['default_denda'] = $row->DENDA;
		
		/**
		$this->load->library('pagination');
		$model = $this->model_name;
		
		$config['base_url'] = base_url()."index.php/{$this->module_name}/page/";
		$config['total_rows'] = $this->$model->count_records();
		$config['per_page'] = $this->limit;

		$this->pagination->initialize($config); **/
	}
	
	function index($page = 0)
	{
		$model_name = $this->model_name;
		$this->data['current_url'] = $this->current_url;
		$this->data['results'] = $this->$model_name->get_records($this->limit, $page);
		$this->data['pages'] = $this->pagination->create_links();
		$this->data['main'] = $this->module_name.'/index';
		$this->load->view($this->template, $this->data);
	}
	
	function page($page = 0)
	{
		$this->index($page);
	}
	
	function add()
	{
		$this->data['title'] = 'Add '.$this->module_name;
		$this->data['action'] = $this->module_name.'/save';
		$this->data['main'] = $this->module_name.'/form'; 
		$this->load->view($this->template, $this->data);
	}
	
	function save($id =0, $data)
	{
		$model_name = $this->model_name;
		$module_name = $this->module_name;
		
		if ($this->form_validation->run())
		{
			if ($this->$model_name->save($id, $data))
			{
				$this->session->set_flashdata('notice','<p>Data telah disimpan</p>');
			}
			else
			{
				$this->session->set_flashdata('notice','<p>Data gagal disimpan</p>');
			}
			redirect($module_name);
		}
		
		if ($id = 0 )
			$this->add();
		else
			$this->edit($id);
		
	}
	
	function edit($id)
	{
		$model_name = $this->model_name;
		
		$this->data['result'] = $this->$model_name->get_record($id);
		$this->data['title'] = 'Add '.$this->module_name;
		$this->data['action'] = $this->module_name.'/save';
		$this->data['main'] = $this->module_name.'/form'; 
		$this->load->view($this->template, $this->data);
	}
	
	function delete($id)
	{
		$model_name = $this->model_name;
		
		if ($this->$model_name->delete($id))
		{
			$this->session->set_flashdata('notice','<p>Data telah dihapus</p>');
		}
		else
		{
			$this->session->set_flashdata('notice','<p>Data tidak dapat dihapus</p>');
		}
		
		redirect($this->module_name);
	}
	
	function find($criteria)
	{
		$model_name = $this->model_name;
		$this->data['current_url'] = $this->current_url;
		
		$this->data['results'] = $this->$model_name->get_by($criteria)->result();
		$this->data['main'] = $this->module_name.'/index';
		$this->load->view($this->template, $this->data);
	}
	
	function is_authenticated()
	{
		$this->user_login = $this->session->userdata('user_login');
		
		if (!empty($this->user_login)) {
			return TRUE;	
		} else {
			return FALSE;
		}
	}
	
	function get_current_user()
	{
		return $this->user_login;
	}
	function get_template()
	{
		return $this->template;
	}
	
	
}
?>
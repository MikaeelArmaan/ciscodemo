<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */



	public function index()
	{


		$data = [];
		$data['diskSpace'] = $this->toUnit(disk_free_space("/"));

		$data['totalSpace'] =  $this->toUnit(disk_total_space("/"));
		//clearstatcache();
		$data['inode'] = fileinode("C:\armaan\LnD\Usefull-command.xls");
		$data['files'] = scandir('C:\armaan\os', 1);
		//echo '<pre>';
		//print_r($data);
		//$this->copyFromServer();
		//$this->createZip();

		$this->load->view('welcome_message', $data);
	}

	function diagram()
	{
		$this->load->view('diagram');
	}

	function toUnit($bytes)
	{
		$symbols = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB');
		$exp = floor(log($bytes) / log(1024));
		//return $exp;
		return sprintf('%.2f ' . $symbols[$exp], ($bytes / pow(1024, floor($exp))));
	}

	function listDirectory($dir)
	{
		$directoryFile = [];
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					$directoryFile[] = $file;
				}
				closedir($dh);
			}
		}
		return $directoryFile;
	}

	function copyFromServer()
	{
		// define some variables
		$local_file = 'local.html';
		$server_file = 'index.html';

		// set up basic connection
		$conn_id = ftp_connect($severname);
		$ftp_user_name = $username;
		$ftp_user_pass = $password;
		// login with username and password
		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

		// try to download $server_file and save to $local_file
		if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
			echo "Successfully written to $local_file\n";
		} else {
			echo "There was a problem\n";
		}

		// close the connection
		ftp_close($conn_id);
		return true;
	}

	function createZip()
	{

		//$this->load->library('zip');
		$config['upload_path']          =  $this->config->item('upload') . '/' . date('Ymdhis');
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		$this->load->library('upload', $config);

		$files = $_FILES['file'];
		$images = array();
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, TRUE);
		}
		foreach ($files['name'] as $key => $image) {

			$_FILES['images[]']['name'] = $files['name'][$key];
			$_FILES['images[]']['type'] = $files['type'][$key];
			$_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
			$_FILES['images[]']['error'] = $files['error'][$key];
			$_FILES['images[]']['size'] = $files['size'][$key];

			$fileName =  $image;
			$images[] = $fileName;
			$config['file_name'] = $fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('images[]')) {
				$this->upload->data();
			} else {
				return
					$error = array('error' => $this->upload->display_errors());
			}
		}

		$this->zip->read_dir($config['upload_path']);

		// Write the zip file to a folder on your server. Name it "my_backup.zip"
		$this->zip->archive($config['upload_path'] . '.zip');

		// Download the file to your desktop. Name it "my_backup.zip"
		$this->zip->download($config['upload_path'] . '.zip');
		redirect(site_url());
	}
}

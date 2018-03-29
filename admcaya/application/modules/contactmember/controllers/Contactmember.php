<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactmember extends Authorize_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->data['current_page'] = 'dashboard';	
		$this->load->model(array('contactmember_m','global_m'));
		$this->template->set_layout('dashboard');
	}


	function index()
	{
		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		
		$config['base_url'] = base_url('contactmember/index/page/');
		$config['total_rows'] = $this->contactmember_m->total_data();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['first_url'] = 1;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<div class="grayr">';
		$config['full_tag_close'] = '</div>';
		$config['first_link'] = '&larr;';
		$config['first_tag_open'] = '<span class="disabled">';
		$config['first_tag_close'] = '</span>';
		$config['last_link'] = '&rarr;';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';
		$config['prev_link'] = 'Sebelumnya';
		$config['prev_tag_open'] = '';
		$config['prev_tag_close'] = '</a>';
		$config['next_link'] = 'Berikutnya';
		$config['next_tag_open'] = '';
		$config['next_tag_close'] = '';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';
		$config['cur_tag_open'] =  '<span class="current">';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '';
		$config['num_tag_close'] = '';
		
		$this->pagination->initialize($config);
		$this->data['paging'] = $this->pagination->create_links();
		$this->data['data'] = $this->contactmember_m->all($config['per_page'], $offset);
		$this->data['number'] = $offset + ($offset - 1) * ($config['per_page'] - 1);
		$this->template->set($this->data);
		$this->template->build('list');
	
	}

	function downloadexel()

	 {

	 		$today = date("dmY_His");
            $this->load->library("PHPExcel/PHPExcel");
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0)
            							->setCellValue('A1', 'No')
                                        ->setCellValue('B1', 'Name')
                                        ->setCellValue('C1', 'Email')
                                        ->setCellValue('D1', 'Phone')
                                        ->setCellValue('E1', 'Address')
                                        ->setCellValue('F1', 'Date');

            $this->data['datame'] = $this->contactmember_m->downloadexel();
            $rome = 1;
            $number = 0;

            foreach ($this->data['datame'] as $key => $val)
			{
				++$rome; ++$number;

				
               $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$rome, $number);
               $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$rome, $this->data['datame'][$key]['name']);
               $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$rome, $this->data['datame'][$key]['email']);
               $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$rome, $this->data['datame'][$key]['phone']);
               $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$rome, $this->data['datame'][$key]['address']);
               $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$rome, $this->data['datame'][$key]['created']);   
               
			}
            
            $objPHPExcel->getActiveSheet()->setTitle('Reporting t5mvc');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="ContactMember_'.$today.'.xlsx"');
            $objWriter->save("php://output");


     }



	
}

/* End of file contactmember.php */
/* Location: ./application/modules/contactmember/controllers/contactmember.php */
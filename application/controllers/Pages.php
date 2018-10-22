<?php
class Pages extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Header_model');
            $this->load->model('Rapide_model');
            $this->load->model('Pages_model');
            $this->load->helper('url_helper');
            $this->load->library('form_validation');
        }

        public function index(){
                Pages::view('home');
        }
        //construit la page demandée 
        public function view($page){       
        //récupère les infos pour le header (menu, sousmenu...)
        $data['header_item'] = $this->Header_model->get_menu();
        $data['sub_item'] = $this->Header_model->get_sousmenu();
        $data['third_item'] = $this->Header_model->get_thirdmenu();
        $data['rapide_item'] = $this->Rapide_model->get_rapide();
        $pagestab = $this->Pages_model->get_page($page);
        $data['background']= base_url().$pagestab['background'];
        $data['title'] = $pagestab['titre'];
        $data['subtitle'] = $pagestab['soustitre'];

        //récupère les infos du type de page
        if($pagestab['type'] == 'bulle'){
                $this->load->model('Bulles_model');
                $data['bulle_item'] = $this->Bulles_model->get_bulle($pagestab['id_pages']);
                $page = 'bulle2';  
        }
        if($pagestab['type'] == 'text'){
                $this->load->model('Text_model');
                $data['text_item'] = $this->Text_model->get_text($pagestab['id_pages']);
                $page = 'text';  
        }
        if($pagestab['type'] == 'sans'){
                $this->load->model('Sans_model');
                $data['text_item'] = $this->Sans_model->get_sans($pagestab['id_pages']);
                $page = 'text';  
        }
        if($pagestab['type'] == 'home'){
                $this->load->model('Home_model');
                $data['home_item'] = $this->Home_model->get_home($pagestab['id_pages']);
                $page = 'home2';  
        }
        if($pagestab['type'] == 'carroussel'){
                $this->load->model('Carroussel_model');
                $data['car_item'] = $this->Carroussel_model->get_car($pagestab['id_pages']);
                $data['photo_item'] = $this->Carroussel_model-> read_all_files($data['car_item'][0]['path']);
                $data['path'] = $data['car_item'][0]['path'];
                $page = 'carroussel';  
        }
        if($pagestab['type'] == 'article'){
                $this->load->model('Articles_model');
                $recup = $this->Articles_model->get_article($pagestab['id_pages'],TRUE);
                $id = $recup[0]['id_articlespage'];
                $data['intro']=$recup[0]['text'];
                $data['article_item'] = $this->Articles_model->get_article_by_page($id,FALSE);                
                $page = 'article';  
        }
        if($pagestab['type'] == 'document'){
                $this->load->model('Document_model');
                $data['doc_item'] = $this->Document_model->get_document($pagestab['id_pages']);
                $pathname = './'.$data['doc_item'][0]['path'];
                $data['folder'] = $this->Document_model->read_all_files($pathname);
                $data['file'] = [];
                foreach($data['folder']as $f):
                    $data['file'][$f] =  $this->Document_model->read_all_files($pathname.'/'.$f);
                endforeach;
                $page = 'document2';          
        } 
        if($pagestab['type'] == 'formulaire'){
                $this->load->model('Form_model');
                $this->load->model('Liste_model');
                $recup = $this->Form_model->get_form($pagestab['id_pages']);                
                $data['intro'] = $recup['intro'];
                $data['form'] = $recup;
                $data['nb_champ'] = $this->Form_model->nb_champ($pagestab['id_pages']);
                for($i = 1; $i <= $data['nb_champ']; $i++){
                        //on vérifie si on à une liste dans les champs
                        if($recup['type'.$i] == 'liste'){
                                $data['liste'] = $this->Liste_model->get_liste($recup['champ'.$i]);
                                $data['nb_item'] =  $this->Liste_model->nb_item($recup['champ'.$i]);
                        }
                }              
                $page = 'formulaire';  
        }

        
        
        if($page == 'arretes-municipaux'){
                $this->load->model('ArretesMunicipaux_model');
                $data['arretes'] = $this->ArretesMunicipaux_model->get_arretes();
                $page = 'arretes-municipaux';  
        }
        if($page == 'deliberations'){
                $this->load->model('Deliberations_model');
                $data['deliberations'] = $this->Deliberations_model->get_deliberations();
        }
       
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                //oops y'a pas ce fichier !!!
                show_404();
        }

        $this->load->view('header/index2',$data);
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer2');
        
}
}
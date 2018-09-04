<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
  
/** 
 * Layouts Class. 
 * 
 */
class Layouts { 

    // Will hold a CodeIgniter instance 
  private $CI; 
  // Will hold a title for the page, NULL by default 
  private $title_for_layout = NULL; 
  private $user_name = NULL;
  // Will hold a description for the page, NULL by default 
  private $description_for_layout = NULL; 
  // The title separator, ' | ' by default 
  private $title_separator = ' | '; 
  private $includes = array();
  private $station = array();
  private $treeview_for_layout = array();

  public function __construct()  
  { 
    $this->CI =& get_instance(); 
  } 
  public function set_title($title) 
  { 
    $this->title_for_layout = $title; 
  } 
  public function set_user_name($user) 
  { 
    $this->user_name = $user; 
  } 
   public function set_description($description) 
  { 
    $this->description_for_layout = $description; 
  } 
   public function set_treeview($fiber_info) 
  { 
    $this->treeview_for_layout = $fiber_info; 
  }
  public function set_station($station_info) 
  { 
    $this->station = $station_info; 
  }
 
//*********************************************************************************************************
  public function view($view_name,  $params = '', $layouts = array(),$default = true) 
  {  
    // Handle the site's title. If NULL, don't add anything. If not, add a  
    // separator and append the title. 
      
      if(is_array($layouts) && count($layouts) >=1)
      {
          foreach ($layouts as $layout_key =>$layout)
          {
              $params[$layout_key] = $this->CI->load->view($layout, $params, true);
          }
      }
      if($default)
      {
        if ($this->title_for_layout !== NULL)  
        { 
          $header_params['title_for_layout'] = $this->title_for_layout . $this->title_separator . $this->user_name; 
        }
          $header_params['user_name'] = $this->user_name;  
          //description
          $header_params['description_for_layout'] = $this->description_for_layout;
          
          //otdr_info for treeview
     
          $fiber_info['fiber_info'] = $this->treeview_for_layout;
          
        //  print_r($fiber_info);
          //otdr_info for treeview
          $station_tree = $this->station;
          
          //header
          $this->CI->load->view('layouts/header', $header_params);
          //sidebar
          if ($fiber_info !== '')  {
          $this->CI->load->view('layouts/sidebar', $fiber_info); 
          } 
          //staion
          $this->CI->load->view('layouts/station');
          // content
          $this->CI->load->view($view_name, $params);
          //footer
          $this->CI->load->view('layouts/footer');
      }
      else{
          $this->CI->load->view($view_name, $params); 
      }
    
  } 

  public function add_include($path, $prepend_base_url = TRUE) 
{ 
  if ($prepend_base_url) 
  { 
    $this->CI->load->helper('url'); // Load this just to be sure 
    $this->includes[] = base_url() . $path; 
  } 
  else
  { 
    $this->includes[] = $path; 
  } 
    
  return $this; // This allows chain-methods 
} 
  
public function print_includes() 
{ 
  // Initialize a string that will hold all includes 
  $final_includes = ''; 
    
  foreach ($this->includes as $include) 
  { 
    // Check if it's a JS or a CSS file 
    if (preg_match('/js$/', $include)) 
    { 
      // It's a JS file 
      $final_includes .= '<script type="text/javascript" src="' . $include . '"></script>'; 
    } 
    elseif (preg_match('/css$/', $include)) 
    { 
      // It's a CSS file 
      $final_includes .= '<link rel="stylesheet" href=" ' . $include . '" />'; 
    } 
      
    return $final_includes; 
  } 
}
}
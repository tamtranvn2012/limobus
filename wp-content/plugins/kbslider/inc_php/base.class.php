<?php

	class UniteBaseClassKB{
		
		protected static $wpdb;
		protected static $table_prefix;		
		protected static $mainFile;
		protected static $t;
		
		protected static $dir_plugin;
		public static $url_plugin;
		protected static $url_ajax;
		
		protected static $path_settings;		
		protected static $path_plugin;
		protected static $path_views;
		protected static $path_templates;
		protected static $path_cache;
		protected static $path_base;
		protected static $is_multisite;
		protected static $debugMode = false;
		
		
		/**
		 * 
		 * the constructor
		 */
		public function __construct($mainFile,$t){
			global $wpdb;
			
			self::$is_multisite = UniteFunctionsWP::isMultisite();
			
			self::$wpdb = $wpdb;
			self::$table_prefix = self::$wpdb->base_prefix;
			self::$mainFile = $mainFile;
			self::$t = $t;
			
			//set plugin dirname (as the main filename)
			$info = pathinfo($mainFile);
			self::$dir_plugin = $info["filename"];			
			self::$url_plugin = plugins_url(self::$dir_plugin)."/";
			self::$url_ajax = admin_url("admin-ajax.php");
			
			self::$path_plugin = dirname(self::$mainFile)."/";
			self::$path_settings = self::$path_plugin."settings/";
			
			//set cache path:
			self::setPathCache();
			
			self::$path_views = self::$path_plugin."views/";
			self::$path_templates = self::$path_views."/templates/";
			self::$path_base = ABSPATH;
			
			load_plugin_textdomain( self::$dir_plugin );
		}
		
		/**
		 * 
		 * set cache path for images. for multisite it will be current blog content folder
		 */
		private static function setPathCache(){
			
			self::$path_cache = self::$path_plugin."cache/";
			
			if(self::$is_multisite && defined("BLOGUPLOADDIR")){
				$path = BLOGUPLOADDIR.self::$dir_plugin."-cache/";
				
				if(!is_dir($path))
					mkdir($path);
				if(is_dir($path))
					self::$path_cache = $path;
			}
		}
		
		/**
		 * 
		 * set debug mode.
		 */
		public static function setDebugMode(){
			self::$debugMode = true;
		}
		
		
		/**
		 * 
		 * add some wordpress action
		 */
		protected static function addAction($action,$eventFunction){
			
			add_action( $action, array(self::$t, $eventFunction) );
			
		}
		
		
		/**
		 * 
		 * register script helper function
		 * @param $scriptFilename
		 */
		protected static function addScriptAbsoluteUrl($scriptPath,$handle){
			
			wp_register_script($handle , $scriptPath);
			wp_enqueue_script($handle);
		}
		
		/**
		 * 
		 * register script helper function
		 * @param $scriptFilename
		 */
		protected static function addScript($scriptName,$folder="js",$handle=null){
			if($handle == null)
				$handle = self::$dir_plugin."-".$scriptName;
			
			wp_register_script($handle , self::$url_plugin .$folder."/".$scriptName.".js" );
			wp_enqueue_script($handle);
		}

		/**
		 * 
		 * register common script helper function
		 * the handle for the common script is coming without plugin name
		 */
		protected static function addScriptCommon($scriptName,$handle=null, $folder="js"){
			if($handle == null)
				$handle = $scriptName;
			
			self::addScript($scriptName,$folder,$handle);
		}
		
		
		/**
		 * 
		 * simple enqueue script
		 */
		protected static function addWPScript($scriptName){
			wp_enqueue_script($scriptName);
		}
		
		
		/**
		 * 
		 * register style helper function
		 * @param $styleFilename
		 */
		protected static function addStyle($styleName,$folder="css",$handle=null){
			if($handle == null)
				$handle = self::$dir_plugin."-".$styleName;
			
			wp_register_style($handle , self::$url_plugin .$folder."/".$styleName.".css" );
			wp_enqueue_style($handle);
		}
		
		/**
		 * 
		 * register common script helper function
		 * the handle for the common script is coming without plugin name
		 */
		protected static function addStyleCommon($styleName,$folder="css"){
			
			self::addStyle($styleName,$folder,$styleName);
			
		}

		/**
		 * 
		 * register style absolute url helper function
		 */
		protected static function addStyleAbsoluteUrl($styleUrl,$handle){
			
			wp_register_style($handle , $styleUrl);
			wp_enqueue_style($handle);
		}
		
		
		/**
		 * 
		 * simple enqueue style
		 */
		protected static function addWPStyle($styleName){
			wp_enqueue_style($styleName);
		}
		
		/**
		 * 
		 * get image url to be shown via thumb making script.
		 */
		public static function getImageUrl($filepath, $width=null,$height=null,$exact=false,$effect=null,$effect_param=null){
			
			$urlBase = self::$url_ajax."?action=".self::$dir_plugin."_show_image";
			
			$urlImage = UniteImageView::getUrlThumb($urlBase, $filepath,$width ,$height ,$exact ,$effect ,$effect_param);
			
			return($urlImage);
		}
		
		
		/**
		 * 
		 * on show image ajax event. outputs image with parameters 
		 */
		public static function onShowImage(){
		
			$pathImages = UniteFunctionsWP::getPathContent();
			$urlImages = UniteFunctionsWP::getUrlContent();
			
			/*
			if(strpos($pathImages, "uploads") === false)
				$pathImages .= "uploads/";
			*/
			
			/*
			dmp(get_defined_constants());
			dmp($_GET);
			dmp($urlImages);
			exit();
			*/
			
			try{
				
				$imageView = new UniteImageView(self::$path_cache,$pathImages,$urlImages);
				$imageView->showImageFromGet();
				
			}catch (Exception $e){
				header("status: 500");
				echo $e->getMessage();
				exit();
			}
		}
		
		
		/**
		 * 
		 * get POST var
		 */
		protected static function getPostVar($key,$defaultValue = ""){
			$val = self::getVar($_POST, $key, $defaultValue);
			return($val);			
		}
				
		/**
		 * 
		 * get GET var
		 */
		protected static function getGetVar($key,$defaultValue = ""){
			$val = self::getVar($_GET, $key, $defaultValue);
			return($val);
		}
		
		/**
		 * 
		 * get some var from array
		 */
		protected static function getVar($arr,$key,$defaultValue = ""){
			$val = $defaultValue;
			if(isset($arr[$key])) $val = $arr[$key];
			return($val);
		}
		
		
	}

?>
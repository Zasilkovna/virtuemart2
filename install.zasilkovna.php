<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

function recurse_copy($src,$dst) {             
            if(is_dir($src)){
                $dir = opendir($src); 
                @mkdir($dst); 
                while(false !== ( $file = readdir($dir)) ) { 
                    if (( $file != '.' ) && ( $file != '..' )) { 
                        if ( is_dir($src . '/' . $file) ) { 
                            recurse_copy($src . '/' . $file,$dst . '/' . $file); 
                        } 
                        else { 
                            echo "<b>adding file:</b> ".$dst.DS.$file."<br>";
                            copy($src . '/' . $file,$dst . '/' . $file); 
                        } 
                    } 
                } 
                closedir($dir); 
            }else{
                echo "<b>adding file:</b> ".$dst."<br>";
                copy($src,$dst);
            }
} 
function recurse_delete($dir) {
        echo "deleting: ".$dir."<br>";
        
        if(is_dir($dir)){
            foreach(glob($dir . '/*') as $file) {
                if(is_dir($file))
                    recurse_delete($file);
                else
                    unlink($file);
            }
            rmdir($dir);
        }else{
                unlink($dir);
        }
}
class plgVmShipmentZasilkovnaInstallerScript
{
        /**
         * Constructor
         *
         * @param   JAdapterInstance  $adapter  The object responsible for running this script
         */
        public function __constructor(JAdapterInstance $adapter){

        }
 
        /**
         * Called before any type of action
         *
         * @param   string  $route  Which action is happening (install|uninstall|discover_install)
         * @param   JAdapterInstance  $adapter  The object responsible for running this script
         *
         * @return  boolean  True on success
         */
        public function preflight($route, JAdapterInstance $adapter){
        	
        }
 
        /**
         * Called after any type of action
         *
         * @param   string  $route  Which action is happening (install|uninstall|discover_install)
         * @param   JAdapterInstance  $adapter  The object responsible for running this script
         *
         * @return  boolean  True on success
         */
        public function postflight($route, JAdapterInstance $adapter){
                $vm_admin_path=JPATH_ADMINISTRATOR.DS.'components'.DS.'com_virtuemart';
                if($route=="install"){
                        $media_path=JPATH_ROOT.DS.'media'.DS.'com_zasilkovna'.DS;
                        recurse_copy($media_path.'admin'.DS.'com_virtuemart'.DS,$vm_admin_path.DS);
                        foreach(array('en-GB','cs-CZ','sk-SK') as $langCode){
                            recurse_copy($media_path.'admin'.DS.$langCode.'.plg_vmshipment_zasilkovna.ini',JPATH_ADMINISTRATOR.DS.'language'.DS.$langCode.DS.$langCode.'.plg_vmshipment_zasilkovna.ini');
                        }

                        $db =& JFactory::getDBO();
                        $q="CREATE TABLE IF NOT EXISTS #__virtuemart_zasilkovna_branches (
                                        `id` int(10) NOT NULL,
                                        `name_street` varchar(200) NOT NULL,
                                        `currency` text NOT NULL,
                                        `country` varchar(10) NOT NULL
                                        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
                        $db->setQuery($q);
                        $db->query();

                        $queries[] = "ALTER TABLE `#__virtuemart_shipment_plg_zasilkovna` ADD COLUMN `first_name` VARCHAR(255) NULL DEFAULT NULL AFTER `phone`;";
                        $queries[] = "ALTER TABLE `#__virtuemart_shipment_plg_zasilkovna` ADD COLUMN `last_name` VARCHAR(255) NULL DEFAULT NULL AFTER `phone`;";                        
                        $queries[] = "ALTER TABLE `#__virtuemart_shipment_plg_zasilkovna` ADD COLUMN `address` VARCHAR(255) NULL DEFAULT NULL AFTER `phone`;";                        
                        $queries[] = "ALTER TABLE `#__virtuemart_shipment_plg_zasilkovna` ADD COLUMN `city` VARCHAR(255) NULL DEFAULT NULL AFTER `phone`;";                        
                        $queries[] = "ALTER TABLE `#__virtuemart_shipment_plg_zasilkovna` ADD COLUMN `zip_code` VARCHAR(255) NULL DEFAULT NULL AFTER `phone`;";                        
                        $queries[] = "ALTER TABLE `#__virtuemart_shipment_plg_zasilkovna` ADD COLUMN `virtuemart_country_id` VARCHAR(255) NULL DEFAULT NULL AFTER `phone`;";                  
                        
                        foreach ($queries as $q) {
                            $db->setQuery($q);
                            $db->query();
                        }

                        $q = "INSERT INTO #__virtuemart_adminmenuentries (`module_id`, `parent_id`, `name`, `link`, `depends`, `icon_class`, `ordering`, `published`, `tooltip`, `view`, `task`) VALUES
                            (5, 0, 'ZASILKOVNA', '', '', 'vmicon vmicon-16-zasilkovna', 1, 1, '', 'zasilkovna', '');";
                        $db->setQuery($q);
                        $db->query();
                        
                }
        }
 
        /**
         * Called on installation
         *
         * @param   JAdapterInstance  $adapter  The object responsible for running this script
         *
         * @return  boolean  True on success
         */
        public function install(JAdapterInstance $adapter){
        	
        }
 
        /**
         * Called on update
         *
         * @param   JAdapterInstance  $adapter  The object responsible for running this script
         *
         * @return  boolean  True on success
         */
        public function update(JAdapterInstance $adapter){
        	
        }
 
        /**
         * Called on uninstallation
         *
         * @param   JAdapterInstance  $adapter  The object responsible for running this script
         */
        public function uninstall(JAdapterInstance $adapter){
                $db =& JFactory::getDBO();
                $q="DELETE FROM #__virtuemart_adminmenuentries WHERE `name` = 'zasilkovna';";
                $db->setQuery($q);
                $db->query();

                $vm_admin_path=JPATH_ADMINISTRATOR.DS.'components'.DS.'com_virtuemart';
                recurse_delete($vm_admin_path.DS.'models'.DS.'zasilkovna.php');
                recurse_delete($vm_admin_path.DS.'models'.DS.'zasilkovna_orders.php');
                recurse_delete($vm_admin_path.DS.'views'.DS.'zasilkovna'.DS);
                recurse_delete($vm_admin_path.DS.'controllers'.DS.'zasilkovna.php');
                recurse_delete(JPATH_ADMINISTRATOR.DS.'language'.DS.'en-GB'.DS.'en-GB.plg_vmshipment_zasilkovna.ini');



        	
        }
        
}


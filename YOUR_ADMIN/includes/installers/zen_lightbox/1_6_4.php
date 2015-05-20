<?php


$zc150 = (PROJECT_VERSION_MAJOR > 1 || (PROJECT_VERSION_MAJOR == 1 && substr(PROJECT_VERSION_MINOR, 0, 3) >= 5));
if ($zc150) { // continue Zen Cart 1.5.0
    $admin_page = 'configZenLightbox';
  // delete configuration menu
  $db->Execute("DELETE FROM ".TABLE_ADMIN_PAGES." WHERE page_key = '".$admin_page."' LIMIT 1;");
  // add configuration menu
  if (!zen_page_key_exists($admin_page)) {
    if ((int)$configuration_group_id > 0) {
      zen_register_admin_page($admin_page,
                              'BOX_CONFIGURATION_ZEN_LIGHTBOX', 
                              'FILENAME_CONFIGURATION',
                              'gID=' . $configuration_group_id, 
                              'configuration', 
                              'Y',
                              $configuration_group_id);
        
      $messageStack->add('Enabled Zen Lightbox Configuration Menu.', 'success');
    }
  }
}

/* 
update.sql
 SELECT @cgi := `configuration_group_id` FROM `configuration_group` WHERE `configuration_group_title` = 'Zen Lightbox';
 INSERT INTO `configuration` (`configuration_id`, `configuration_title`, `configuration_key`, `configuration_value`, `configuration_description`, `configuration_group_id`, `sort_order`, `last_modified`, `date_added`, `use_function`, `set_function`) VALUES
 (NULL, 'Always show Prev / Next', 'ZEN_LIGHTBOX_PREV_NEXT', 'false', '<br />If true, the lightbox will always show Previous & Next buttons when using additional images. NOTE: This setting will be overwritten automatically when Close on Image Click is set to TRUE.<br /><br /><b>Default: false</b>', @cgi, 112, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''), ');



//zencart 1.5 mods

INSERT INTO `admin_pages` (`page_key` ,`language_key` ,`main_page` ,`page_params` ,`menu_key` ,`display_on_menu` ,`sort_order`)VALUES 
('configZenLightbox', 'BOX_CONFIGURATION_ZEN_LIGHTBOX', 'FILENAME_CONFIGURATION', CONCAT('gID=',@cgi), 'configuration', 'Y', @cgi);
 * 
 */
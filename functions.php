<?php

// Autoloader for directories helper, use with care
// exposes the include_all_files_recursively function

require_once(get_template_directory() . '/inc/utilities/include_all_files_recursively.php');

// data-model
include_all_files_recursively('/inc/data-model');

// scripts
include_all_files_recursively('/inc/scripts');

// styles
include_all_files_recursively('/inc/styles');

// wp utils
include_all_files_recursively('/inc/wp-utils');

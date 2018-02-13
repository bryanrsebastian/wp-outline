<?php
/**
 * Render a view with parameters
 *
 * to create a view create a file inside views folder in theme root directory
 * theme-folder/views/[file-name].php
 *
 * to use the view
 *
 * view('[file-name]', array(
 *    'some_variable' => 'value',
 *    'some_variable_2' => 'value 2',
 * ));
 *
 * then inside about-us.php you can use the variable like this
 * <?php echo $some_variable; ?>
 * <?php echo $some_variable_2; ?>
 *
 * Put as many variables you want to passed in the view in the array
 * 
 * @param  [string] $template [Name of the file without file extension]
 * @param  [array]  $vars     [The variables to be passed into the view]
 * @return [void]			  [Include partial file and enable the passing of variables]
 */
if ( ! function_exists( 'include_partial' ) ) {
	function view( $template, $vars = array() ) {
		// Cache
		static $views = array();

		$path = get_template_directory() . '/views/' . str_replace('.', DIRECTORY_SEPARATOR, $template) . '.php';
		if (in_array($path, $views)) 
		{
			extract($vars);
			include $path;
		}
		else 
		{
			if (file_exists($path)) 
			{
				$views[] = $path;
				extract($vars);
				include $path;
			}	
		}
	}
}
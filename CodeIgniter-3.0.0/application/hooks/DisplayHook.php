<?php

/**
 * Hook to hijack display testing results in case of testing enviroment
 * 
 * @author Ricardo Valfreixo <ricardo.freixo@elucidat.com>
 */
class DisplayHook
{
	/**
	 * intercept normal output and echo it instead of processing it through views
	 * when running unit tests
	 * 
	 * @author Ricardo Valfreixo <ricardo.freixo@elucidat.com>
	 */
	public function captureOutput()
	{
		$this->CI =& get_instance();
		$output = $this->CI->output->get_output();

		if (ENVIRONMENT != 'testing') {
			echo $output;
		}
	}
}
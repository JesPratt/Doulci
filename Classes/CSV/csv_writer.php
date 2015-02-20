<?php

/**
 *
 * @category
 *
 * @package CSV
 * @author Michael Kramer
 */
class CSV_Writer
{
	
	protected $_handle = null;
	
	protected $_init = false;
	
	protected $_output_csv = null;
	
	protected $_layout = array ();
	
	protected $_filename = '';

	/**
	 * Initialize CSV, open file and get it ready for reading
	 *
	 * @throws Exception
	 */
	protected function _init ( )
	{
		ini_set ( 'auto_detect_line_endings', 1 );
		$this->_init = true;
		$this->_handle = fopen ( $this->_output_csv, "w+" );
		if ( ! $this->_handle )
		{
			throw new Exception ( 'Could not open file for write: ' . $this->_output_csv );
		}
	}

	/**
	 * Create a working CSV File for us to parse, modify, edit, add to etc
	 *
	 * @param type $filename        	
	 * @param type $working_dir        	
	 * @return boolean
	 * @throws Exception
	 */
	protected function _createWorkingFile ( $filename, $working_dir )
	{
		$contents = ''; // empty file
		$timestamp = time ( );
		
		if ( ! is_dir ( $working_dir ) )
		{
			$result = mkdir ( $working_dir, 0755, true );
			if ( ! $result )
			{
				throw new Exception ( );
			}
		}
		
		$handle = fopen ( $working_dir . $filename, "w+" );
		if ( $handle )
		{
			$this->_filename = $filename;
			fwrite ( $handle, $contents );
			fclose ( $handle );
			return $working_dir . $filename;
		}
		// log the error
		return false;
	}

	/**
	 * Set what our outputted CSV should be
	 *
	 * @param string $filename        	
	 * @param string $working_dir        	
	 */
	public function setOutputCsv ( $filename, $working_dir )
	{
		return $this->_output_csv = $this->_createWorkingFile ( $filename, $working_dir );
	}

	/**
	 * Write row to CSV
	 *
	 * @param type $row        	
	 * @throws Exception
	 */
	public function writeRow ( $row = array() )
	{
		if ( ! $this->_init )
		{
			$this->_init ( );
		}
		
		$line = array ();
		foreach ( $this->_layout as $key )
		{
			if ( isset ( $row [ $key ] ) )
			{
				$line [ $key ] = $row [ $key ];
			}
			else
			{
				$line [ $key ] = NULL;
			}
		}
		
		$result = fputcsv ( $this->_handle, $line, ',', '"' );
		if ( $result === FALSE )
		{
			throw new Exception ( 'Failed to write row (' . var_export ( $row, true ) . ') for CSV ' . $this->_filename );
		}
	}

	/**
	 * Clean up our file streams, and anything that we don't need
	 */
	public function clean ( )
	{
		if ( $this->_handle )
		{
			fclose ( $this->_handle );
		}
		$this->_init = false;
	}

	/**
	 * Set our CSV Layout, what fields correspond to what
	 *
	 * @param array $layout        	
	 */
	public function setLayout ( array $layout )
	{
		$this->_layout = $layout;
	}

	/**
	 * Return our CSV Layout
	 *
	 * @return array
	 */
	public function getLayout ( )
	{
		return $this->_layout;
	}
}
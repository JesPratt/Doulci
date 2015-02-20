<?php

/**
 *
 * @category
 *
 * @package CSV
 * @author Michael Kramer
 */
class CSV_Reader
{
	
	protected $_handle = null;
	
	protected $_init = false;
	
	protected $_csv = null;
	
	protected $_layout = array ();
	
	protected $_row = null;

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

	/**
	 * Read array layout from first row
	 *
	 * @throws Exception
	 */
	public function readLayoutFromFirstRow ( )
	{
		$this->_init ( );
		$this->_layout = array (); // reset for multiple
		$line = fgetcsv ( $this->_handle, 4096, ',' );
		if ( ! $line )
		{
			fclose ( $this->_handle );
			throw new Exception ( 'Invalid File, could not read layout from first row' );
		}
		
		foreach ( $line as $key )
		{
			$this->_layout [ ] = strtolower ( $key );
		}
	}

	/**
	 * Set the absolute or relative path to the CSV file
	 *
	 * @param string $csv        	
	 */
	public function setCsv ( $csv )
	{
		$this->_csv = $csv;
	}

	/**
	 * Process the CSV, one row, should be called in a while loop
	 *
	 * @return boolean, true on success, false on end of file
	 */
	public function process ( )
	{
		if ( ! $this->_init )
		{
			$this->_init ( );
		}
		$line = fgetcsv ( $this->_handle, 4096 );
		if ( ! $line )
		{
			fclose ( $this->_handle );
			return false;
		}
		$i = 0;
		$row = array ();
		foreach ( $this->_layout as $key )
		{
			if ( isset ( $line [ $i ] ) )
			{
				$row [ $key ] = $line [ $i ];
			}
			else
			{
				$row [ $key ] = NULL;
			}
			$i ++;
		}
		$this->_row = $row;
		return true;
	}

	/**
	 * Returns the current row
	 *
	 * @return array
	 */
	public function getRow ( )
	{
		return $this->_row;
	}

	/**
	 * Initialize CSV, open file and get it ready for reading
	 *
	 * @throws Exception
	 */
	protected function _init ( )
	{
		ini_set ( 'auto_detect_line_endings', 1 );
		$this->_init = true;
		$this->_handle = fopen ( $this->_csv, "r" );
		if ( ! $this->_handle )
		{
			throw new Exception ( 'Could not open file: ' . $this->_csv );
		}
	}
}
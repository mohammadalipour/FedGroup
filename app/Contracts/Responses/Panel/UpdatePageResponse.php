<?php
	
	namespace App\Contracts\Responses\Panel;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class UpdatePageResponse implements ResponseInterface
	{
		protected $data = [];
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [];
			
			return $this;
		}
	}
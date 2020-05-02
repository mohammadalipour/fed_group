<?php
	
	namespace App\Entities;
	
	
	class PageEntity extends Entity
	{
		const STATIC_PAGE_TYPE = 'static_page';
		const CONTACT_US_PAGE_TYPE = 'contact_us';
		const ABOUT_US_PAGE_TYPE = 'about_us';
		const TERM_AND_CONDITION_PAGE_TYPE = 'term_and_condition';
		
		const PAGE_TYPE = [
			self::ABOUT_US_PAGE_TYPE,
			self::CONTACT_US_PAGE_TYPE,
			self::STATIC_PAGE_TYPE,
			self::TERM_AND_CONDITION_PAGE_TYPE
		];
		
		protected $type = [];
		protected $content;
		
		
		/**
		 * @return array
		 */
		public function getType(): array
		{
			return $this->type;
		}
		
		/**
		 * @param array $type
		 * @return PageEntity
		 */
		public function setType(array $type)
		{
			$this->type = $type;
			
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getContent()
		{
			return $this->content;
		}
		
		/**
		 * @param mixed $content
		 * @return PageEntity
		 */
		public function setContent($content)
		{
			$this->content = $content;
			
			return $this;
		}
	}
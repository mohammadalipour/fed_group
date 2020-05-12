<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	
	class RoleEntity extends Entity
	{
		const ADMIN_TYPE='admin';
		const USER_TYPE='user';
		
		const ROLE_TYPES=[
			self::ADMIN_TYPE,
			self::USER_TYPE
		];
		
		protected $type=[];
		
		/**
		 * @return array
		 */
		public function getType(): array
		{
			return $this->type;
		}
		
		/**
		 * @param array $type
		 * @return RoleEntity
		 */
		public function setType(array $type)
		{
			$this->type = $type;
			
			return $this;
		}
	}
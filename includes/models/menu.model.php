<?php

class Menu 
{	
	public $menuId;
	public $menuLinkDisplay;
	public $menuLinkHref;
	public $isActive;
	public $sortOrder;
	public $parentMenu;

	public static function getBySql($sql) 
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			// Execute database query
			$statement = $database->query($sql);
			
			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();
			
			// Close database resources
			$database = null;
			
			// Return results
			return $result;
		}
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}		
	}
	
	public static function getAll() 
	{
		$sql = "select * from BudgetMenu";
		
		return self::getBySql($sql);				
	}
	
	public static function getNavBarItems() 
	{
		$sql = "SELECT 
				MenuId,
				MenuLinkDisplay, 
				MenuLinkHref
			FROM BudgetMenu
			WHERE IsActive = 1
			AND ParentMenu = 0
			ORDER BY SortOrder ASC";
		
		return self::getBySql($sql);				
	}
	
	public static function getNavBarChildren($parentMenu)
	{
		try
		{
			// Open database connection           
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			// Build database statement
			$sql = "SELECT 
					MenuLinkDisplay, 
					MenuLinkHref
				FROM BudgetMenu
				WHERE IsActive = 1
				AND ParentMenu = :parentMenu
				ORDER BY SortOrder ASC";
			
			$statement = $database->prepare($sql);
			$statement->bindParam(':parentMenu', $parentMenu, PDO::PARAM_INT);			
						
			// Execute database statement
			$statement->execute();
			
			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();
	
			// Close database resources
			$database = null;
			
			// Return results
			return $result;
		}	
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}
	}

	public static function getById($menuId) 
	{
		try
		{
			// Open database connection           
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			// Build database statement
			$sql = "select * from BudgetMenu where MenuId = :menuId limit 1";
			
			$statement = $database->prepare($sql);
			$statement->bindParam(':menuId', $menuId, PDO::PARAM_INT);			
						
			// Execute database statement
			$statement->execute();
			
			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetch();
	
			// Close database resources
			$database = null;
			
			// Return results
			return $result;
		}	
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}
	}
	
	private function insert() 
	{	
		try
		{
			// Open database connection
			$database = new Database();
			
			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "insert into BudgetMenu 
						(MenuLinkDisplay, 
						MenuLinkHref, 
						IsActive, 
						SortOrder,
						ParentMenu) 
					values
						(:menuLinkDisplay, 
						:menuLinkHref, 
						:isActive, 
						:sortOrder,
						:parentMenu)";
						
			$statement = $database->prepare($sql);
			$statement->bindParam(':menuLinkDisplay', $this->menuLinkDisplay, PDO::PARAM_STR);
			$statement->bindParam(':menuLinkHref', $this->menuLinkHref, PDO::PARAM_STR);
			$statement->bindParam(':isActive', $this->isActive, PDO::PARAM_INT);
			$statement->bindParam(':sortOrder', $this->sortOrder, PDO::PARAM_INT);
			$statement->bindParam(':parentMenu', $this->parentMenu, PDO::PARAM_INT);
			
			// Execute database statement
			$statement->execute();
			
			// Get affected rows
			$count = $statement->rowCount();
			
			// Close database resources
			$database = null;
			
			// Return affected rows
			return $count;
		}
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}			
	}

	private function update() 
	{
		try
		{
			// Open database connection
			$database = new Database();
			
			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database query
			$sql = "update BudgetMenu 
					set MenuLinkDisplay=:menuLinkDisplay,
						MenuLinkHref=:menuLinkHref,
						IsActive=:isActive,
						SortOrder=:sortOrder,
						ParentMenu=:parentMenu
					where MenuId = :menuId";
			
			// Build database statement
			$statement = $database->prepare($sql);
			$statement->bindParam(':menuId', $this->menuId, PDO::PARAM_INT);	
			$statement->bindParam(':menuLinkDisplay', $this->menuLinkDisplay, PDO::PARAM_STR);
			$statement->bindParam(':menuLinkHref', $this->menuLinkHref, PDO::PARAM_STR);
			$statement->bindParam(':isActive', $this->isActive, PDO::PARAM_INT);
			$statement->bindParam(':sortOrder', $this->sortOrder, PDO::PARAM_INT);
			$statement->bindParam(':parentMenu', $this->parentMenu, PDO::PARAM_INT);
			
			// Execute database statement
			$statement->execute();
			
			// Get affected rows
			$count = $statement->rowCount();
			
			// Close database resources
			$database = null;
			
			// Return affected rows
			return $count;
		}
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}
	}

	public function delete() 
	{
		try
		{
			// Open database connection
			$database = new Database();
			
			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "delete from BudgetMenu where MenuId = :menuId";
			
			$statement = $database->prepare($sql);
			$statement->bindParam(':menuId', $this->menuId, PDO::PARAM_INT);
			
			// Execute database statement
			$statement->execute();
			
			// Get affected rows
			$count = $statement->rowCount();
			
			// Close database resources
			$database = null;
			
			// Return affected rows
			return $count;
		}
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}
	}
	
	public function save() 
	{
		// Check object for id
		if (isset($this->menuId)) {	
		
			// Return update when id exists
			return $this->update();
			
		} else {
		
			// Return insert when id does not exists
			return $this->insert();
		}
	}	
}
<?php

class Category 
{	
	public $categoryId;
	public $categoryName;
	public $categoryAmount;
	public $categoryType;
	public $isActive;
	public $sortOrder;

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
		$sql = "select * from BudgetCategory";
		
		return self::getBySql($sql);				
	}
	
	public static function getVariableFundsView() 
	{
		$sql = "select CategoryName, 
				CategoryAmount, 
				SortOrder
			from BudgetCategory
			where IsActive =1
			and CategoryType =  'VariableFunds'
			union 
			select 'TOTAL', 
				sum( CategoryAmount ) , 
				99
			from BudgetCategory
			where IsActive =1
			and CategoryType =  'VariableFunds'
			order by SortOrder asc";
		
		return self::getBySql($sql);				
	}
	
		public static function getSavingsBreakdownView() 
	{
		$sql = "select CategoryName, 
				CategoryAmount, 
				SortOrder
			from BudgetCategory
			where IsActive =1
			and CategoryType =  'SavingsBreakdown'
			union 
			select 'TOTAL', 
				sum( CategoryAmount ) , 
				999
			from BudgetCategory
			where IsActive =1
			and CategoryType =  'SavingsBreakdown'
			order by SortOrder asc";
		
		return self::getBySql($sql);				
	}

	public static function getById($categoryId) 
	{
		try
		{
			// Open database connection           
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			// Build database statement
			$sql = "select * from BudgetCategory where CategoryId = :categoryId limit 1";
			
			$statement = $database->prepare($sql);
			$statement->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);			
						
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
			$sql = "insert into BudgetCategory 
						(CategoryName, 
						CategoryAmount, 
						CategoryType, 
						IsActive, 
						SortOrder) 
					values
						(:categoryName, 
						:categoryAmount, 
						:categoryType, 
						:isActive, 
						:sortOrder)";
						
			$statement = $database->prepare($sql);
			$statement->bindParam(':categoryName', $this->categoryName, PDO::PARAM_STR);
			$statement->bindParam(':categoryAmount', $this->categoryAmount, PDO::PARAM_INT);
			$statement->bindParam(':categoryType', $this->categoryType, PDO::PARAM_STR);
			$statement->bindParam(':isActive', $this->isActive, PDO::PARAM_INT);
			$statement->bindParam(':sortOrder', $this->sortOrder, PDO::PARAM_INT);
			
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
			$sql = "update BudgetCategory 
					set CategoryName=:categoryName,
						CategoryAmount=:categoryAmount,
						CategoryType=:categoryType,
						IsActive=:isActive,
						SortOrder=:sortOrder 
					where CategoryId = :categoryId";
			
			// Build database statement
			$statement = $database->prepare($sql);
			$statement->bindParam(':categoryId', $this->categoryId, PDO::PARAM_INT);	
			$statement->bindParam(':categoryName', $this->categoryName, PDO::PARAM_STR);
			$statement->bindParam(':categoryAmount', $this->categoryAmount, PDO::PARAM_INT);
			$statement->bindParam(':categoryType', $this->categoryType, PDO::PARAM_STR);
			$statement->bindParam(':isActive', $this->isActive, PDO::PARAM_INT);
			$statement->bindParam(':sortOrder', $this->sortOrder, PDO::PARAM_INT);
			
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
			$sql = "delete from BudgetCategory where CategoryId = :categoryId";
			
			$statement = $database->prepare($sql);
			$statement->bindParam(':categoryId', $this->categoryId, PDO::PARAM_INT);
			
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
		if (isset($this->categoryId)) {	
		
			// Return update when id exists
			return $this->update();
			
		} else {
		
			// Return insert when id does not exists
			return $this->insert();
		}
	}	
}
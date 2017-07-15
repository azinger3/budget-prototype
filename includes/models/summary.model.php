<?php

class Summary 
{	
	public $summaryId;
	public $summaryLinkDisplay;
	public $summaryLinkHref;
	public $isCurrent;
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
			
			// FetchAll results from cursor
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
	
	public static function getSingleBySql($sql) 
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
	
	public static function getAll() 
	{
		$sql = "select * from BudgetSummary";
		
		return self::getBySql($sql);				
	}
	
	public static function getCurrentSummary() 
	{
		$sql = "select  SummaryLinkDisplay, 
				SummaryLinkHref 
			from  BudgetSummary
			where IsCurrent = 1
			order by SortOrder asc
			limit 1";
		
		return self::getSingleBySql($sql);				
	}
	
	public static function getAllSummaries() 
	{
		$sql = "select  SummaryLinkDisplay, 
				SummaryLinkHref 
			from  BudgetSummary
			where IsCurrent <> 1
			order by SortOrder asc";
		
		return self::getBySql($sql);				
	}

	public static function getById($summaryId) 
	{
		try
		{
			// Open database connection           
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			// Build database statement
			$sql = "select * from BudgetSummary where SummaryId = :summaryId limit 1";
			
			$statement = $database->prepare($sql);
			$statement->bindParam(':summaryId', $summaryId, PDO::PARAM_INT);			
						
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
			$sql = "insert into BudgetSummary 
						(SummaryLinkDisplay, 
						SummaryLinkHref, 
						IsCurrent, 
						SortOrder) 
					values
						(:summaryLinkDisplay, 
						:summaryLinkHref, 
						:isCurrent, 
						:sortOrder)";
						
			$statement = $database->prepare($sql);
			$statement->bindParam(':summaryLinkDisplay', $this->summaryLinkDisplay, PDO::PARAM_STR);
			$statement->bindParam(':summaryLinkHref', $this->summaryLinkHref, PDO::PARAM_STR);
			$statement->bindParam(':isCurrent', $this->isCurrent, PDO::PARAM_INT);
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
			$sql = "update BudgetSummary 
					set SummaryLinkDisplay=:summaryLinkDisplay,
						SummaryLinkHref=:summaryLinkHref,
						IsCurrent=:isCurrent,
						SortOrder=:sortOrder 
					where SummaryId = :summaryId";
			
			// Build database statement
			$statement = $database->prepare($sql);
			$statement->bindParam(':summaryId', $this->summaryId, PDO::PARAM_INT);	
			$statement->bindParam(':summaryLinkDisplay', $this->summaryLinkDisplay, PDO::PARAM_STR);
			$statement->bindParam(':summaryLinkHref', $this->summaryLinkHref, PDO::PARAM_STR);
			$statement->bindParam(':isCurrent', $this->isCurrent, PDO::PARAM_INT);
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
			$sql = "delete from BudgetSummary where SummaryId = :summaryId";
			
			$statement = $database->prepare($sql);
			$statement->bindParam(':summaryId', $this->summaryId, PDO::PARAM_INT);
			
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
		if (isset($this->summaryId)) {	
		
			// Return update when id exists
			return $this->update();
			
		} else {
		
			// Return insert when id does not exists
			return $this->insert();
		}
	}	
}
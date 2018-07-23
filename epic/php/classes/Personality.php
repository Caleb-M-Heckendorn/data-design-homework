<?php

namespace CalebMHeckendorn\DataDesignHomework;

require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "../vendor/autoload.php");

use Ramsey\Uuid\Uuid;
/**
 * @author Caleb Heckendorn <checkendorn@cnm.edu>
 * @version 1.0
 */
class Personality {
	/**
	 * id for the Personality; This is the primary key
	 * @var Uuid $personalityId
	 */
	private $personalityId;
	/**
	 * @var Uuid $personalityDescription
	 */
	private $personalityDescription;
	/**
	 * @var Uuid $personalityName
	 */
	private $personalityName;
	/**
	 * @var Uuid $personalityType
	 */
	private $personalityType;


	public function __construct($newPersonalityId, string $newPersonalityDescription, string $newPersonalityName, string $newPersonalityType) {
		try {
			$this->setPersonalityId($newPersonalityId);
			$this->setPersonalityDescription($newPersonalityDescription);
			$this->setPersonalityName($newPersonalityName);
			$this->setPersonalityType($newPersonalityType);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for personality id
	 *
	 * @return Uuid value of personality id
	 **/
	public function getPersonalityId(): Uuid {
		return ($this->personalityId);
	}
	/**
	 * mutator method for personality id
	 *
	 * @param Uuid|string $newPersonalityId new value of personality id
	 * @throws \RangeException if $newPersonalityId is n
	 * @throws \TypeError if $newPersonalityId is not a uuid.e
	 **/

	public function setPersonalityId($newPersonalityId) : void {
		try {
			$uuid = self::validateUuid($newPersonalityId);
		} catch(\InvalidArgumentException | \RangeException | \Exeption | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		//convert and store the personality id
		$this->personalityId = $uuid;
	}
	/**
	 * accessor method for personality description
	 *
	 * @return Uuid values of personality description
	 */
	public function getPersonalityDescription() : Uuid{
		return($this->personalityDescription);
	}
	/**
	 * mutator method for personality description
	 *
	 * @param string | Uuid $newPersonalityDescription new value of personality description
	 * @throws \RangeException if $newPersonalityId is not positive
	 * @throws \TypeError if $newPersonalityDescription is not a string
	 */
	public function setPersonalityDescription($newPersonalityDescription) : void {
		try {
			$uuid = self::validateUuid($newPersonalityDescription);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		//convert and store the personality description
		$this->personalityDescription = $uuid;
	}
		/**
		 * accessor method for personality name
		 *
		 * @return Uuid values of personality name
		 */
		public function getPersonalityName() : Uuid{
			return($this->personalityName);
		}

		/**
		 * mutator method for personality name
		 *
		 * @param string | Uuid $newPersonalityName new value of personality name
		 * @throws \RangeException if $newPersonalityName is > 20 Characters
		 * @throws \TypeError if $newPersonalityName is not a string
		 **/
		public function setPersonalityName($newPersonalityName) : void {
			try {
				$uuid = self::validateUuid($newPersonalityName);
			} catch(InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
				$exceptionType = get_class($exception);
				throw(new $exceptionType($exception->getMessage(), 0, $exception));
			}

			//convert and store the personality name
			$this->personalityName = $uuid;
			}
		/**
		 * accessor method for personality type
		 *
		 * @return string value for personality type
		 */
		public function getPersonalityType() : Uuid {
			return($this->personalityType);
		}

		/**
		 *mutator method for personality type
		 *
		 * @param string
		 * @throws \InvalidArgumentException if $newPersonalityType is not a string or insecure
		 * @throws \RangeException if $newPersonalityType is n
		 * @throws \TypeError if $newPersonalityType is not a string
		 */
		public function setPersonalityType($newPersonalityType) : void {
			try{
				$uuid = self::validateUuid($newPersonalityType);
			} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
				$exceptionType = get_class($exception);
				throw(new $exceptionType($exception->getMessage(), 0, $exception));
			}

			//convert and store the personality type
			$this->personalityType = $uuid;
		}
		/*
		 * inserts this personality id into mySQL
		 *
		 * @param \PDO $pdo PDO connection object
		 * @throws \PDOException when mySQL errors happen
		 * @throws \TypeError if $pdo is not a PDO connection object
		 */
		public function insert (\PDO $pdo): void {
			//create query template
			$query = "INSERT INTO personality(personalityId, personalityDescription, personalityName, personalityType) VALUES (:personalityId, :personalityDescription, :personalityName, :personalityType)";
			$statement = $pdo->prepare($query);
			$parameters = ["personalityId" => $this->personalityId->getBytes(), "personalityDescription" => $this->personalityDescription, "personalityName" => $this->personalityName, "personalityType" => $this->personalityType];
			$statement->execute($parameters);
		}
		/*
		 * delete the personality id from mySQL
		 *
		 * @param \PDO $pdo PDO connection object
		 * @throws \PDOException
		 * @throws \TypeError if $pdo is not a PDO Connection Object
		 */
		public function delete(\PDO $pdo): void {
			//create query template
			$query = "DELETE FROM personality WHERE personalityId = :personalityId";
			$statement = $pdo->prepare($query);
			//bind the member variables to the place holders in the template
			$parameters = ["personalityId" => $this->personalityId->getBytes()];
			$statement->execute($parameters);
		}
		/**
		 * updates the Personality from mySQL
		 *
		 * @param \PDO $pdo PDO connection object
		 * @throws \PDOException when mySQL errors happen
		 */
		public function update(\PDO $pdo): void {
			//create query template
			$query = "UPDATE personality SET personalityDescription = :personalityDescription, personalityName = :personalityName, personalityType = :personalityType";
			$statement = $pdo->prepare($query);
			//bind the member variables to the place holders in the template
			$parameters = ["personalityId" => $this->personalityId->getBytes(), "personalityDescription" => $this->personalityDescription, "personalityName" => $this->personalityName, "personalityType" => $this->personalityType];
			$statement->execute($parameters);
		}
		/*
		 * gets the Personality by personality id
		 *
		 * @param \PDO $pdo $pdo PDO connection object
		 * @param string $profileId profile id to search for
		 * @return Personality|null Personality or null if not found
		 * @throws \PDOException when mySQL errors happen
		 * @throws \TypeError when a variable is not the correct data type
		 */
		public static function getPersonalityByPersonalityId(\PDO $pdo, string $personalityId):?Personality {
			//sanitize the personality id before searching
			try {
				$personalityId =self::validateUuid($personalityId);
			} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
				throw (new \PDOException($exception->getMessage(), 0, $exception));
			}
			//create query template
			$query = "SELECT personalityId, personalityDescription, personalityName, personalityType FROM personality WHERE personalityId = :personalityId";
			$statement = $pdo->prepare($query);
			//bind the personality id to the placeholder in the template
			$parameters = ["personalityId" => $personalityId->getBytes()];
			$statement->execute($parameters);
			//grab the Personality from mySQL
			try {
				$personality = null;
				$statement->setFetchMode(\PDO::FETCH_ASSOC);
				$row = $statement->fetch();
				if($row !== false) {
					$personality = new Personality($row["personalityId"], $row["personalityDescription"], $row["personalityName"], $row["personalityType"]);
				}
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(),0, $exception));
			}
			return ($personality);
		}
}

<?php
/**
 * Created by PhpStorm.
 * User: Caleb M. Hackendorn
 * Date: 7/19/2018
 * Time: 3:05 PM
 */
/**
 * @author Caleb Heckendorn
 * @version 1.0
 */




class Profile {
	/**
	 * id for the Profile; This is the primary key
	 * @var Uuid $profileId
	 */
	private $profileId;
	/**
	 * @var $profileName
	 */
	private $profileName;
	/**
	 * @var $profileEmail
	 */
	private $profileEmail;

	/**
	 * Profile constructor.
	 * @param string|Uuid $newProfileId id of profile or null if new profile
	 * @param string $newProfileName string containing na me
	 * @param string $newProfileEmail string containing email
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if a data type violates a data hint
	 * @throws \Exception if some other exception occurs
	 */

	public function  __construct($newProfileId, string $newProfileName, string $newProfileEmail) {
		try {
			$this->setProfileId($newProfileId);
			$this->setProfileName($newProfileName);
			$this->setProfileEmail($newProfileEmail);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for profile id
	 *
	 * @return Uuid value of profile id
	 */
	public function getProfileId(): Uuid {
		return($this->profileId);
	}
	/**
	 * mutator method for profile id
	 *
	 * @param Uuid|string $newProfileId new value of profile id
	 * @throws \RangeException if $newProfileId is n
	 * @throws \TypeError if $newProfileId is not a uuid.e
	 */

	public function setProfileId($newProfileId) : void {
		try {
			$uuid = self::validateUuid($newProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0 ,$exception));
		}

		//convert and store the profile id
		$this->profileId = $uuid;
	}
	/*
	 * accessor method for profile name
	 *
	 * @return Uuid values of profile name
	 */
	public function getProfileName() : Uuid{
		return($this->profileName);
	}
	/**
	 * mutator method for profile name
	 *
	 * @param string | Uuid $newProfileName new value of profile name
	 * @throws \RangeException if $newProfileName is > 30 characters
	 * @throws \TypeError if $newProfileName is not a string
	 */
	public function setProfileName($newProfileName) : void {
		try {
			$uuid = self::validateUuid($newProfileName);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		//convert and store the profile name
		$this->profileName = $uuid;
	}
	/**
	 * accessor method for profile email
	 *
	 * @return Uuid values of profile email
	 */
	public function getProfileEmail() : Uuid{
		return($this->profileEmail);
	}

	/**
	 * mutator method for profile email
	 *
	 * @param string | Uuid $newProfileEmail new value of personality name
	 * @throws \RangeException if $newProfileEmail is > 100 characters
	 * @throws \TypeError if $newProfileEmail is not a string
	 */
	public function setProfileEmail($newProfileEmail) : void {
		try {
			$uuid = self::validateUuid($newProfileEmail);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		//convert and store the profile email
		$this->profileEmail = $uuid;
	}















	/*
		 * inserts this profile id into mySQL
		 *
		 * @param \PDO $pdo PDO connection object
		 * @throws \PDOException when mySQL errors happen
		 * @throws \TypeError if $pdo is not a PDO connection object
		 */
	public function insert (\PDO $pdo): void {
		//create query template
		$query = "INSERT INTO profile(profileId, profileEmail, profileName) VALUES (:profileId, :profileEmail, :profileName)";
		$statement = $pdo->prepare($query);
		$parameters = ["profileId" => $this->profileId->getBytes(), "profileEmail" => $this->profileEmail, "profileName" => $this->profileName];
		$statement->execute($parameters);
	}
	/*
	 * delete the profile id from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException
	 * @throws \TypeError if $pdo is not a PDO Connection Object
	 */
	public function delete(\PDO $pdo): void {
		//create query template
		$query = "DELETE FROM profile WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);
		//bind the member variables to the place holders in the template
		$parameters = ["profileId" => $this->profileId->getBytes()];
		$statement->execute($parameters);
	}
	/**
	 * updates the Profile from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL errors happen
	 */
	public function update(\PDO $pdo): void {
		//create query template
		$query = "UPDATE profile SET profileEmail = :profileEmail, profileName = :profileName";
		$statement = $pdo->prepare($query);
		//bind the member variables to the place holders in the template
		$parameters = ["profileId" => $this->profileId->getBytes(), "profileEmail" => $this->profileEmail, "profileName" => $this->profileName];
		$statement->execute($parameters);
	}
	/*
	 * gets the Profile by profile id
	 *
	 * @param \PDO $pdo $pdo PDO connection object
	 * @param string $profileId profile id to search for
	 * @return Profile|null Profile or null if not found
	 * @throws \PDOException when mySQL errors happen
	 * @throws \TypeError when a variable is not the correct data type
	 */
	public static function getProfileByProfileId(\PDO $pdo, string $profileId):?Profile {
		//sanitize the profile id before searching
		try {
			$profileId =self::validateUuid($profileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT profileId, profileEmail, profileName FROM profile WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);
		//bind the profile id to the placeholder in the template
		$parameters = ["profileId" => $profileId->getBytes()];
		$statement->execute($parameters);
		//grab the Profile from mySQL
		try {
			$profile = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$profile = new Profile($row["profileId"], $row["profileEmail"], $row["profileName"]);
			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($profile);
	}


}

<?php
/**
 * Created by PhpStorm.
 * User: Caleb M. Hackendorn
 * Date: 7/19/2018
 * Time: 9:18 PM
 */
/**
 * @author Caleb Heckendorn
 * @version 1.0
 */






class ProfilePersonality {
	/**
	 * id for the profile personality personality id; this is a foreign key
	 * @var Uuid $profilePersonalityPersonalityId
	 */
	private $profilePersonalityPersonalityId;
	/**
	 * id for the profile personality profile id; this is a foreign key
	 * @var Uuid $profilePersonalityProfileId
	 */
	private $profilePersonalityProfileId;

	public function __construct($newProfilePersonalityPersonalityId, $newProfilePersonalityProfileId){
		try {
			$this->profilePersonalityPersonalityId($newProfilePersonalityPersonalityId);
			$this->profilePersonalityProfileId($newProfilePersonalityProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for profile personality personality id
	 *
	 * @return Uuid value of profile personality personality id
	 */

	public function getProfilePersonalityPersonalityId(): Uuid {
		return ($this->profilePersonalityPersonalityId);
	}
	/**
	 * mutator method for profile personality personality id
	 *
	 * @param Uuid|string $newProfilePersonalityPersonalityId new value of profile personality personality id
	 * @throws \RangeException if $newProfilePersonalityPersonalityId is n
	 * @throws \TypeError if $newProfilePersonalityPersonalityId is not a uuid.e
	 */

	public function setProfilePersonalityPersonalityId($newProfilePersonalityPersonalityId) : void {
		try {
			$uuid = self::validateUuid($newProfilePersonalityPersonalityId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		//convert and store the profile personality personality id
		$this->profilePersonalityPersonalityId = $uuid;
	}
	/**
	 * accessor method for profile personality profile id
	 *
	 * @return Uuid values of profile personality profile id
	 */
	public function getProfilePersonalityProfileId() : Uuid{
		return($this->profilePersonalityProfileId);
	}
	/**
	 * mutator method for profile personality profile id
	 *
	 * @param string | Uuid $newProfilePersonalityProfileId new value of profile personality profile id
	 * @throws \RangeException if $newProfilePersonalityProfileId is n
	 * @throws \TypeError if $newProfilePersonalityProfileId is not a uuid.e
	 */
	public function setProfilePersonalityProfileId($newProfilePersonalityProfileId) : void {
		try {
			$uuid = self::validateUuid($newProfilePersonalityProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		//convert and store the profile personality profile id
		$this->profilePersonalityProfileId = $uuid;
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
		$query = "INSERT INTO profilePersonality(profilePersonalityPersonalityId, profilePersonalityProfileId) VALUES (:profilePersonalityPersonalityId, :profilePersonalityProfileId)";
		$statement = $pdo->prepare($query);
		$parameters = ["profilePersonalityPersonalityId" => $this->profilePersonalityPersonalityId->getBytes(), "profilePersonalityProfileId" => $this->profilePersonalityProfileId->getBytes()];
		$statement->execute($parameters);
	}
	/*
	 * delete the profile personality personality id from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException
	 * @throws \TypeError if $pdo is not a PDO Connection Object
	 */
	public function delete(\PDO $pdo): void {
		//create query template
		$query = "DELETE FROM profilePersonality WHERE profilePersonalityPersonalityId = :profilePersonalityPersonalityId AND profilePersonalityProfileId = :profilePersonalityProfileId";
		$statement = $pdo->prepare($query);
		//bind the member variables to the place holders in the template
		$parameters = ["profilePersonalityPersonalityId" => $this->profilePersonalityPersonalityId->getBytes()];
		$statement->execute($parameters);
	}
	/*
	 * gets the ProfilePersonality by profile personality
	 *
	 * @param \PDO $pdo $pdo PDO connection object
	 * @param string $profileId profile id to search for
	 * @return ProfilePersonality|null ProfilePersonality or null if not found
	 * @throws \PDOException when mySQL errors happen
	 * @throws \TypeError when a variable is not the correct data type
	 */
	public static function getProfilePersonalityByProfilePersonalityPersonalityIdAndProfilePersonalityProfileId(\PDO $pdo, string $profilePersonalityPersonalityId, string $profilePersonalityProfileId):?ProfilePersonality {
		//sanitize the profile personality personality id before searching
		try {
			$profilePersonalityPersonalityId = self::validateUuid($profilePersonalityPersonalityId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		try {
			$profilePersonalityProfileId = self::validateUuid($profilePersonalityProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT profilePersonalityPersonalityId, profilePersonalityProfileId FROM profilePersonality WHERE profilePersonalityPersonalityId = :profilePersonalityPersonalityId AND profilePersonalityProfileId = :profilePersonalityProfileId";
		$statement = $pdo->prepare($query);
		//bind the profile personality personality id and the profile personality profile id to the placeholder in the template
		$parameters = ["profilePersonalityPersonalityId" => $profilePersonalityPersonalityId->getBytes(), "profilePersonalityProfileId" => $profilePersonalityProfileId->getBytes()];
		$statement->execute($parameters);
		//grab the ProfilePersonality from mySQL
		try {
			$profilePersonality = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$profilePersonality = new profilePersonality($row["profilePersonalityPersonalityId"], $row["profilePersonalityProfileId"]);
			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($profilePersonality);
	}
}
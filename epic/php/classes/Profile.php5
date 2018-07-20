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

}






































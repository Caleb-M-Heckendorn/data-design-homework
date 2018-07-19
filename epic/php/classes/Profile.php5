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
}






































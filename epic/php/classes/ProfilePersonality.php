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
}
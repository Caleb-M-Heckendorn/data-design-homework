<?php
/**
 * Created by PhpStorm.
 * User: Caleb Heckendorn.
 * Date: 7/18/2018
 * Time: 8:40 AM
 */
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
	 * @var $personalityName
	 */
	private $personalityName;
	/**
	 * @var $personalityType
	 */
	private $personalityType;

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
	 * @throws \TypeError if $newPersonalityDescription is not a UUI
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
		 * @return string value of personality name
		 */
		public function getPersonalityName() :string {
			return($this->personalityName);
		}

		/**
		 * mutator method for personality name
		 *
		 * @param string
		 * @throws \InvalidArgumentException if $newPersonalityName is not a string or insecure
		 * @throws \RangeException if $newPersonalityName is > 20 Characters
		 * @throws \TypeError if $newPersonalityName is not a string
		 */


}

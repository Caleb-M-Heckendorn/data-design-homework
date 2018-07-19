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
			} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
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

}

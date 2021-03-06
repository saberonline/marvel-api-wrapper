<?php
/**
 * Marvel API - Events Wrapper.
 * 
 * @see http://developer.marvel.com/docs
 */
require_once 'MarvelAPI.php';
require_once 'MarvelAPI_Curl.php';

class MarvelAPI_Events extends MarvelAPI {
	
	
	/**
	 * End Point for Series.
	 * 
	 * @var String
	 */
	private $eventsEndPoint = '/v1/public/events';
	
	
	/**
	 * Search for a specific event.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getEventsCollection_get_18
	 * 
	 * @param unknown $name
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $series
	 * @param string $events
	 * @param string $creators
	 * @param string $characters
	 * @param string $stories
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @return unknown
	 */
	public function search($name, $modifiedSince=NULL, $creators=NULL, $characters=NULL, $series=NULL, $comics=NULL, $stories=NULL, 
		$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		//Create the call. Parameters Keys from the API Specs.
		$params['name']				 = $name;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['comics']			 = $comics;
		$params['stories']		 	 = $stories;
		$params['creators']		     = $creators;
		$params['characters']		 = $characters;
		$params['series']		 	 = $series;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		$url = parent::initCall($this->eventsEndPoint, $params);

		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch a specific event by id.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getEventIndividual_get_19
	 * 
	 * @param int $id
	 */
	public function fetchById($id){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied event id is not valid.");
		}

		$url = parent::initCall($this->eventsEndPoint."/$id");
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the characters for a specific event.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getEventCharacterCollection_get_20
	 * 
	 * @param unknown $id
	 * @param string $name
	 * @param string $modifiedSince
	 * @param string $series
	 * @param string $events
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchCharacters($id, $name=NULL, $modifiedSince=NULL, $comics=NULL, $series=NULL,
			$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied event id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['name']				 = $name;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['comics']			 = $comics;
		$params['series']       	 = $series;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		$params['stories']			 = $stories;
		
		$url = parent::initCall($this->eventsEndPoint."/$id/characters", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	

	/**
	 * Fetch the comics for a specific event.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getComicsCollection_get_21
	 * 
	 * @param unknown $id
	 * @param string $format
	 * @param string $formatType
	 * @param string $noVariants
	 * @param string $dateDescriptor
	 * @param string $dateRange
	 * @param string $hasDigitalIssue
	 * @param string $modifiedSince
	 * @param string $creators
	 * @param string $characters
	 * @param string $events
	 * @param string $stories
	 * @param string $sharedAppearances
	 * @param string $collaborators
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchComics($id, $format=NULL, $formatType=NULL, 
			$noVariants=NULL, $dateDescriptor=NULL, $dateRange=NULL, $hasDigitalIssue=NULL, 
			$modifiedSince=NULL, $creators=NULL, $characters=NULL, $series=NULL, $events=NULL, $stories=NULL,
			$sharedAppearances=NULL, $collaborators=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied event id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['format']		 	 = $format;
		$params['formatType']    	 = $formatType;
		$params['noVariants']	 	 = $noVariants;
		$params['dateDescriptors']	 = $dateDescriptor;
		$params['dateRange']		 = $dateRange;
		$params['hasDigitalIssue']   = $hasDigitalIssue;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['creators']			 = $creators;
		$params['characters']		 = $characters;
		$params['events']		 	 = $events;
		$params['series']       	 = $series;
		$params['sharedAppearances'] = $sharedAppearances;
		$params['collaborators']	 = $collaborators;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		$url = parent::initCall($this->storiesEndPoint."/$id/comics", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;

	}
	
	
	/**
	 * Fetch the creators for the specific events.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getCreatorCollection_get_22
	 * 
	 * @param unknown $seriesId
	 * @param string $firstName
	 * @param string $lastName
	 * @param string $middleName
	 * @param string $suffix
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $events
	 * @param string $stories
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchCreators($id, $firstName=NULL, $lastName=NULL, $middleName=NULL,
		$suffix=NULL, $modifiedSince=NULL, $comics=NULL, $series=NULL, $stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied event id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['firstName']     = $firstName;
		$params['middleName']    = $middleName;
		$params['lastName']	     = $lastName;
		$params['suffix']		 = $suffix;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['series']        = $series;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		$params['stories']		 = $stories;
		
		$url = parent::initCall($this->eventsEndPoint."/$id/creators", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
		
	}
	
	
	/**
	 * Fetch events for a specific story.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getCreatorSeriesCollection_get_23
	 * 
	 * @param unknown $id
	 * @param string $name
	 * @param string $modifiedSince
	 * @param string $creators
	 * @param string $characters
	 * @param string $comics
	 * @param string $series
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchSeries($id, $title=NULL, $modifiedSince=NULL, $comics=NULL,  $stories=NULL, $creators=NULL, $characters=NULL, 
			$seriesType=NULL, $contains=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied event id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['title']   		 = $title;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['stories']		 = $stories;
		$params['creators']      = $creators;
		$params['characters']    = $characters;
		$params['seriesType']    = $seriesType;
		$params['contains']		 = $contains;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		
		
		$url = parent::initCall($this->eventsEndPoint."/$id/series", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the stories for a specific series.
	 *
	 * @see http://developer.marvel.com/docs#!/public/getEventStoryCollection_get_24
	 * 
	 * @param int id
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $events
	 * @param string $creators
	 * @param string $characters
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchStories($id, $modifiedSince=NULL, $comics=NULL, $series=NULL, $creators=NULL, $characters=NULL,
			$orderBy=NULL, $limit=NULL, $offset=NULL){
	
		if(!ctype_digit($id)){
			throw new Exception("Supplied event id not valid.");
		}
	
		//Create the call. Parameters Keys from the API Specs.
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['series']		 = $series;
		$params['creators']      = $creators;
		$params['characters']	 = $characters;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
	
		$url = parent::initCall($this->eventsEndPoint."/$id/stories", $params);
	
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
	
		return $response;
	}
	
}
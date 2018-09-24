<?php
define('STRETCH_COUNT', 1000);
class Custom_Auth_Token
{
    protected $_hash;
    protected $_name = 'custom_csrf';
    protected $_salt = 'salt';
    protected $_session;
    protected $_timeout = 7200;
    protected $_appKey = "76edcfc451c4c887efda581e9f2d1a8a"; // Random MD5 hash
    protected $_sessionNamespace = "new_token_session";   
 
    public function __construct()
    {
        // Start session
        Zend_Session::start();
 
        // Todays date unclean (11June2012)
        $date = date("jFY");
 
        // Combine date with random hash to use as a salt.
        //$salt = md5($date . $this->_appKey);
		$salt = $this->get_salted_password($this->_appKey, $_SERVER["REMOTE_ADDR"]);
 
        $this->setSalt($salt);
 
    }
 
    public function getToken($tag)
    {
 
        // Process tag
        $tag = strtolower(trim($tag));
 
        // Get or create session
        $session = $this->getSession();
 
        // Create token
        $token = $this->getHash();
 
        // Add to session
        $session->$tag = $token;
 
        // Reset internal hash
        $this->_hash = null;
 
        return $token;
 
    }
 
    public function validateToken($user_token,$tag)
    {
 
        // Get the session
        if(Zend_Session::namespaceIsset($this->getSessionName()))
        {
            $session = Zend_Session::namespaceGet($this->getSessionName());
        } else {
            $session = $this->getSession();
        }

        // If tag not set, use invalid value
        if($tag=="") { return false; }
 
        // If session variable is set
        if(array_key_exists($tag, $session))
        {
            // Get token from session
            $valid_token = $session[$tag];
        } else {
            // Session variable not set.
            // Use empty value to force denied access.
            $valid_token = "invalid";
        }

        // Create validator
        $validator = new Zend_Validate_Identical($valid_token);
 
        // Do validation
        if($validator->isValid($user_token))
        {
            // Invalidate token
            $session[$tag] = '';
 
            // Tokens match
            return true;
        }
        else {
            // Tokens do not match
            return false;
        }
    }
 
    /**
    * Set session object
    *
    * @param Zend_Session_Namespace $session
    * @return Custom_Auth_Token
    */
    public function setSession($session)
    {
        $this->_session = $session;
        return $this;
    }
 
    /**
    * Get session object
    *
    * Instantiate session object if none currently exists
    *
    * @return Zend_Session_Namespace
    */
    public function getSession()
    {
        if (null === $this->_session) {
            require_once 'Zend/Session/Namespace.php';
            $this->_session = new Zend_Session_Namespace($this->getSessionName());
        }
        return $this->_session;
    }
 
    /**
    * Retrieve name for CSRF token
    *
    * @return string
    */
    public function getName()
    {
        return $this->_name;
    }
 
    /**
    * Name for CSRF token
    *
    * @param string $name
    * @return Custom_Auth_Token
    */
    public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }
 
    /**
    * Salt for CSRF token
    *
    * @param string $salt
    * @return Custom_Auth_Token
    */
    public function setSalt($salt)
    {
        $this->_salt = (string) $salt;
        return $this;
    }
 
    /**
    * Retrieve salt for CSRF token
    *
    * @return string
    */
    public function getSalt()
    {
        return $this->_salt;
    }
 
    /**
    * Retrieve CSRF token
    *
    * If no CSRF token currently exists, generates one.
    *
    * @return string
    */
    public function getHash()
    {
        if (null === $this->_hash) {
            $this->_generateHash();
        }
        return $this->_hash;
    }
 
    /**
    * Get session namespace for CSRF token
    *
    * Generates a session namespace based on salt and class.
    *
    * @return string
    */
    public function getSessionName()
    {
        $this->_sessionNamespace = __CLASS__ . $this->getSalt();
        return $this->_sessionNamespace;
    }
 
    /**
    * Set timeout for CSRF session token
    *
    * @param int $ttl
    * @return Custom_Auth_Token
    */
    public function setTimeout($ttl)
    {
        $this->_timeout = (int) $ttl;
        return $this;
    }
 
    /**
    * Get CSRF session token timeout
    *
    * @return int
    */
    public function getTimeout()
    {
        return $this->_timeout;
    }
 
    /**
    * Initialize CSRF token in session
    *
    * @return void
    */
    public function initCsrfToken()
    {
        $session = $this->getSession();
        $session->setExpirationHops(1, null, true);
        $session->setExpirationSeconds($this->getTimeout());
        $session->hash = $this->getHash();
    }
 
    /**
    * Generate CSRF token
    *
    * Generates CSRF token and stores both in {@link $_hash} and element
    * value.
    *
    * @return void
    */
    protected function _generateHash()
    {
        $this->_hash = md5(
            mt_rand(1,1000000)
            . $this->getSalt()
            . $this->getName()
            . mt_rand(1,1000000)
        );
    }
	
	//文字列から SHA256 のハッシュ値を取得
	function get_sha256($target) {
		return hash('sha256', $target);
	}
	 
	//salt＋ハッシュ化したパスワードを取得
	function get_salted_password($password, $userId) {
		$salt = $this->get_sha256($userId);
		return $this->get_sha256($salt . $password);
	}
	 
	//salt + ストレッチングしたパスワードを取得(推奨)
	function get_stretched_password($password, $userId) {
		$salt = $this->get_sha256($userId);
		$hash = ”;
		for ($i = 0; $i < STRETCH_COUNT; $i++) {
			$hash = $this->get_sha256($hash . $salt . $password);
		}
		return $hash;
	}
}
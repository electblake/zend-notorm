# Zend-NotORM
===========

This is a model that works with the core NotORM library so that you can extend your own models with the NotORM library.




## Usage

In your application.ini add this:

    ; NotORM
    notorm.host = "<Database Host>"
    notorm.database = "<Database Name>"
    notorm.user = "<Database User>"
    notorm.password = "<Database Password>"
    

Download the NotORM Library from <a href="http://www.notorm.com/" target="_blank">NotORM.com</a>

Place the NotORM library so that it looks like this:

    /library/NotORM/NotORM.php
    /library/NotORM/Cache.php
    /library/NotORM/Literal.php
    /library/NotORM/MultiResult.php
    /library/NotORM/Result.php
    /library/NotORM/Row.php
    /library/NotORM/Structure.php
    
(note that the file structure may have changed, but at the time of this writing (Aug 2012), that's how it is)

To utilize in any model define your Model like and use the NotORM class using a method like getData()

    Application_Model_Something extends Application_Model_NotORM {
        public function __construct() {
          parent::__construct();
        }
        
        private function getData() {
          return $this->NotORM->table_name()->where('id', 1)->fetch();
        }
        
    }
    
    
    
For full documentation on how to use $this->NotORM read NotORM documentation at <a href="http://www.notorm.com/">http://www.notorm.com/</a>
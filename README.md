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
    

Get the NotORM Library. I've included a .gitmodules in the repo so you can download the NotORM latest code using git's submodule feature with:

    git submodule update --init
    
This will clone the latest code into your own repo - alternatively you can always just download the library yourself at <a href="http://www.notorm.com/" target="_blank">NotORM.com</a>

To utilize in any model simply extend Application_Model_NotORM and use the NotORM class using a method like getData()

    Application_Model_Something extends Application_Model_NotORM {
        public function __construct() {
          parent::__construct();
        }
        
        private function getData() {
          return $this->NotORM->table_name()->where('id', 1)->fetch();
        }
        
    }
    
    
    
For full documentation on how to use $this->NotORM read NotORM documentation at <a href="http://www.notorm.com/">http://www.notorm.com/</a>
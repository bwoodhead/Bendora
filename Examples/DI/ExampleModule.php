<?php


/**
 * Example Module is the configuration for the dependency injection
 */
class ExampleModule extends \API\DI\AbstractModule
{
  public function configure() 
  {
    // Use the fedora implementation
    bind(\API\Repository\iRepository, \API\Repository\Impl\FedoraImpl);
    
    // Use the search implementation
    bind(\API\Repository\iSearch, \API\Repository\Impl\SearchImpl);
    
    // Use the hashtable cache 
    bind(\API\Utils\iCache, \API\Utils\Impl\HashtableCache);
  }
}

?>

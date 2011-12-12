<?php

/**
 * Test Module is the configuration for the dependency injection
 */
class TestModule extends AbstractModule
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

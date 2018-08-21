# puppet-master-client-php-laravel

Laravel package for the PHP client of the [puppet-master.io](https://puppet-master.io) public API.

Puppet-master makes the execution of website interactions
super simple by abstracting the code execution behind a HTTP API, scheduling the job for you in a scalable
manner. For more information please head over to the [puppet-master docs](https://docs.puppet-master.io).


## installation

```bash
composer require scalify/puppet-master-client-laravel:~1.0
```

## populate the config

```bash

```

## example usage

```php
<?php

namespace My\Laravel\Service;

use Scalify\PuppetMaster\Client\ClientInterface;

class Something
{
    /**
    * @var ClientInterface 
    */
    private $client;
    
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
    
    public function doSomething()
    {
        $job = $this->client->getJob("my-job-uuid-example");
        echo(sprintf("Job has status %s", $job->getStatus()));
    }
}
```

## License

Copyright 2018 Scalify GmbH

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

		http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

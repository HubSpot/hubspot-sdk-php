<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\FilesContract;
use HubspotSDK\Services\Files\FoldersService;

final class FilesService implements FilesContract
{
    /**
     * @@api
     */
    public HubspotSDK\Services\Files\FilesService $files;

    /**
     * @@api
     */
    public FoldersService $folders;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->files = new HubspotSDK\Services\Files\FilesService($client);
        $this->folders = new FoldersService($client);
    }
}

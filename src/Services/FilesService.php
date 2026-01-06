<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\FilesContract;
use HubspotSDK\Services\Files\FileOperationsService;
use HubspotSDK\Services\Files\FoldersService;

final class FilesService implements FilesContract
{
    /**
     * @api
     */
    public FilesRawService $raw;

    /**
     * @api
     */
    public FileOperationsService $fileOperations;

    /**
     * @api
     */
    public FoldersService $folders;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FilesRawService($client);
        $this->fileOperations = new FileOperationsService($client);
        $this->folders = new FoldersService($client);
    }
}

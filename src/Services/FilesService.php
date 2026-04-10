<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\FilesContract;
use HubSpotSDK\Services\Files\FileAssetsService;
use HubSpotSDK\Services\Files\FoldersService;

final class FilesService implements FilesContract
{
    /**
     * @api
     */
    public FilesRawService $raw;

    /**
     * @api
     */
    public FileAssetsService $fileAssets;

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
        $this->fileAssets = new FileAssetsService($client);
        $this->folders = new FoldersService($client);
    }
}

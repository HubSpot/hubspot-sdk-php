<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Lists;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\ListFolderCreateResponse;
use HubspotSDK\Crm\Lists\ListFolderFetchResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Lists\FoldersContract;

final class FoldersService implements FoldersContract
{
    /**
     * @api
     */
    public FoldersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FoldersRawService($client);
    }

    /**
     * @api
     *
     * Creates a folder with the given information.
     *
     * @param string $name the name of the folder to be created
     * @param string $parentFolderID the folder this should be created in, if not specified will be created in the root folder 0
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $parentFolderID = null,
        ?RequestOptions $requestOptions = null,
    ): ListFolderCreateResponse {
        $params = ['name' => $name, 'parentFolderID' => $parentFolderID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the folder with the given Id.
     *
     * @param string $folderID The ID of the folder to delete
     *
     * @throws APIException
     */
    public function delete(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($folderID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a folder and recursively includes all folders via the childNodes attribute.  The child lists field will be empty in all child nodes. Only the folder retrieved will include the child lists in that folder.
     *
     * @param string $folderID the Id of the folder to retrieve
     *
     * @throws APIException
     */
    public function get(
        string $folderID = '0',
        ?RequestOptions $requestOptions = null
    ): ListFolderFetchResponse {
        $params = ['folderID' => $folderID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This moves the folder from its current location to a new location. It updates the parent of this folder to the new Id given.
     *
     * @param string $newParentFolderID the ID for the target parent folder
     * @param string $folderID The ID of the folder to move
     *
     * @throws APIException
     */
    public function move(
        string $newParentFolderID,
        string $folderID,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse {
        $params = ['folderID' => $folderID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->move($newParentFolderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Given a list and a folder, the list will be moved to that folder.
     *
     * @param string $listID the Id of the list to move
     * @param string $newFolderID the Id of folder to move the list to, the root folder is Id 0
     *
     * @throws APIException
     */
    public function moveList(
        string $listID,
        string $newFolderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['listID' => $listID, 'newFolderID' => $newFolderID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->moveList(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Renames the given folderId with a new name.
     *
     * @param string $folderID The ID of the folder to rename
     * @param string $newFolderName the new name of the folder
     *
     * @throws APIException
     */
    public function rename(
        string $folderID,
        ?string $newFolderName = null,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse {
        $params = ['newFolderName' => $newFolderName];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->rename($folderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

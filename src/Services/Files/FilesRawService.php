<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\Access;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationScope;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationStrategy;
use HubspotSDK\Files\Files\FileSearchParams;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Files\FilesRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class FilesRawService implements FilesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Check the status of requested import.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FileActionResponse>
     *
     * @throws APIException
     */
    public function getImportTaskStatus(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'files/2026-03/files/import-from-url/async/tasks/%1$s/status', $taskID,
            ],
            options: $requestOptions,
            convert: FileActionResponse::class,
        );
    }

    /**
     * @api
     *
     * Asynchronously imports the file at the given URL into the file manager.
     *
     * @param array{
     *   access: value-of<Access>,
     *   duplicateValidationScope: DuplicateValidationScope|value-of<DuplicateValidationScope>,
     *   duplicateValidationStrategy: DuplicateValidationStrategy|value-of<DuplicateValidationStrategy>,
     *   overwrite: bool,
     *   expiresAt?: \DateTimeInterface,
     *   folderID?: string,
     *   folderPath?: string,
     *   name?: string,
     *   ttl?: string,
     *   url?: string,
     * }|FileImportFromURLAsyncParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ImportFromURLTaskLocator>
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        array|FileImportFromURLAsyncParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileImportFromURLAsyncParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'files/2026-03/files/import-from-url/async',
            body: (object) $parsed,
            options: $options,
            convert: ImportFromURLTaskLocator::class,
        );
    }

    /**
     * @api
     *
     * Search through files in the file manager. Does not display hidden or archived files.
     *
     * @param array{
     *   after?: string,
     *   allowsAnonymousAccess?: bool,
     *   before?: string,
     *   createdAt?: \DateTimeInterface,
     *   createdAtGte?: \DateTimeInterface,
     *   createdAtLte?: \DateTimeInterface,
     *   encoding?: string,
     *   expiresAt?: \DateTimeInterface,
     *   expiresAtGte?: \DateTimeInterface,
     *   expiresAtLte?: \DateTimeInterface,
     *   extension?: string,
     *   fileMd5?: string,
     *   height?: int,
     *   heightGte?: int,
     *   heightLte?: int,
     *   idGte?: int,
     *   idLte?: int,
     *   ids?: list<int>,
     *   isUsableInContent?: bool,
     *   limit?: int,
     *   name?: string,
     *   parentFolderIDs?: list<int>,
     *   path?: string,
     *   properties?: list<string>,
     *   size?: int,
     *   sizeGte?: int,
     *   sizeLte?: int,
     *   sort?: list<string>,
     *   type?: string,
     *   updatedAt?: \DateTimeInterface,
     *   updatedAtGte?: \DateTimeInterface,
     *   updatedAtLte?: \DateTimeInterface,
     *   url?: string,
     *   width?: int,
     *   widthGte?: int,
     *   widthLte?: int,
     * }|FileSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<File>>
     *
     * @throws APIException
     */
    public function search(
        array|FileSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'files/2026-03/files/search',
            query: Util::array_transform_keys(
                $parsed,
                ['parentFolderIDs' => 'parentFolderIds']
            ),
            options: $options,
            convert: File::class,
            page: Page::class,
        );
    }
}

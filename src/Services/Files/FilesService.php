<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\Files\FileGetByPathParams;
use HubspotSDK\Files\Files\FileGetParams;
use HubspotSDK\Files\Files\FileGetSignedURLParams;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams;
use HubspotSDK\Files\Files\FileReplaceParams;
use HubspotSDK\Files\Files\FileSearchParams;
use HubspotSDK\Files\Files\FileUpdateParams;
use HubspotSDK\Files\Files\FileUpdateParams\Access;
use HubspotSDK\Files\Files\FileUploadParams;
use HubspotSDK\Files\FileStat;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Files\SignedURL;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Files\FilesContract;

final class FilesService implements FilesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update properties of file by ID.
     *
     * @param array{
     *   access?: value-of<Access>,
     *   clearExpires?: bool,
     *   expiresAt?: string|\DateTimeInterface,
     *   isUsableInContent?: bool,
     *   name?: string,
     *   parentFolderId?: string,
     *   parentFolderPath?: string,
     * }|FileUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        array|FileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): File {
        [$parsed, $options] = FileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['files/v3/files/%1$s', $fileID],
            body: (object) $parsed,
            options: $options,
            convert: File::class,
        );
    }

    /**
     * @api
     *
     * Delete a file by ID
     *
     * @throws APIException
     */
    public function delete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['files/v3/files/%1$s', $fileID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete a file in accordance with GDPR regulations.
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['files/v3/files/%1$s/gdpr-delete', $fileID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a file by its ID.
     *
     * @param array{properties?: list<string>}|FileGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        array|FileGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): File {
        [$parsed, $options] = FileGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/files/%1$s', $fileID],
            query: $parsed,
            options: $options,
            convert: File::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a file by its path.
     *
     * @param array{properties?: list<string>}|FileGetByPathParams $params
     *
     * @throws APIException
     */
    public function getByPath(
        string $path,
        array|FileGetByPathParams $params,
        ?RequestOptions $requestOptions = null,
    ): FileStat {
        [$parsed, $options] = FileGetByPathParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/files/stat/%1$s', $path],
            query: $parsed,
            options: $options,
            convert: FileStat::class,
        );
    }

    /**
     * @api
     *
     * Check the status of requested import.
     *
     * @throws APIException
     */
    public function getImportTaskStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FileActionResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/files/import-from-url/async/tasks/%1$s/status', $taskID],
            options: $requestOptions,
            convert: FileActionResponse::class,
        );
    }

    /**
     * @api
     *
     * Generates signed URL that allows temporary access to a private file.
     *
     * @param array{
     *   expirationSeconds?: int,
     *   size?: "thumb"|"icon"|"medium"|"preview",
     *   upscale?: bool,
     * }|FileGetSignedURLParams $params
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        array|FileGetSignedURLParams $params,
        ?RequestOptions $requestOptions = null,
    ): SignedURL {
        [$parsed, $options] = FileGetSignedURLParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/files/%1$s/signed-url', $fileID],
            query: $parsed,
            options: $options,
            convert: SignedURL::class,
        );
    }

    /**
     * @api
     *
     * Asynchronously imports the file at the given URL into the file manager.
     *
     * @param array{
     *   access: value-of<FileImportFromURLAsyncParams\Access>,
     *   url: string,
     *   duplicateValidationScope?: "ENTIRE_PORTAL"|"EXACT_FOLDER",
     *   duplicateValidationStrategy?: "NONE"|"REJECT"|"RETURN_EXISTING",
     *   expiresAt?: string|\DateTimeInterface,
     *   folderId?: string,
     *   folderPath?: string,
     *   name?: string,
     *   overwrite?: bool,
     *   ttl?: string,
     * }|FileImportFromURLAsyncParams $params
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        array|FileImportFromURLAsyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): ImportFromURLTaskLocator {
        [$parsed, $options] = FileImportFromURLAsyncParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'files/v3/files/import-from-url/async',
            body: (object) $parsed,
            options: $options,
            convert: ImportFromURLTaskLocator::class,
        );
    }

    /**
     * @api
     *
     * Replace existing file data with new file data. Can be used to change image content without having to upload a new file and update all references.
     *
     * @param array{
     *   charsetHunch?: string, file?: string, options?: string
     * }|FileReplaceParams $params
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        array|FileReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): File {
        [$parsed, $options] = FileReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['files/v3/files/%1$s', $fileID],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: File::class,
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
     *   createdAt?: string|\DateTimeInterface,
     *   createdAtGte?: string|\DateTimeInterface,
     *   createdAtLte?: string|\DateTimeInterface,
     *   encoding?: string,
     *   expiresAt?: string|\DateTimeInterface,
     *   expiresAtGte?: string|\DateTimeInterface,
     *   expiresAtLte?: string|\DateTimeInterface,
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
     *   parentFolderIds?: list<int>,
     *   path?: string,
     *   properties?: list<string>,
     *   size?: int,
     *   sizeGte?: int,
     *   sizeLte?: int,
     *   sort?: list<string>,
     *   type?: string,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedAtGte?: string|\DateTimeInterface,
     *   updatedAtLte?: string|\DateTimeInterface,
     *   url?: string,
     *   width?: int,
     *   widthGte?: int,
     *   widthLte?: int,
     * }|FileSearchParams $params
     *
     * @return Page<File>
     *
     * @throws APIException
     */
    public function search(
        array|FileSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = FileSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'files/v3/files/search',
            query: $parsed,
            options: $options,
            convert: File::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Upload a single file with content specified in request body.
     *
     * @param array{
     *   charsetHunch?: string,
     *   file?: string,
     *   fileName?: string,
     *   folderId?: string,
     *   folderPath?: string,
     *   options?: string,
     * }|FileUploadParams $params
     *
     * @throws APIException
     */
    public function upload(
        array|FileUploadParams $params,
        ?RequestOptions $requestOptions = null
    ): File {
        [$parsed, $options] = FileUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'files/v3/files',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: File::class,
        );
    }
}

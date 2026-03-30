<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\Files\FileCreateParams;
use HubspotSDK\Files\Files\FileGetByPathParams;
use HubspotSDK\Files\Files\FileGetParams;
use HubspotSDK\Files\Files\FileGetSignedURLParams;
use HubspotSDK\Files\Files\FileGetSignedURLParams\Size;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationScope;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationStrategy;
use HubspotSDK\Files\Files\FileReplaceParams;
use HubspotSDK\Files\Files\FileSearchParams;
use HubspotSDK\Files\Files\FileUpdateParams;
use HubspotSDK\Files\Files\FileUpdateParams\Access;
use HubspotSDK\Files\Files\FileUploadParams;
use HubspotSDK\Files\FileStat;
use HubspotSDK\Files\Folder;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Files\SignedURL;
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
     * Creates a folder.
     *
     * @param array{
     *   name: string, parentFolderID?: string, parentPath?: string
     * }|FileCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function create(
        array|FileCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'files/2026-03/folders',
            body: (object) $parsed,
            options: $options,
            convert: Folder::class,
        );
    }

    /**
     * @api
     *
     * Update properties of file by ID.
     *
     * @param string $fileID ID of file to update
     * @param array{
     *   clearExpires: bool,
     *   access?: value-of<Access>,
     *   expiresAt?: \DateTimeInterface,
     *   isUsableInContent?: bool,
     *   name?: string,
     *   parentFolderID?: string,
     *   parentFolderPath?: string,
     * }|FileUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        array|FileUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['files/2026-03/files/%1$s', $fileID],
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
     * @param string $fileID FileId to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $fileID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['files/2026-03/files/%1$s', $fileID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete a file in accordance with GDPR regulations.
     *
     * @param string $fileID ID of file to GDPR delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $fileID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['files/2026-03/files/%1$s/gdpr-delete', $fileID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a file by its ID.
     *
     * @param string $fileID ID of the desired file
     * @param array{properties?: list<string>}|FileGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        array|FileGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['files/2026-03/files/%1$s', $fileID],
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FileStat>
     *
     * @throws APIException
     */
    public function getByPath(
        string $path,
        array|FileGetByPathParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileGetByPathParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['files/2026-03/files/stat/%1$s', $path],
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
     * @param string $taskID Import by URL task ID
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
     * Generates signed URL that allows temporary access to a private file.
     *
     * @param string $fileID ID of file
     * @param array{
     *   expirationSeconds?: int, size?: Size|value-of<Size>, upscale?: bool
     * }|FileGetSignedURLParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SignedURL>
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        array|FileGetSignedURLParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileGetSignedURLParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['files/2026-03/files/%1$s/signed-url', $fileID],
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
     * Replace existing file data with new file data. Can be used to change image content without having to upload a new file and update all references.
     *
     * @param string $fileID ID of the desired file
     * @param array{
     *   charsetHunch?: string, file?: string, options?: string
     * }|FileReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        array|FileReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['files/2026-03/files/%1$s', $fileID],
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

    /**
     * @api
     *
     * Upload a single file with content specified in request body.
     *
     * @param array{
     *   charsetHunch?: string,
     *   file?: string,
     *   fileName?: string,
     *   folderID?: string,
     *   folderPath?: string,
     *   options?: string,
     * }|FileUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function upload(
        array|FileUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'files/2026-03/files',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: File::class,
        );
    }
}

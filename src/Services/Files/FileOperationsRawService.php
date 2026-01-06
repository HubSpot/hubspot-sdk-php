<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\FileOperations\FileOperationGetByPathParams;
use HubspotSDK\Files\FileOperations\FileOperationGetParams;
use HubspotSDK\Files\FileOperations\FileOperationGetSignedURLParams;
use HubspotSDK\Files\FileOperations\FileOperationGetSignedURLParams\Size;
use HubspotSDK\Files\FileOperations\FileOperationImportFromURLAsyncParams;
use HubspotSDK\Files\FileOperations\FileOperationImportFromURLAsyncParams\DuplicateValidationScope;
use HubspotSDK\Files\FileOperations\FileOperationImportFromURLAsyncParams\DuplicateValidationStrategy;
use HubspotSDK\Files\FileOperations\FileOperationReplaceParams;
use HubspotSDK\Files\FileOperations\FileOperationSearchParams;
use HubspotSDK\Files\FileOperations\FileOperationUpdateParams;
use HubspotSDK\Files\FileOperations\FileOperationUpdateParams\Access;
use HubspotSDK\Files\FileOperations\FileOperationUploadParams;
use HubspotSDK\Files\FileStat;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Files\SignedURL;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Files\FileOperationsRawContract;

final class FileOperationsRawService implements FileOperationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update properties of file by ID.
     *
     * @param string $fileID ID of file to update
     * @param array{
     *   access?: value-of<Access>,
     *   clearExpires?: bool,
     *   expiresAt?: string|\DateTimeInterface,
     *   isUsableInContent?: bool,
     *   name?: string,
     *   parentFolderID?: string,
     *   parentFolderPath?: string,
     * }|FileOperationUpdateParams $params
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        array|FileOperationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileOperationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $fileID FileId to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $fileID ID of file to GDPR delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $fileID ID of the desired file
     * @param array{properties?: list<string>}|FileOperationGetParams $params
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        array|FileOperationGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileOperationGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $filePath the path of the file
     * @param array{properties?: list<string>}|FileOperationGetByPathParams $params
     *
     * @return BaseResponse<FileStat>
     *
     * @throws APIException
     */
    public function getByPath(
        string $filePath,
        array|FileOperationGetByPathParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileOperationGetByPathParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['files/v3/files/stat/%1$s', $filePath],
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
     *
     * @return BaseResponse<FileActionResponse>
     *
     * @throws APIException
     */
    public function getImportTaskStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $fileID ID of file
     * @param array{
     *   expirationSeconds?: int,
     *   size?: 'icon'|'medium'|'preview'|'thumb'|Size,
     *   upscale?: bool,
     * }|FileOperationGetSignedURLParams $params
     *
     * @return BaseResponse<SignedURL>
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        array|FileOperationGetSignedURLParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileOperationGetSignedURLParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   access: value-of<FileOperationImportFromURLAsyncParams\Access>,
     *   url: string,
     *   duplicateValidationScope?: 'ENTIRE_PORTAL'|'EXACT_FOLDER'|DuplicateValidationScope,
     *   duplicateValidationStrategy?: 'NONE'|'REJECT'|'RETURN_EXISTING'|DuplicateValidationStrategy,
     *   expiresAt?: string|\DateTimeInterface,
     *   folderID?: string,
     *   folderPath?: string,
     *   name?: string,
     *   overwrite?: bool,
     *   ttl?: string,
     * }|FileOperationImportFromURLAsyncParams $params
     *
     * @return BaseResponse<ImportFromURLTaskLocator>
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        array|FileOperationImportFromURLAsyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileOperationImportFromURLAsyncParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $fileID ID of the desired file
     * @param array{
     *   charsetHunch?: string, file?: string, options?: string
     * }|FileOperationReplaceParams $params
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        array|FileOperationReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileOperationReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   parentFolderIDs?: list<int>,
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
     * }|FileOperationSearchParams $params
     *
     * @return BaseResponse<Page<File>>
     *
     * @throws APIException
     */
    public function search(
        array|FileOperationSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileOperationSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'files/v3/files/search',
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
     * }|FileOperationUploadParams $params
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function upload(
        array|FileOperationUploadParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileOperationUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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

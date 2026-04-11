<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Files;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\FileParam;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Files\File;
use HubSpotSDK\Files\FileActionResponse;
use HubSpotSDK\Files\FileAssets\FileAssetCreateParams;
use HubSpotSDK\Files\FileAssets\FileAssetGetByPathParams;
use HubSpotSDK\Files\FileAssets\FileAssetGetParams;
use HubSpotSDK\Files\FileAssets\FileAssetGetSignedURLParams;
use HubSpotSDK\Files\FileAssets\FileAssetGetSignedURLParams\Size;
use HubSpotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams;
use HubSpotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams\DuplicateValidationScope;
use HubSpotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams\DuplicateValidationStrategy;
use HubSpotSDK\Files\FileAssets\FileAssetReplaceParams;
use HubSpotSDK\Files\FileAssets\FileAssetSearchParams;
use HubSpotSDK\Files\FileAssets\FileAssetUpdateParams;
use HubSpotSDK\Files\FileAssets\FileAssetUpdateParams\Access;
use HubSpotSDK\Files\FileAssets\FileAssetUploadParams;
use HubSpotSDK\Files\FileStat;
use HubSpotSDK\Files\Folder;
use HubSpotSDK\Files\ImportFromURLTaskLocator;
use HubSpotSDK\Files\SignedURL;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Files\FileAssetsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class FileAssetsRawService implements FileAssetsRawContract
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
     * }|FileAssetCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function create(
        array|FileAssetCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileAssetCreateParams::parseRequest(
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
     * @param array{
     *   clearExpires: bool,
     *   access?: value-of<Access>,
     *   expiresAt?: \DateTimeInterface,
     *   isUsableInContent?: bool,
     *   name?: string,
     *   parentFolderID?: string,
     *   parentFolderPath?: string,
     * }|FileAssetUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        array|FileAssetUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileAssetUpdateParams::parseRequest(
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
     * @param array{properties?: list<string>}|FileAssetGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        array|FileAssetGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileAssetGetParams::parseRequest(
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
     * @param array{properties?: list<string>}|FileAssetGetByPathParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FileStat>
     *
     * @throws APIException
     */
    public function getByPath(
        string $path,
        array|FileAssetGetByPathParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileAssetGetByPathParams::parseRequest(
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
     * @param array{
     *   expirationSeconds?: int, size?: Size|value-of<Size>, upscale?: bool
     * }|FileAssetGetSignedURLParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SignedURL>
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        array|FileAssetGetSignedURLParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileAssetGetSignedURLParams::parseRequest(
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
     *   access: value-of<FileAssetImportFromURLAsyncParams\Access>,
     *   duplicateValidationScope: DuplicateValidationScope|value-of<DuplicateValidationScope>,
     *   duplicateValidationStrategy: DuplicateValidationStrategy|value-of<DuplicateValidationStrategy>,
     *   overwrite: bool,
     *   expiresAt?: \DateTimeInterface,
     *   folderID?: string,
     *   folderPath?: string,
     *   name?: string,
     *   ttl?: string,
     *   url?: string,
     * }|FileAssetImportFromURLAsyncParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ImportFromURLTaskLocator>
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        array|FileAssetImportFromURLAsyncParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileAssetImportFromURLAsyncParams::parseRequest(
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
     * @param array{
     *   charsetHunch?: string, file?: string|FileParam, options?: string
     * }|FileAssetReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        array|FileAssetReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileAssetReplaceParams::parseRequest(
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
     * }|FileAssetSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<File>>
     *
     * @throws APIException
     */
    public function search(
        array|FileAssetSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileAssetSearchParams::parseRequest(
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
     *   file?: string|FileParam,
     *   fileName?: string,
     *   folderID?: string,
     *   folderPath?: string,
     *   options?: string,
     * }|FileAssetUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function upload(
        array|FileAssetUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FileAssetUploadParams::parseRequest(
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

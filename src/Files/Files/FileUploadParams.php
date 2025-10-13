<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FileUploadParams); // set properties as needed
 * $client->files.files->upload(...$params->toArray());
 * ```
 * Upload a single file with content specified in request body.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.files->upload(...$params->toArray());`
 *
 * @see HubspotSDK\Files\Files->upload
 *
 * @phpstan-type file_upload_params = array{
 *   charsetHunch?: string,
 *   file?: string,
 *   fileName?: string,
 *   folderID?: string,
 *   folderPath?: string,
 *   options?: string,
 * }
 */
final class FileUploadParams implements BaseModel
{
    /** @use SdkModel<file_upload_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Character set of the uploaded file.
     */
    #[Api(optional: true)]
    public ?string $charsetHunch;

    /**
     * File to be uploaded.
     */
    #[Api(optional: true)]
    public ?string $file;

    /**
     * Desired name for the uploaded file.
     */
    #[Api(optional: true)]
    public ?string $fileName;

    /**
     * Either 'folderId' or 'folderPath' is required. folderId is the ID of the folder the file will be uploaded to.
     */
    #[Api('folderId', optional: true)]
    public ?string $folderID;

    /**
     * Either 'folderPath' or 'folderId' is required. This field represents the destination folder path for the uploaded file. If a path doesn't exist, the system will try to create one.
     */
    #[Api(optional: true)]
    public ?string $folderPath;

    /**
     * JSON string representing FileUploadOptions.
     */
    #[Api(optional: true)]
    public ?string $options;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $charsetHunch = null,
        ?string $file = null,
        ?string $fileName = null,
        ?string $folderID = null,
        ?string $folderPath = null,
        ?string $options = null,
    ): self {
        $obj = new self;

        null !== $charsetHunch && $obj->charsetHunch = $charsetHunch;
        null !== $file && $obj->file = $file;
        null !== $fileName && $obj->fileName = $fileName;
        null !== $folderID && $obj->folderID = $folderID;
        null !== $folderPath && $obj->folderPath = $folderPath;
        null !== $options && $obj->options = $options;

        return $obj;
    }

    /**
     * Character set of the uploaded file.
     */
    public function withCharsetHunch(string $charsetHunch): self
    {
        $obj = clone $this;
        $obj->charsetHunch = $charsetHunch;

        return $obj;
    }

    /**
     * File to be uploaded.
     */
    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }

    /**
     * Desired name for the uploaded file.
     */
    public function withFileName(string $fileName): self
    {
        $obj = clone $this;
        $obj->fileName = $fileName;

        return $obj;
    }

    /**
     * Either 'folderId' or 'folderPath' is required. folderId is the ID of the folder the file will be uploaded to.
     */
    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj->folderID = $folderID;

        return $obj;
    }

    /**
     * Either 'folderPath' or 'folderId' is required. This field represents the destination folder path for the uploaded file. If a path doesn't exist, the system will try to create one.
     */
    public function withFolderPath(string $folderPath): self
    {
        $obj = clone $this;
        $obj->folderPath = $folderPath;

        return $obj;
    }

    /**
     * JSON string representing FileUploadOptions.
     */
    public function withOptions(string $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FileUploadParams); // set properties as needed
 * $client->files->upload(...$params->toArray());
 * ```
 * Upload file.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files->upload(...$params->toArray());`
 *
 * @see HubspotSDK\Files->upload
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

    #[Api(optional: true)]
    public ?string $charsetHunch;

    #[Api(optional: true)]
    public ?string $file;

    #[Api(optional: true)]
    public ?string $fileName;

    #[Api('folderId', optional: true)]
    public ?string $folderID;

    #[Api(optional: true)]
    public ?string $folderPath;

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

    public function withCharsetHunch(string $charsetHunch): self
    {
        $obj = clone $this;
        $obj->charsetHunch = $charsetHunch;

        return $obj;
    }

    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }

    public function withFileName(string $fileName): self
    {
        $obj = clone $this;
        $obj->fileName = $fileName;

        return $obj;
    }

    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj->folderID = $folderID;

        return $obj;
    }

    public function withFolderPath(string $folderPath): self
    {
        $obj = clone $this;
        $obj->folderPath = $folderPath;

        return $obj;
    }

    public function withOptions(string $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }
}

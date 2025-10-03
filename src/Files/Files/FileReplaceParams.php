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
 * $params = (new FileReplaceParams); // set properties as needed
 * $client->files.files->replace(...$params->toArray());
 * ```
 * Replace file.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.files->replace(...$params->toArray());`
 *
 * @see HubspotSDK\Files\Files->replace
 *
 * @phpstan-type file_replace_params = array{
 *   charsetHunch?: string, file?: string, options?: string
 * }
 */
final class FileReplaceParams implements BaseModel
{
    /** @use SdkModel<file_replace_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $charsetHunch;

    #[Api(optional: true)]
    public ?string $file;

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
        ?string $options = null
    ): self {
        $obj = new self;

        null !== $charsetHunch && $obj->charsetHunch = $charsetHunch;
        null !== $file && $obj->file = $file;
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

    public function withOptions(string $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }
}

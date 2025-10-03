<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EmailCloneParams); // set properties as needed
 * $client->marketing.emails->clone(...$params->toArray());
 * ```
 * Clone a marketing email.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.emails->clone(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Emails->clone
 *
 * @phpstan-type email_clone_params = array{
 *   id: string, cloneName?: string, language?: string
 * }
 */
final class EmailCloneParams implements BaseModel
{
    /** @use SdkModel<email_clone_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    #[Api(optional: true)]
    public ?string $cloneName;

    #[Api(optional: true)]
    public ?string $language;

    /**
     * `new EmailCloneParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailCloneParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailCloneParams)->withID(...)
     * ```
     */
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
        string $id,
        ?string $cloneName = null,
        ?string $language = null
    ): self {
        $obj = new self;

        $obj->id = $id;

        null !== $cloneName && $obj->cloneName = $cloneName;
        null !== $language && $obj->language = $language;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCloneName(string $cloneName): self
    {
        $obj = clone $this;
        $obj->cloneName = $cloneName;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }
}

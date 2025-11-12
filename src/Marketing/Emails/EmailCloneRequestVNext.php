<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmailCloneRequestVNextShape = array{
 *   id: string, cloneName?: string|null, language?: string|null
 * }
 */
final class EmailCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<EmailCloneRequestVNextShape> */
    use SdkModel;

    /**
     * The unique identifier of the email to be cloned.
     */
    #[Api]
    public string $id;

    /**
     * The name to assign to the cloned email.
     */
    #[Api(optional: true)]
    public ?string $cloneName;

    /**
     * The language code for the cloned email, such as 'en' for English.
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * `new EmailCloneRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailCloneRequestVNext::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailCloneRequestVNext)->withID(...)
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

    /**
     * The unique identifier of the email to be cloned.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The name to assign to the cloned email.
     */
    public function withCloneName(string $cloneName): self
    {
        $obj = clone $this;
        $obj->cloneName = $cloneName;

        return $obj;
    }

    /**
     * The language code for the cloned email, such as 'en' for English.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This will create a duplicate email with the same properties as the original, with the exception of a unique ID.
 *
 * @see HubspotSDK\Services\Marketing\EmailsService::clone()
 *
 * @phpstan-type EmailCloneParamsShape = array{
 *   id: string, cloneName?: string, language?: string
 * }
 */
final class EmailCloneParams implements BaseModel
{
    /** @use SdkModel<EmailCloneParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the email to be cloned.
     */
    #[Required]
    public string $id;

    /**
     * The name to assign to the cloned email.
     */
    #[Optional]
    public ?string $cloneName;

    /**
     * The language code for the cloned email, such as 'en' for English.
     */
    #[Optional]
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

        $obj['id'] = $id;

        null !== $cloneName && $obj['cloneName'] = $cloneName;
        null !== $language && $obj['language'] = $language;

        return $obj;
    }

    /**
     * The unique identifier of the email to be cloned.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The name to assign to the cloned email.
     */
    public function withCloneName(string $cloneName): self
    {
        $obj = clone $this;
        $obj['cloneName'] = $cloneName;

        return $obj;
    }

    /**
     * The language code for the cloned email, such as 'en' for English.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }
}

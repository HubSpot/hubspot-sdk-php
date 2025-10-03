<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_emails_email_clone_request_v_next = array{
 *   id: string, cloneName?: string, language?: string
 * }
 */
final class MarketingEmailsEmailCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<marketing_emails_email_clone_request_v_next> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api(optional: true)]
    public ?string $cloneName;

    #[Api(optional: true)]
    public ?string $language;

    /**
     * `new MarketingEmailsEmailCloneRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEmailsEmailCloneRequestVNext::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEmailsEmailCloneRequestVNext)->withID(...)
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

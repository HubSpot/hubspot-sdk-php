<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_emails_ab_test_create_request_v_next = array{
 *   contentID: string, variationName: string
 * }
 */
final class MarketingEmailsAbTestCreateRequestVNext implements BaseModel
{
    /** @use SdkModel<marketing_emails_ab_test_create_request_v_next> */
    use SdkModel;

    #[Api('contentId')]
    public string $contentID;

    #[Api]
    public string $variationName;

    /**
     * `new MarketingEmailsAbTestCreateRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEmailsAbTestCreateRequestVNext::with(
     *   contentID: ..., variationName: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEmailsAbTestCreateRequestVNext)
     *   ->withContentID(...)
     *   ->withVariationName(...)
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
    public static function with(string $contentID, string $variationName): self
    {
        $obj = new self;

        $obj->contentID = $contentID;
        $obj->variationName = $variationName;

        return $obj;
    }

    public function withContentID(string $contentID): self
    {
        $obj = clone $this;
        $obj->contentID = $contentID;

        return $obj;
    }

    public function withVariationName(string $variationName): self
    {
        $obj = clone $this;
        $obj->variationName = $variationName;

        return $obj;
    }
}

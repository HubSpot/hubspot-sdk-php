<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a variation of a marketing email for an A/B test. The new variation will be created as a draft. If an active variation already exists, a new one won't be created.
 *
 * @see HubspotSDK\Services\Marketing\EmailsService::createAbTestVariation()
 *
 * @phpstan-type EmailCreateAbTestVariationParamsShape = array{
 *   contentID: string, variationName: string
 * }
 */
final class EmailCreateAbTestVariationParams implements BaseModel
{
    /** @use SdkModel<EmailCreateAbTestVariationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to test.
     */
    #[Required('contentId')]
    public string $contentID;

    /**
     * Name of A/B test variation.
     */
    #[Required]
    public string $variationName;

    /**
     * `new EmailCreateAbTestVariationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailCreateAbTestVariationParams::with(contentID: ..., variationName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailCreateAbTestVariationParams)
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
        $self = new self;

        $self['contentID'] = $contentID;
        $self['variationName'] = $variationName;

        return $self;
    }

    /**
     * ID of the object to test.
     */
    public function withContentID(string $contentID): self
    {
        $self = clone $this;
        $self['contentID'] = $contentID;

        return $self;
    }

    /**
     * Name of A/B test variation.
     */
    public function withVariationName(string $variationName): self
    {
        $self = clone $this;
        $self['variationName'] = $variationName;

        return $self;
    }
}

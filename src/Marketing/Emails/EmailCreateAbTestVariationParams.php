<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a variation of a marketing email for an A/B test. The new variation will be created as a draft. If an active variation already exists, a new one won't be created.
 *
 * @see HubspotSDK\Marketing\Emails->createAbTestVariation
 *
 * @phpstan-type email_create_ab_test_variation_params = array{
 *   contentID: string, variationName: string
 * }
 */
final class EmailCreateAbTestVariationParams implements BaseModel
{
    /** @use SdkModel<email_create_ab_test_variation_params> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the email to test.
     */
    #[Api('contentId')]
    public string $contentID;

    /**
     * Name of the variation to be created.
     */
    #[Api]
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
        $obj = new self;

        $obj->contentID = $contentID;
        $obj->variationName = $variationName;

        return $obj;
    }

    /**
     * ID of the email to test.
     */
    public function withContentID(string $contentID): self
    {
        $obj = clone $this;
        $obj->contentID = $contentID;

        return $obj;
    }

    /**
     * Name of the variation to be created.
     */
    public function withVariationName(string $variationName): self
    {
        $obj = clone $this;
        $obj->variationName = $variationName;

        return $obj;
    }
}

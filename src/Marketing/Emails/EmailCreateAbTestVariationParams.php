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
 * $params = (new EmailCreateAbTestVariationParams); // set properties as needed
 * $client->marketing.emails->createAbTestVariation(...$params->toArray());
 * ```
 * Create an A/B test variation of a marketing email.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.emails->createAbTestVariation(...$params->toArray());`
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

    #[Api('contentId')]
    public string $contentID;

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

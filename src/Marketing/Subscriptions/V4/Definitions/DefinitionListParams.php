<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Definitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DefinitionListParams); // set properties as needed
 * $client->marketing.subscriptions.v4.definitions->list(...$params->toArray());
 * ```
 * Retrieve all subscription status definitions.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.subscriptions.v4.definitions->list(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Subscriptions\V4\Definitions->list
 *
 * @phpstan-type definition_list_params = array{
 *   businessUnitID?: int, includeTranslations?: bool
 * }
 */
final class DefinitionListParams implements BaseModel
{
    /** @use SdkModel<definition_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?int $businessUnitID;

    #[Api(optional: true)]
    public ?bool $includeTranslations;

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
        ?int $businessUnitID = null,
        ?bool $includeTranslations = null
    ): self {
        $obj = new self;

        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;
        null !== $includeTranslations && $obj->includeTranslations = $includeTranslations;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    public function withIncludeTranslations(bool $includeTranslations): self
    {
        $obj = clone $this;
        $obj->includeTranslations = $includeTranslations;

        return $obj;
    }
}

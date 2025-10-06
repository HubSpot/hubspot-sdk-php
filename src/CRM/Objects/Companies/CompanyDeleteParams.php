<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Companies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\SimplePublicObjectID;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CompanyDeleteParams); // set properties as needed
 * $client->crm.objects.companies->delete(...$params->toArray());
 * ```
 * Archive a batch of companies.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.companies->delete(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Companies->delete
 *
 * @phpstan-type company_delete_params = array{inputs: list<SimplePublicObjectID>}
 */
final class CompanyDeleteParams implements BaseModel
{
    /** @use SdkModel<company_delete_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Api(list: SimplePublicObjectID::class)]
    public array $inputs;

    /**
     * `new CompanyDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompanyDeleteParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompanyDeleteParams)->withInputs(...)
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
     *
     * @param list<SimplePublicObjectID> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}

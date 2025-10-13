<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Companies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\SimplePublicObjectBatchInput;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CompanyUpdateParams); // set properties as needed
 * $client->crm.objects.companies->update(...$params->toArray());
 * ```
 * Update a batch of companies by ID.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.companies->update(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Companies->update
 *
 * @phpstan-type company_update_params = array{
 *   inputs: list<SimplePublicObjectBatchInput>
 * }
 */
final class CompanyUpdateParams implements BaseModel
{
    /** @use SdkModel<company_update_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInput> $inputs */
    #[Api(list: SimplePublicObjectBatchInput::class)]
    public array $inputs;

    /**
     * `new CompanyUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompanyUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompanyUpdateParams)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInput> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectBatchInput> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}

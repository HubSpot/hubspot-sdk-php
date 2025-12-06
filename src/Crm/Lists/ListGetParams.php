<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Fetch a single list by **ILS list ID**.
 *
 * @see HubspotSDK\Services\Crm\ListsService::get()
 *
 * @phpstan-type ListGetParamsShape = array{includeFilters?: bool}
 */
final class ListGetParams implements BaseModel
{
    /** @use SdkModel<ListGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     */
    #[Api(optional: true)]
    public ?bool $includeFilters;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includeFilters = null): self
    {
        $obj = new self;

        null !== $includeFilters && $obj['includeFilters'] = $includeFilters;

        return $obj;
    }

    /**
     * A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     */
    public function withIncludeFilters(bool $includeFilters): self
    {
        $obj = clone $this;
        $obj['includeFilters'] = $includeFilters;

        return $obj;
    }
}

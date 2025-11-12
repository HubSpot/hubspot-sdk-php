<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\FeatureFlags;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\Apps\AppDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppGetParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppListPortalsParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams;
use HubspotSDK\Crm\FeatureFlags\FlagResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\RequestOptions;

interface AppsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AppUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        array|AppUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FlagResponse;

    /**
     * @api
     *
     * @param array<mixed>|AppDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        array|AppDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): FlagResponse;

    /**
     * @api
     *
     * @param array<mixed>|AppGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        array|AppGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): FlagResponse;

    /**
     * @api
     *
     * @param array<mixed>|AppListPortalsParams $params
     *
     * @throws APIException
     */
    public function listPortals(
        string $flagName,
        array|AppListPortalsParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse;
}

<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\FeatureFlags;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\Apps\AppDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppGetParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppListPortalsParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams;
use HubspotSDK\Crm\FeatureFlags\FlagResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\RequestOptions;

interface AppsRawContract
{
    /**
     * @api
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param array<string,mixed>|AppUpdateParams $params
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        array|AppUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param array<string,mixed>|AppDeleteParams $params
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        array|AppDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param array<string,mixed>|AppGetParams $params
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        array|AppGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param array<string,mixed>|AppListPortalsParams $params
     *
     * @return BaseResponse<PortalFlagStateBatchResponse>
     *
     * @throws APIException
     */
    public function listPortals(
        string $flagName,
        array|AppListPortalsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}

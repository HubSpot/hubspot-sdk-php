<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicStatus;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicBulkOptOutFromAllResponse;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatus;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatusBulkResponse;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicWideStatusBulkResponse;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusSetParams\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusSetParams\StatusState;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface StatusesContract
{
    /**
     * @api
     *
     * @param Channel|value-of<Channel> $channel
     * @param int $businessUnitID
     *
     * @throws APIException
     */
    public function get(
        string $subscriberIDString,
        $channel,
        $businessUnitID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $subscriberIDString,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetBatchParams\Channel|value-of<HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetBatchParams\Channel> $channel
     * @param list<string> $inputs
     * @param int $businessUnitID
     *
     * @throws APIException
     */
    public function getBatch(
        $channel,
        $inputs,
        $businessUnitID = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicStatusBulkResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatusBulkResponse;

    /**
     * @api
     *
     * @param HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams\Channel|value-of<HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams\Channel> $channel
     * @param int $businessUnitID
     * @param bool $verbose
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatus(
        string $subscriberIDString,
        $channel,
        $businessUnitID = omit,
        $verbose = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicWideStatus;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatusRaw(
        string $subscriberIDString,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicWideStatus;

    /**
     * @api
     *
     * @param HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusBatchParams\Channel|value-of<HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusBatchParams\Channel> $channel
     * @param list<string> $inputs
     * @param int $businessUnitID
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatusBatch(
        $channel,
        $inputs,
        $businessUnitID = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicWideStatusBulkResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatusBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicWideStatusBulkResponse;

    /**
     * @api
     *
     * @param HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusSetParams\Channel|value-of<HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusSetParams\Channel> $channel
     * @param StatusState|value-of<StatusState> $statusState
     * @param int $subscriptionID
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     * @param string $legalBasisExplanation
     *
     * @throws APIException
     */
    public function set(
        string $subscriberIDString,
        $channel,
        $statusState,
        $subscriptionID,
        $legalBasis = omit,
        $legalBasisExplanation = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setRaw(
        string $subscriberIDString,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel|value-of<HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel> $channel
     * @param int $businessUnitID
     * @param bool $verbose
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        string $subscriberIDString,
        $channel,
        $businessUnitID = omit,
        $verbose = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function unsubscribeAllRaw(
        string $subscriberIDString,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllBatchParams\Channel|value-of<HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllBatchParams\Channel> $channel
     * @param list<string> $inputs
     * @param int $businessUnitID
     * @param bool $verbose
     *
     * @throws APIException
     */
    public function unsubscribeAllBatch(
        $channel,
        $inputs,
        $businessUnitID = omit,
        $verbose = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicBulkOptOutFromAllResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function unsubscribeAllBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicBulkOptOutFromAllResponse;

    /**
     * @api
     *
     * @param list<PublicStatusRequest> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatus;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatus;
}

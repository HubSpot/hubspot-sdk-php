<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalVersionPublicEmail;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubspotSDK\Marketing\Emails\EmailCreateParams\State;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubspotSDK\Marketing\Emails\EmailGetHistogramParams\Interval;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;
use HubspotSDK\Marketing\Emails\PublicEmail;
use HubspotSDK\Marketing\Emails\PublicEmailContent;
use HubspotSDK\Marketing\Emails\PublicEmailFromDetails;
use HubspotSDK\Marketing\Emails\PublicEmailSubscriptionDetails;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails;
use HubspotSDK\Marketing\Emails\PublicEmailToDetails;
use HubspotSDK\Marketing\Emails\PublicRssEmailDetails;
use HubspotSDK\Marketing\Emails\PublicWebversionDetails;
use HubspotSDK\Marketing\Emails\VersionPublicEmail;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface EmailsContract
{
    /**
     * @api
     *
     * @param string $name
     * @param string $activeDomain
     * @param bool $archived
     * @param int $businessUnitID
     * @param string $campaign
     * @param PublicEmailContent $content
     * @param string $feedbackSurveyID
     * @param PublicEmailFromDetails $from
     * @param bool $jitterSendTime
     * @param Language|value-of<Language> $language
     * @param \DateTimeInterface $publishDate
     * @param PublicRssEmailDetails $rssData
     * @param bool $sendOnPublish
     * @param State|value-of<State> $state
     * @param Subcategory|value-of<Subcategory> $subcategory
     * @param string $subject
     * @param PublicEmailSubscriptionDetails $subscriptionDetails
     * @param PublicEmailTestingDetails $testing
     * @param PublicEmailToDetails $to
     * @param PublicWebversionDetails $webversion
     *
     * @throws APIException
     */
    public function create(
        $name,
        $activeDomain = omit,
        $archived = omit,
        $businessUnitID = omit,
        $campaign = omit,
        $content = omit,
        $feedbackSurveyID = omit,
        $from = omit,
        $jitterSendTime = omit,
        $language = omit,
        $publishDate = omit,
        $rssData = omit,
        $sendOnPublish = omit,
        $state = omit,
        $subcategory = omit,
        $subject = omit,
        $subscriptionDetails = omit,
        $testing = omit,
        $to = omit,
        $webversion = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param bool $archived
     * @param string $activeDomain
     * @param int $businessUnitID
     * @param string $campaign
     * @param PublicEmailContent $content
     * @param PublicEmailFromDetails $from
     * @param bool $jitterSendTime
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\Language|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\Language> $language
     * @param string $name
     * @param \DateTimeInterface $publishDate
     * @param PublicRssEmailDetails $rssData
     * @param bool $sendOnPublish
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\State|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\State> $state
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory> $subcategory
     * @param string $subject
     * @param PublicEmailSubscriptionDetails $subscriptionDetails
     * @param PublicEmailTestingDetails $testing
     * @param PublicEmailToDetails $to
     * @param PublicWebversionDetails $webversion
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        $archived = omit,
        $activeDomain = omit,
        $businessUnitID = omit,
        $campaign = omit,
        $content = omit,
        $from = omit,
        $jitterSendTime = omit,
        $language = omit,
        $name = omit,
        $publishDate = omit,
        $rssData = omit,
        $sendOnPublish = omit,
        $state = omit,
        $subcategory = omit,
        $subject = omit,
        $subscriptionDetails = omit,
        $testing = omit,
        $to = omit,
        $webversion = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param string $after
     * @param bool $archived
     * @param string $campaign
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param list<string> $includedProperties
     * @param bool $includeStats
     * @param bool $isPublished
     * @param int $limit
     * @param bool $marketingCampaignNames
     * @param list<string> $sort
     * @param Type|value-of<Type> $type
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
     * @param bool $workflowNames
     *
     * @return Page<PublicEmail>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $campaign = omit,
        $createdAfter = omit,
        $createdAt = omit,
        $createdBefore = omit,
        $includedProperties = omit,
        $includeStats = omit,
        $isPublished = omit,
        $limit = omit,
        $marketingCampaignNames = omit,
        $sort = omit,
        $type = omit,
        $updatedAfter = omit,
        $updatedAt = omit,
        $updatedBefore = omit,
        $workflowNames = omit,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicEmail>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param bool $archived
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id
     * @param string $cloneName
     * @param string $language
     *
     * @throws APIException
     */
    public function clone(
        $id,
        $cloneName = omit,
        $language = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cloneRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param string $contentID
     * @param string $variationName
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        $contentID,
        $variationName,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createAbTestVariationRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param list<int> $emailIDs
     * @param string $endTimestamp
     * @param string $property
     * @param string $startTimestamp
     *
     * @throws APIException
     */
    public function getEmailsList(
        $emailIDs = omit,
        $endTimestamp = omit,
        $property = omit,
        $startTimestamp = omit,
        ?RequestOptions $requestOptions = null,
    ): AggregateEmailStatistics;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getEmailsListRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AggregateEmailStatistics;

    /**
     * @api
     *
     * @param list<int> $emailIDs
     * @param string $endTimestamp
     * @param Interval|value-of<Interval> $interval
     * @param string $startTimestamp
     *
     * @throws APIException
     */
    public function getHistogram(
        $emailIDs = omit,
        $endTimestamp = omit,
        $interval = omit,
        $startTimestamp = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalEmailStatisticIntervalNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getHistogramRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalEmailStatisticIntervalNoPaging;

    /**
     * @api
     *
     * @param string $emailID
     *
     * @throws APIException
     */
    public function getRevisionByID(
        string $revisionID,
        $emailID,
        ?RequestOptions $requestOptions = null
    ): VersionPublicEmail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRevisionByIDRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VersionPublicEmail;

    /**
     * @api
     *
     * @param string $after
     * @param string $before
     * @param int $limit
     *
     * @throws APIException
     */
    public function getRevisions(
        string $emailID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalVersionPublicEmail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRevisionsRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalVersionPublicEmail;

    /**
     * @api
     *
     * @throws APIException
     */
    public function publishOrSend(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param bool $archived
     * @param list<string> $includedProperties
     * @param bool $includeStats
     * @param bool $marketingCampaignNames
     * @param bool $workflowNames
     *
     * @throws APIException
     */
    public function read(
        string $emailID,
        $archived = omit,
        $includedProperties = omit,
        $includeStats = omit,
        $marketingCampaignNames = omit,
        $workflowNames = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resetDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $emailID
     *
     * @throws APIException
     */
    public function restoreDraftRevision(
        int $revisionID,
        $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restoreDraftRevisionRaw(
        int $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param string $emailID
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restoreRevisionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function unpublishOrCancel(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $activeDomain
     * @param bool $archived
     * @param int $businessUnitID
     * @param string $campaign
     * @param PublicEmailContent $content
     * @param PublicEmailFromDetails $from
     * @param bool $jitterSendTime
     * @param \HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\Language|value-of<\HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\Language> $language
     * @param string $name
     * @param \DateTimeInterface $publishDate
     * @param PublicRssEmailDetails $rssData
     * @param bool $sendOnPublish
     * @param \HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\State|value-of<\HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\State> $state
     * @param \HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\Subcategory|value-of<\HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\Subcategory> $subcategory
     * @param string $subject
     * @param PublicEmailSubscriptionDetails $subscriptionDetails
     * @param PublicEmailTestingDetails $testing
     * @param PublicEmailToDetails $to
     * @param PublicWebversionDetails $webversion
     *
     * @throws APIException
     */
    public function upsertDraft(
        string $emailID,
        $activeDomain = omit,
        $archived = omit,
        $businessUnitID = omit,
        $campaign = omit,
        $content = omit,
        $from = omit,
        $jitterSendTime = omit,
        $language = omit,
        $name = omit,
        $publishDate = omit,
        $rssData = omit,
        $sendOnPublish = omit,
        $state = omit,
        $subcategory = omit,
        $subject = omit,
        $subscriptionDetails = omit,
        $testing = omit,
        $to = omit,
        $webversion = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function upsertDraftRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;
}

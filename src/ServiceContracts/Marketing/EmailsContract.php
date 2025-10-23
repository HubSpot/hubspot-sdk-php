<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
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
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param int $businessUnitID
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent $content data structure representing the content of the email
     * @param string $feedbackSurveyID the ID of the feedback survey linked to the email
     * @param int $folderIDV2
     * @param PublicEmailFromDetails $from data structure representing the from fields on the email
     * @param bool $jitterSendTime
     * @param Language|value-of<Language> $language
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails $rssData RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param State|value-of<State> $state the email state
     * @param Subcategory|value-of<Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails $subscriptionDetails data structure representing the subscription fields of the email
     * @param PublicEmailTestingDetails $testing AB testing related data. This property is only returned for AB type emails.
     * @param PublicEmailToDetails $to data structure representing the to fields of the email
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
        $folderIDV2 = omit,
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
     * @param bool $archived determines if the email is archived or not
     * @param string $activeDomain the active domain of the email
     * @param int $businessUnitID
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent $content data structure representing the content of the email
     * @param int $folderIDV2
     * @param PublicEmailFromDetails $from data structure representing the from fields on the email
     * @param bool $jitterSendTime
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\Language|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\Language> $language
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails $rssData RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\State|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\State> $state the email state
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails $subscriptionDetails data structure representing the subscription fields of the email
     * @param PublicEmailTestingDetails $testing AB testing related data. This property is only returned for AB type emails.
     * @param PublicEmailToDetails $to data structure representing the to fields of the email
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
        $folderIDV2 = omit,
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
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return archived emails. Defaults to `false`.
     * @param string $campaign Filter by campaign GUID. All emails will be returned if not present.
     * @param \DateTimeInterface $createdAfter only return emails created after the specified time
     * @param \DateTimeInterface $createdAt only return emails created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return emails created before the specified time
     * @param list<string> $includedProperties limit the response to only include this specified list of properties
     * @param bool $includeStats include statistics with emails
     * @param bool $isPublished Filter by published/draft emails. All emails will be returned if not present.
     * @param int $limit The maximum number of results to return. Default is 10.
     * @param bool $marketingCampaignNames include the names for any associated marketing campaigns
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param Type|value-of<Type> $type Email types to be filtered by. Multiple types can be included. All emails will be returned if not present.
     * @param \DateTimeInterface $updatedAfter only return emails last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return emails last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return emails last updated before the specified time
     * @param bool $workflowNames include the names of any workflows associated with the returned emails
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
     * @param bool $archived whether to return only results that have been archived
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
     * @param string $id the unique identifier of the email to be cloned
     * @param string $cloneName the name to assign to the cloned email
     * @param string $language the language code for the cloned email, such as 'en' for English
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
     * @param string $contentID ID of the object to test
     * @param string $variationName name of A/B test variation
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
     * @param list<int> $emailIDs Filter by email IDs. Only include statistics of emails with these IDs.
     * @param string $endTimestamp the end timestamp of the time span, in ISO8601 representation
     * @param string $property Specifies which email properties should be returned. All properties will be returned by default.
     * @param string $startTimestamp the start timestamp of the time span, in ISO8601 representation
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
     * @param list<int> $emailIDs Filter by email IDs. Only include statistics of emails with these IDs.
     * @param string $endTimestamp the end timestamp of the time span, in ISO8601 representation
     * @param Interval|value-of<Interval> $interval the interval to aggregate statistics for
     * @param string $startTimestamp the start timestamp of the time span, in ISO8601 representation
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
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before The cursor token value to get the previous set of results. You can get this from the `paging.prev.before` JSON property of a paged response containing more results.
     * @param int $limit The maximum number of results to return. Default is 10.
     *
     * @return Page<VersionPublicEmail>
     *
     * @throws APIException
     */
    public function getRevisions(
        string $emailID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<VersionPublicEmail>
     *
     * @throws APIException
     */
    public function getRevisionsRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page;

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
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $includedProperties limit the response to only include the specified properties
     * @param bool $includeStats include statistics with email
     * @param bool $marketingCampaignNames if set to true, loads `campaignName` and `campaignUtm`
     * @param bool $workflowNames if set to true, loads workflows in which the email is used within a "send email" action
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
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param int $businessUnitID
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent $content data structure representing the content of the email
     * @param int $folderIDV2
     * @param PublicEmailFromDetails $from data structure representing the from fields on the email
     * @param bool $jitterSendTime
     * @param \HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\Language|value-of<\HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\Language> $language
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails $rssData RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param \HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\State|value-of<\HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\State> $state the email state
     * @param \HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\Subcategory|value-of<\HubspotSDK\Marketing\Emails\EmailUpsertDraftParams\Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails $subscriptionDetails data structure representing the subscription fields of the email
     * @param PublicEmailTestingDetails $testing AB testing related data. This property is only returned for AB type emails.
     * @param PublicEmailToDetails $to data structure representing the to fields of the email
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
        $folderIDV2 = omit,
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

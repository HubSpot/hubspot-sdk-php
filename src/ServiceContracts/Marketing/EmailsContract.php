<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubSpotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticInterval;
use HubSpotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubSpotSDK\Marketing\Emails\EmailCreateParams\State;
use HubSpotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubSpotSDK\Marketing\Emails\EmailGetHistogramParams\Interval;
use HubSpotSDK\Marketing\Emails\EmailListParams\Type;
use HubSpotSDK\Marketing\Emails\PublicEmail;
use HubSpotSDK\Marketing\Emails\PublicEmailContent;
use HubSpotSDK\Marketing\Emails\PublicEmailFromDetails;
use HubSpotSDK\Marketing\Emails\PublicEmailSubscriptionDetails;
use HubSpotSDK\Marketing\Emails\PublicEmailTestingDetails;
use HubSpotSDK\Marketing\Emails\PublicEmailToDetails;
use HubSpotSDK\Marketing\Emails\PublicEmailVersion;
use HubSpotSDK\Marketing\Emails\PublicRssEmailDetails;
use HubSpotSDK\Marketing\Emails\PublicWebversionDetails;
use HubSpotSDK\Marketing\Emails\VersionPublicEmail;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicEmailContentShape from \HubSpotSDK\Marketing\Emails\PublicEmailContent
 * @phpstan-import-type PublicEmailFromDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailFromDetails
 * @phpstan-import-type PublicRssEmailDetailsShape from \HubSpotSDK\Marketing\Emails\PublicRssEmailDetails
 * @phpstan-import-type PublicEmailSubscriptionDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailSubscriptionDetails
 * @phpstan-import-type PublicEmailTestingDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailTestingDetails
 * @phpstan-import-type PublicEmailToDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailToDetails
 * @phpstan-import-type PublicWebversionDetailsShape from \HubSpotSDK\Marketing\Emails\PublicWebversionDetails
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface EmailsContract
{
    /**
     * @api
     *
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param int $businessUnitID the ID of the business unit associated with the email
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent|PublicEmailContentShape $content
     * @param string $feedbackSurveyID the ID of the feedback survey linked to the email
     * @param int $folderIDV2 the ID of the folder where the email will be stored
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from
     * @param bool $jitterSendTime determines whether the email send time should be randomized to avoid sending all emails at the exact same time
     * @param Language|value-of<Language> $language the language code for the email, such as 'en' for English
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param State|value-of<State> $state the email state
     * @param Subcategory|value-of<Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to
     * @param PublicWebversionDetails|PublicWebversionDetailsShape $webversion
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $activeDomain = null,
        ?bool $archived = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        PublicEmailContent|array|null $content = null,
        ?string $feedbackSurveyID = null,
        ?int $folderIDV2 = null,
        PublicEmailFromDetails|array|null $from = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?string $name = null,
        ?\DateTimeInterface $publishDate = null,
        PublicRssEmailDetails|array|null $rssData = null,
        ?bool $sendOnPublish = null,
        State|string|null $state = null,
        Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        PublicEmailSubscriptionDetails|array|null $subscriptionDetails = null,
        PublicEmailTestingDetails|array|null $testing = null,
        PublicEmailToDetails|array|null $to = null,
        PublicWebversionDetails|array|null $webversion = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param string $emailID Path param
     * @param bool $archived body param: Determines if the email is archived or not
     * @param string $activeDomain body param: The active domain of the email
     * @param int $businessUnitID body param: The ID of the business unit associated with the email
     * @param string $campaign body param: The ID of the campaign this email is associated to
     * @param PublicEmailContent|PublicEmailContentShape $content Body param
     * @param int $folderIDV2 body param: The ID of the folder where the email will be stored
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from Body param
     * @param bool $jitterSendTime body param: Determines whether the email send time should be randomized to avoid sending all emails at the exact same time
     * @param \HubSpotSDK\Marketing\Emails\EmailUpdateParams\Language|value-of<\HubSpotSDK\Marketing\Emails\EmailUpdateParams\Language> $language body param: The language code for the email, such as 'en' for English
     * @param string $name body param: The name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate Body param: The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData Body param
     * @param bool $sendOnPublish body param: Determines whether the email will be sent immediately on publish
     * @param \HubSpotSDK\Marketing\Emails\EmailUpdateParams\State|value-of<\HubSpotSDK\Marketing\Emails\EmailUpdateParams\State> $state body param: The email state
     * @param \HubSpotSDK\Marketing\Emails\EmailUpdateParams\Subcategory|value-of<\HubSpotSDK\Marketing\Emails\EmailUpdateParams\Subcategory> $subcategory body param: The email subcategory
     * @param string $subject body param: The subject of the email
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails Body param
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing Body param
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to Body param
     * @param PublicWebversionDetails|PublicWebversionDetailsShape $webversion Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        ?bool $archived = null,
        ?string $activeDomain = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        PublicEmailContent|array|null $content = null,
        ?int $folderIDV2 = null,
        PublicEmailFromDetails|array|null $from = null,
        ?bool $jitterSendTime = null,
        \HubSpotSDK\Marketing\Emails\EmailUpdateParams\Language|string|null $language = null,
        ?string $name = null,
        ?\DateTimeInterface $publishDate = null,
        PublicRssEmailDetails|array|null $rssData = null,
        ?bool $sendOnPublish = null,
        \HubSpotSDK\Marketing\Emails\EmailUpdateParams\State|string|null $state = null,
        \HubSpotSDK\Marketing\Emails\EmailUpdateParams\Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        PublicEmailSubscriptionDetails|array|null $subscriptionDetails = null,
        PublicEmailTestingDetails|array|null $testing = null,
        PublicEmailToDetails|array|null $to = null,
        PublicWebversionDetails|array|null $webversion = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $includedProperties
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param Type|value-of<Type> $type
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicEmail>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?string $campaign = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $isPublished = null,
        ?int $limit = null,
        ?bool $marketingCampaignNames = null,
        ?\DateTimeInterface $publishedAfter = null,
        ?\DateTimeInterface $publishedAt = null,
        ?\DateTimeInterface $publishedBefore = null,
        ?array $sort = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        ?bool $variantStats = null,
        ?bool $workflowNames = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $id the email ID
     * @param string $cloneName the name to assign to the cloned email
     * @param string $language the language code for the cloned email, such as 'en' for English
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function clone(
        string $id,
        ?string $cloneName = null,
        ?string $language = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param string $contentID ID of the object to test
     * @param string $variationName name of A/B test variation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        string $contentID,
        string $variationName,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param list<int> $emailIDs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        ?array $emailIDs = null,
        ?\DateTimeInterface $endTimestamp = null,
        ?string $property = null,
        ?\DateTimeInterface $startTimestamp = null,
        RequestOptions|array|null $requestOptions = null,
    ): AggregateEmailStatistics;

    /**
     * @api
     *
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $includedProperties
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        ?bool $archived = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $marketingCampaignNames = null,
        ?bool $variantStats = null,
        ?bool $workflowNames = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param list<int> $emailIDs
     * @param Interval|value-of<Interval> $interval
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getHistogram(
        ?array $emailIDs = null,
        ?\DateTimeInterface $endTimestamp = null,
        Interval|string|null $interval = null,
        ?\DateTimeInterface $startTimestamp = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseWithTotalEmailStatisticInterval;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        string $emailID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmailVersion;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<VersionPublicEmail>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $emailID,
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function publish(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resetDraft(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        string $emailID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        string $emailID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unpublish(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param int $businessUnitID the ID of the business unit associated with the email
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent|PublicEmailContentShape $content
     * @param int $folderIDV2 the ID of the folder where the email will be stored
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from
     * @param bool $jitterSendTime determines whether the email send time should be randomized to avoid sending all emails at the exact same time
     * @param \HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\Language|value-of<\HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\Language> $language the language code for the email, such as 'en' for English
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param \HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\State|value-of<\HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\State> $state the email state
     * @param \HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory|value-of<\HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to
     * @param PublicWebversionDetails|PublicWebversionDetailsShape $webversion
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateDraft(
        string $emailID,
        ?string $activeDomain = null,
        ?bool $archived = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        PublicEmailContent|array|null $content = null,
        ?int $folderIDV2 = null,
        PublicEmailFromDetails|array|null $from = null,
        ?bool $jitterSendTime = null,
        \HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\Language|string|null $language = null,
        ?string $name = null,
        ?\DateTimeInterface $publishDate = null,
        PublicRssEmailDetails|array|null $rssData = null,
        ?bool $sendOnPublish = null,
        \HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\State|string|null $state = null,
        \HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        PublicEmailSubscriptionDetails|array|null $subscriptionDetails = null,
        PublicEmailTestingDetails|array|null $testing = null,
        PublicEmailToDetails|array|null $to = null,
        PublicWebversionDetails|array|null $webversion = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail;
}

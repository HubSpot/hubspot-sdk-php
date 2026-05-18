<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\PreResolvedContact;

enum ContactPropertiesLeadingToMatch: string
{
    case ADDRESS = 'address';

    case ANNUALREVENUE = 'annualrevenue';

    case ASSOCIATEDCOMPANYID = 'associatedcompanyid';

    case ASSOCIATEDCOMPANYLASTUPDATED = 'associatedcompanylastupdated';

    case CITY = 'city';

    case CLOSEDATE = 'closedate';

    case COMPANY = 'company';

    case COMPANY_SIZE = 'company_size';

    case COUNTRY = 'country';

    case CREATEDATE = 'createdate';

    case CURRENTLYINWORKFLOW = 'currentlyinworkflow';

    case DATE_OF_BIRTH = 'date_of_birth';

    case DAYS_TO_CLOSE = 'days_to_close';

    case DEGREE = 'degree';

    case EMAIL = 'email';

    case ENGAGEMENTS_LAST_MEETING_BOOKED = 'engagements_last_meeting_booked';

    case ENGAGEMENTS_LAST_MEETING_BOOKED_CAMPAIGN = 'engagements_last_meeting_booked_campaign';

    case ENGAGEMENTS_LAST_MEETING_BOOKED_MEDIUM = 'engagements_last_meeting_booked_medium';

    case ENGAGEMENTS_LAST_MEETING_BOOKED_SOURCE = 'engagements_last_meeting_booked_source';

    case FAX = 'fax';

    case FIELD_OF_STUDY = 'field_of_study';

    case FIRST_CONVERSION_DATE = 'first_conversion_date';

    case FIRST_CONVERSION_EVENT_NAME = 'first_conversion_event_name';

    case FIRST_DEAL_CREATED_DATE = 'first_deal_created_date';

    case FIRSTNAME = 'firstname';

    case FOLLOWERCOUNT = 'followercount';

    case GENDER = 'gender';

    case GRADUATION_DATE = 'graduation_date';

    case HS_ADDITIONAL_EMAILS = 'hs_additional_emails';

    case HS_ALL_CONTACT_VIDS = 'hs_all_contact_vids';

    case HS_ANALYTICS_AVERAGE_PAGE_VIEWS = 'hs_analytics_average_page_views';

    case HS_ANALYTICS_FIRST_REFERRER = 'hs_analytics_first_referrer';

    case HS_ANALYTICS_FIRST_TIMESTAMP = 'hs_analytics_first_timestamp';

    case HS_ANALYTICS_FIRST_TOUCH_CONVERTING_CAMPAIGN = 'hs_analytics_first_touch_converting_campaign';

    case HS_ANALYTICS_FIRST_URL = 'hs_analytics_first_url';

    case HS_ANALYTICS_FIRST_VISIT_TIMESTAMP = 'hs_analytics_first_visit_timestamp';

    case HS_ANALYTICS_LAST_REFERRER = 'hs_analytics_last_referrer';

    case HS_ANALYTICS_LAST_TIMESTAMP = 'hs_analytics_last_timestamp';

    case HS_ANALYTICS_LAST_TOUCH_CONVERTING_CAMPAIGN = 'hs_analytics_last_touch_converting_campaign';

    case HS_ANALYTICS_LAST_URL = 'hs_analytics_last_url';

    case HS_ANALYTICS_LAST_VISIT_TIMESTAMP = 'hs_analytics_last_visit_timestamp';

    case HS_ANALYTICS_NUM_EVENT_COMPLETIONS = 'hs_analytics_num_event_completions';

    case HS_ANALYTICS_NUM_PAGE_VIEWS = 'hs_analytics_num_page_views';

    case HS_ANALYTICS_NUM_VISITS = 'hs_analytics_num_visits';

    case HS_ANALYTICS_REVENUE = 'hs_analytics_revenue';

    case HS_ANALYTICS_SOURCE = 'hs_analytics_source';

    case HS_ANALYTICS_SOURCE_COMPOSITE_DATA = 'hs_analytics_source_composite_data';

    case HS_ANALYTICS_SOURCE_DATA_1 = 'hs_analytics_source_data_1';

    case HS_ANALYTICS_SOURCE_DATA_2 = 'hs_analytics_source_data_2';

    case HS_ASSOCIATED_TARGET_ACCOUNTS = 'hs_associated_target_accounts';

    case HS_AVATAR_FILEMANAGER_KEY = 'hs_avatar_filemanager_key';

    case HS_BING_AD_CLICKED = 'hs_bing_ad_clicked';

    case HS_BING_CLICK_ID = 'hs_bing_click_id';

    case HS_BUYING_ROLE = 'hs_buying_role';

    case HS_CALCULATED_FORM_SUBMISSIONS = 'hs_calculated_form_submissions';

    case HS_CALCULATED_MERGED_VIDS = 'hs_calculated_merged_vids';

    case HS_CALCULATED_MOBILE_NUMBER = 'hs_calculated_mobile_number';

    case HS_CALCULATED_PHONE_NUMBER = 'hs_calculated_phone_number';

    case HS_CALCULATED_PHONE_NUMBER_AREA_CODE = 'hs_calculated_phone_number_area_code';

    case HS_CALCULATED_PHONE_NUMBER_COUNTRY_CODE = 'hs_calculated_phone_number_country_code';

    case HS_CALCULATED_PHONE_NUMBER_REGION_CODE = 'hs_calculated_phone_number_region_code';

    case HS_CHAT_ASSISTANT_IQL_DATE = 'hs_chat_assistant_iql_date';

    case HS_CHAT_ASSISTANT_SOURCE = 'hs_chat_assistant_source';

    case HS_CHAT_ASSISTANT_SUMMARY = 'hs_chat_assistant_summary';

    case HS_CLICKED_LINKEDIN_AD = 'hs_clicked_linkedin_ad';

    case HS_CONTACT_CREATION_LEGAL_BASIS_SOURCE_INSTANCE_ID = 'hs_contact_creation_legal_basis_source_instance_id';

    case HS_CONTACT_ENRICHMENT_OPT_OUT = 'hs_contact_enrichment_opt_out';

    case HS_CONTACT_ENRICHMENT_OPT_OUT_TIMESTAMP = 'hs_contact_enrichment_opt_out_timestamp';

    case HS_CONTENT_MEMBERSHIP_EMAIL = 'hs_content_membership_email';

    case HS_CONTENT_MEMBERSHIP_EMAIL_CONFIRMED = 'hs_content_membership_email_confirmed';

    case HS_CONTENT_MEMBERSHIP_FOLLOW_UP_ENQUEUED_AT = 'hs_content_membership_follow_up_enqueued_at';

    case HS_CONTENT_MEMBERSHIP_NOTES = 'hs_content_membership_notes';

    case HS_CONTENT_MEMBERSHIP_REGISTERED_AT = 'hs_content_membership_registered_at';

    case HS_CONTENT_MEMBERSHIP_REGISTRATION_DOMAIN_SENT_TO = 'hs_content_membership_registration_domain_sent_to';

    case HS_CONTENT_MEMBERSHIP_REGISTRATION_EMAIL_SENT_AT = 'hs_content_membership_registration_email_sent_at';

    case HS_CONTENT_MEMBERSHIP_STATUS = 'hs_content_membership_status';

    case HS_CONVERSATIONS_VISITOR_EMAIL = 'hs_conversations_visitor_email';

    case HS_COUNT_IS_UNWORKED = 'hs_count_is_unworked';

    case HS_COUNT_IS_WORKED = 'hs_count_is_worked';

    case HS_COUNTRY_REGION_CODE = 'hs_country_region_code';

    case HS_CREATED_BY_CONVERSATIONS = 'hs_created_by_conversations';

    case HS_CROSS_ACCOUNT_NOTE = 'hs_cross_account_note';

    case HS_CROSS_SELL_OPPORTUNITY = 'hs_cross_sell_opportunity';

    case HS_CURRENT_CUSTOMER = 'hs_current_customer';

    case HS_CURRENTLY_ENROLLED_IN_PROSPECTING_AGENT = 'hs_currently_enrolled_in_prospecting_agent';

    case HS_CUSTOMER_AGENT_LEAD_STATUS = 'hs_customer_agent_lead_status';

    case HS_DATA_PRIVACY_ADS_CONSENT = 'hs_data_privacy_ads_consent';

    case HS_DATE_ENTERED_CUSTOMER = 'hs_date_entered_customer';

    case HS_DATE_ENTERED_EVANGELIST = 'hs_date_entered_evangelist';

    case HS_DATE_ENTERED_LEAD = 'hs_date_entered_lead';

    case HS_DATE_ENTERED_MARKETINGQUALIFIEDLEAD = 'hs_date_entered_marketingqualifiedlead';

    case HS_DATE_ENTERED_OPPORTUNITY = 'hs_date_entered_opportunity';

    case HS_DATE_ENTERED_OTHER = 'hs_date_entered_other';

    case HS_DATE_ENTERED_SALESQUALIFIEDLEAD = 'hs_date_entered_salesqualifiedlead';

    case HS_DATE_ENTERED_SUBSCRIBER = 'hs_date_entered_subscriber';

    case HS_DATE_EXITED_CUSTOMER = 'hs_date_exited_customer';

    case HS_DATE_EXITED_EVANGELIST = 'hs_date_exited_evangelist';

    case HS_DATE_EXITED_LEAD = 'hs_date_exited_lead';

    case HS_DATE_EXITED_MARKETINGQUALIFIEDLEAD = 'hs_date_exited_marketingqualifiedlead';

    case HS_DATE_EXITED_OPPORTUNITY = 'hs_date_exited_opportunity';

    case HS_DATE_EXITED_OTHER = 'hs_date_exited_other';

    case HS_DATE_EXITED_SALESQUALIFIEDLEAD = 'hs_date_exited_salesqualifiedlead';

    case HS_DATE_EXITED_SUBSCRIBER = 'hs_date_exited_subscriber';

    case HS_DOCUMENT_LAST_REVISITED = 'hs_document_last_revisited';

    case HS_EMAIL_BAD_ADDRESS = 'hs_email_bad_address';

    case HS_EMAIL_BOUNCE = 'hs_email_bounce';

    case HS_EMAIL_CLICK = 'hs_email_click';

    case HS_EMAIL_CUSTOMER_QUARANTINED_REASON = 'hs_email_customer_quarantined_reason';

    case HS_EMAIL_DELIVERED = 'hs_email_delivered';

    case HS_EMAIL_DOMAIN = 'hs_email_domain';

    case HS_EMAIL_FIRST_CLICK_DATE = 'hs_email_first_click_date';

    case HS_EMAIL_FIRST_OPEN_DATE = 'hs_email_first_open_date';

    case HS_EMAIL_FIRST_REPLY_DATE = 'hs_email_first_reply_date';

    case HS_EMAIL_FIRST_SEND_DATE = 'hs_email_first_send_date';

    case HS_EMAIL_HARD_BOUNCE_REASON = 'hs_email_hard_bounce_reason';

    case HS_EMAIL_HARD_BOUNCE_REASON_ENUM = 'hs_email_hard_bounce_reason_enum';

    case HS_EMAIL_IS_INELIGIBLE = 'hs_email_is_ineligible';

    case HS_EMAIL_LAST_CLICK_DATE = 'hs_email_last_click_date';

    case HS_EMAIL_LAST_EMAIL_NAME = 'hs_email_last_email_name';

    case HS_EMAIL_LAST_OPEN_DATE = 'hs_email_last_open_date';

    case HS_EMAIL_LAST_REPLY_DATE = 'hs_email_last_reply_date';

    case HS_EMAIL_LAST_SEND_DATE = 'hs_email_last_send_date';

    case HS_EMAIL_LIVE_SOURCING_RESTRICTED = 'hs_email_live_sourcing_restricted';

    case HS_EMAIL_OPEN = 'hs_email_open';

    case HS_EMAIL_OPTIMAL_SEND_DAY_OF_WEEK = 'hs_email_optimal_send_day_of_week';

    case HS_EMAIL_OPTIMAL_SEND_TIME_OF_DAY = 'hs_email_optimal_send_time_of_day';

    case HS_EMAIL_OPTOUT = 'hs_email_optout';

    case HS_EMAIL_OPTOUT_SURVEY_REASON = 'hs_email_optout_survey_reason';

    case HS_EMAIL_QUARANTINED = 'hs_email_quarantined';

    case HS_EMAIL_QUARANTINED_REASON = 'hs_email_quarantined_reason';

    case HS_EMAIL_RECIPIENT_FATIGUE_RECOVERY_TIME = 'hs_email_recipient_fatigue_recovery_time';

    case HS_EMAIL_REPLIED = 'hs_email_replied';

    case HS_EMAIL_SENDS_SINCE_LAST_ENGAGEMENT = 'hs_email_sends_since_last_engagement';

    case HS_EMAIL_TYPE = 'hs_email_type';

    case HS_EMAILCONFIRMATIONSTATUS = 'hs_emailconfirmationstatus';

    case HS_EMPLOYMENT_CHANGE_DETECTED_DATE = 'hs_employment_change_detected_date';

    case HS_ENRICHED_EMAIL_BOUNCE_DETECTED = 'hs_enriched_email_bounce_detected';

    case HS_EXCLUDED_FROM_CROSS_ACCOUNT_DATA_MIRRORING = 'hs_excluded_from_cross_account_data_mirroring';

    case HS_FACEBOOK_AD_CLICKED = 'hs_facebook_ad_clicked';

    case HS_FACEBOOK_CLICK_ID = 'hs_facebook_click_id';

    case HS_FACEBOOKID = 'hs_facebookid';

    case HS_FEEDBACK_LAST_CES_SURVEY_DATE = 'hs_feedback_last_ces_survey_date';

    case HS_FEEDBACK_LAST_CES_SURVEY_FOLLOW_UP = 'hs_feedback_last_ces_survey_follow_up';

    case HS_FEEDBACK_LAST_CES_SURVEY_RATING = 'hs_feedback_last_ces_survey_rating';

    case HS_FEEDBACK_LAST_CSAT_SURVEY_DATE = 'hs_feedback_last_csat_survey_date';

    case HS_FEEDBACK_LAST_CSAT_SURVEY_FOLLOW_UP = 'hs_feedback_last_csat_survey_follow_up';

    case HS_FEEDBACK_LAST_CSAT_SURVEY_RATING = 'hs_feedback_last_csat_survey_rating';

    case HS_FEEDBACK_LAST_NPS_FOLLOW_UP = 'hs_feedback_last_nps_follow_up';

    case HS_FEEDBACK_LAST_NPS_RATING = 'hs_feedback_last_nps_rating';

    case HS_FEEDBACK_LAST_NPS_RATING_NUMBER = 'hs_feedback_last_nps_rating_number';

    case HS_FEEDBACK_LAST_SURVEY_DATE = 'hs_feedback_last_survey_date';

    case HS_FEEDBACK_SHOW_NPS_WEB_SURVEY = 'hs_feedback_show_nps_web_survey';

    case HS_FIRST_CLOSED_ORDER_ID = 'hs_first_closed_order_id';

    case HS_FIRST_ENGAGEMENT_OBJECT_ID = 'hs_first_engagement_object_id';

    case HS_FIRST_ORDER_CLOSED_DATE = 'hs_first_order_closed_date';

    case HS_FIRST_OUTREACH_DATE = 'hs_first_outreach_date';

    case HS_FIRST_SUBSCRIPTION_CREATE_DATE = 'hs_first_subscription_create_date';

    case HS_FULL_NAME_OR_EMAIL = 'hs_full_name_or_email';

    case HS_GEOHASH_1 = 'hs_geohash_1';

    case HS_GEOHASH_2 = 'hs_geohash_2';

    case HS_GEOHASH_3 = 'hs_geohash_3';

    case HS_GEOHASH_4 = 'hs_geohash_4';

    case HS_GEOHASH_5 = 'hs_geohash_5';

    case HS_GEOHASH_6 = 'hs_geohash_6';

    case HS_GOOGLE_CLICK_ID = 'hs_google_click_id';

    case HS_GOOGLEPLUSID = 'hs_googleplusid';

    case HS_GPS_COORDINATES = 'hs_gps_coordinates';

    case HS_GPS_ERROR = 'hs_gps_error';

    case HS_GPS_LATITUDE = 'hs_gps_latitude';

    case HS_GPS_LONGITUDE = 'hs_gps_longitude';

    case HS_HAS_ACTIVE_SUBSCRIPTION = 'hs_has_active_subscription';

    case HS_INFERRED_LANGUAGE_CODES = 'hs_inferred_language_codes';

    case HS_INTENT_PAID_UP_TO_DATE = 'hs_intent_paid_up_to_date';

    case HS_INTENT_SIGNALS_ENABLED = 'hs_intent_signals_enabled';

    case HS_IP_TIMEZONE = 'hs_ip_timezone';

    case HS_IS_CONTACT = 'hs_is_contact';

    case HS_IS_ENRICHED = 'hs_is_enriched';

    case HS_IS_MERGE_REVERTIBLE = 'hs_is_merge_revertible';

    case HS_IS_UNWORKED = 'hs_is_unworked';

    case HS_JOB_CHANGE_DETECTED_DATE = 'hs_job_change_detected_date';

    case HS_JOURNEY_STAGE = 'hs_journey_stage';

    case HS_LANGUAGE = 'hs_language';

    case HS_LAST_METERED_ENRICHMENT_TIMESTAMP = 'hs_last_metered_enrichment_timestamp';

    case HS_LAST_SALES_ACTIVITY_DATE = 'hs_last_sales_activity_date';

    case HS_LAST_SALES_ACTIVITY_TIMESTAMP = 'hs_last_sales_activity_timestamp';

    case HS_LAST_SALES_ACTIVITY_TYPE = 'hs_last_sales_activity_type';

    case HS_LAST_SMS_SEND_DATE = 'hs_last_sms_send_date';

    case HS_LAST_SMS_SEND_NAME = 'hs_last_sms_send_name';

    case HS_LATEST_DISQUALIFIED_LEAD_DATE = 'hs_latest_disqualified_lead_date';

    case HS_LATEST_MEETING_ACTIVITY = 'hs_latest_meeting_activity';

    case HS_LATEST_OPEN_LEAD_DATE = 'hs_latest_open_lead_date';

    case HS_LATEST_QUALIFIED_LEAD_DATE = 'hs_latest_qualified_lead_date';

    case HS_LATEST_SEQUENCE_ENDED_DATE = 'hs_latest_sequence_ended_date';

    case HS_LATEST_SEQUENCE_ENROLLED = 'hs_latest_sequence_enrolled';

    case HS_LATEST_SEQUENCE_ENROLLED_DATE = 'hs_latest_sequence_enrolled_date';

    case HS_LATEST_SEQUENCE_FINISHED_DATE = 'hs_latest_sequence_finished_date';

    case HS_LATEST_SEQUENCE_UNENROLLED_DATE = 'hs_latest_sequence_unenrolled_date';

    case HS_LATEST_SOURCE = 'hs_latest_source';

    case HS_LATEST_SOURCE_COMPOSITE_DATA = 'hs_latest_source_composite_data';

    case HS_LATEST_SOURCE_DATA_1 = 'hs_latest_source_data_1';

    case HS_LATEST_SOURCE_DATA_2 = 'hs_latest_source_data_2';

    case HS_LATEST_SOURCE_TIMESTAMP = 'hs_latest_source_timestamp';

    case HS_LATEST_SUBSCRIPTION_CREATE_DATE = 'hs_latest_subscription_create_date';

    case HS_LATITUDE = 'hs_latitude';

    case HS_LEAD_STATUS = 'hs_lead_status';

    case HS_LEGAL_BASIS = 'hs_legal_basis';

    case HS_LIFECYCLESTAGE_CUSTOMER_DATE = 'hs_lifecyclestage_customer_date';

    case HS_LIFECYCLESTAGE_EVANGELIST_DATE = 'hs_lifecyclestage_evangelist_date';

    case HS_LIFECYCLESTAGE_LEAD_DATE = 'hs_lifecyclestage_lead_date';

    case HS_LIFECYCLESTAGE_MARKETINGQUALIFIEDLEAD_DATE = 'hs_lifecyclestage_marketingqualifiedlead_date';

    case HS_LIFECYCLESTAGE_OPPORTUNITY_DATE = 'hs_lifecyclestage_opportunity_date';

    case HS_LIFECYCLESTAGE_OTHER_DATE = 'hs_lifecyclestage_other_date';

    case HS_LIFECYCLESTAGE_SALESQUALIFIEDLEAD_DATE = 'hs_lifecyclestage_salesqualifiedlead_date';

    case HS_LIFECYCLESTAGE_SUBSCRIBER_DATE = 'hs_lifecyclestage_subscriber_date';

    case HS_LINKEDIN_AD_CLICKED = 'hs_linkedin_ad_clicked';

    case HS_LINKEDIN_CLICK_ID = 'hs_linkedin_click_id';

    case HS_LINKEDIN_URL = 'hs_linkedin_url';

    case HS_LINKEDINID = 'hs_linkedinid';

    case HS_LIVE_ENRICHMENT_DEADLINE = 'hs_live_enrichment_deadline';

    case HS_LONGITUDE = 'hs_longitude';

    case HS_MANUAL_CAMPAIGN_IDS = 'hs_manual_campaign_ids';

    case HS_MARKETABLE_REASON_ID = 'hs_marketable_reason_id';

    case HS_MARKETABLE_REASON_TYPE = 'hs_marketable_reason_type';

    case HS_MARKETABLE_STATUS = 'hs_marketable_status';

    case HS_MARKETABLE_UNTIL_RENEWAL = 'hs_marketable_until_renewal';

    case HS_MEMBERSHIP_HAS_ACCESSED_PRIVATE_CONTENT = 'hs_membership_has_accessed_private_content';

    case HS_MEMBERSHIP_LAST_PRIVATE_CONTENT_ACCESS_DATE = 'hs_membership_last_private_content_access_date';

    case HS_MESSAGING_ENGAGEMENT_SCORE = 'hs_messaging_engagement_score';

    case HS_MOBILE_SDK_PUSH_TOKENS = 'hs_mobile_sdk_push_tokens';

    case HS_NOTES_LAST_ACTIVITY = 'hs_notes_last_activity';

    case HS_NOTES_NEXT_ACTIVITY = 'hs_notes_next_activity';

    case HS_NOTES_NEXT_ACTIVITY_TYPE = 'hs_notes_next_activity_type';

    case HS_NUM_ASSOCIATED_OPEN_DEALS = 'hs_num_associated_open_deals';

    case HS_PERSONA = 'hs_persona';

    case HS_PINNED_ENGAGEMENT_ID = 'hs_pinned_engagement_id';

    case HS_PIPELINE = 'hs_pipeline';

    case HS_PREDICTIVECONTACTSCORE = 'hs_predictivecontactscore';

    case HS_PREDICTIVECONTACTSCORE_TMP = 'hs_predictivecontactscore_tmp';

    case HS_PREDICTIVECONTACTSCORE_V2 = 'hs_predictivecontactscore_v2';

    case HS_PREDICTIVECONTACTSCOREBUCKET = 'hs_predictivecontactscorebucket';

    case HS_PREDICTIVESCORINGTIER = 'hs_predictivescoringtier';

    case HS_PREDICTIVESCORINGTIER_TMP = 'hs_predictivescoringtier_tmp';

    case HS_PROSPECTING_AGENT_ACTIVELY_ENROLLED_COUNT = 'hs_prospecting_agent_actively_enrolled_count';

    case HS_PROSPECTING_AGENT_ENROLLMENT_STATUS = 'hs_prospecting_agent_enrollment_status';

    case HS_PROSPECTING_AGENT_LAST_ENROLLED = 'hs_prospecting_agent_last_enrolled';

    case HS_PROSPECTING_AGENT_SENDER = 'hs_prospecting_agent_sender';

    case HS_PROSPECTING_AGENT_TOTAL_ENROLLED_COUNT = 'hs_prospecting_agent_total_enrolled_count';

    case HS_QUARANTINED_EMAILS = 'hs_quarantined_emails';

    case HS_RECENT_CLOSED_ORDER_DATE = 'hs_recent_closed_order_date';

    case HS_REGISTERED_MEMBER = 'hs_registered_member';

    case HS_REGISTRATION_METHOD = 'hs_registration_method';

    case HS_RETURNING_TO_OFFICE_DETECTED_DATE = 'hs_returning_to_office_detected_date';

    case HS_ROLE = 'hs_role';

    case HS_SA_FIRST_ENGAGEMENT_DATE = 'hs_sa_first_engagement_date';

    case HS_SA_FIRST_ENGAGEMENT_DESCR = 'hs_sa_first_engagement_descr';

    case HS_SA_FIRST_ENGAGEMENT_OBJECT_TYPE = 'hs_sa_first_engagement_object_type';

    case HS_SALES_EMAIL_LAST_CLICKED = 'hs_sales_email_last_clicked';

    case HS_SALES_EMAIL_LAST_OPENED = 'hs_sales_email_last_opened';

    case HS_SALES_EMAIL_LAST_REPLIED = 'hs_sales_email_last_replied';

    case HS_SEARCHABLE_CALCULATED_INTERNATIONAL_MOBILE_NUMBER = 'hs_searchable_calculated_international_mobile_number';

    case HS_SEARCHABLE_CALCULATED_INTERNATIONAL_PHONE_NUMBER = 'hs_searchable_calculated_international_phone_number';

    case HS_SEARCHABLE_CALCULATED_MOBILE_NUMBER = 'hs_searchable_calculated_mobile_number';

    case HS_SEARCHABLE_CALCULATED_PHONE_NUMBER = 'hs_searchable_calculated_phone_number';

    case HS_SENIORITY = 'hs_seniority';

    case HS_SEQUENCES_ACTIVELY_ENROLLED_COUNT = 'hs_sequences_actively_enrolled_count';

    case HS_SEQUENCES_ENROLLED_COUNT = 'hs_sequences_enrolled_count';

    case HS_SEQUENCES_IS_ENROLLED = 'hs_sequences_is_enrolled';

    case HS_SOCIAL_FACEBOOK_CLICKS = 'hs_social_facebook_clicks';

    case HS_SOCIAL_GOOGLE_PLUS_CLICKS = 'hs_social_google_plus_clicks';

    case HS_SOCIAL_LAST_ENGAGEMENT = 'hs_social_last_engagement';

    case HS_SOCIAL_LINKEDIN_CLICKS = 'hs_social_linkedin_clicks';

    case HS_SOCIAL_NUM_BROADCAST_CLICKS = 'hs_social_num_broadcast_clicks';

    case HS_SOCIAL_TWITTER_CLICKS = 'hs_social_twitter_clicks';

    case HS_SOURCE_OBJECT_ID = 'hs_source_object_id';

    case HS_SOURCE_PORTAL_ID = 'hs_source_portal_id';

    case HS_STATE_CODE = 'hs_state_code';

    case HS_SUB_ROLE = 'hs_sub_role';

    case HS_TESTPURGE = 'hs_testpurge';

    case HS_TESTROLLBACK = 'hs_testrollback';

    case HS_TIKTOK_AD_CLICKED = 'hs_tiktok_ad_clicked';

    case HS_TIKTOK_CLICK_ID = 'hs_tiktok_click_id';

    case HS_TIME_BETWEEN_CONTACT_CREATION_AND_DEAL_CLOSE = 'hs_time_between_contact_creation_and_deal_close';

    case HS_TIME_BETWEEN_CONTACT_CREATION_AND_DEAL_CREATION = 'hs_time_between_contact_creation_and_deal_creation';

    case HS_TIME_IN_CUSTOMER = 'hs_time_in_customer';

    case HS_TIME_IN_EVANGELIST = 'hs_time_in_evangelist';

    case HS_TIME_IN_LEAD = 'hs_time_in_lead';

    case HS_TIME_IN_MARKETINGQUALIFIEDLEAD = 'hs_time_in_marketingqualifiedlead';

    case HS_TIME_IN_OPPORTUNITY = 'hs_time_in_opportunity';

    case HS_TIME_IN_OTHER = 'hs_time_in_other';

    case HS_TIME_IN_SALESQUALIFIEDLEAD = 'hs_time_in_salesqualifiedlead';

    case HS_TIME_IN_SUBSCRIBER = 'hs_time_in_subscriber';

    case HS_TIME_TO_FIRST_ENGAGEMENT = 'hs_time_to_first_engagement';

    case HS_TIME_TO_MOVE_FROM_LEAD_TO_CUSTOMER = 'hs_time_to_move_from_lead_to_customer';

    case HS_TIME_TO_MOVE_FROM_MARKETINGQUALIFIEDLEAD_TO_CUSTOMER = 'hs_time_to_move_from_marketingqualifiedlead_to_customer';

    case HS_TIME_TO_MOVE_FROM_OPPORTUNITY_TO_CUSTOMER = 'hs_time_to_move_from_opportunity_to_customer';

    case HS_TIME_TO_MOVE_FROM_SALESQUALIFIEDLEAD_TO_CUSTOMER = 'hs_time_to_move_from_salesqualifiedlead_to_customer';

    case HS_TIME_TO_MOVE_FROM_SUBSCRIBER_TO_CUSTOMER = 'hs_time_to_move_from_subscriber_to_customer';

    case HS_TIMEZONE = 'hs_timezone';

    case HS_TWITTERID = 'hs_twitterid';

    case HS_V2_CUMULATIVE_TIME_IN_CUSTOMER = 'hs_v2_cumulative_time_in_customer';

    case HS_V2_CUMULATIVE_TIME_IN_EVANGELIST = 'hs_v2_cumulative_time_in_evangelist';

    case HS_V2_CUMULATIVE_TIME_IN_LEAD = 'hs_v2_cumulative_time_in_lead';

    case HS_V2_CUMULATIVE_TIME_IN_MARKETINGQUALIFIEDLEAD = 'hs_v2_cumulative_time_in_marketingqualifiedlead';

    case HS_V2_CUMULATIVE_TIME_IN_OPPORTUNITY = 'hs_v2_cumulative_time_in_opportunity';

    case HS_V2_CUMULATIVE_TIME_IN_OTHER = 'hs_v2_cumulative_time_in_other';

    case HS_V2_CUMULATIVE_TIME_IN_SALESQUALIFIEDLEAD = 'hs_v2_cumulative_time_in_salesqualifiedlead';

    case HS_V2_CUMULATIVE_TIME_IN_SUBSCRIBER = 'hs_v2_cumulative_time_in_subscriber';

    case HS_V2_DATE_ENTERED_CURRENT_STAGE = 'hs_v2_date_entered_current_stage';

    case HS_V2_DATE_ENTERED_CUSTOMER = 'hs_v2_date_entered_customer';

    case HS_V2_DATE_ENTERED_EVANGELIST = 'hs_v2_date_entered_evangelist';

    case HS_V2_DATE_ENTERED_LEAD = 'hs_v2_date_entered_lead';

    case HS_V2_DATE_ENTERED_MARKETINGQUALIFIEDLEAD = 'hs_v2_date_entered_marketingqualifiedlead';

    case HS_V2_DATE_ENTERED_OPPORTUNITY = 'hs_v2_date_entered_opportunity';

    case HS_V2_DATE_ENTERED_OTHER = 'hs_v2_date_entered_other';

    case HS_V2_DATE_ENTERED_SALESQUALIFIEDLEAD = 'hs_v2_date_entered_salesqualifiedlead';

    case HS_V2_DATE_ENTERED_SUBSCRIBER = 'hs_v2_date_entered_subscriber';

    case HS_V2_DATE_EXITED_CUSTOMER = 'hs_v2_date_exited_customer';

    case HS_V2_DATE_EXITED_EVANGELIST = 'hs_v2_date_exited_evangelist';

    case HS_V2_DATE_EXITED_LEAD = 'hs_v2_date_exited_lead';

    case HS_V2_DATE_EXITED_MARKETINGQUALIFIEDLEAD = 'hs_v2_date_exited_marketingqualifiedlead';

    case HS_V2_DATE_EXITED_OPPORTUNITY = 'hs_v2_date_exited_opportunity';

    case HS_V2_DATE_EXITED_OTHER = 'hs_v2_date_exited_other';

    case HS_V2_DATE_EXITED_SALESQUALIFIEDLEAD = 'hs_v2_date_exited_salesqualifiedlead';

    case HS_V2_DATE_EXITED_SUBSCRIBER = 'hs_v2_date_exited_subscriber';

    case HS_V2_LATEST_TIME_IN_CUSTOMER = 'hs_v2_latest_time_in_customer';

    case HS_V2_LATEST_TIME_IN_EVANGELIST = 'hs_v2_latest_time_in_evangelist';

    case HS_V2_LATEST_TIME_IN_LEAD = 'hs_v2_latest_time_in_lead';

    case HS_V2_LATEST_TIME_IN_MARKETINGQUALIFIEDLEAD = 'hs_v2_latest_time_in_marketingqualifiedlead';

    case HS_V2_LATEST_TIME_IN_OPPORTUNITY = 'hs_v2_latest_time_in_opportunity';

    case HS_V2_LATEST_TIME_IN_OTHER = 'hs_v2_latest_time_in_other';

    case HS_V2_LATEST_TIME_IN_SALESQUALIFIEDLEAD = 'hs_v2_latest_time_in_salesqualifiedlead';

    case HS_V2_LATEST_TIME_IN_SUBSCRIBER = 'hs_v2_latest_time_in_subscriber';

    case HS_V2_TIME_IN_CURRENT_STAGE = 'hs_v2_time_in_current_stage';

    case HS_WHATSAPP_PHONE_NUMBER = 'hs_whatsapp_phone_number';

    case HS_WHY_THIS_CONTACT = 'hs_why_this_contact';

    case HUBSPOT_OWNER_ID = 'hubspot_owner_id';

    case HUBSPOTSCORE = 'hubspotscore';

    case INDUSTRY = 'industry';

    case IP_CITY = 'ip_city';

    case IP_COUNTRY = 'ip_country';

    case IP_COUNTRY_CODE = 'ip_country_code';

    case IP_LATLON = 'ip_latlon';

    case IP_STATE = 'ip_state';

    case IP_STATE_CODE = 'ip_state_code';

    case IP_ZIPCODE = 'ip_zipcode';

    case JOB_FUNCTION = 'job_function';

    case JOBTITLE = 'jobtitle';

    case KLOUTSCOREGENERAL = 'kloutscoregeneral';

    case LASTMODIFIEDDATE = 'lastmodifieddate';

    case LASTNAME = 'lastname';

    case LIFECYCLESTAGE = 'lifecyclestage';

    case LINKEDINBIO = 'linkedinbio';

    case LINKEDINCONNECTIONS = 'linkedinconnections';

    case MARITAL_STATUS = 'marital_status';

    case MESSAGE = 'message';

    case MILITARY_STATUS = 'military_status';

    case MOBILEPHONE = 'mobilephone';

    case NOTES_LAST_CONTACTED = 'notes_last_contacted';

    case NOTES_LAST_UPDATED = 'notes_last_updated';

    case NOTES_NEXT_ACTIVITY_DATE = 'notes_next_activity_date';

    case NUM_ASSOCIATED_DEALS = 'num_associated_deals';

    case NUM_CONTACTED_NOTES = 'num_contacted_notes';

    case NUM_CONVERSION_EVENTS = 'num_conversion_events';

    case NUM_NOTES = 'num_notes';

    case NUM_UNIQUE_CONVERSION_EVENTS = 'num_unique_conversion_events';

    case NUMEMPLOYEES = 'numemployees';

    case OWNEREMAIL = 'owneremail';

    case OWNERNAME = 'ownername';

    case PHONE = 'phone';

    case PHOTO = 'photo';

    case RECENT_CONVERSION_DATE = 'recent_conversion_date';

    case RECENT_CONVERSION_EVENT_NAME = 'recent_conversion_event_name';

    case RECENT_DEAL_AMOUNT = 'recent_deal_amount';

    case RECENT_DEAL_CLOSE_DATE = 'recent_deal_close_date';

    case RELATIONSHIP_STATUS = 'relationship_status';

    case SALUTATION = 'salutation';

    case SCHOOL = 'school';

    case SENIORITY = 'seniority';

    case START_DATE = 'start_date';

    case STATE = 'state';

    case SURVEYMONKEYEVENTLASTUPDATED = 'surveymonkeyeventlastupdated';

    case TOTAL_REVENUE = 'total_revenue';

    case TWITTERBIO = 'twitterbio';

    case TWITTERHANDLE = 'twitterhandle';

    case TWITTERPROFILEPHOTO = 'twitterprofilephoto';

    case WEBINAREVENTLASTUPDATED = 'webinareventlastupdated';

    case WEBSITE = 'website';

    case WORK_EMAIL = 'work_email';

    case ZIP = 'zip';
}

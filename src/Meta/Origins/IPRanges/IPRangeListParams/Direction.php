<?php

declare(strict_types=1);

namespace HubSpotSDK\Meta\Origins\IPRanges\IPRangeListParams;

enum Direction: string
{
    case INGRESS = 'INGRESS';

    case EGRESS = 'EGRESS';
}

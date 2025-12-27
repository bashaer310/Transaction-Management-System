<?php

namespace App\Enums;

enum TransactionType: string
{
case OUTGOING = 'outgoing';
case INCOMING = 'incoming';
}
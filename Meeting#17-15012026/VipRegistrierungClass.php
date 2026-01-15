<?php

// BaseClass <= RegistrierungClass <= VipRegistrierungClass <= NotVipRegistierungClass
class VipRegistrierungClass extends RegistrierungClass
{
    protected bool $isVIP = true;
}

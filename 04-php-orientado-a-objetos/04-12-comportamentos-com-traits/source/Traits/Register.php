<?php

namespace Source\Traits;

class Register
{
    use UserTrait;
    use AddressTrait;
    public function __construct(User $user, Address $address)
    {
        $this->setUser($user);
        $this->setAddress($address);
    }

    private function save()
    {
        $this->user->id = 232;
        $this->address->user_id = $this->user->id;
    }
}
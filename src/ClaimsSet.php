<?php

namespace League\OpenIdConnectClaims;

class ClaimsSet implements ClaimsSetInterface
{
    protected $attributes = [];

    /**
     * @inheritdoc
     */
    public function setIdentifier($id)
    {
        $this->attributes['sub'] = (string) $id;
    }

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        $this->attributes['name'] = (string) $name;
    }

    /**
     * @inheritdoc
     */
    public function setFirstName($firstName)
    {
        $this->attributes['given_name'] = (string) $firstName;
    }

    /**
     * @inheritdoc
     */
    public function setMiddleName($middleName)
    {
        $this->attributes['middle_name'] = (string) $middleName;
    }

    /**
     * @inheritdoc
     */
    public function setLastName($lastName)
    {
        $this->attributes['family_name'] = (string) $lastName;
    }

    /**
     * @inheritdoc
     */
    public function setNickname($nickname)
    {
        $this->attributes['nickname'] = (string) $nickname;
    }

    /**
     * @inheritdoc
     */
    public function setUsername($username)
    {
        $this->attributes['preferred_username'] = (string) $username;
    }

    /**
     * @inheritdoc
     */
    public function setProfileUrl($url)
    {
        $this->attributes['profile'] = (string) $url;
    }

    /**
     * @inheritdoc
     */
    public function setPictureUrl($url)
    {
        $this->attributes['picture'] = (string) $url;
    }

    /**
     * @inheritdoc
     */
    public function setWebsite($url)
    {
        $this->attributes['website'] = (string) $url;
    }

    /**
     * @inheritdoc
     */
    public function setEmail($email)
    {
        $this->attributes['email'] = (string) $email;
    }

    /**
     * @inheritdoc
     */
    public function setEmailVerified($verified = true)
    {
        $this->attributes['email_verified'] = (bool) $verified;
    }

    /**
     * @inheritdoc
     */
    public function setGender($gender)
    {
        $this->attributes['gender'] = (string) $gender;
    }

    /**
     * @inheritdoc
     */
    public function setBirthDate($year = '0000', $month = null, $day = null)
    {
        $this->attributes['birthdate'] = ($month !== null && $day !== null)
            ? sprintf('%s-%s-%s', $year, $month, $day)
            : $year;
    }

    /**
     * @inheritdoc
     */
    public function setZoneInfo($zoneInfo)
    {
        $this->attributes['zoneinfo'] = (string) $zoneInfo;
    }

    /**
     * @inheritdoc
     */
    public function setLocale($locale)
    {
        $this->attributes['locale'] = (string) $locale;
    }

    /**
     * @inheritdoc
     */
    public function setPhoneNumber($phoneNumber, $extension = null)
    {
        $this->attributes['phone_number'] = ($extension !== null)
            ? sprintf('%s;ext=%s', $phoneNumber, $extension)
            : $phoneNumber;
    }

    /**
     * @inheritdoc
     */
    public function setPhoneNumberVerified($verified = true)
    {
        $this->attributes['phone_number_verified'] = (bool) $verified;
    }

    /**
     * @inheritdoc
     */
    public function setAddressStreet($street)
    {
        if (array_key_exists('address', $this->attributes) === false) {
            $this->attributes['address'] = [];
        }

        $this->attributes['address']['street_address'] = (string) $street;
    }

    /**
     * @inheritdoc
     */
    public function setAddressLocality($locality)
    {
        if (array_key_exists('address', $this->attributes) === false) {
            $this->attributes['address'] = [];
        }

        $this->attributes['address']['locality'] = (string) $locality;
    }

    /**
     * @inheritdoc
     */
    public function setAddressPostalCode($postalCode)
    {
        if (array_key_exists('address', $this->attributes) === false) {
            $this->attributes['address'] = [];
        }

        $this->attributes['address']['postal_code'] = (string) $postalCode;
    }

    /**
     * @inheritdoc
     */
    public function setAddressRegion($region)
    {
        if (array_key_exists('address', $this->attributes) === false) {
            $this->attributes['address'] = [];
        }

        $this->attributes['address']['region'] = (string) $region;
    }

    /**
     * @inheritdoc
     */
    public function setAddressCountry($country)
    {
        if (array_key_exists('address', $this->attributes) === false) {
            $this->attributes['address'] = [];
        }

        $this->attributes['address']['country'] = (string) $country;
    }

    /**
     * Set the user's address as a formatted string
     *
     * @param string|null $formattedAddress    Full mailing address, formatted for display or use on a mailing list.
     *                                         This field MAY contain multiple lines, separated by newlines. Newlines
     *                                         can be represented either as a carriage return/line feed pair ("\r\n")
     *                                         or as a single line feed character ("\n").
     */
    public function setFormattedAddress($formattedAddress)
    {
        if (array_key_exists('address', $this->attributes) === false) {
            $this->attributes['address'] = [];
        }

        $this->attributes['address']['formatted'] = (string) $formattedAddress;
    }

    /**
     * @inheritdoc
     */
    function jsonSerialize()
    {
        if (
            array_key_exists('name', $this->attributes) === false
            && (array_key_exists('given_name', $this->attributes)
                || array_key_exists('family_name', $this->attributes)
                || array_key_exists('middle_name', $this->attributes)
            )
        ) {
            $attr = $this->attributes;
            $attr['name'] = preg_replace(
                '/\s+/',
                ' ',
                implode(
                    ' ',
                    [
                        @$this->attributes['given_name'],
                        @$this->attributes['middle_name'],
                        @$this->attributes['family_name'],
                    ]
                )
            );
            return $attr;
        }
        return $this->attributes;
    }

    /**
     * Get a specific claim
     *
     * @param string $claim
     *
     * @return mixed
     */
    public function getClaim($claim)
    {
        if (array_key_exists($claim, $this->attributes)) {
            return $this->attributes[$claim];
        }

        throw new \LogicException(sprintf('The claim `%s` is not set', $claim));
    }

    /**
     * Set a claim
     *
     * @param string $claim
     * @param mixed  $value
     */
    public function setClaim($claim, $value)
    {
        if (in_array(
            $claim,
            [
                'sub',
                'name',
                'given_name',
                'middle_name',
                'family_name',
                'nickname',
                'preferred_username',
                'profile',
                'picture',
                'website',
                'email',
                'email_verified',
                'gender',
                'birthdate',
                'zoneinfo',
                'locale',
                'phone_number',
                'phone_number_verified',
                'address',
            ]
        )) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Please use the relevant method to set the `%s` claim',
                    $claim
                )
            );
        }

        $this->attributes[$claim] = $value;
    }
}